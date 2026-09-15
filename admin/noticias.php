<?php
require_once __DIR__ . '/_init.php';
mc_admin_require_login();

function mc_news_admin_images($news) {
    $out = [];
    if (!empty($news['images']) && is_array($news['images'])) {
        foreach ($news['images'] as $index => $image) {
            if (is_string($image)) {
                $path = trim($image); $alt = (string)($news['title'] ?? '');
            } elseif (is_array($image)) {
                $path = trim((string)($image['path'] ?? ''));
                $alt = trim((string)($image['alt'] ?? ($news['title'] ?? '')));
            } else continue;
            if ($path !== '') $out[] = ['path'=>$path,'alt'=>$alt,'order'=>$index];
        }
    }
    if (!$out && !empty($news['image'])) $out[] = ['path'=>(string)$news['image'],'alt'=>(string)($news['title'] ?? ''),'order'=>0];
    return $out;
}

function mc_news_delete_upload($relative) {
    $relative = str_replace('\\','/',trim((string)$relative));
    if (strpos($relative,'uploads/news/') !== 0) return;
    $full = MC_ROOT . '/' . $relative;
    $newsDir = realpath(MC_ROOT . '/uploads/news');
    $file = realpath($full);
    if ($newsDir && $file && strpos($file,$newsDir.DIRECTORY_SEPARATOR) === 0 && is_file($file)) @unlink($file);
}

function mc_news_store_upload($field, $title) {
    if (empty($_FILES[$field]) || !is_array($_FILES[$field])) return ['ok'=>true,'path'=>''];
    $f = $_FILES[$field];
    $error = (int)($f['error'] ?? UPLOAD_ERR_NO_FILE);
    if ($error === UPLOAD_ERR_NO_FILE) return ['ok'=>true,'path'=>''];
    if ($error !== UPLOAD_ERR_OK) return ['ok'=>false,'error'=>'No se pudo subir una de las imágenes.'];
    if ((int)($f['size'] ?? 0) > 10 * 1024 * 1024) return ['ok'=>false,'error'=>'Cada imagen debe pesar como máximo 10 MB.'];

    $info = @getimagesize($f['tmp_name']);
    if (!$info) return ['ok'=>false,'error'=>'Uno de los archivos no es una imagen válida.'];
    $mime = (string)($info['mime'] ?? '');
    $allowed = ['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp','image/gif'=>'gif'];
    if (!isset($allowed[$mime])) return ['ok'=>false,'error'=>'Formato no permitido. Usa JPG, PNG, WEBP o GIF.'];

    $dir = MC_ROOT . '/uploads/news';
    if (!is_dir($dir) && !@mkdir($dir,0775,true)) return ['ok'=>false,'error'=>'No se pudo crear uploads/news.'];
    $base = date('Ymd_His') . '_' . bin2hex(random_bytes(4));

    if ($mime === 'image/gif') {
        $dest = $dir . '/' . $base . '.gif';
        if (!@move_uploaded_file($f['tmp_name'],$dest)) return ['ok'=>false,'error'=>'No se pudo guardar la imagen GIF.'];
        return ['ok'=>true,'path'=>'uploads/news/'.basename($dest)];
    }

    $loader = null;
    if ($mime === 'image/jpeg' && function_exists('imagecreatefromjpeg')) $loader = 'imagecreatefromjpeg';
    if ($mime === 'image/png' && function_exists('imagecreatefrompng')) $loader = 'imagecreatefrompng';
    if ($mime === 'image/webp' && function_exists('imagecreatefromwebp')) $loader = 'imagecreatefromwebp';

    if ($loader && function_exists('imagecreatetruecolor')) {
        $src = @$loader($f['tmp_name']);
        if ($src) {
            $w = imagesx($src); $h = imagesy($src);
            $max = 1800;
            $scale = min(1, $max / max($w,$h));
            $nw = max(1,(int)round($w*$scale)); $nh = max(1,(int)round($h*$scale));
            $dst = imagecreatetruecolor($nw,$nh);
            imagealphablending($dst,false); imagesavealpha($dst,true);
            $transparent = imagecolorallocatealpha($dst,0,0,0,127); imagefilledrectangle($dst,0,0,$nw,$nh,$transparent);
            imagecopyresampled($dst,$src,0,0,0,0,$nw,$nh,$w,$h);

            if (function_exists('imagewebp')) {
                $dest = $dir . '/' . $base . '.webp';
                $saved = @imagewebp($dst,$dest,82);
            } else {
                $dest = $dir . '/' . $base . '.jpg';
                $saved = @imagejpeg($dst,$dest,84);
            }
            imagedestroy($dst); imagedestroy($src);
            if ($saved) return ['ok'=>true,'path'=>'uploads/news/'.basename($dest)];
        }
    }

    $ext = $allowed[$mime];
    $dest = $dir . '/' . $base . '.' . $ext;
    if (!@move_uploaded_file($f['tmp_name'],$dest)) return ['ok'=>false,'error'=>'No se pudo guardar una imagen. Revisa permisos de uploads/news.'];
    return ['ok'=>true,'path'=>'uploads/news/'.basename($dest)];
}

$items = mc_news(false);
$edit = null;
$error = '';

if (isset($_GET['edit'])) {
    foreach ($items as $n) if ((string)($n['id'] ?? '') === (string)$_GET['edit']) { $edit = $n; break; }
}
if (isset($_GET['new'])) {
    $edit = ['id'=>'','title'=>'','category'=>'Institucional','date'=>date('Y-m-d'),'summary'=>'','body'=>'','image'=>'','images'=>[],'published'=>false];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    mc_csrf_check();
    $action = (string)($_POST['action'] ?? 'save');
    $id = (string)($_POST['id'] ?? '');
    $existing = null; $existingIndex = null;
    foreach ($items as $i=>$n) if ((string)($n['id'] ?? '') === $id) { $existing=$n; $existingIndex=$i; break; }

    if ($action === 'delete') {
        if ($existing) foreach (mc_news_admin_images($existing) as $img) mc_news_delete_upload($img['path']);
        $items = array_values(array_filter($items,fn($n)=>(string)($n['id']??'')!==$id));
        mc_write_json(MC_DATA_DIR.'/news.json',$items);
        mc_flash('success','Noticia eliminada junto con sus imágenes asociadas.');
        header('Location: noticias.php'); exit;
    }

    if ($action === 'toggle') {
        if ($existingIndex !== null) {
            $items[$existingIndex]['published'] = empty($items[$existingIndex]['published']);
            if (!empty($items[$existingIndex]['published']) && empty($items[$existingIndex]['published_at'])) $items[$existingIndex]['published_at'] = date('Y-m-d H:i:s');
            $items[$existingIndex]['updated_at'] = date('Y-m-d H:i:s');
            mc_write_json(MC_DATA_DIR.'/news.json',$items);
            mc_flash('success',!empty($items[$existingIndex]['published'])?'Noticia publicada.':'Noticia movida a borrador.');
        }
        header('Location: noticias.php'); exit;
    }

    $title = trim((string)($_POST['title'] ?? ''));
    $category = trim((string)($_POST['category'] ?? '')) ?: 'Institucional';
    $date = trim((string)($_POST['date'] ?? ''));
    $summary = trim((string)($_POST['summary'] ?? ''));
    $body = trim((string)($_POST['body'] ?? ''));
    $published = !empty($_POST['published']);

    if ($title === '') $error = 'El título es obligatorio.';
    elseif ($date === '' || !strtotime($date)) $error = 'La fecha no es válida.';

    $images = [];
    $removedPaths = array_values(array_filter(array_map('strval',(array)($_POST['remove_paths'] ?? []))));
    $removeSet = array_fill_keys($removedPaths,true);
    $paths = array_values((array)($_POST['existing_paths'] ?? []));
    $alts = array_values((array)($_POST['existing_alts'] ?? []));
    foreach ($paths as $i=>$path) {
        $path = trim((string)$path);
        if ($path === '' || isset($removeSet[$path])) continue;
        $images[] = ['path'=>$path,'alt'=>trim((string)($alts[$i] ?? $title)) ?: $title,'order'=>count($images)];
    }

    $newFields = array_values((array)($_POST['new_fields'] ?? []));
    $newAlts = (array)($_POST['new_alts'] ?? []);
    if ($error === '') {
        foreach ($newFields as $field) {
            $field = preg_replace('/[^a-zA-Z0-9_]/','',(string)$field);
            if ($field === '' || empty($_FILES[$field])) continue;
            $up = mc_news_store_upload($field,$title);
            if (!$up['ok']) { $error=$up['error']; break; }
            if ($up['path'] !== '') $images[] = ['path'=>$up['path'],'alt'=>trim((string)($newAlts[$field] ?? $title)) ?: $title,'order'=>count($images)];
        }
    }

    if ($error === '' && !$images) $error = 'Cada noticia debe tener al menos una imagen.';

    if ($error === '') {
        if ($id === '') {
            $id = mc_slug($title); $base=$id; $k=2; $used=array_map('strval',array_column($items,'id'));
            while (in_array($id,$used,true)) $id=$base.'-'.$k++;
        }
        $publishedAt = $existing['published_at'] ?? null;
        if ($published && !$publishedAt) $publishedAt = date('Y-m-d H:i:s');
        $row = [
            'id'=>$id,'title'=>$title,'category'=>$category,'date'=>$date,'summary'=>$summary,
            'body'=>$body ?: $summary,'image'=>$images[0]['path'],'images'=>$images,'published'=>$published,
            'published_at'=>$publishedAt,'created_at'=>$existing['created_at'] ?? date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')
        ];
        if ($existingIndex === null) $items[]=$row; else $items[$existingIndex]=$row;
        if (mc_write_json(MC_DATA_DIR.'/news.json',$items)) {
            foreach ($removedPaths as $path) mc_news_delete_upload($path);
            mc_flash('success',$published?'Noticia guardada y publicada correctamente.':'Noticia guardada como borrador.');
            header('Location: noticias.php'); exit;
        }
        $error='No se pudo guardar cms/data/news.json.';
    }

    $edit = ['id'=>$id,'title'=>$title,'category'=>$category,'date'=>$date,'summary'=>$summary,'body'=>$body,'image'=>$images[0]['path'] ?? '','images'=>$images,'published'=>$published];
}

usort($items,function($a,$b){
    $ta=strtotime((string)($a['published_at']??$a['created_at']??$a['date']??''))?:0;
    $tb=strtotime((string)($b['published_at']??$b['created_at']??$b['date']??''))?:0;
    return $tb<=>$ta;
});

mc_admin_header('Noticias');
?>
<style>
.news-admin-head{display:flex;justify-content:space-between;align-items:center;gap:14px;flex-wrap:wrap}.news-admin-head p{margin:5px 0 0;color:#6B7280}.news-editor-grid{display:grid;grid-template-columns:minmax(0,1.3fr) minmax(300px,.7fr);gap:18px}.news-media-box{border:1px solid #F3F4F6;border-radius:14px;padding:14px;background:#F3F4F6}.news-media-box h3{margin:0 0 4px}.media-sortable{display:grid;grid-template-columns:repeat(auto-fill,minmax(190px,1fr));gap:12px;margin-top:12px}.media-item{position:relative;border:1px solid #F3F4F6;border-radius:13px;background:#FFFFFF;padding:10px;cursor:grab;box-shadow:0 7px 18px rgba(7,21,37,.05)}.media-item.dragging{opacity:.45}.media-item img{display:block;width:100%;aspect-ratio:16/10;object-fit:cover;border-radius:9px;background:#F3F4F6}.media-item input[type=text]{width:100%;margin-top:8px}.media-item .media-row{display:flex;align-items:center;justify-content:space-between;gap:8px;margin-top:8px;font-size:12px}.media-handle{font-weight:900;color:#0B1F3A}.new-slot-preview{display:grid;place-items:center;width:100%;aspect-ratio:16/10;border-radius:9px;background:#F3F4F6;color:#163A5F;overflow:hidden}.new-slot-preview img{width:100%;height:100%;object-fit:cover}.news-note{padding:11px 13px;border-radius:11px;background:#F3F4F6;color:#0B1F3A;font-size:12px;line-height:1.55}.status-actions{display:flex;gap:6px;flex-wrap:wrap}.news-title-cell{max-width:420px}.news-title-cell b{display:block}.photo-badge{display:inline-flex;align-items:center;gap:5px;margin-top:5px;padding:4px 7px;border-radius:999px;background:#F3F4F6;color:#0B1F3A;font-size:11px;font-weight:800}@media(max-width:980px){.news-editor-grid{grid-template-columns:1fr}}@media(max-width:640px){.media-sortable{grid-template-columns:1fr}}
</style>

<?php if ($error): ?><div class="alert error"><?= mc_h($error) ?></div><?php endif; ?>

<?php if ($edit !== null): $editImages=mc_news_admin_images($edit); ?>
<section class="card" style="margin-bottom:18px">
    <div class="news-admin-head"><div><h2 style="margin:0"><?= !empty($edit['id'])?'Editar noticia':'Nueva noticia' ?></h2><p>Gestiona contenido, estado y galería completa de la publicación.</p></div><a class="btn light" href="noticias.php">← Volver al listado</a></div>
    <form method="post" enctype="multipart/form-data" id="news-form">
        <input type="hidden" name="csrf" value="<?= mc_h(mc_csrf_token()) ?>">
        <input type="hidden" name="action" value="save"><input type="hidden" name="id" value="<?= mc_h($edit['id'] ?? '') ?>">
        <div class="news-editor-grid" style="margin-top:16px">
            <div>
                <div class="form-grid">
                    <div class="field full"><label>Título</label><input name="title" required value="<?= mc_h($edit['title'] ?? '') ?>"></div>
                    <div class="field"><label>Categoría</label><input name="category" value="<?= mc_h($edit['category'] ?? 'Institucional') ?>"></div>
                    <div class="field"><label>Fecha de la noticia</label><input type="date" name="date" required value="<?= mc_h($edit['date'] ?? date('Y-m-d')) ?>"></div>
                    <div class="field full"><label>Extracto / resumen</label><textarea name="summary" rows="4" placeholder="Texto corto que aparecerá en la tarjeta pública."><?= mc_h($edit['summary'] ?? '') ?></textarea></div>
                    <div class="field full"><label>Contenido completo</label><textarea name="body" style="min-height:240px" placeholder="Contenido que verá el visitante al abrir la noticia."><?= mc_h($edit['body'] ?? '') ?></textarea></div>
                    <div class="field full"><label><input type="checkbox" name="published" value="1" <?= !empty($edit['published'])?'checked':'' ?>> Publicar en la web</label><div class="help">Desmarcado = borrador. Puedes publicarla después desde el listado.</div></div>
                </div>
            </div>
            <aside>
                <div class="news-note"><strong>Galería optimizada</strong><br>Se requiere mínimo 1 foto. JPG, PNG y WEBP se reducen hasta 1800 px y, si GD está disponible, se guardan en WEBP para mejorar la carga. GIF se conserva.</div>
                <div class="field" style="margin-top:14px"><label>Cantidad de fotos nuevas</label><input type="number" id="new-image-count" min="0" max="40" step="1" value="<?= empty($edit['id'])?1:0 ?>"><div class="help">Puedes preparar hasta 40 fotos por edición. El límite real también depende de <code>max_file_uploads</code> de PHP.</div></div>
                <button type="button" class="btn light" id="apply-image-count">Preparar campos</button>
            </aside>
        </div>

        <div class="news-media-box" style="margin-top:18px">
            <h3>Fotos actuales</h3><div class="help">Arrastra las tarjetas para cambiar el orden. La primera foto será la portada.</div>
            <div class="media-sortable" id="existing-media">
                <?php foreach ($editImages as $img): ?>
                    <div class="media-item" draggable="true">
                        <img src="../<?= mc_h($img['path']) ?>" alt="<?= mc_h($img['alt']) ?>">
                        <input type="hidden" name="existing_paths[]" value="<?= mc_h($img['path']) ?>">
                        <input type="text" name="existing_alts[]" value="<?= mc_h($img['alt']) ?>" placeholder="Texto alternativo">
                        <div class="media-row"><span class="media-handle">☰ Arrastrar</span><label><input type="checkbox" name="remove_paths[]" value="<?= mc_h($img['path']) ?>"> Eliminar</label></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if (!$editImages): ?><div class="help" id="no-existing">Aún no hay fotos guardadas.</div><?php endif; ?>
        </div>

        <div class="news-media-box" style="margin-top:14px">
            <h3>Fotos nuevas</h3><div class="help">Selecciona una imagen en cada campo. Puedes arrastrar los bloques para definir el orden entre las fotos nuevas.</div>
            <div class="media-sortable" id="new-media"></div>
        </div>

        <div class="actions" style="margin-top:18px"><button class="btn primary" type="submit">Guardar noticia</button><a class="btn orange" href="../noticias.php" target="_blank">↗ Ver Noticias</a><a class="btn light" href="noticias.php">Cancelar</a></div>
    </form>
</section>
<script>
(function(){
 const existing=document.getElementById('existing-media'), fresh=document.getElementById('new-media'), count=document.getElementById('new-image-count'), apply=document.getElementById('apply-image-count'), form=document.getElementById('news-form'); let seq=0;
 function sortable(container){let dragging=null;container.addEventListener('dragstart',e=>{dragging=e.target.closest('.media-item');if(dragging)dragging.classList.add('dragging')});container.addEventListener('dragend',()=>{if(dragging)dragging.classList.remove('dragging');dragging=null});container.addEventListener('dragover',e=>{e.preventDefault();if(!dragging)return;const others=[...container.querySelectorAll('.media-item:not(.dragging)')];const next=others.find(el=>e.clientY<=el.getBoundingClientRect().top+el.offsetHeight/2);container.insertBefore(dragging,next||null)});}
 sortable(existing); sortable(fresh);
 function addSlot(){seq++;const field='new_image_'+Date.now()+'_'+seq;const item=document.createElement('div');item.className='media-item';item.draggable=true;item.innerHTML='<div class="new-slot-preview"><span>Vista previa</span></div><input type="hidden" name="new_fields[]" value="'+field+'"><input type="file" name="'+field+'" accept="image/jpeg,image/png,image/webp,image/gif"><input type="text" name="new_alts['+field+']" placeholder="Texto alternativo (opcional)"><div class="media-row"><span class="media-handle">☰ Arrastrar</span><button type="button" class="btn light remove-slot" style="padding:5px 8px">Quitar</button></div>';const input=item.querySelector('input[type=file]'), preview=item.querySelector('.new-slot-preview');input.addEventListener('change',()=>{const file=input.files&&input.files[0];if(!file){preview.innerHTML='<span>Vista previa</span>';return}const url=URL.createObjectURL(file);preview.innerHTML='<img alt="Vista previa">';preview.querySelector('img').src=url});item.querySelector('.remove-slot').addEventListener('click',()=>item.remove());fresh.appendChild(item);}
 function setCount(){let wanted=Math.max(0,Math.min(40,parseInt(count.value||'0',10)));const current=fresh.querySelectorAll('.media-item').length;if(wanted>current){for(let i=current;i<wanted;i++)addSlot()}else if(wanted<current){[...fresh.querySelectorAll('.media-item')].slice(wanted).forEach(el=>el.remove())}}
 apply.addEventListener('click',setCount); setCount();
 form.addEventListener('submit',e=>{const kept=[...document.querySelectorAll('input[name="existing_paths[]"]')].filter((el,i)=>{const card=el.closest('.media-item');const rm=card.querySelector('input[name="remove_paths[]"]');return !(rm&&rm.checked)}).length;const selected=[...fresh.querySelectorAll('input[type=file]')].filter(i=>i.files&&i.files.length).length;if(kept+selected<1){e.preventDefault();alert('Debes conservar o seleccionar al menos una foto para la noticia.');}});
})();
</script>
<?php endif; ?>

<section class="card">
    <div class="news-admin-head"><div><h2 style="margin:0">Gestión de noticias</h2><p>Publicaciones ordenadas por la más reciente subida/publicada.</p></div><a class="btn primary" href="noticias.php?new=1">+ Crear noticia</a></div>
    <div class="table-wrap" style="margin-top:14px"><table class="table"><thead><tr><th>Portada</th><th>Noticia</th><th>Fecha</th><th>Estado</th><th>Acciones</th></tr></thead><tbody>
    <?php foreach ($items as $n): $imgs=mc_news_admin_images($n); ?>
        <tr>
            <td><?php if($imgs):?><img class="thumb" src="../<?= mc_h($imgs[0]['path']) ?>" alt=""><?php endif;?></td>
            <td class="news-title-cell"><b><?= mc_h($n['title'] ?? '') ?></b><div class="help"><?= mc_h($n['category'] ?? '') ?></div><span class="photo-badge">▧ <?= count($imgs) ?> <?= count($imgs)===1?'foto':'fotos' ?></span></td>
            <td><?= mc_h($n['date'] ?? '') ?><div class="help">Actualizada: <?= mc_h(substr((string)($n['updated_at'] ?? ''),0,16)) ?></div></td>
            <td><span class="badge <?= !empty($n['published'])?'ok':'off' ?>"><?= !empty($n['published'])?'Publicada':'Borrador' ?></span></td>
            <td><div class="status-actions"><a class="btn light" href="noticias.php?edit=<?= urlencode((string)$n['id']) ?>">Editar</a><a class="btn orange" target="_blank" href="../noticia.php?id=<?= urlencode((string)$n['id']) ?>">Ver</a><form method="post"><input type="hidden" name="csrf" value="<?= mc_h(mc_csrf_token()) ?>"><input type="hidden" name="action" value="toggle"><input type="hidden" name="id" value="<?= mc_h($n['id']) ?>"><button class="btn light"><?= !empty($n['published'])?'Pasar a borrador':'Publicar' ?></button></form><form method="post" onsubmit="return confirm('¿Eliminar esta noticia y sus imágenes asociadas?')"><input type="hidden" name="csrf" value="<?= mc_h(mc_csrf_token()) ?>"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= mc_h($n['id']) ?>"><button class="btn danger">Eliminar</button></form></div></td>
        </tr>
    <?php endforeach; ?>
    </tbody></table></div>
</section>
<?php mc_admin_footer(); ?>
