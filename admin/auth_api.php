<?php
require_once __DIR__ . '/_init.php';
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
if ($action !== 'login') {
    mc_auth_json(false, 'Acción no válida.', [], 400);
}

$credentials = mc_admin_credentials();
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
