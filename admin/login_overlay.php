<?php
require_once __DIR__ . '/_init.php';
$mcOverlayConfigured = mc_admin_is_configured();
$mcOverlayLogged = mc_admin_logged_in();
?>
<style>
.mc-admin-overlay{position:fixed;inset:0;z-index:2147483600;display:none;align-items:center;justify-content:center;padding:18px;background:rgba(3,22,10,.62);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px)}
.mc-admin-overlay.open{display:flex}
.mc-admin-overlay-card{position:relative;width:min(460px,100%);max-height:92vh;overflow:auto;background:#fff;border-radius:22px;box-shadow:0 34px 90px rgba(0,0,0,.34);border:1px solid rgba(255,255,255,.75);padding:28px}
.mc-admin-overlay-close{position:absolute;right:16px;top:14px;width:36px;height:36px;border:0;border-radius:10px;background:#f2f5f3;color:#26352d;font-size:19px;cursor:pointer}
.mc-admin-overlay-brand{display:flex;align-items:center;gap:12px;margin-bottom:18px}.mc-admin-overlay-mark{display:grid;place-items:center;width:48px;height:48px;border-radius:14px;background:linear-gradient(135deg,#063718,#0d5c2e);color:#fff;font:900 22px/1 Poppins,Arial,sans-serif;box-shadow:0 10px 24px rgba(6,55,24,.2)}
.mc-admin-overlay h2{margin:0;color:#14301f;font:800 1.35rem/1.2 Poppins,Arial,sans-serif}.mc-admin-overlay p{color:#68756d;font-size:.9rem;margin:6px 0 0}
.mc-admin-tabs{display:flex;gap:8px;margin:18px 0}.mc-admin-tab{flex:1;border:1px solid #dde7e0;background:#f7faf8;color:#506057;border-radius:10px;padding:10px;font-weight:800;cursor:pointer}.mc-admin-tab.active{background:#0d5c2e;color:#fff;border-color:#0d5c2e}
.mc-admin-pane{display:none}.mc-admin-pane.active{display:block}.mc-admin-field{margin-bottom:13px}.mc-admin-field label{display:block;font-size:.78rem;font-weight:800;color:#31463a;margin-bottom:5px}.mc-admin-field input{width:100%;box-sizing:border-box;border:1px solid #d7e1da;border-radius:11px;padding:12px 13px;font:inherit;outline:none}.mc-admin-field input:focus{border-color:#0d5c2e;box-shadow:0 0 0 3px rgba(13,92,46,.10)}
.mc-admin-submit{width:100%;border:0;border-radius:11px;background:#f26e22;color:white;padding:13px 16px;font-weight:900;cursor:pointer;box-shadow:0 10px 24px rgba(242,110,34,.22)}.mc-admin-submit:disabled{opacity:.6;cursor:wait}.mc-admin-secondary{width:100%;margin-top:8px;border:1px solid #d7e1da;border-radius:11px;background:#fff;color:#0d5c2e;padding:11px;font-weight:800;cursor:pointer}
.mc-admin-msg{display:none;margin:12px 0;padding:10px 12px;border-radius:10px;font-size:.83rem;font-weight:700}.mc-admin-msg.show{display:block}.mc-admin-msg.error{background:#fff1f1;color:#a92d2d}.mc-admin-msg.success{background:#edf9f1;color:#176c38}.mc-admin-help{font-size:.76rem!important;color:#7e8a82!important;margin-top:10px!important}.mc-admin-panel-link{display:inline-flex;align-items:center;justify-content:center;width:100%;box-sizing:border-box;text-decoration:none;border-radius:11px;background:#0d5c2e;color:#fff;padding:13px 16px;font-weight:900}
@media(max-width:520px){.mc-admin-overlay-card{padding:22px 18px;border-radius:18px}.mc-admin-tabs{flex-direction:column}}
</style>
<div class="mc-admin-overlay" id="mc-admin-overlay" aria-hidden="true">
  <div class="mc-admin-overlay-card" role="dialog" aria-modal="true" aria-labelledby="mc-admin-overlay-title">
    <button type="button" class="mc-admin-overlay-close" id="mc-admin-overlay-close" aria-label="Cerrar">×</button>
    <div class="mc-admin-overlay-brand">
      <div class="mc-admin-overlay-mark">M</div>
      <div><h2 id="mc-admin-overlay-title">Administración Multicredit</h2><p>Gestiona la página sin abandonar el módulo que estás viendo.</p></div>
    </div>

    <?php if (!$mcOverlayConfigured): ?>
      <div class="mc-admin-msg error show">La administración todavía no está configurada.</div>
      <a class="mc-admin-panel-link" href="admin/setup.php">Configurar administrador</a>
    <?php elseif ($mcOverlayLogged): ?>
      <div class="mc-admin-msg success show">Ya tienes una sesión administrativa activa.</div>
      <a class="mc-admin-panel-link" href="admin/index.php">Abrir panel de administración</a>
    <?php else: ?>
      <div class="mc-admin-tabs">
        <button type="button" class="mc-admin-tab active" data-pane="login">Ingresar</button>
        <button type="button" class="mc-admin-tab" data-pane="recover">Recuperar acceso</button>
      </div>

      <div class="mc-admin-msg" id="mc-admin-overlay-message"></div>

      <div class="mc-admin-pane active" data-pane-name="login">
        <form id="mc-admin-login-form">
          <input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
          <input type="hidden" name="action" value="login">
          <div class="mc-admin-field"><label>Usuario</label><input name="username" autocomplete="username" required></div>
          <div class="mc-admin-field"><label>Contraseña</label><input type="password" name="password" autocomplete="current-password" required></div>
          <button class="mc-admin-submit" type="submit">Ingresar al panel</button>
        </form>
      </div>

      <div class="mc-admin-pane" data-pane-name="recover">
        <form id="mc-admin-recovery-request-form">
          <input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
          <input type="hidden" name="action" value="request_recovery">
          <div class="mc-admin-field"><label>Usuario administrativo</label><input name="username" autocomplete="username" required></div>
          <button class="mc-admin-submit" type="submit">Enviar código por WhatsApp</button>
          <p class="mc-admin-help">El código dura 5 minutos y se envía al WhatsApp de recuperación configurado en Perfil.</p>
        </form>

        <form id="mc-admin-recovery-reset-form" style="display:none;margin-top:14px">
          <input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
          <input type="hidden" name="action" value="reset_password">
          <div class="mc-admin-field"><label>Usuario</label><input name="username" id="mc-admin-reset-username" required></div>
          <div class="mc-admin-field"><label>Código de 6 dígitos</label><input name="code" inputmode="numeric" pattern="[0-9]{6}" maxlength="6" required></div>
          <div class="mc-admin-field"><label>Nueva contraseña</label><input type="password" name="new_password" minlength="8" autocomplete="new-password" required></div>
          <div class="mc-admin-field"><label>Repetir nueva contraseña</label><input type="password" name="new_password2" minlength="8" autocomplete="new-password" required></div>
          <button class="mc-admin-submit" type="submit">Cambiar contraseña e ingresar</button>
          <button class="mc-admin-secondary" type="button" id="mc-admin-resend-code">Solicitar otro código</button>
        </form>
      </div>
    <?php endif; ?>
  </div>
</div>
<script>
(function(){
  var overlay=document.getElementById('mc-admin-overlay');
  if(!overlay)return;
  var close=document.getElementById('mc-admin-overlay-close');
  function open(){overlay.classList.add('open');overlay.setAttribute('aria-hidden','false');document.documentElement.style.overflow='hidden';setTimeout(function(){var i=overlay.querySelector('input:not([type=hidden])');if(i)i.focus();},50)}
  function hide(){overlay.classList.remove('open');overlay.setAttribute('aria-hidden','true');document.documentElement.style.overflow=''}
  window.mcAdminOpen=open;window.mcAdminClose=hide;
  if(close)close.addEventListener('click',hide);
  overlay.addEventListener('click',function(e){if(e.target===overlay)hide()});
  document.addEventListener('keydown',function(e){if(e.key==='Escape'&&overlay.classList.contains('open'))hide()});
  document.querySelectorAll('[data-mc-admin-open]').forEach(function(el){el.addEventListener('click',function(e){e.preventDefault();open()})});

  var tabs=overlay.querySelectorAll('.mc-admin-tab');
  tabs.forEach(function(tab){tab.addEventListener('click',function(){
    tabs.forEach(function(t){t.classList.toggle('active',t===tab)});
    overlay.querySelectorAll('.mc-admin-pane').forEach(function(p){p.classList.toggle('active',p.getAttribute('data-pane-name')===tab.getAttribute('data-pane'))});
  })});

  var msg=document.getElementById('mc-admin-overlay-message');
  function showMsg(text,type){if(!msg)return;msg.textContent=text||'';msg.className='mc-admin-msg show '+(type||'error')}
  function clearMsg(){if(msg)msg.className='mc-admin-msg'}
  function submitAjax(form,onSuccess){
    if(!form)return;
    form.addEventListener('submit',function(e){
      e.preventDefault();clearMsg();
      var button=form.querySelector('button[type=submit]');if(button)button.disabled=true;
      fetch('admin/auth_api.php',{method:'POST',body:new FormData(form),credentials:'same-origin',headers:{'X-Requested-With':'XMLHttpRequest'}})
      .then(function(r){return r.json().catch(function(){return {ok:false,message:'Respuesta inválida del servidor.'}})})
      .then(function(data){if(data.ok){showMsg(data.message||'Operación correcta.','success');if(onSuccess)onSuccess(data,form)}else{showMsg(data.message||'No se pudo completar la operación.','error')}})
      .catch(function(){showMsg('No se pudo conectar con el servidor.','error')})
      .finally(function(){if(button)button.disabled=false});
    });
  }

  submitAjax(document.getElementById('mc-admin-login-form'),function(data){if(data.redirect)window.location.href=data.redirect});
  var requestForm=document.getElementById('mc-admin-recovery-request-form');
  var resetForm=document.getElementById('mc-admin-recovery-reset-form');
  submitAjax(requestForm,function(data,form){
    var u=form.querySelector('[name=username]');var target=document.getElementById('mc-admin-reset-username');if(target&&u)target.value=u.value;
    form.style.display='none';if(resetForm)resetForm.style.display='block';
  });
  submitAjax(resetForm,function(data){if(data.redirect)window.location.href=data.redirect});
  var resend=document.getElementById('mc-admin-resend-code');if(resend)resend.addEventListener('click',function(){if(resetForm)resetForm.style.display='none';if(requestForm)requestForm.style.display='block';clearMsg()});
})();
</script>
