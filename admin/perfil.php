<?php
require_once __DIR__ . '/_init.php';
require_once __DIR__ . '/whatsapp_cloud.php';
mc_admin_require_login();

$c = mc_admin_credentials();
$error = '';
$waStatus = mc_whatsapp_cloud_status();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    mc_csrf_check();
    $formAction = trim((string)($_POST['form_action'] ?? 'save_profile'));

    if ($formAction === 'test_whatsapp') {
        $phone = preg_replace('/\D+/', '', (string)($c['recoveryPhone'] ?? ''));

        if (!$waStatus['configured']) {
            $error = 'WhatsApp Cloud API todavía no está configurado. Completa admin/config/whatsapp.php antes de enviar una prueba.';
        } elseif (strlen($phone) < 10 || strlen($phone) > 15) {
            $error = 'El WhatsApp de recuperación no tiene un formato internacional válido.';
        } else {
            $testCode = (string)random_int(100000, 999999);
            $send = mc_send_whatsapp_recovery_code_v2($phone, $testCode);
            if (empty($send['ok'])) {
                $error = (string)($send['message'] ?? 'No se pudo enviar el código de prueba.');
            } else {
                $last4 = substr($phone, -4);
                mc_flash('success', 'Meta aceptó el código de prueba para el WhatsApp terminado en ' . $last4 . '. Revisa el teléfono.');
                header('Location: perfil.php');
                exit;
            }
        }
    } else {
        $current = (string)($_POST['current_password'] ?? '');
        $newUser = trim((string)($_POST['username'] ?? ''));
        $newPass = (string)($_POST['new_password'] ?? '');
        $newPass2 = (string)($_POST['new_password2'] ?? '');
        $recoveryPhone = preg_replace('/\D+/', '', (string)($_POST['recovery_phone'] ?? ''));

        if (!password_verify($current, (string)$c['passwordHash'])) $error = 'La contraseña actual no es correcta.';
        elseif (strlen($newUser) < 3) $error = 'El usuario debe tener al menos 3 caracteres.';
        elseif (strlen($recoveryPhone) < 10 || strlen($recoveryPhone) > 15) $error = 'Ingresa un WhatsApp de recuperación válido con código de país.';
        elseif ($newPass !== '' && strlen($newPass) < 8) $error = 'La nueva contraseña debe tener al menos 8 caracteres.';
        elseif ($newPass !== $newPass2) $error = 'Las nuevas contraseñas no coinciden.';
        else {
            $hash = $newPass !== '' ? password_hash($newPass, PASSWORD_BCRYPT) : $c['passwordHash'];
            if (mc_write_admin_credentials($newUser, $hash, $recoveryPhone)) {
                mc_flash('success', 'Credenciales y WhatsApp de recuperación actualizados.');
                header('Location: perfil.php');
                exit;
            }
            $error = 'No se pudo escribir admin/config/admin_credentials.js.';
        }
    }
}

$waStatus = mc_whatsapp_cloud_status();
mc_admin_header('Usuario y recuperación');
?>
<?php if ($error): ?><div class="alert error"><?=mc_h($error)?></div><?php endif; ?>

<div class="grid" style="grid-template-columns:1fr 1fr;gap:18px;align-items:start">
<section class="card">
    <h2>Acceso administrativo</h2>
    <form method="post">
        <input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
        <input type="hidden" name="form_action" value="save_profile">
        <div class="form-grid">
            <div class="field"><label>Usuario</label><input name="username" required value="<?=mc_h($c['username'])?>"></div>
            <div class="field">
                <label>WhatsApp de recuperación</label>
                <input name="recovery_phone" required inputmode="tel" value="<?=mc_h($c['recoveryPhone']??'')?>" placeholder="519xxxxxxxx">
                <small>Usa formato internacional sin + ni espacios. En Perú: 51 + los 9 dígitos del celular.</small>
            </div>
            <div class="field"><label>Contraseña actual</label><input type="password" name="current_password" required autocomplete="current-password"></div><div></div>
            <div class="field"><label>Nueva contraseña (opcional)</label><input type="password" name="new_password" minlength="8" autocomplete="new-password"></div>
            <div class="field"><label>Repetir nueva contraseña</label><input type="password" name="new_password2" minlength="8" autocomplete="new-password"></div>
        </div>
        <button class="btn primary" style="margin-top:16px">Actualizar credenciales</button>
    </form>
</section>

<section class="card">
    <div style="display:flex;justify-content:space-between;gap:12px;align-items:flex-start;flex-wrap:wrap">
        <div>
            <h2 style="margin-bottom:4px">WhatsApp Cloud API</h2>
            <p class="help">Estado de la integración que enviará los códigos de 6 dígitos.</p>
        </div>
        <span style="display:inline-flex;padding:6px 10px;border-radius:999px;font-size:12px;font-weight:800;<?= $waStatus['configured'] ? 'background:#e9f8ee;color:#137333' : 'background:#fff3e8;color:#a84a0b' ?>">
            <?= $waStatus['configured'] ? '● Configurado' : '● Pendiente' ?>
        </span>
    </div>

    <div style="display:grid;gap:10px;margin-top:18px;font-size:13px">
        <div style="display:flex;justify-content:space-between;gap:12px"><span class="help">Token</span><b><?= $waStatus['token_present'] ? 'Configurado' : 'Falta configurar' ?></b></div>
        <div style="display:flex;justify-content:space-between;gap:12px"><span class="help">Phone Number ID</span><b><?= $waStatus['phone_number_id'] !== '' ? mc_h(substr($waStatus['phone_number_id'], 0, 5) . '…' . substr($waStatus['phone_number_id'], -4)) : 'Falta configurar' ?></b></div>
        <div style="display:flex;justify-content:space-between;gap:12px"><span class="help">Plantilla</span><b><?=mc_h($waStatus['template_name'] ?: 'Falta configurar')?></b></div>
        <div style="display:flex;justify-content:space-between;gap:12px"><span class="help">Idioma</span><b><?=mc_h($waStatus['template_lang'])?></b></div>
        <div style="display:flex;justify-content:space-between;gap:12px"><span class="help">Graph API</span><b><?=mc_h($waStatus['graph_version'])?></b></div>
        <div style="display:flex;justify-content:space-between;gap:12px"><span class="help">Tipo</span><b>OTP · Copiar código</b></div>
    </div>

    <div class="notice" style="margin-top:18px">
        Crea <b>admin/config/whatsapp.php</b> copiando <b>whatsapp.example.php</b> y completa el token, Phone Number ID y el nombre exacto de una plantilla <b>AUTHENTICATION</b> aprobada por Meta con botón <b>Copiar código</b>. Ese archivo está excluido de GitHub.
    </div>

    <form method="post" style="margin-top:16px">
        <input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
        <input type="hidden" name="form_action" value="test_whatsapp">
        <button class="btn orange" type="submit" <?= $waStatus['configured'] ? '' : 'disabled style="opacity:.55;cursor:not-allowed"' ?>>Enviar código de prueba</button>
    </form>
</section>
</div>

<section class="card" style="margin-top:18px">
    <h2>Flujo de recuperación</h2>
    <p class="help">Cuando la integración esté configurada, el acceso público funcionará así:</p>
    <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:10px;margin-top:16px;text-align:center">
        <div class="notice"><b>1</b><br>Recuperar acceso</div>
        <div class="notice"><b>2</b><br>Código aleatorio</div>
        <div class="notice"><b>3</b><br>WhatsApp</div>
        <div class="notice"><b>4</b><br>Validar 6 dígitos</div>
        <div class="notice"><b>5</b><br>Nueva contraseña</div>
    </div>
    <p class="help" style="margin-top:14px">El código vence en 5 minutos, permite hasta 5 intentos y el sistema limita la frecuencia de solicitudes.</p>
</section>

<style>
@media(max-width:900px){.grid[style*="grid-template-columns:1fr 1fr"]{grid-template-columns:1fr!important}.card [style*="repeat(5,1fr)"]{grid-template-columns:1fr 1fr!important}}
</style>
<?php mc_admin_footer(); ?>
