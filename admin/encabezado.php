<?php
require_once __DIR__ . '/_init.php';
mc_admin_require_login();
$site = mc_site();
$error = '';

$fields = [
    'brand_name','nav_home_label','nav_home_url','nav_credits_label','nav_credits_url','nav_services_label','nav_services_url',
    'nav_about_label','nav_about_url','nav_contact_label','nav_contact_url','header_cta_label','header_cta_url',
    'credit_mega_title','credit_mega_subtitle','credit_mega_all_label','credit_mega_all_url',
    'credit_micro_title','credit_consumo_title',
    'credit_ordinario_label','credit_ordinario_desc','credit_ordinario_url',
    'credit_diario_label','credit_diario_desc','credit_diario_url',
    'credit_empeno_label','credit_empeno_desc','credit_empeno_url',
    'credit_moto_label','credit_moto_desc','credit_moto_url',
    'credit_grupal_label','credit_grupal_desc','credit_grupal_url',
    'credit_educacion_label','credit_educacion_desc','credit_educacion_url',
    'credit_salud_label','credit_salud_desc','credit_salud_url',
    'credit_esparcimiento_label','credit_esparcimiento_desc','credit_esparcimiento_url'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    mc_csrf_check();
    foreach ($fields as $field) {
        if (array_key_exists($field, $_POST)) $site[$field] = trim((string)$_POST[$field]);
    }
    $upload = mc_upload_image('logo', 'logo');
    if (!$upload['ok']) $error = $upload['error'];
    elseif ($upload['path'] !== '') $site['logo'] = $upload['path'];

    if ($error === '') {
        if (mc_write_json(MC_DATA_DIR . '/site.json', $site)) {
            mc_flash('success', 'Encabezado actualizado correctamente.');
            header('Location: encabezado.php');
            exit;
        }
        $error = 'No se pudo guardar la configuración del encabezado.';
    }
}

mc_admin_header('Encabezado');
?>
<?php if ($error): ?><div class="alert error"><?=mc_h($error)?></div><?php endif; ?>
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
<section class="card" style="margin-bottom:18px">
  <h2>Identidad y navegación</h2>
  <div class="form-grid">
    <div class="field"><label>Nombre institucional</label><input name="brand_name" value="<?=mc_h($site['brand_name'])?>"></div>
    <div class="field"><label>Logo</label><input type="file" name="logo" accept="image/*"><?php if(!empty($site['logo'])):?><img class="preview-img" style="display:block;margin-top:8px;max-height:100px" src="../<?=mc_h($site['logo'])?>"><?php endif;?></div>
    <?php
    $navs = [
      ['home','Inicio'],['credits','Créditos'],['services','Servicios'],['about','Nosotros'],['contact','Contacto']
    ];
    foreach($navs as [$key,$fallback]): ?>
      <div class="field"><label>Texto <?=mc_h($fallback)?></label><input name="nav_<?=$key?>_label" value="<?=mc_h($site['nav_'.$key.'_label'] ?? $fallback)?>"></div>
      <div class="field"><label>Enlace <?=mc_h($fallback)?></label><input name="nav_<?=$key?>_url" value="<?=mc_h($site['nav_'.$key.'_url'] ?? '')?>"></div>
    <?php endforeach; ?>
    <div class="field"><label>Botón destacado</label><input name="header_cta_label" value="<?=mc_h($site['header_cta_label'] ?? 'Solicitar crédito')?>"></div>
    <div class="field"><label>Enlace botón destacado</label><input name="header_cta_url" value="<?=mc_h($site['header_cta_url'] ?? '')?>"></div>
  </div>
</section>

<section class="card" style="margin-bottom:18px">
  <h2>Menú desplegable de créditos</h2>
  <div class="form-grid">
    <div class="field"><label>Título del mega menú</label><input name="credit_mega_title" value="<?=mc_h($site['credit_mega_title'] ?? '')?>"></div>
    <div class="field"><label>Subtítulo</label><input name="credit_mega_subtitle" value="<?=mc_h($site['credit_mega_subtitle'] ?? '')?>"></div>
    <div class="field"><label>Texto “Ver todos”</label><input name="credit_mega_all_label" value="<?=mc_h($site['credit_mega_all_label'] ?? '')?>"></div>
    <div class="field"><label>Enlace “Ver todos”</label><input name="credit_mega_all_url" value="<?=mc_h($site['credit_mega_all_url'] ?? 'creditos.php')?>"></div>
    <div class="field"><label>Título grupo Microempresa</label><input name="credit_micro_title" value="<?=mc_h($site['credit_micro_title'] ?? 'Crédito Microempresa')?>"></div>
    <div class="field"><label>Título grupo Consumo</label><input name="credit_consumo_title" value="<?=mc_h($site['credit_consumo_title'] ?? 'Crédito Consumo')?>"></div>
  </div>
  <?php
  $products = [
    'ordinario'=>'Crédito Ordinario','diario'=>'Crédito Diario','empeno'=>'Crediempeño','moto'=>'Credimoto','grupal'=>'Crédito Grupal',
    'educacion'=>'Educación','salud'=>'Salud','esparcimiento'=>'Esparcimiento'
  ];
  foreach($products as $key=>$fallback): ?>
    <div style="margin-top:14px;padding:14px;border:1px solid #e3ebe5;border-radius:12px">
      <strong><?=mc_h($fallback)?></strong>
      <div class="form-grid" style="margin-top:10px">
        <div class="field"><label>Nombre</label><input name="credit_<?=$key?>_label" value="<?=mc_h($site['credit_'.$key.'_label'] ?? $fallback)?>"></div>
        <div class="field"><label>Enlace</label><input name="credit_<?=$key?>_url" value="<?=mc_h($site['credit_'.$key.'_url'] ?? '')?>"></div>
        <div class="field full"><label>Descripción corta</label><input name="credit_<?=$key?>_desc" value="<?=mc_h($site['credit_'.$key.'_desc'] ?? '')?>"></div>
      </div>
    </div>
  <?php endforeach; ?>
</section>

<div class="actions"><button class="btn primary" type="submit">Guardar encabezado</button><a class="btn orange" href="../index.php" target="_blank">↗ Ver sitio</a></div>
</form>
<?php mc_admin_footer(); ?>
