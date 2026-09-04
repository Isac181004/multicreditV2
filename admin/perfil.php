<?php
require_once __DIR__ . '/_init.php';
mc_admin_require_login();
$c=mc_admin_credentials();
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    mc_csrf_check();
    $current=(string)($_POST['current_password']??'');
    $newUser=trim((string)($_POST['username']??''));
    $newPass=(string)($_POST['new_password']??'');
    $newPass2=(string)($_POST['new_password2']??'');
    $recoveryPhone=preg_replace('/\D+/', '', (string)($_POST['recovery_phone']??''));
    if(!password_verify($current,(string)$c['passwordHash']))$error='La contraseña actual no es correcta.';
    elseif(strlen($newUser)<3)$error='El usuario debe tener al menos 3 caracteres.';
    elseif(strlen($recoveryPhone)<10)$error='Ingresa un WhatsApp de recuperación válido con código de país.';
    elseif($newPass!==''&&strlen($newPass)<8)$error='La nueva contraseña debe tener al menos 8 caracteres.';
    elseif($newPass!==$newPass2)$error='Las nuevas contraseñas no coinciden.';
    else{
        $hash=$newPass!==''?password_hash($newPass,PASSWORD_BCRYPT):$c['passwordHash'];
        if(mc_write_admin_credentials($newUser,$hash,$recoveryPhone)){
            mc_flash('success','Credenciales y WhatsApp de recuperación actualizados.');
            header('Location: perfil.php');
            exit;
        }else $error='No se pudo escribir admin/config/admin_credentials.js.';
    }
}
mc_admin_header('Usuario y recuperación');?>
<?php if($error):?><div class="alert error"><?=mc_h($error)?></div><?php endif;?>
<section class="card">
<h2>Acceso administrativo</h2>
<form method="post"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
<div class="form-grid">
<div class="field"><label>Usuario</label><input name="username" required value="<?=mc_h($c['username'])?>"></div>
<div class="field"><label>WhatsApp de recuperación</label><input name="recovery_phone" required inputmode="tel" value="<?=mc_h($c['recoveryPhone']??'')?>" placeholder="519xxxxxxxx"><small>Recibirá el código aleatorio de recuperación.</small></div>
<div class="field"><label>Contraseña actual</label><input type="password" name="current_password" required autocomplete="current-password"></div><div></div>
<div class="field"><label>Nueva contraseña (opcional)</label><input type="password" name="new_password" minlength="8" autocomplete="new-password"></div>
<div class="field"><label>Repetir nueva contraseña</label><input type="password" name="new_password2" minlength="8" autocomplete="new-password"></div>
</div><button class="btn primary" style="margin-top:16px">Actualizar credenciales</button></form>
<div class="notice">Para que el código llegue por WhatsApp, configura <b>admin/config/whatsapp.php</b> a partir del archivo <b>whatsapp.example.php</b>. El token no debe subirse a GitHub.</div>
</section>
<?php mc_admin_footer();?>
