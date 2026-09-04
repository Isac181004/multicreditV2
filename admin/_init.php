<?php
if (session_status() !== PHP_SESSION_ACTIVE && !headers_sent()) session_start();
require_once dirname(__DIR__) . '/cms/bootstrap.php';

define('MC_ADMIN_CREDENTIAL_FILE', __DIR__ . '/config/admin_credentials.js');
define('MC_RECOVERY_STATE_FILE', __DIR__ . '/config/recovery_state.json');

function mc_admin_credentials() {
    $defaults = ['username'=>'','passwordHash'=>'','recoveryPhone'=>''];
    $raw = @file_get_contents(MC_ADMIN_CREDENTIAL_FILE);
    if ($raw === false) return $defaults;
    if (!preg_match('/=\s*(\{.*?\})\s*;/s', $raw, $m)) return $defaults;
    $data = json_decode($m[1], true);
    return is_array($data) ? array_merge($defaults, $data) : $defaults;
}

function mc_write_admin_credentials($username, $passwordHash, $recoveryPhone = null) {
    $current = mc_admin_credentials();
    if ($recoveryPhone === null) $recoveryPhone = $current['recoveryPhone'] ?? '';
    $payload = [
        'username' => trim((string)$username),
        'passwordHash' => (string)$passwordHash,
        'recoveryPhone' => preg_replace('/\D+/', '', (string)$recoveryPhone),
    ];
    $js = "window.MULTICREDIT_ADMIN_CREDENTIALS = " . json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . ";\n";
    return @file_put_contents(MC_ADMIN_CREDENTIAL_FILE, $js, LOCK_EX) !== false;
}

function mc_admin_is_configured() {
    $c = mc_admin_credentials();
    return trim((string)$c['username']) !== '' && trim((string)$c['passwordHash']) !== '';
}

function mc_admin_logged_in() {
    return !empty($_SESSION['mc_admin_auth']);
}

function mc_admin_require_login() {
    if (!mc_admin_is_configured()) {
        header('Location: setup.php'); exit;
    }
    if (!mc_admin_logged_in()) {
        header('Location: login.php'); exit;
    }
}

function mc_csrf_token() {
    if (empty($_SESSION['mc_csrf'])) $_SESSION['mc_csrf'] = bin2hex(random_bytes(24));
    return $_SESSION['mc_csrf'];
}

function mc_csrf_check($throw = false) {
    $got = (string)($_POST['csrf'] ?? '');
    if ($got === '' || !hash_equals((string)($_SESSION['mc_csrf'] ?? ''), $got)) {
        if ($throw) throw new RuntimeException('CSRF inválido');
        http_response_code(419);
        exit('Solicitud expirada. Recarga la página e inténtalo nuevamente.');
    }
    return true;
}

function mc_flash($type = null, $message = null) {
    if ($type !== null && $message !== null) {
        $_SESSION['mc_flash'] = ['type'=>$type,'message'=>$message];
        return;
    }
    $v = $_SESSION['mc_flash'] ?? null;
    unset($_SESSION['mc_flash']);
    return $v;
}

function mc_slug($value) {
    $value = trim((string)$value);
    if (function_exists('iconv')) $value = @iconv('UTF-8','ASCII//TRANSLIT//IGNORE',$value) ?: $value;
    $value = strtolower($value);
    $value = preg_replace('/[^a-z0-9]+/', '-', $value);
    $value = trim($value, '-');
    return $value ?: 'noticia-' . date('YmdHis');
}

function mc_upload_image($field, $subdir = 'media') {
    if (empty($_FILES[$field]) || !is_array($_FILES[$field])) return ['ok'=>true,'path'=>''];
    $f = $_FILES[$field];
    if (($f['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) return ['ok'=>true,'path'=>''];
    if (($f['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) return ['ok'=>false,'error'=>'No se pudo subir la imagen.'];
    if (($f['size'] ?? 0) > 6 * 1024 * 1024) return ['ok'=>false,'error'=>'La imagen supera el límite de 6 MB.'];
    $info = @getimagesize($f['tmp_name']);
    if (!$info) return ['ok'=>false,'error'=>'El archivo seleccionado no es una imagen válida.'];
    $mime = $info['mime'] ?? '';
    $exts = ['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp','image/gif'=>'gif'];
    if (!isset($exts[$mime])) return ['ok'=>false,'error'=>'Formato no permitido. Usa JPG, PNG, WEBP o GIF.'];
    $subdir = preg_replace('/[^a-z0-9_-]/i','',$subdir) ?: 'media';
    $dir = MC_ROOT . '/uploads/' . $subdir;
    if (!is_dir($dir) && !@mkdir($dir,0775,true)) return ['ok'=>false,'error'=>'No se pudo crear la carpeta de imágenes.'];
    $name = date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $exts[$mime];
    $dest = $dir . '/' . $name;
    if (!@move_uploaded_file($f['tmp_name'], $dest)) return ['ok'=>false,'error'=>'No se pudo guardar la imagen. Verifica permisos de la carpeta uploads.'];
    return ['ok'=>true,'path'=>'uploads/' . $subdir . '/' . $name];
}

function mc_recovery_state() {
    return mc_read_json(MC_RECOVERY_STATE_FILE, []);
}

function mc_write_recovery_state($state) {
    return mc_write_json(MC_RECOVERY_STATE_FILE, is_array($state) ? $state : []);
}

function mc_clear_recovery_state() {
    if (is_file(MC_RECOVERY_STATE_FILE)) @unlink(MC_RECOVERY_STATE_FILE);
}

function mc_whatsapp_config() {
    $config = [
        'token' => (string)(getenv('MC_WHATSAPP_TOKEN') ?: ''),
        'phone_number_id' => (string)(getenv('MC_WHATSAPP_PHONE_NUMBER_ID') ?: ''),
        'template_name' => (string)(getenv('MC_WHATSAPP_TEMPLATE_NAME') ?: 'multicredit_recovery_code'),
        'template_lang' => (string)(getenv('MC_WHATSAPP_TEMPLATE_LANG') ?: 'es'),
        'graph_version' => (string)(getenv('MC_WHATSAPP_GRAPH_VERSION') ?: 'v23.0'),
    ];
    $file = __DIR__ . '/config/whatsapp.php';
    if (is_file($file)) {
        $local = include $file;
        if (is_array($local)) $config = array_merge($config, $local);
    }
    return $config;
}

function mc_send_whatsapp_recovery_code($phone, $code) {
    $cfg = mc_whatsapp_config();
    $phone = preg_replace('/\D+/', '', (string)$phone);
    if ($phone === '') return ['ok'=>false,'message'=>'El WhatsApp de recuperación no es válido.'];
    if (empty($cfg['token']) || empty($cfg['phone_number_id']) || empty($cfg['template_name'])) {
        return ['ok'=>false,'message'=>'WhatsApp Cloud API aún no está configurado en el servidor. Copia admin/config/whatsapp.example.php como whatsapp.php y completa token, phone_number_id y plantilla aprobada.'];
    }
    if (!function_exists('curl_init')) {
        return ['ok'=>false,'message'=>'PHP cURL no está habilitado; actívalo para enviar el código por WhatsApp.'];
    }

    $version = preg_replace('/[^a-zA-Z0-9.]/', '', (string)$cfg['graph_version']) ?: 'v23.0';
    $endpoint = 'https://graph.facebook.com/' . $version . '/' . rawurlencode((string)$cfg['phone_number_id']) . '/messages';
    $payload = [
        'messaging_product' => 'whatsapp',
        'to' => $phone,
        'type' => 'template',
        'template' => [
            'name' => (string)$cfg['template_name'],
            'language' => ['code' => (string)($cfg['template_lang'] ?: 'es')],
            'components' => [[
                'type' => 'body',
                'parameters' => [[ 'type' => 'text', 'text' => (string)$code ]],
            ]],
        ],
    ];

    $ch = curl_init($endpoint);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 8,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $cfg['token'],
            'Content-Type: application/json',
        ],
        CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
    ]);
    $body = curl_exec($ch);
    $errno = curl_errno($ch);
    $error = curl_error($ch);
    $status = (int)curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
    curl_close($ch);

    if ($errno || $status < 200 || $status >= 300) {
        return ['ok'=>false,'message'=>'Meta WhatsApp no aceptó el envío. Revisa token, número remitente y plantilla aprobada.','status'=>$status,'detail'=>$error ?: (string)$body];
    }
    return ['ok'=>true,'status'=>$status];
}

function mc_admin_header($title) {
    $user = mc_admin_credentials();
    $flash = mc_flash();
    ?><!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=mc_h($title)?> | Multicredit Admin</title><link rel="stylesheet" href="assets/admin.css"></head><body>
    <div class="admin-shell">
      <aside class="sidebar">
        <a class="brand" href="index.php"><span class="brand-mark">M</span><span><b>Multicredit</b><small>Administración</small></span></a>
        <nav>
          <a href="index.php">▦ Dashboard</a>
          <a href="encabezado.php">▤ Encabezado</a>
          <a href="modulos.php">▦ Módulos / páginas</a>
          <a href="contenido.php">✎ Inicio y contenido</a>
          <a href="noticias.php">📰 Noticias</a>
          <a href="media.php">▧ Biblioteca de imágenes</a>
          <a href="pie.php">▥ Pie de página</a>
          <a href="perfil.php">⚙ Usuario y recuperación</a>
          <a href="../index.php" target="_blank">↗ Ver sitio público</a>
          <a href="logout.php">⇥ Cerrar sesión</a>
        </nav>
        <div class="sidebar-user">Sesión: <strong><?=mc_h($user['username'] ?: 'admin')?></strong></div>
      </aside>
      <main class="main"><header class="topbar"><button class="menu-toggle" type="button" onclick="document.body.classList.toggle('nav-open')">☰</button><div><span>Panel administrativo</span><h1><?=mc_h($title)?></h1></div></header>
      <?php if ($flash): ?><div class="alert <?=mc_h($flash['type'])?>"><?=mc_h($flash['message'])?></div><?php endif; ?>
    <?php
}

function mc_admin_footer() { ?>
      <footer class="admin-footer">CEPRODEMIC MULTICREDIT · CMS por módulos · sin SQL</footer></main></div>
      <script>document.querySelectorAll('.sidebar a').forEach(a=>{if(a.getAttribute('href')===location.pathname.split('/').pop())a.classList.add('active')});</script>
    </body></html><?php }
?>