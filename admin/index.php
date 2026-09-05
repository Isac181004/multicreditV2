<?php
require_once __DIR__ . '/_init.php';
require_once dirname(__DIR__) . '/cms/opiniones.php';
mc_admin_require_login();
$news=mc_news(false);
$pub=count(array_filter($news,function($n){return !empty($n['published']);}));
$uploads=0;
foreach(['news','media','logo','hero','home','modules'] as $d){$dir=MC_ROOT.'/uploads/'.$d;if(is_dir($dir)){$files=glob($dir.'/*');$uploads+=is_array($files)?count($files):0;}}
$site=mc_site();
$pages=mc_pages();
$customized=count(array_filter($pages,function($p){return is_array($p)&&!empty($p['enabled']);}));
$pendingOpinions=null;
try{mc_opinions_install();$opStats=mc_opinions_admin_stats();$pendingOpinions=(int)$opStats['pendiente'];}catch(Throwable $e){}
mc_admin_header('Dashboard'); ?>
<div class="grid stats">
  <div class="card stat"><b><?=$customized?></b><small>Módulos personalizados</small></div>
  <div class="card stat"><b><?=count($news)?></b><small>Noticias registradas</small></div>
  <div class="card stat"><b><?=$pub?></b><small>Noticias publicadas</small></div>
  <div class="card stat"><b><?=$pendingOpinions===null?'—':$pendingOpinions?></b><small>Opiniones pendientes</small></div>
  <div class="card stat"><b><?=$uploads?></b><small>Imágenes subidas</small></div>
</div>
<div class="grid" style="grid-template-columns:1.25fr .75fr;margin-top:18px">
  <section class="card">
    <h2>Edición total del sitio</h2>
    <div class="actions">
      <a class="btn primary" href="modulos.php">▦ Editar módulos</a>
      <a class="btn light" href="encabezado.php">▤ Editar encabezado</a>
      <a class="btn light" href="pie.php">▥ Editar pie de página</a>
      <a class="btn light" href="contenido.php">✎ Editar inicio</a>
      <a class="btn light" href="opiniones.php">★ Opiniones y calificaciones</a>
      <a class="btn light" href="noticias.php">📰 Gestionar noticias</a>
      <a class="btn orange" target="_blank" href="../index.php">↗ Ver sitio</a>
    </div>
    <p class="help" style="margin-top:18px">El editor por módulos trabaja sobre configuración CMS y puede reemplazar el contenido central de cada página sin tocar directamente su archivo PHP. El encabezado y el pie tienen editores independientes. Las opiniones enviadas por clientes se moderan antes de publicarse.</p>
  </section>
  <section class="card">
    <h2>Datos institucionales</h2>
    <p><b><?=mc_h($site['brand_name'])?></b></p>
    <p class="help"><?=mc_nl2br($site['address1']??'')?></p>
    <p class="help"><?=mc_h($site['email']??'')?> · <?=mc_h($site['telefono']??'')?></p>
    <p class="help" style="margin-top:12px">Recuperación por WhatsApp: <?=trim((string)(mc_admin_credentials()['recoveryPhone']??''))!==''?'configurada':'pendiente de configurar'?></p>
    <p class="help" style="margin-top:8px">Opiniones MySQL: <?=$pendingOpinions===null?'pendiente de configurar':'conectado'?></p>
  </section>
</div>
<?php mc_admin_footer(); ?>