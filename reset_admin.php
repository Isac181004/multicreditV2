<?php

$usuario = 'multicredit';
$contrasena = 'Multicredit2026!';
$whatsapp = '5127551284';

$datos = [
    'username' => $usuario,
    'passwordHash' => password_hash($contrasena, PASSWORD_BCRYPT),
    'recoveryPhone' => $whatsapp
];

$contenido = 'window.MULTICREDIT_ADMIN_CREDENTIALS = ' .
    json_encode(
        $datos,
        JSON_PRETTY_PRINT |
        JSON_UNESCAPED_UNICODE |
        JSON_UNESCAPED_SLASHES
    ) .
    ';' .
    PHP_EOL;

$ruta = __DIR__ . '/admin/config/admin_credentials.js';

if (file_put_contents($ruta, $contenido) === false) {
    echo "ERROR: no se pudo guardar el archivo." . PHP_EOL;
    exit(1);
}

echo "CREDENCIALES ACTUALIZADAS CORRECTAMENTE" . PHP_EOL;
echo "Usuario: " . $usuario . PHP_EOL;
echo "WhatsApp: " . $whatsapp . PHP_EOL;
