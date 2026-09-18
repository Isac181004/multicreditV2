<?php
require_once __DIR__.'/_init.php';
mc_admin_require_login();
$items=mc_news(false);$edit=null;$error='';
if(isset($_GET['edit']))$edit=mc_news_get((string)$_GET['edit'],false);
if(isset($_GET['new']))$edit=['id'=>'','title'=>'','category'=>'Institucional','date'=>date('Y-m-d'),'summary'=>'','body'=>'','image'=>'','images'=>[],'published'=>false];

if($_SERVER['REQUEST_METHOD']==='POST'){
    mc_csrf_check();$action=(string)($_POST['action']??'save');$id=(string)($_POST['id']??'');
    if($action==='delete'){
        $deleted=mc_news_get($id,false);
        $items=array_values(array_filter($items,function($n)use($id){return(string)($n['id']??'')!==$id;}));
        if(mc_write_json(MC_DATA_DIR.'/news.json',$items)){
            foreach((array)($deleted['images']??[])as$image){$path=mc_safe_local_path($image['path']??'');if(strpos($path,'uploads/news/')===0&&is_file(MC_ROOT.'/'.$path))@unlink(MC_ROOT.'/'.$path);}
            mc_flash('success','Noticia eliminada.');header('Location: noticias.php');exit;
        }
        $error='No se pudo eliminar la noticia.';
    }else{
        $title=trim((string)($_POST['title']??''));$category=trim((string)($_POST['category']??''));$date=trim((string)($_POST['date']??''));
        $summary=trim((string)($_POST['summary']??''));$body=trim((string)($_POST['body']??''));$published=!empty($_POST['published']);
        $existing=$id!==''?mc_news_get($id,false):null;$existingIndex=null;
        foreach($items as$i=>$n)if((string)($n['id']??'')===$id){$existingIndex=$i;break;}
        if($title==='')$error='El título es obligatorio.';elseif($date===''||!strtotime($date))$error='La fecha no es válida.';
        $upload=['ok'=>true,'paths'=>[]];if($error===''){$upload=mc_upload_news_images('photos');if(!$upload['ok'])$error=$upload['error'];}
        $removed=array_map('strval',(array)($_POST['remove_images']??[]));
        $existingImages=array_values(array_filter((array)($existing['images']??[]),function($image)use($removed){return!in_array((string)($image['id']??''),$removed,true);}));
        $newImages=[];foreach($upload['paths']as$i=>$path)$newImages[(string)$i]=['id'=>'img-'.bin2hex(random_bytes(6)),'path'=>$path,'order'=>9999];
        $order=array_filter(array_map('trim',explode(',',(string)($_POST['gallery_order']??''))));$images=[];
        foreach($order as$token){
            if(strpos($token,'e:')===0){$wanted=substr($token,2);foreach($existingImages as$image)if((string)$image['id']===$wanted)$images[]=$image;}
            elseif(strpos($token,'n:')===0&&isset($newImages[substr($token,2)]))$images[]=$newImages[substr($token,2)];
        }
        foreach(array_merge($existingImages,array_values($newImages))as$image){$found=false;foreach($images as$added)if($added['id']===$image['id']){$found=true;break;}if(!$found)$images[]=$image;}
        foreach($images as$i=>&$image)$image['order']=$i;unset($image);
        if($error===''&&!$images)$error='Debes agregar por lo menos una foto a la noticia.';
        if($error===''){
            if($id===''){$id=mc_slug($title);$base=$id;$n=2;$used=array_column($items,'id');while(in_array($id,$used,true))$id=$base.'-'.$n++;}
            $row=['id'=>$id,'title'=>$title,'category'=>$category?:'Institucional','date'=>$date,'summary'=>$summary,'body'=>$body?:$summary,'image'=>$images[0]['path'],'images'=>$images,'published'=>$published,'created_at'=>$existing['created_at']??date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')];
            if($existingIndex===null)$items[]=$row;else$items[$existingIndex]=$row;
            if(mc_write_json(MC_DATA_DIR.'/news.json',$items)){
                foreach((array)($existing['images']??[])as$image)if(in_array((string)($image['id']??''),$removed,true)){$path=mc_safe_local_path($image['path']??'');if(strpos($path,'uploads/news/')===0&&is_file(MC_ROOT.'/'.$path))@unlink(MC_ROOT.'/'.$path);}
                mc_flash('success','Noticia guardada correctamente.');header('Location: noticias.php');exit;
            }
            $error='No se pudo guardar news.json. Revisa permisos de cms/data.';
        }
        $edit=['id'=>$id,'title'=>$title,'category'=>$category,'date'=>$date,'summary'=>$summary,'body'=>$body,'image'=>$images[0]['path']??'','images'=>$images,'published'=>$published];
    }
}
mc_admin_header('Noticias');
?>
<?php if($error):?><div class="alert error"><?=mc_h($error)?></div><?php endif;?>
<?php if($edit!==null):?>
<section class="card news-editor"><div class="editor-title"><div><h2><?=$edit['id']?'Editar noticia':'Nueva noticia'?></h2><p class="help">La primera fotografía será la portada. Arrastra las imágenes para cambiar su orden.</p></div><span class="badge <?=!empty($edit['published'])?'ok':'off'?>"><?=!empty($edit['published'])?'Publicada':'Borrador'?></span></div>
<form method="post" enctype="multipart/form-data" id="news-form"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="save"><input type="hidden" name="id" value="<?=mc_h($edit['id'])?>"><input type="hidden" name="gallery_order" id="gallery-order">
<div class="form-grid"><div class="field full"><label>Título</label><input name="title" required maxlength="240" value="<?=mc_h($edit['title'])?>"></div><div class="field"><label>Categoría</label><input name="category" maxlength="100" value="<?=mc_h($edit['category'])?>"></div><div class="field"><label>Fecha de publicación</label><input type="date" name="date" required value="<?=mc_h($edit['date'])?>"></div><div class="field full"><label>Extracto para la tarjeta</label><textarea name="summary" maxlength="700" placeholder="Resumen breve de la noticia"><?=mc_h($edit['summary'])?></textarea></div><div class="field full"><label>Contenido completo</label><textarea name="body" style="min-height:220px" required><?=mc_h($edit['body'])?></textarea></div>
<div class="field full"><label>Agregar fotografías</label><input type="file" id="news-photos" name="photos[]" accept="image/jpeg,image/png,image/webp" multiple><div class="help">Mínimo 1 foto por noticia. JPG, PNG o WEBP, máximo 12 MB cada una. Se reducen hasta 1800 px y se convierten a WEBP cuando el servidor lo permite.</div></div>
<div class="field full"><label>Galería y orden de visualización</label><div id="gallery-preview" class="gallery-sortable"><?php foreach((array)$edit['images']as$image):?><figure class="gallery-admin-item" draggable="true" data-token="e:<?=mc_h($image['id'])?>"><img src="../<?=mc_h($image['path'])?>" alt=""><figcaption><span class="drag-handle">☰ Arrastrar</span><button type="button" class="remove-existing" data-id="<?=mc_h($image['id'])?>">Eliminar</button></figcaption></figure><?php endforeach;?></div><div id="removed-fields"></div></div>
<div class="field full"><label><input type="checkbox" name="published" value="1" <?=!empty($edit['published'])?'checked':''?>> Publicar en la web</label><div class="help">Si no marcas esta opción se guardará como borrador.</div></div></div>
<div class="actions"><button class="btn primary">Guardar noticia</button><a class="btn light" href="noticias.php">Cancelar</a></div></form></section>
<?php endif;?>
<section class="card"><div class="list-heading"><div><h2>Noticias registradas</h2><p class="help"><?=count($items)?> publicaciones en news.json</p></div><a class="btn primary" href="noticias.php?new=1">+ Agregar noticia</a></div><div class="table-wrap"><table class="table"><thead><tr><th>Portada</th><th>Noticia</th><th>Fecha</th><th>Fotos</th><th>Estado</th><th>Acciones</th></tr></thead><tbody><?php foreach($items as$n):?><tr><td><?php if(!empty($n['image'])):?><img class="thumb" loading="lazy" src="../<?=mc_h($n['image'])?>" alt=""><?php endif;?></td><td><b><?=mc_h($n['title'])?></b><div class="help"><?=mc_h($n['category']??'')?></div></td><td><?=mc_h($n['date']??'')?></td><td><?=count((array)($n['images']??[]))?></td><td><span class="badge <?=!empty($n['published'])?'ok':'off'?>"><?=!empty($n['published'])?'Publicada':'Borrador'?></span></td><td><div class="actions"><a class="btn light" href="noticias.php?edit=<?=urlencode((string)$n['id'])?>">Editar</a><?php if(!empty($n['published'])):?><a class="btn light" target="_blank" href="../noticia.php?id=<?=urlencode((string)$n['id'])?>">Ver</a><?php endif;?><form method="post" onsubmit="return confirm('¿Eliminar esta noticia y todas sus fotografías?')"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?=mc_h($n['id'])?>"><button class="btn danger">Eliminar</button></form></div></td></tr><?php endforeach;?></tbody></table></div></section>
<style>.news-editor{margin-bottom:18px}.editor-title,.list-heading{display:flex;justify-content:space-between;gap:16px;align-items:flex-start;flex-wrap:wrap}.editor-title h2,.list-heading h2{margin:0}.gallery-sortable{display:grid;grid-template-columns:repeat(auto-fill,minmax(165px,1fr));gap:14px;min-height:110px;padding:14px;border:1px dashed #9CA3AF;border-radius:14px;background:#F8FAFC}.gallery-admin-item{margin:0;background:#fff;border:1px solid #D1D5DB;border-radius:12px;overflow:hidden;cursor:move}.gallery-admin-item.dragging{opacity:.38}.gallery-admin-item img{width:100%;height:130px;object-fit:cover;display:block}.gallery-admin-item figcaption{display:flex;justify-content:space-between;gap:6px;align-items:center;padding:9px;font-size:11px}.drag-handle{font-weight:800;color:#374151}.gallery-admin-item button{border:0;background:#E5E7EB;color:#111827;border-radius:7px;padding:6px;cursor:pointer;font-weight:800}.gallery-admin-item.is-removed{display:none}</style>
<script src="assets/news-admin.js"></script>
<?php mc_admin_footer(); ?>
