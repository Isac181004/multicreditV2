<?php
require_once __DIR__.'/_init.php';
mc_admin_require_login();
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    mc_csrf_check();
    $action=(string)($_POST['action']??'create');
    $users=mc_admin_users();
    if($action==='create'){
        $username=trim((string)($_POST['username']??''));
        $name=trim((string)($_POST['display_name']??''));
        $password=(string)($_POST['password']??'');
        foreach($users as $user)if(strcasecmp((string)($user['username']??''),$username)===0)$error='Ese usuario ya existe.';
        if($username===''||strlen($username)<3)$error='El usuario debe tener al menos 3 caracteres.';
        elseif(strlen($password)<8)$error='La contraseña debe tener al menos 8 caracteres.';
        if($error===''){
            $users[]=['id'=>'admin-'.bin2hex(random_bytes(5)),'username'=>$username,'display_name'=>$name?:$username,'passwordHash'=>password_hash($password,PASSWORD_BCRYPT),'active'=>true,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')];
            if(mc_write_admin_users($users)){mc_flash('success','Usuario administrador creado.');header('Location: usuarios.php');exit;}
            $error='No se pudo guardar el usuario. Revisa los permisos de cms/data.';
        }
    }else{
        $id=(string)($_POST['id']??'');
        $current=(string)($_SESSION['mc_admin_user_id']??'');
        foreach($users as $i=>$user){
            if((string)($user['id']??'')!==$id)continue;
            if($id===$current){$error='No puedes desactivar ni eliminar tu propia sesión.';break;}
            if($action==='toggle'){$users[$i]['active']=empty($user['active']);$users[$i]['updated_at']=date('Y-m-d H:i:s');}
            if($action==='delete')array_splice($users,$i,1);
            if(mc_write_admin_users($users)){mc_flash('success',$action==='delete'?'Usuario eliminado.':'Estado del usuario actualizado.');header('Location: usuarios.php');exit;}
            $error='No se pudo actualizar el usuario. Revisa los permisos de cms/data.';
        }
    }
}
$users=mc_admin_users();
mc_admin_header('Usuarios administradores');
?>
<?php if($error):?><div class="alert error"><?=mc_h($error)?></div><?php endif;?>
<div class="grid" style="grid-template-columns:.8fr 1.2fr;gap:18px;align-items:start">
<section class="card"><h2>Agregar administrador</h2><p class="help">Las credenciales se guardan cifradas con bcrypt en <code>cms/data/admin_users.json</code>.</p><form method="post" style="margin-top:16px"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="create"><div class="field"><label>Nombre</label><input name="display_name" maxlength="120"></div><div class="field"><label>Usuario</label><input name="username" required minlength="3" autocomplete="username"></div><div class="field"><label>Contraseña</label><input type="password" name="password" required minlength="8" autocomplete="new-password"></div><button class="btn primary" style="margin-top:14px">Crear usuario</button></form></section>
<section class="card"><h2>Usuarios registrados</h2><div class="table-wrap"><table class="table"><thead><tr><th>Nombre</th><th>Usuario</th><th>Estado</th><th>Acciones</th></tr></thead><tbody><?php foreach($users as $user):?><tr><td><?=mc_h($user['display_name']??'')?></td><td><b><?=mc_h($user['username']??'')?></b></td><td><span class="badge <?=!empty($user['active'])?'ok':'off'?>"><?=!empty($user['active'])?'Activo':'Inactivo'?></span></td><td><div class="actions"><?php if((string)($user['id']??'')!==(string)($_SESSION['mc_admin_user_id']??'')):?><form method="post"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="toggle"><input type="hidden" name="id" value="<?=mc_h($user['id']??'')?>"><button class="btn light"><?=!empty($user['active'])?'Desactivar':'Activar'?></button></form><form method="post" onsubmit="return confirm('¿Eliminar este usuario?')"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?=mc_h($user['id']??'')?>"><button class="btn danger">Eliminar</button></form><?php else:?><span class="help">Sesión actual</span><?php endif;?></div></td></tr><?php endforeach;?></tbody></table></div></section>
</div>
<style>@media(max-width:900px){.grid[style*=".8fr"]{grid-template-columns:1fr!important}}</style>
<?php mc_admin_footer(); ?>
