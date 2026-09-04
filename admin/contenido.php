<?php
require_once __DIR__ . '/_init.php';
mc_admin_require_login();
$site=mc_site();
$error='';

if ($_SERVER['REQUEST_METHOD']==='POST') {
    mc_csrf_check();
    $fields=[
        'brand_name','hero_badge','hero_title','hero_highlight','hero_subtitle',
        'hero_primary_label','hero_primary_url','hero_secondary_label','hero_secondary_url',
        'value_eyebrow','value_title','value_text','final_cta_title','final_cta_text',
        'news_title','news_subtitle'
    ];
    foreach($fields as $f) if(array_key_exists($f,$_POST)) $site[$f]=trim((string)$_POST[$f]);

    foreach(['logo'=>'logo','hero_image'=>'hero','value_image'=>'home','news_hero_image'=>'news'] as $field=>$sub) {
        $up=mc_upload_image($field,$sub);
        if(!$up['ok']){$error=$up['error'];break;}
        if($up['path']!=='')$site[$field]=$up['path'];
    }

    if($error==='') {
        if (mc_write_json(MC_DATA_DIR.'/site.json',$site)) {
            mc_flash('success','Contenido de la página principal actualizado.');
            header('Location: contenido.php');
            exit;
        }
        $error='No se pudo guardar cms/data/site.json.';
    }
}

mc_admin_header('Inicio y contenido');
?>
<?php if($error):?><div class="alert error"><?=mc_h($error)?></div><?php endif;?>
<div class="notice" style="margin-bottom:18px">El <b>encabezado</b> y el <b>pie de página</b> ahora tienen editores independientes. Para otras páginas usa <b>Módulos / páginas</b>.</div>
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">

<section class="card" style="margin-bottom:18px">
<h2>Página principal</h2>
<div class="form-grid">
<div class="field"><label>Nombre institucional</label><input name="brand_name" value="<?=mc_h($site['brand_name'])?>"></div>
<div class="field"><label>Logo</label><input type="file" name="logo" accept="image/*"><?php if($site['logo']):?><img class="preview-img" style="display:block;margin-top:8px;max-height:90px" src="../<?=mc_h($site['logo'])?>"><?php endif;?></div>
<div class="field full"><label>Etiqueta del hero</label><input name="hero_badge" value="<?=mc_h($site['hero_badge'])?>"></div>
<div class="field"><label>Título principal</label><input name="hero_title" value="<?=mc_h($site['hero_title'])?>"></div>
<div class="field"><label>Texto destacado</label><input name="hero_highlight" value="<?=mc_h($site['hero_highlight'])?>"></div>
<div class="field full"><label>Subtítulo principal</label><textarea name="hero_subtitle"><?=mc_h($site['hero_subtitle'])?></textarea></div>
<div class="field"><label>Imagen principal</label><input type="file" name="hero_image" accept="image/*"><?php if($site['hero_image']):?><img class="preview-img" style="display:block;margin-top:8px" src="../<?=mc_h($site['hero_image'])?>"><?php endif;?></div>
<div class="field"><label>Imagen sección de bienvenida</label><input type="file" name="value_image" accept="image/*"><?php if($site['value_image']):?><img class="preview-img" style="display:block;margin-top:8px" src="../<?=mc_h($site['value_image'])?>"><?php endif;?></div>
<div class="field"><label>Botón principal</label><input name="hero_primary_label" value="<?=mc_h($site['hero_primary_label'])?>"></div>
<div class="field"><label>Enlace botón principal</label><input name="hero_primary_url" value="<?=mc_h($site['hero_primary_url'])?>"></div>
<div class="field"><label>Botón secundario</label><input name="hero_secondary_label" value="<?=mc_h($site['hero_secondary_label'])?>"></div>
<div class="field"><label>Enlace botón secundario</label><input name="hero_secondary_url" value="<?=mc_h($site['hero_secondary_url'])?>"></div>
<div class="field full"><label>Etiqueta sección bienvenida</label><input name="value_eyebrow" value="<?=mc_h($site['value_eyebrow'])?>"></div>
<div class="field full"><label>Título sección bienvenida</label><input name="value_title" value="<?=mc_h($site['value_title'])?>"></div>
<div class="field full"><label>Texto sección bienvenida</label><textarea name="value_text"><?=mc_h($site['value_text'])?></textarea></div>
<div class="field"><label>CTA final - título</label><input name="final_cta_title" value="<?=mc_h($site['final_cta_title'])?>"></div>
<div class="field"><label>CTA final - texto</label><input name="final_cta_text" value="<?=mc_h($site['final_cta_text'])?>"></div>
</div>
</section>

<section class="card" style="margin-bottom:18px">
<h2>Noticias en el sitio</h2>
<div class="form-grid">
<div class="field"><label>Título de la sección</label><input name="news_title" value="<?=mc_h($site['news_title'])?>"></div>
<div class="field"><label>Texto de página Noticias</label><input name="news_subtitle" value="<?=mc_h($site['news_subtitle'])?>"></div>
<div class="field"><label>Imagen del encabezado Noticias</label><input type="file" name="news_hero_image" accept="image/*"><?php if($site['news_hero_image']):?><img class="preview-img" style="display:block;margin-top:8px" src="../<?=mc_h($site['news_hero_image'])?>"><?php endif;?></div>
</div>
</section>

<div class="actions"><button class="btn primary" style="padding:13px 22px">Guardar contenido de inicio</button><a class="btn light" href="encabezado.php">Editar encabezado</a><a class="btn light" href="pie.php">Editar pie</a><a class="btn orange" href="../index.php" target="_blank">↗ Ver sitio</a></div>
</form>
<?php mc_admin_footer(); ?>
