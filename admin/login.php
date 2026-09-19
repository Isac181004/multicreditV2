<?php
require_once __DIR__ . '/_init.php';
if (!mc_admin_is_configured()) { header('Location: setup.php'); exit; }
if (mc_admin_logged_in()) { header('Location: index.php'); exit; }
$error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    mc_csrf_check();
    $u=trim((string)($_POST['username']??''));
    $p=(string)($_POST['password']??'');
    $c=mc_admin_authenticate($u,$p);
    if ($c) {
        $_SESSION['mc_admin_auth']=true;
        $_SESSION['mc_admin_user']=$u;
        $_SESSION['mc_admin_user_id']=(string)($c['id']??'');
        session_regenerate_id(true);
        header('Location: index.php');
        exit;
    }
    $error='Usuario o contraseña incorrectos.';
}
?><!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Ingresar | Multicredit Admin</title><link rel="icon" type="image/svg+xml" href="../img/favicon-multicredit.svg"><meta name="theme-color" content="#0B1F3A"><link rel="stylesheet" href="assets/admin.css"><link rel="stylesheet" href="assets/admin-brand.css"></head><body class="login-body"><div class="login-card"><div class="login-logo" aria-hidden="true"></div><h1>Administración</h1><p>Ingresa para administrar encabezado, módulos, noticias, imágenes y pie de página.</p><?php if($error):?><div class="alert error"><?=mc_h($error)?></div><?php endif;?><form method="post"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><div class="field"><label>Usuario</label><input name="username" autocomplete="username" required></div><div class="field"><label>Contraseña</label><input type="password" name="password" autocomplete="current-password" required></div><button class="btn primary">Ingresar al panel</button></form><div class="actions" style="margin-top:12px"><a class="btn light" href="../index.php">Volver al sitio</a></div></div></body></html>
