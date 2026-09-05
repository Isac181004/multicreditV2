<?php
require_once __DIR__ . '/_init.php';
require_once dirname(__DIR__) . '/cms/opiniones.php';
mc_admin_require_login();

$dbError='';
try {
    mc_opinions_install();
} catch (Throwable $e) {
    $dbError='No se pudo conectar al MySQL de opiniones. En XAMPP se usa por defecto 127.0.0.1, base multicreditv2, usuario root y contraseña vacía. Si tu MySQL usa otros datos, crea cms/config/database.php a partir de database.example.php.';
}

if ($dbError==='' && $_SERVER['REQUEST_METHOD']==='POST') {
    mc_csrf_check();
    $action=(string)($_POST['action']??'');
    $id=(int)($_POST['id']??0);

    try {
        if ($action==='status' && $id>0) {
            $status=(string)($_POST['status']??'pendiente');
            mc_opinion_set_status($id,$status);
            mc_flash('success','Estado de la opinión actualizado.');
        } elseif ($action==='feature' && $id>0) {
            mc_opinion_toggle_featured($id);
            mc_flash('success','Se actualizó el estado destacado de la opinión.');
        } elseif ($action==='delete' && $id>0) {
            mc_opinion_delete($id);
            mc_flash('success','Opinión eliminada.');
        } elseif ($action==='save' && $id>0) {
            $nombre=trim((string)($_POST['nombre']??''));
            $sede=trim((string)($_POST['sede']??''));
            $calificacion=(int)($_POST['calificacion']??0);
            $comentario=trim((string)($_POST['comentario']??''));
            if (!in_array($sede,mc_opinion_sedes(),true)) throw new RuntimeException('Selecciona una sede válida.');
            if ($calificacion<1 || $calificacion>5) throw new RuntimeException('La calificación debe estar entre 1 y 5.');
            if ($comentario==='') throw new RuntimeException('El comentario no puede quedar vacío.');
            mc_opinion_update($id,[
                'nombre'=>$nombre,
                'sede'=>$sede,
                'calificacion'=>$calificacion,
                'comentario'=>$comentario,
                'estado'=>(string)($_POST['estado']??'pendiente'),
                'destacado'=>!empty($_POST['destacado']),
            ]);
            mc_flash('success','Opinión actualizada correctamente.');
        }
    } catch (Throwable $e) {
        mc_flash('error',$e->getMessage());
    }

    $filter=preg_replace('/[^a-z]/','',(string)($_GET['estado']??''));
    header('Location: opiniones.php'.($filter!==''?'?estado='.urlencode($filter):''));
    exit;
}

$filter=preg_replace('/[^a-z]/','',(string)($_GET['estado']??''));
$allowedFilters=['','pendiente','publicado','rechazado','oculto'];
if (!in_array($filter,$allowedFilters,true)) $filter='';
$stats=['total'=>0,'pendiente'=>0,'publicado'=>0,'rechazado'=>0,'oculto'=>0,'average'=>0];
$opinions=[];
$editing=null;

if ($dbError==='') {
    try {
        $stats=mc_opinions_admin_stats();
        $opinions=mc_opinions_admin_list($filter);
        $editId=(int)($_GET['edit']??0);
        if ($editId>0) $editing=mc_opinion_get($editId);
    } catch (Throwable $e) {
        $dbError='No se pudieron leer las opiniones desde MySQL.';
    }
}

function mc_opinion_admin_badge($status){
    $map=[
        'pendiente'=>['Pendiente','#fff7e8','#a15c00'],
        'publicado'=>['Publicado','#ecf8f0','#0d5c2e'],
        'rechazado'=>['Rechazado','#fff0f0','#b42318'],
        'oculto'=>['Oculto','#eef2f5','#53606a'],
    ];
    return $map[$status]??[$status,'#f4f4f4','#444'];
}

mc_admin_header('Opiniones y calificaciones');
?>
<style>
.op-stats{grid-template-columns:repeat(5,minmax(0,1fr))}.op-stars{color:#f26e22;letter-spacing:2px}.op-table{width:100%;border-collapse:collapse}.op-table th,.op-table td{padding:12px 10px;border-bottom:1px solid #e8ece9;text-align:left;vertical-align:top}.op-table th{font-size:12px;text-transform:uppercase;letter-spacing:.05em;color:#6d7771}.op-comment{max-width:430px;line-height:1.55}.op-actions{display:flex;flex-wrap:wrap;gap:6px}.op-mini{border:0;border-radius:8px;padding:7px 9px;font-weight:700;cursor:pointer;font-size:12px}.op-green{background:#e8f6ed;color:#0d5c2e}.op-orange{background:#fff0e7;color:#c65310}.op-red{background:#ffeded;color:#b42318}.op-gray{background:#edf1ef;color:#526159}.op-blue{background:#edf4ff;color:#2557a7}.op-filter{display:flex;flex-wrap:wrap;gap:8px;margin:15px 0}.op-filter a{padding:8px 12px;border:1px solid #dfe6e1;border-radius:999px;text-decoration:none;color:#45534b;font-weight:700;font-size:13px}.op-filter a.active{background:#0d5c2e;color:white;border-color:#0d5c2e}.op-consent{font-size:11px;color:#8a938d}.op-edit{margin-bottom:18px}@media(max-width:1000px){.op-stats{grid-template-columns:repeat(2,minmax(0,1fr))}.op-table{min-width:900px}.op-table-wrap{overflow:auto}}
</style>

<?php if($dbError): ?>
<div class="alert error"><?=mc_h($dbError)?></div>
<section class="card">
    <h2>Configuración de MySQL</h2>
    <p class="help">En XAMPP normalmente no necesitas configurar nada: el módulo intenta crear automáticamente la base <b>multicreditv2</b> y la tabla <b>opiniones</b>. Si tu MySQL tiene contraseña o usa otro usuario, copia <b>cms/config/database.example.php</b> como <b>cms/config/database.php</b> y coloca tus datos locales.</p>
</section>
<?php else: ?>

<div class="grid stats op-stats">
  <div class="card stat"><b><?=number_format((float)$stats['average'],1)?></b><small>Promedio publicado</small></div>
  <div class="card stat"><b><?=(int)$stats['pendiente']?></b><small>Pendientes</small></div>
  <div class="card stat"><b><?=(int)$stats['publicado']?></b><small>Publicadas</small></div>
  <div class="card stat"><b><?=(int)$stats['oculto']?></b><small>Ocultas</small></div>
  <div class="card stat"><b><?=(int)$stats['total']?></b><small>Total recibidas</small></div>
</div>

<?php if($editing): ?>
<section class="card op-edit" style="margin-top:18px">
<h2>Editar opinión #<?=(int)$editing['id']?></h2>
<form method="post">
<input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
<input type="hidden" name="action" value="save">
<input type="hidden" name="id" value="<?=(int)$editing['id']?>">
<div class="form-grid">
  <div class="field"><label>Nombre</label><input name="nombre" maxlength="80" value="<?=mc_h($editing['nombre']??'')?>" placeholder="Cliente de Multicredit"></div>
  <div class="field"><label>Sede</label><select name="sede"><?php foreach(mc_opinion_sedes() as $s):?><option value="<?=mc_h($s)?>" <?=$editing['sede']===$s?'selected':''?>><?=mc_h($s)?></option><?php endforeach;?></select></div>
  <div class="field"><label>Calificación</label><select name="calificacion"><?php for($i=5;$i>=1;$i--):?><option value="<?=$i?>" <?=((int)$editing['calificacion']===$i)?'selected':''?>><?=$i?> estrella<?=$i===1?'':'s'?></option><?php endfor;?></select></div>
  <div class="field"><label>Estado</label><select name="estado"><?php foreach(['pendiente','publicado','rechazado','oculto'] as $s):?><option value="<?=$s?>" <?=$editing['estado']===$s?'selected':''?>><?=ucfirst($s)?></option><?php endforeach;?></select></div>
  <div class="field full"><label>Comentario</label><textarea name="comentario" maxlength="600" required><?=mc_h($editing['comentario'])?></textarea></div>
  <div class="field full"><label><input type="checkbox" name="destacado" value="1" <?=!empty($editing['destacado'])?'checked':''?>> Destacar esta opinión antes que las demás</label></div>
</div>
<div class="actions" style="margin-top:14px"><button class="btn primary">Guardar cambios</button><a class="btn light" href="opiniones.php<?= $filter!==''?'?estado='.mc_h($filter):'' ?>">Cancelar</a></div>
</form>
</section>
<?php endif; ?>

<section class="card" style="margin-top:18px">
<div style="display:flex;justify-content:space-between;gap:15px;align-items:flex-start;flex-wrap:wrap">
  <div><h2 style="margin-bottom:4px">Bandeja de opiniones</h2><p class="help">Las opiniones enviadas desde la web llegan como <b>Pendientes</b>. Solo las que marques como <b>Publicadas</b> aparecerán en la página principal.</p></div>
  <a class="btn orange" href="../index.php" target="_blank">↗ Ver opiniones en la web</a>
</div>
<div class="op-filter">
<?php foreach([''=>'Todas','pendiente'=>'Pendientes','publicado'=>'Publicadas','oculto'=>'Ocultas','rechazado'=>'Rechazadas'] as $key=>$label): ?>
<a class="<?=$filter===$key?'active':''?>" href="opiniones.php<?=$key!==''?'?estado='.$key:''?>"><?=mc_h($label)?></a>
<?php endforeach; ?>
</div>
<div class="op-table-wrap">
<table class="op-table">
<thead><tr><th>Cliente</th><th>Sede</th><th>Calificación</th><th>Comentario</th><th>Estado</th><th>Fecha</th><th>Acciones</th></tr></thead>
<tbody>
<?php if(!$opinions): ?>
<tr><td colspan="7"><div class="notice">Todavía no hay opiniones en esta bandeja.</div></td></tr>
<?php else: foreach($opinions as $op): $badge=mc_opinion_admin_badge($op['estado']); ?>
<tr>
  <td><b><?=mc_h(trim((string)($op['nombre']??''))?:'Anónimo')?></b><?php if(!empty($op['destacado'])):?><div class="op-consent">★ Destacada</div><?php endif;?></td>
  <td><?=mc_h($op['sede'])?></td>
  <td><span class="op-stars"><?=str_repeat('★',(int)$op['calificacion']).str_repeat('☆',5-(int)$op['calificacion'])?></span><div class="op-consent"><?=(int)$op['calificacion']?>/5</div></td>
  <td><div class="op-comment"><?=mc_h($op['comentario'])?></div><div class="op-consent">Autorización de publicación: <?=!empty($op['consentimiento'])?'sí':'no'?></div></td>
  <td><span style="display:inline-block;background:<?=$badge[1]?>;color:<?=$badge[2]?>;padding:5px 9px;border-radius:999px;font-size:11px;font-weight:800"><?=mc_h($badge[0])?></span></td>
  <td><small><?=mc_h(date('d/m/Y H:i',strtotime($op['created_at'])))?></small></td>
  <td>
    <div class="op-actions">
      <?php if($op['estado']!=='publicado'):?><form method="post"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="status"><input type="hidden" name="status" value="publicado"><input type="hidden" name="id" value="<?=(int)$op['id']?>"><button class="op-mini op-green">Aprobar</button></form><?php endif;?>
      <?php if($op['estado']!=='oculto'):?><form method="post"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="status"><input type="hidden" name="status" value="oculto"><input type="hidden" name="id" value="<?=(int)$op['id']?>"><button class="op-mini op-gray">Ocultar</button></form><?php endif;?>
      <?php if($op['estado']!=='rechazado'):?><form method="post"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="status"><input type="hidden" name="status" value="rechazado"><input type="hidden" name="id" value="<?=(int)$op['id']?>"><button class="op-mini op-orange">Rechazar</button></form><?php endif;?>
      <form method="post"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="feature"><input type="hidden" name="id" value="<?=(int)$op['id']?>"><button class="op-mini op-blue"><?=!empty($op['destacado'])?'Quitar destacado':'Destacar'?></button></form>
      <a class="op-mini op-gray" style="text-decoration:none" href="opiniones.php?edit=<?=(int)$op['id']?><?= $filter!==''?'&estado='.mc_h($filter):'' ?>">Editar</a>
      <form method="post" onsubmit="return confirm('¿Eliminar definitivamente esta opinión?')"><input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?=(int)$op['id']?>"><button class="op-mini op-red">Eliminar</button></form>
    </div>
  </td>
</tr>
<?php endforeach; endif; ?>
</tbody>
</table>
</div>
</section>
<?php endif; ?>
<?php mc_admin_footer(); ?>