<?php
require_once __DIR__ . '/_init.php';
if (mc_admin_is_configured()) { header('Location: login.php'); exit; }
$error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    mc_csrf_check();
    $u=trim((string)($_POST['username']??'')); $p=(string)($_POST['password']??''); $p2=(string)($_POST['password2']??'');
    if (strlen($u)<3) $error='El usuario debe tener al menos 3 caracteres.';
    elseif (strlen($p)<8) $error='La contraseña debe tener al menos 8 caracteres.';
    elseif ($p!==$p2) $error='Las contraseñas no coinciden.';
    else {
        $hash=password_hash($p,PASSWORD_BCRYPT);
        if (mc_write_admin_credentials($u,$hash)) { $_SESSION['mc_admin_auth']=true; session_regenerate_id(true); header('Location: index.php'); exit; }
        $error='No se pudo guardar el archivo de credenciales. Verifica permisos en admin/config.';
    }
}
?><!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Configurar administración | Multicredit</title><link rel="stylesheet" href="assets/admin.css"></head><body class="login-body"><div class="login-card"><div class="login-logo">M</div><h1>Crear administrador</h1><p>Configuración inicial del panel de CEPRODEMIC MULTICREDIT.</p><?php if($error):?><div class="alert error"><?=mc_h($error)?></div><?php endif;?><form method="post"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><div class="field"><label>Usuario</label><input name="username" autocomplete="username" required minlength="3"></div><div class="field"><label>Contraseña</label><input type="password" name="password" autocomplete="new-password" required minlength="8"></div><div class="field"><label>Repetir contraseña</label><input type="password" name="password2" autocomplete="new-password" required minlength="8"></div><button class="btn primary">Crear administrador</button></form><div class="notice">Sin SQL: la cuenta se guarda en <b>admin/config/admin_credentials.js</b>. La contraseña se almacena como hash bcrypt, no en texto plano.</div></div></body></html>