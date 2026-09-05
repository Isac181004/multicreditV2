<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once __DIR__ . '/cms/opiniones.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

function mc_opinion_json($ok, $message = '', $extra = [], $status = 200) {
    http_response_code($status);
    echo json_encode(array_merge([
        'ok' => (bool)$ok,
        'message' => (string)$message,
    ], $extra), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function mc_opinion_public_csrf() {
    if (empty($_SESSION['mc_opinion_csrf'])) {
        $_SESSION['mc_opinion_csrf'] = bin2hex(random_bytes(24));
    }
    return (string)$_SESSION['mc_opinion_csrf'];
}

try {
    mc_opinions_install();
} catch (Throwable $e) {
    mc_opinion_json(false, 'El módulo de opiniones aún no puede conectarse a MySQL.', [
        'setup_required' => true,
    ], 503);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        mc_opinion_json(true, '', [
            'summary' => mc_opinions_summary(),
            'reviews' => mc_opinions_public(18),
            'sedes' => mc_opinion_sedes(),
            'csrf' => mc_opinion_public_csrf(),
        ]);
    } catch (Throwable $e) {
        mc_opinion_json(false, 'No se pudieron cargar las opiniones.', [], 500);
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    mc_opinion_json(false, 'Método no permitido.', [], 405);
}

$csrf = (string)($_POST['csrf'] ?? '');
if ($csrf === '' || !hash_equals((string)($_SESSION['mc_opinion_csrf'] ?? ''), $csrf)) {
    mc_opinion_json(false, 'La sesión del formulario expiró. Vuelve a abrir el formulario.', [], 419);
}

if (trim((string)($_POST['website'] ?? '')) !== '') {
    mc_opinion_json(true, 'Gracias por tu opinión.', []);
}

$nombre = trim((string)($_POST['nombre'] ?? ''));
$sede = trim((string)($_POST['sede'] ?? ''));
$calificacion = (int)($_POST['calificacion'] ?? 0);
$comentario = trim((string)($_POST['comentario'] ?? ''));
$consentimiento = (string)($_POST['consentimiento'] ?? '') === '1';

if ($nombre !== '') {
    $nameLength = function_exists('mb_strlen') ? mb_strlen($nombre, 'UTF-8') : strlen($nombre);
    if ($nameLength > 80) mc_opinion_json(false, 'El nombre es demasiado largo.', [], 422);
}

if (!in_array($sede, mc_opinion_sedes(), true)) {
    mc_opinion_json(false, 'Selecciona una sede válida.', [], 422);
}

if ($calificacion < 1 || $calificacion > 5) {
    mc_opinion_json(false, 'Selecciona una calificación de 1 a 5 estrellas.', [], 422);
}

$commentLength = function_exists('mb_strlen') ? mb_strlen($comentario, 'UTF-8') : strlen($comentario);
if ($commentLength < 10 || $commentLength > 600) {
    mc_opinion_json(false, 'El comentario debe tener entre 10 y 600 caracteres.', [], 422);
}

if (!$consentimiento) {
    mc_opinion_json(false, 'Debes autorizar la publicación de tu opinión.', [], 422);
}

$ipHash = mc_opinion_ip_hash();
if (mc_opinion_rate_limited($ipHash, 10)) {
    mc_opinion_json(false, 'Ya recibimos una opinión recientemente desde este dispositivo. Inténtalo más tarde.', [], 429);
}

try {
    mc_opinion_create([
        'nombre' => $nombre,
        'sede' => $sede,
        'calificacion' => $calificacion,
        'comentario' => $comentario,
        'ip_hash' => $ipHash,
    ]);
} catch (Throwable $e) {
    mc_opinion_json(false, 'No se pudo guardar tu opinión. Inténtalo nuevamente.', [], 500);
}

$_SESSION['mc_opinion_csrf'] = bin2hex(random_bytes(24));
mc_opinion_json(true, '¡Gracias! Tu opinión fue recibida y será publicada cuando sea revisada por nuestro equipo.', [
    'status' => 'pendiente',
    'csrf' => (string)$_SESSION['mc_opinion_csrf'],
]);
