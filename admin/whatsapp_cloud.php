<?php

/**
 * Integración de recuperación por WhatsApp Cloud API.
 *
 * Los secretos se leen desde variables de entorno o desde
 * admin/config/whatsapp.php (archivo ignorado por Git).
 */

function mc_whatsapp_cloud_config() {
    $config = [
        'token' => (string)(getenv('MC_WHATSAPP_TOKEN') ?: ''),
        'phone_number_id' => (string)(getenv('MC_WHATSAPP_PHONE_NUMBER_ID') ?: ''),
        'template_name' => (string)(getenv('MC_WHATSAPP_TEMPLATE_NAME') ?: 'multicredit_recovery_code'),
        'template_lang' => (string)(getenv('MC_WHATSAPP_TEMPLATE_LANG') ?: 'es'),
        'graph_version' => (string)(getenv('MC_WHATSAPP_GRAPH_VERSION') ?: 'v26.0'),
        'template_mode' => (string)(getenv('MC_WHATSAPP_TEMPLATE_MODE') ?: 'authentication_copy_code'),
    ];

    $file = __DIR__ . '/config/whatsapp.php';
    if (is_file($file)) {
        $local = include $file;
        if (is_array($local)) {
            $config = array_merge($config, $local);
        }
    }

    $config['token'] = trim((string)($config['token'] ?? ''));
    $config['phone_number_id'] = preg_replace('/\D+/', '', (string)($config['phone_number_id'] ?? ''));
    $config['template_name'] = trim((string)($config['template_name'] ?? ''));
    $config['template_lang'] = trim((string)($config['template_lang'] ?? '')) ?: 'es';
    $config['graph_version'] = preg_replace('/[^a-zA-Z0-9.]/', '', (string)($config['graph_version'] ?? '')) ?: 'v26.0';
    $config['template_mode'] = trim((string)($config['template_mode'] ?? 'authentication_copy_code')) ?: 'authentication_copy_code';

    return $config;
}

function mc_whatsapp_cloud_status() {
    $cfg = mc_whatsapp_cloud_config();
    $missing = [];

    if ($cfg['token'] === '' || stripos($cfg['token'], 'PEGA_AQUI') !== false) $missing[] = 'token';
    if ($cfg['phone_number_id'] === '') $missing[] = 'phone_number_id';
    if ($cfg['template_name'] === '') $missing[] = 'template_name';

    return [
        'configured' => empty($missing),
        'missing' => $missing,
        'graph_version' => $cfg['graph_version'],
        'template_name' => $cfg['template_name'],
        'template_lang' => $cfg['template_lang'],
        'template_mode' => $cfg['template_mode'],
        'phone_number_id' => $cfg['phone_number_id'],
        'token_present' => $cfg['token'] !== '' && stripos($cfg['token'], 'PEGA_AQUI') === false,
    ];
}

function mc_whatsapp_cloud_error_message($status, $decoded, $curlError = '') {
    $metaMessage = '';
    $metaCode = '';
    $metaSubcode = '';

    if (is_array($decoded) && isset($decoded['error']) && is_array($decoded['error'])) {
        $metaMessage = trim((string)($decoded['error']['message'] ?? ''));
        $metaCode = (string)($decoded['error']['code'] ?? '');
        $metaSubcode = (string)($decoded['error']['error_subcode'] ?? '');
    }

    $parts = ['Meta WhatsApp no aceptó el envío'];
    if ($status > 0) $parts[] = 'HTTP ' . $status;
    if ($metaCode !== '') $parts[] = 'código ' . $metaCode;
    if ($metaSubcode !== '') $parts[] = 'subcódigo ' . $metaSubcode;

    $message = implode(' · ', $parts) . '.';
    if ($metaMessage !== '') {
        $message .= ' ' . $metaMessage;
    } elseif ($curlError !== '') {
        $message .= ' ' . $curlError;
    }

    return $message;
}

function mc_send_whatsapp_recovery_code_v2($phone, $code) {
    $cfg = mc_whatsapp_cloud_config();
    $phone = preg_replace('/\D+/', '', (string)$phone);
    $code = preg_replace('/\D+/', '', (string)$code);

    if ($phone === '' || strlen($phone) < 10 || strlen($phone) > 15) {
        return ['ok'=>false, 'message'=>'El WhatsApp de recuperación no tiene un formato internacional válido.'];
    }
    if (strlen($code) !== 6) {
        return ['ok'=>false, 'message'=>'El código OTP debe tener 6 dígitos.'];
    }

    $status = mc_whatsapp_cloud_status();
    if (empty($status['configured'])) {
        return [
            'ok'=>false,
            'message'=>'WhatsApp Cloud API todavía no está configurado. Completa admin/config/whatsapp.php con token, phone_number_id y plantilla aprobada.',
            'missing'=>$status['missing'],
        ];
    }

    if (!function_exists('curl_init')) {
        return ['ok'=>false, 'message'=>'PHP cURL no está habilitado. Activa extension=curl en php.ini y reinicia Apache.'];
    }

    $endpoint = 'https://graph.facebook.com/' . $cfg['graph_version'] . '/' . rawurlencode($cfg['phone_number_id']) . '/messages';

    $components = [[
        'type' => 'body',
        'parameters' => [[
            'type' => 'text',
            'text' => $code,
        ]],
    ]];

    // Las plantillas AUTHENTICATION con botón OTP COPY_CODE necesitan enviar
    // el mismo código en BODY y en el botón dinámico de índice 0.
    if ($cfg['template_mode'] === 'authentication_copy_code') {
        $components[] = [
            'type' => 'button',
            'sub_type' => 'url',
            'index' => '0',
            'parameters' => [[
                'type' => 'text',
                'text' => $code,
            ]],
        ];
    }

    $payload = [
        'messaging_product' => 'whatsapp',
        'recipient_type' => 'individual',
        'to' => $phone,
        'type' => 'template',
        'template' => [
            'name' => $cfg['template_name'],
            'language' => ['code' => $cfg['template_lang']],
            'components' => $components,
        ],
    ];

    $encoded = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if ($encoded === false) {
        return ['ok'=>false, 'message'=>'No se pudo preparar el mensaje de WhatsApp.'];
    }

    $ch = curl_init($endpoint);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 8,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $cfg['token'],
            'Content-Type: application/json',
            'Accept: application/json',
        ],
        CURLOPT_POSTFIELDS => $encoded,
    ]);

    $body = curl_exec($ch);
    $errno = curl_errno($ch);
    $curlError = curl_error($ch);
    $httpStatus = (int)curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
    curl_close($ch);

    $decoded = is_string($body) ? json_decode($body, true) : null;

    if ($errno || $httpStatus < 200 || $httpStatus >= 300) {
        return [
            'ok'=>false,
            'status'=>$httpStatus,
            'message'=>mc_whatsapp_cloud_error_message($httpStatus, is_array($decoded) ? $decoded : [], $curlError),
        ];
    }

    $messageId = '';
    if (is_array($decoded) && !empty($decoded['messages'][0]['id'])) {
        $messageId = (string)$decoded['messages'][0]['id'];
    }

    return [
        'ok'=>true,
        'status'=>$httpStatus,
        'message_id'=>$messageId,
        'message'=>'Meta aceptó el envío del código por WhatsApp.',
    ];
}
