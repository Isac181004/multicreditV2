<?php
if (session_status() !== PHP_SESSION_ACTIVE && !headers_sent()) session_start();
require_once dirname(__DIR__) . '/cms/bootstrap.php';

define('MC_ADMIN_CREDENTIAL_FILE', __DIR__ . '/config/admin_credentials.js');
define('MC_ADMIN_USERS_FILE', MC_DATA_DIR . '/admin_users.json');

function mc_admin_users() {
    $users = mc_read_json(MC_ADMIN_USERS_FILE, []);
    return is_array($users) ? array_values(array_filter($users, 'is_array')) : [];
}

function mc_write_admin_users($users) {
    return mc_write_json(MC_ADMIN_USERS_FILE, array_values($users));
}

function mc_admin_credentials() {
    $defaults = ['id'=>'','username'=>'','display_name'=>'','passwordHash'=>'','active'=>true];
    $users = mc_admin_users();
    $wanted = (string)($_SESSION['mc_admin_user_id'] ?? '');
    foreach ($users as $user) {
        if ($wanted !== '' && (string)($user['id']??'') === $wanted) return array_merge($defaults,$user);
    }
    foreach ($users as $user) if (!empty($user['active'])) return array_merge($defaults,$user);
    $raw = @file_get_contents(MC_ADMIN_CREDENTIAL_FILE);
    if ($raw === false) return $defaults;
    if (!preg_match('/=\s*(\{.*?\})\s*;/s', $raw, $m)) return $defaults;
    $data = json_decode($m[1], true);
    return is_array($data) ? array_merge($defaults, $data) : $defaults;
}

function mc_write_admin_credentials($username, $passwordHash) {
    $users=mc_admin_users();
    $id=(string)($_SESSION['mc_admin_user_id']??'');
    $updated=false;
    foreach($users as &$user){
        if(($id!==''&&(string)($user['id']??'')===$id)||($id===''&&!$updated)){
            $user['username']=trim((string)$username);
            $user['display_name']=(string)($user['display_name']??$user['username']);
            $user['passwordHash']=(string)$passwordHash;
            $user['active']=true;
            $user['updated_at']=date('Y-m-d H:i:s');
            $updated=true;
            if($id==='')break;
        }
    }
    unset($user);
    if(!$updated)$users[]=['id'=>'admin-'.bin2hex(random_bytes(5)),'username'=>trim((string)$username),'display_name'=>'Administrador','passwordHash'=>(string)$passwordHash,'active'=>true,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')];
    return mc_write_admin_users($users);
}

function mc_admin_authenticate($username,$password) {
    foreach(mc_admin_users() as $user){
        if(empty($user['active']))continue;
        if(hash_equals((string)($user['username']??''),trim((string)$username))&&password_verify((string)$password,(string)($user['passwordHash']??'')))return $user;
    }
    return null;
}

function mc_admin_is_configured() {
    foreach(mc_admin_users() as $user)if(!empty($user['active'])&&trim((string)($user['username']??''))!==''&&trim((string)($user['passwordHash']??''))!=='')return true;
    return false;
}

function mc_admin_logged_in() {
    return !empty($_SESSION['mc_admin_auth']);
}

function mc_admin_require_login() {
    if (!mc_admin_is_configured()) {
        header('Location: setup.php'); exit;
    }
    if (!mc_admin_logged_in()) {
        header('Location: login.php'); exit;
    }
}

function mc_csrf_token() {
    if (empty($_SESSION['mc_csrf'])) $_SESSION['mc_csrf'] = bin2hex(random_bytes(24));
    return $_SESSION['mc_csrf'];
}

function mc_csrf_check($throw = false) {
    $got = (string)($_POST['csrf'] ?? '');
    if ($got === '' || !hash_equals((string)($_SESSION['mc_csrf'] ?? ''), $got)) {
        if ($throw) throw new RuntimeException('CSRF inválido');
        http_response_code(419);
        exit('Solicitud expirada. Recarga la página e inténtalo nuevamente.');
    }
    return true;
}

function mc_flash($type = null, $message = null) {
    if ($type !== null && $message !== null) {
        $_SESSION['mc_flash'] = ['type'=>$type,'message'=>$message];
        return;
    }
    $v = $_SESSION['mc_flash'] ?? null;
    unset($_SESSION['mc_flash']);
    return $v;
}

function mc_slug($value) {
    $value = trim((string)$value);
    if (function_exists('iconv')) $value = @iconv('UTF-8','ASCII//TRANSLIT//IGNORE',$value) ?: $value;
    $value = strtolower($value);
    $value = preg_replace('/[^a-z0-9]+/', '-', $value);
    $value = trim($value, '-');
    return $value ?: 'noticia-' . date('YmdHis');
}

function mc_upload_image($field, $subdir = 'media') {
    if (empty($_FILES[$field]) || !is_array($_FILES[$field])) return ['ok'=>true,'path'=>''];
    $f = $_FILES[$field];
    if (($f['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) return ['ok'=>true,'path'=>''];
    if (($f['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) return ['ok'=>false,'error'=>'No se pudo subir la imagen.'];
    if (($f['size'] ?? 0) > 6 * 1024 * 1024) return ['ok'=>false,'error'=>'La imagen supera el límite de 6 MB.'];
    $info = @getimagesize($f['tmp_name']);
    if (!$info) return ['ok'=>false,'error'=>'El archivo seleccionado no es una imagen válida.'];
    $mime = $info['mime'] ?? '';
    $exts = ['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp','image/gif'=>'gif'];
    if (!isset($exts[$mime])) return ['ok'=>false,'error'=>'Formato no permitido. Usa JPG, PNG, WEBP o GIF.'];
    $subdir = preg_replace('/[^a-z0-9_-]/i','',$subdir) ?: 'media';
    $dir = MC_ROOT . '/uploads/' . $subdir;
    if (!is_dir($dir) && !@mkdir($dir,0775,true)) return ['ok'=>false,'error'=>'No se pudo crear la carpeta de imágenes.'];
    $name = date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $exts[$mime];
    $dest = $dir . '/' . $name;
    if (!@move_uploaded_file($f['tmp_name'], $dest)) return ['ok'=>false,'error'=>'No se pudo guardar la imagen. Verifica permisos de la carpeta uploads.'];
    return ['ok'=>true,'path'=>'uploads/' . $subdir . '/' . $name];
}

function mc_store_news_image($file) {
    if (($file['error']??UPLOAD_ERR_NO_FILE)===UPLOAD_ERR_NO_FILE) return ['ok'=>true,'path'=>''];
    if (($file['error']??UPLOAD_ERR_OK)!==UPLOAD_ERR_OK) return ['ok'=>false,'error'=>'Una de las imágenes no pudo cargarse.'];
    if (($file['size']??0)>12*1024*1024) return ['ok'=>false,'error'=>'Cada imagen debe pesar como máximo 12 MB.'];
    $info=@getimagesize($file['tmp_name']??'');
    $mime=(string)($info['mime']??'');
    if(!$info||!in_array($mime,['image/jpeg','image/png','image/webp'],true))return ['ok'=>false,'error'=>'Usa imágenes JPG, PNG o WEBP.'];
    $dir=MC_ROOT.'/uploads/news';
    if(!is_dir($dir)&&!@mkdir($dir,0775,true))return ['ok'=>false,'error'=>'No se pudo crear uploads/news.'];
    $base=date('Ymd_His').'_'.bin2hex(random_bytes(4));
    $canOptimize=function_exists('imagecreatetruecolor')&&function_exists('imagewebp');
    if($canOptimize){
        $source=$mime==='image/jpeg'?@imagecreatefromjpeg($file['tmp_name']):($mime==='image/png'?@imagecreatefrompng($file['tmp_name']):@imagecreatefromwebp($file['tmp_name']));
        if($source){
            $width=imagesx($source);$height=imagesy($source);$max=1800;$scale=min(1,$max/max($width,$height));
            $newW=max(1,(int)round($width*$scale));$newH=max(1,(int)round($height*$scale));
            $canvas=imagecreatetruecolor($newW,$newH);imagealphablending($canvas,false);imagesavealpha($canvas,true);
            $transparent=imagecolorallocatealpha($canvas,0,0,0,127);imagefill($canvas,0,0,$transparent);
            imagecopyresampled($canvas,$source,0,0,0,0,$newW,$newH,$width,$height);
            $dest=$dir.'/'.$base.'.webp';$saved=@imagewebp($canvas,$dest,82);imagedestroy($canvas);imagedestroy($source);
            if($saved)return ['ok'=>true,'path'=>'uploads/news/'.$base.'.webp'];
        }
    }
    $ext=['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'][$mime];
    $dest=$dir.'/'.$base.'.'.$ext;
    if(!@move_uploaded_file($file['tmp_name'],$dest))return ['ok'=>false,'error'=>'No se pudo guardar una de las imágenes.'];
    return ['ok'=>true,'path'=>'uploads/news/'.$base.'.'.$ext];
}

function mc_upload_news_images($field='photos') {
    if(empty($_FILES[$field])||!is_array($_FILES[$field]))return ['ok'=>true,'paths'=>[]];
    $source=$_FILES[$field];$paths=[];$count=is_array($source['name']??null)?count($source['name']):0;
    if($count>50)return ['ok'=>false,'error'=>'Puedes subir hasta 50 imágenes por operación.','paths'=>[]];
    for($i=0;$i<$count;$i++){
        $file=['name'=>$source['name'][$i]??'','type'=>$source['type'][$i]??'','tmp_name'=>$source['tmp_name'][$i]??'','error'=>$source['error'][$i]??UPLOAD_ERR_NO_FILE,'size'=>$source['size'][$i]??0];
        $result=mc_store_news_image($file);
        if(!$result['ok'])return ['ok'=>false,'error'=>$result['error'],'paths'=>$paths];
        if($result['path']!=='')$paths[]=$result['path'];
    }
    return ['ok'=>true,'paths'=>$paths];
}

function mc_admin_header($title) {
    $user = mc_admin_credentials();
    $flash = mc_flash();
    ?><!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=mc_h($title)?> | Multicredit Admin</title><link rel="icon" type="image/svg+xml" href="../img/favicon-multicredit.svg"><meta name="theme-color" content="#0B1F3A"><link rel="stylesheet" href="assets/admin.css"><link rel="stylesheet" href="assets/admin-brand.css"></head><body>
    <div class="admin-shell">
      <aside class="sidebar">
        <a class="brand" href="index.php"><span class="brand-mark" aria-hidden="true"></span><span><b>Multicredit</b><small>Administración</small></span></a>
        <nav>
          <a href="index.php">▦ Dashboard</a>
          <a href="encabezado.php">▤ Encabezado</a>
          <a href="modulos.php">▦ Módulos / páginas</a>
          <a href="contenido.php">✎ Inicio y contenido</a>
          <a href="opiniones.php">★ Opiniones y calificaciones</a>
          <a href="noticias.php">📰 Noticias</a>
          <a href="media.php">▧ Biblioteca de imágenes</a>
          <a href="pie.php">▥ Pie de página</a>
          <a href="perfil.php">⚙ Usuario y contraseña</a>
          <a href="usuarios.php">♟ Usuarios administradores</a>
          <a href="../index.php" target="_blank">↗ Ver sitio público</a>
          <a href="logout.php">⇥ Cerrar sesión</a>
        </nav>
        <div class="sidebar-user">Sesión: <strong><?=mc_h($user['username'] ?: 'admin')?></strong></div>
      </aside>
      <main class="main"><header class="topbar"><button class="menu-toggle" type="button" onclick="document.body.classList.toggle('nav-open')">☰</button><div><span>Panel administrativo</span><h1><?=mc_h($title)?></h1></div></header>
      <?php if ($flash): ?><div class="alert <?=mc_h($flash['type'])?>"><?=mc_h($flash['message'])?></div><?php endif; ?>
    <?php
}

function mc_admin_footer() { ?>
      <footer class="admin-footer">CEPRODEMIC MULTICREDIT · CMS por módulos · opiniones MySQL</footer></main></div>
      <script>document.querySelectorAll('.sidebar a').forEach(a=>{if(a.getAttribute('href')===location.pathname.split('/').pop())a.classList.add('active')});</script>
    </body></html><?php }
?>
