<?php
require_once __DIR__ . '/_init.php'; mc_admin_require_login();
$items=mc_news(false); $edit=null; $error='';
if (isset($_GET['edit'])) { foreach($items as $n){if((string)$n['id']===(string)$_GET['edit']){$edit=$n;break;}} }
if (isset($_GET['new'])) $edit=['id'=>'','title'=>'','category'=>'Institucional','date'=>date('Y-m-d'),'summary'=>'','body'=>'','image'=>'','published'=>true];
if ($_SERVER['REQUEST_METHOD']==='POST') {
    mc_csrf_check(); $action=$_POST['action']??'save'; $id=(string)($_POST['id']??'');
    if ($action==='delete') {
        $items=array_values(array_filter($items,function($n)use($id){return (string)($n['id']??'')!==$id;}));
        mc_write_json(MC_DATA_DIR.'/news.json',$items); mc_flash('success','Noticia eliminada.'); header('Location: noticias.php'); exit;
    }
    $title=trim((string)($_POST['title']??'')); $category=trim((string)($_POST['category']??'')); $date=trim((string)($_POST['date']??''));
    $summary=trim((string)($_POST['summary']??'')); $body=trim((string)($_POST['body']??'')); $published=!empty($_POST['published']);
    $existing=null; $existingIndex=null; foreach($items as $i=>$n){if((string)($n['id']??'')===$id){$existing=$n;$existingIndex=$i;break;}}
    $image=(string)($existing['image']??''); $up=mc_upload_image('image','news'); if(!$up['ok']) $error=$up['error']; elseif($up['path']!=='') $image=$up['path'];
    if($title==='') $error='El título es obligatorio.'; elseif($date===''||!strtotime($date)) $error='La fecha no es válida.';
    if($error==='') {
        if($id==='') { $id=mc_slug($title); $base=$id;$k=2; $used=array_column($items,'id'); while(in_array($id,$used,true)){$id=$base.'-'.$k++;} }
        $row=['id'=>$id,'title'=>$title,'category'=>$category?:'Institucional','date'=>$date,'summary'=>$summary,'body'=>$body?:$summary,'image'=>$image,'published'=>$published,'created_at'=>$existing['created_at']??date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')];
        if($existingIndex===null)$items[]=$row; else $items[$existingIndex]=$row;
        mc_write_json(MC_DATA_DIR.'/news.json',$items); mc_flash('success','Noticia guardada correctamente.'); header('Location: noticias.php'); exit;
    }
    $edit=['id'=>$id,'title'=>$title,'category'=>$category,'date'=>$date,'summary'=>$summary,'body'=>$body,'image'=>$image,'published'=>$published];
}
mc_admin_header('Noticias'); ?>
<?php if($error):?><div class="alert error"><?=mc_h($error)?></div><?php endif;?>
<?php if($edit!==null):?><section class="card" style="margin-bottom:18px"><h2><?=$edit['id']?'Editar noticia':'Nueva noticia'?></h2><form method="post" enctype="multipart/form-data"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="save"><input type="hidden" name="id" value="<?=mc_h($edit['id'])?>"><div class="form-grid"><div class="field full"><label>Título</label><input name="title" required value="<?=mc_h($edit['title'])?>"></div><div class="field"><label>Categoría</label><input name="category" value="<?=mc_h($edit['category'])?>"></div><div class="field"><label>Fecha</label><input type="date" name="date" required value="<?=mc_h($edit['date'])?>"></div><div class="field full"><label>Resumen</label><textarea name="summary"><?=mc_h($edit['summary'])?></textarea></div><div class="field full"><label>Contenido</label><textarea name="body" style="min-height:180px"><?=mc_h($edit['body'])?></textarea></div><div class="field"><label>Imagen de la noticia</label><input type="file" name="image" accept="image/jpeg,image/png,image/webp,image/gif"><div class="help">JPG, PNG, WEBP o GIF · máximo 6 MB.</div></div><div class="field"><?php if(!empty($edit['image'])):?><label>Imagen actual</label><img class="preview-img" src="../<?=mc_h($edit['image'])?>" alt=""><?php endif;?></div><div class="field full"><label><input type="checkbox" name="published" value="1" <?=!empty($edit['published'])?'checked':''?>> Publicar en la web</label></div></div><div class="actions" style="margin-top:16px"><button class="btn primary">Guardar noticia</button><a class="btn light" href="noticias.php">Cancelar</a></div></form></section><?php endif;?>
<section class="card"><div style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap"><h2 style="margin:0">Listado de noticias</h2><a class="btn primary" href="noticias.php?new=1">+ Agregar noticia</a></div><div class="table-wrap" style="margin-top:14px"><table class="table"><thead><tr><th>Imagen</th><th>Título</th><th>Fecha</th><th>Estado</th><th>Acciones</th></tr></thead><tbody><?php foreach($items as $n):?><tr><td><?php if(!empty($n['image'])):?><img class="thumb" src="../<?=mc_h($n['image'])?>" alt=""><?php endif;?></td><td><b><?=mc_h($n['title'])?></b><div class="help"><?=mc_h($n['category']??'')?></div></td><td><?=mc_h($n['date']??'')?></td><td><span class="badge <?=!empty($n['published'])?'ok':'off'?>"><?=!empty($n['published'])?'Publicada':'Oculta'?></span></td><td><div class="actions"><a class="btn light" href="noticias.php?edit=<?=urlencode((string)$n['id'])?>">Editar</a><form method="post" onsubmit="return confirm('¿Eliminar esta noticia?')"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?=mc_h($n['id'])?>"><button class="btn danger">Eliminar</button></form></div></td></tr><?php endforeach;?></tbody></table></div></section>
<?php mc_admin_footer(); ?>