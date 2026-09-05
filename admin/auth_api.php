<?php
require_once __DIR__ . '/_init.php';
require_once __DIR__ . '/whatsapp_cloud.php';
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

function mc_auth_json($ok, $message = '', $extra = [], $status = 200) {
    http_response_code($status);
    echo json_encode(array_merge([
        'ok' => (bool)$ok,
        'message' => (string)$message,
    ], $extra), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    mc_auth_json(false, 'Método no permitido.', [], 405);
}

/*
 * El login overlay puede renderizarse dentro de módulos que ya enviaron HTML
 * antes de cargar el encabezado. En ese caso no es seguro depender de un CSRF
 * generado tarde en esa misma página porque la sesión puede no haber iniciado
 * a tiempo. Para este endpoint AJAX validamos que la petición venga del mismo
 * sitio y que sea la llamada XMLHttpRequest esperada. Los formularios internos
 * del panel continúan usando mc_csrf_check().
 */
$requestedWith = strtolower(trim((string)($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '')));
if ($requestedWith !== 'xmlhttprequest') {
    mc_auth_json(false, 'Solicitud no válida.', [], 403);
}

$host = strtolower(preg_replace('/:\d+$/', '', (string)($_SERVER['HTTP_HOST'] ?? '')));
$origin = trim((string)($_SERVER['HTTP_ORIGIN'] ?? ''));
$referer = trim((string)($_SERVER['HTTP_REFERER'] ?? ''));
$sourceUrl = $origin !== '' ? $origin : $referer;
if ($sourceUrl !== '') {
    $sourceHost = strtolower((string)parse_url($sourceUrl, PHP_URL_HOST));
    if ($sourceHost !== '' && $host !== '' && !hash_equals($host, $sourceHost)) {
        mc_auth_json(false, 'Origen de solicitud no permitido.', [], 403);
    }
}

$action = trim((string)($_POST['action'] ?? ''));
$credentials = mc_admin_credentials();

if ($action === 'login') {
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        mc_auth_json(false, 'Completa usuario y contraseña.', [], 422);
    }

    $validUser = hash_equals((string)($credentials['username'] ?? ''), $username);
    $validPass = $validUser && password_verify($password, (string)($credentials['passwordHash'] ?? ''));

    if (!$validPass) {
        usleep(250000);
        mc_auth_json(false, 'Usuario o contraseña incorrectos.', [], 401);
    }

    $_SESSION['mc_admin_auth'] = true;
    $_SESSION['mc_admin_user'] = $username;
    session_regenerate_id(true);
    mc_auth_json(true, 'Acceso correcto.', ['redirect' => 'admin/index.php']);
}

if ($action === 'request_recovery') {
    $username = trim((string)($_POST['username'] ?? ''));
    $realUser = (string)($credentials['username'] ?? '');
    $phone = preg_replace('/\D+/', '', (string)($credentials['recoveryPhone'] ?? ''));

    if ($username === '' || !hash_equals($realUser, $username)) {
        usleep(250000);
        mc_auth_json(false, 'No se pudo iniciar la recuperación con esos datos.', [], 422);
    }

    if ($phone === '') {
        mc_auth_json(false, 'La cuenta no tiene un WhatsApp de recuperación configurado. Ingresa al panel desde el servidor y configúralo en Perfil.', [], 422);
    }

    $state = mc_recovery_state();
    $now = time();
    $lastSent = (int)($state['sentAt'] ?? 0);
    if ($lastSent > 0 && ($now - $lastSent) < 60) {
        $wait = 60 - ($now - $lastSent);
        mc_auth_json(false, 'Espera ' . $wait . ' segundos antes de solicitar otro código.', [], 429);
    }

    $history = array_values(array_filter((array)($state['history'] ?? []), function ($ts) use ($now) {
        return is_numeric($ts) && ($now - (int)$ts) < 3600;
    }));
    if (count($history) >= 5) {
        mc_auth_json(false, 'Se alcanzó el límite de códigos por hora. Inténtalo nuevamente más tarde.', [], 429);
    }

    $code = (string)random_int(100000, 999999);
    $newState = [
        'username' => $realUser,
        'codeHash' => password_hash($code, PASSWORD_BCRYPT),
        'expiresAt' => $now + 300,
        'sentAt' => $now,
        'attempts' => 0,
        'history' => array_merge($history, [$now]),
    ];

    if (!mc_write_recovery_state($newState)) {
        mc_auth_json(false, 'No se pudo preparar el código de recuperación.', [], 500);
    }

    $send = mc_send_whatsapp_recovery_code_v2($phone, $code);
    if (empty($send['ok'])) {
        mc_clear_recovery_state();
        mc_auth_json(false, (string)($send['message'] ?? 'No se pudo enviar el código por WhatsApp.'), [], 502);
    }

    $last4 = substr($phone, -4);
    mc_auth_json(true, 'Código enviado por WhatsApp al número terminado en ' . $last4 . '.', [
        'masked_phone' => str_repeat('•', max(0, strlen($phone) - 4)) . $last4,
        'expires_in' => 300,
    ]);
}

if ($action === 'reset_password') {
    $username = trim((string)($_POST['username'] ?? ''));
    $code = preg_replace('/\D+/', '', (string)($_POST['code'] ?? ''));
    $newPassword = (string)($_POST['new_password'] ?? '');
    $newPassword2 = (string)($_POST['new_password2'] ?? '');

    if ($username === '' || strlen($code) !== 6) {
        mc_auth_json(false, 'Ingresa el usuario y el código de 6 dígitos.', [], 422);
    }
    if (strlen($newPassword) < 8) {
        mc_auth_json(false, 'La nueva contraseña debe tener al menos 8 caracteres.', [], 422);
    }
    if ($newPassword !== $newPassword2) {
        mc_auth_json(false, 'Las nuevas contraseñas no coinciden.', [], 422);
    }

    $state = mc_recovery_state();
    $now = time();
    $realUser = (string)($credentials['username'] ?? '');

    if (empty($state['codeHash']) || empty($state['expiresAt']) || !hash_equals($realUser, $username)) {
        mc_auth_json(false, 'Solicita un nuevo código de recuperación.', [], 422);
    }
    if ((int)$state['expiresAt'] < $now) {
        mc_clear_recovery_state();
        mc_auth_json(false, 'El código expiró. Solicita uno nuevo.', [], 422);
    }

    $attempts = (int)($state['attempts'] ?? 0);
    if ($attempts >= 5) {
        mc_clear_recovery_state();
        mc_auth_json(false, 'Se agotaron los intentos. Solicita un nuevo código.', [], 429);
    }

    if (!password_verify($code, (string)$state['codeHash'])) {
        $state['attempts'] = $attempts + 1;
        mc_write_recovery_state($state);
        mc_auth_json(false, 'Código incorrecto.', ['attempts_left' => max(0, 5 - $state['attempts'])], 422);
    }

    $hash = password_hash($newPassword, PASSWORD_BCRYPT);
    if (!mc_write_admin_credentials($realUser, $hash, (string)($credentials['recoveryPhone'] ?? ''))) {
        mc_auth_json(false, 'No se pudo actualizar la contraseña.', [], 500);
    }

    mc_clear_recovery_state();
    $_SESSION['mc_admin_auth'] = true;
    $_SESSION['mc_admin_user'] = $realUser;
    session_regenerate_id(true);
    mc_auth_json(true, 'Contraseña actualizada correctamente.', ['redirect' => 'admin/index.php']);
}

mc_auth_json(false, 'Acción no válida.', [], 400);
