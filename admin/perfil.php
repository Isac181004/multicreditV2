<?php
require_once __DIR__ . '/_init.php';
mc_admin_require_login();

$c = mc_admin_credentials();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    mc_csrf_check();

    $current = (string)($_POST['current_password'] ?? '');
    $newUser = trim((string)($_POST['username'] ?? ''));
    $newPass = (string)($_POST['new_password'] ?? '');
    $newPass2 = (string)($_POST['new_password2'] ?? '');

    if (!password_verify($current, (string)$c['passwordHash'])) $error = 'La contraseña actual no es correcta.';
    elseif (strlen($newUser) < 3) $error = 'El usuario debe tener al menos 3 caracteres.';
    elseif ($newPass !== '' && strlen($newPass) < 8) $error = 'La nueva contraseña debe tener al menos 8 caracteres.';
    elseif ($newPass !== $newPass2) $error = 'Las nuevas contraseñas no coinciden.';
    else {
        $hash = $newPass !== '' ? password_hash($newPass, PASSWORD_BCRYPT) : $c['passwordHash'];
        if (mc_write_admin_credentials($newUser, $hash)) {
            $_SESSION['mc_admin_user'] = $newUser;
            mc_flash('success', 'Usuario y contraseña actualizados correctamente.');
            header('Location: perfil.php');
            exit;
        }
        $error = 'No se pudo escribir admin/config/admin_credentials.js.';
    }
}

mc_admin_header('Usuario y contraseña');
?>
<?php if ($error): ?><div class="alert error"><?=mc_h($error)?></div><?php endif; ?>

<div class="grid" style="grid-template-columns:1fr .8fr;gap:18px;align-items:start">
<section class="card">
    <h2>Acceso administrativo</h2>
    <p class="help">Desde aquí puedes cambiar el usuario o establecer una nueva contraseña.</p>
    <form method="post" style="margin-top:16px">
        <input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
        <div class="form-grid">
            <div class="field"><label>Usuario</label><input name="username" required minlength="3" value="<?=mc_h($c['username'])?>"></div>
            <div></div>
            <div class="field"><label>Contraseña actual</label><input type="password" name="current_password" required autocomplete="current-password"></div>
            <div></div>
            <div class="field"><label>Nueva contraseña (opcional)</label><input type="password" name="new_password" minlength="8" autocomplete="new-password"></div>
            <div class="field"><label>Repetir nueva contraseña</label><input type="password" name="new_password2" minlength="8" autocomplete="new-password"></div>
        </div>
        <button class="btn primary" style="margin-top:16px">Actualizar acceso</button>
    </form>
</section>

<section class="card">
    <h2>Restablecimiento manual</h2>
    <p class="help">La recuperación automática por WhatsApp ha sido desactivada. Si se pierde el acceso, el responsable técnico puede restablecer las credenciales directamente en el servidor.</p>
    <div class="notice" style="margin-top:16px">
        Las contraseñas se almacenan como hash bcrypt. No es posible ver la contraseña actual en texto plano; para recuperar el acceso se debe generar y guardar una nueva contraseña.
    </div>
</section>
</div>

<style>
@media(max-width:900px){.grid[style*="grid-template-columns:1fr .8fr"]{grid-template-columns:1fr!important}}
</style>
<?php mc_admin_footer(); ?>
