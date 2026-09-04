<?php
require_once __DIR__ . '/_init.php';
mc_admin_require_login();

$excluded = ['encabezado.php','encabezado1.php','footer.php'];
$modules = [];
foreach (glob(MC_ROOT . '/*.php') ?: [] as $file) {
    $name = basename($file);
    if (in_array($name, $excluded, true)) continue;
    $modules[] = $name;
}
sort($modules, SORT_NATURAL | SORT_FLAG_CASE);

$selected = basename((string)($_GET['module'] ?? ($modules[0] ?? 'index.php')));
if (!in_array($selected, $modules, true)) $selected = $modules[0] ?? 'index.php';
$pages = mc_pages();
$current = mc_page_config($selected);
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    mc_csrf_check();
    $selected = basename((string)($_POST['module'] ?? $selected));
    if (!in_array($selected, $modules, true)) {
        $error = 'Módulo no válido.';
    } else {
        $cfg = mc_page_config($selected);
        foreach (['display_name','browser_title','heading','subtitle','target_selector','heading_selector','subtitle_selector','hero_selector','body_html','custom_css'] as $field) {
            $cfg[$field] = trim((string)($_POST[$field] ?? ''));
        }
        $cfg['replace_main'] = !empty($_POST['replace_main']);
        $cfg['enabled'] = !empty($_POST['enabled']);

        $upload = mc_upload_image('hero_image', 'modules');
        if (!$upload['ok']) {
            $error = $upload['error'];
        } elseif ($upload['path'] !== '') {
            $cfg['hero_image'] = $upload['path'];
        }

        if ($error === '') {
            $pages[$selected] = $cfg;
            if (mc_write_pages($pages)) {
                mc_flash('success', 'Módulo actualizado. Los cambios se aplican desde el CMS sin modificar el archivo PHP original.');
                header('Location: modulos.php?module=' . urlencode($selected));
                exit;
            }
            $error = 'No se pudo guardar cms/data/pages.json. Verifica permisos de escritura.';
        }
        $current = $cfg;
    }
}

mc_admin_header('Editor por módulos');
?>
<?php if ($error): ?><div class="alert error"><?=mc_h($error)?></div><?php endif; ?>
<div class="grid" style="grid-template-columns:280px minmax(0,1fr);gap:18px;align-items:start">
  <aside class="card" style="position:sticky;top:18px">
    <h2>Módulos</h2>
    <p class="help">Selecciona una página pública. El editor avanzado puede reemplazar solo el contenido central conservando encabezado y pie.</p>
    <div style="display:grid;gap:6px;margin-top:12px;max-height:68vh;overflow:auto">
      <?php foreach ($modules as $module): $label = mc_page_config($module)['display_name'] ?: preg_replace('/[-_]+/',' ',pathinfo($module, PATHINFO_FILENAME)); ?>
        <a href="modulos.php?module=<?=urlencode($module)?>" class="btn <?=$module===$selected?'primary':'light'?>" style="justify-content:flex-start;text-align:left"><?=mc_h(ucwords($label))?><small style="opacity:.65;margin-left:auto"><?=mc_h($module)?></small></a>
      <?php endforeach; ?>
    </div>
  </aside>

  <section class="card">
    <div style="display:flex;justify-content:space-between;gap:12px;align-items:flex-start;flex-wrap:wrap">
      <div><h2 style="margin-bottom:4px"><?=mc_h($selected)?></h2><p class="help">Edición visual y avanzada de este módulo.</p></div>
      <a class="btn orange" href="../<?=mc_h($selected)?>" target="_blank">↗ Ver módulo</a>
    </div>

    <form method="post" enctype="multipart/form-data" style="margin-top:18px">
      <input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
      <input type="hidden" name="module" value="<?=mc_h($selected)?>">

      <div class="form-grid">
        <div class="field"><label><input type="checkbox" name="enabled" value="1" <?=!empty($current['enabled'])?'checked':''?>> Activar personalización CMS</label></div>
        <div class="field"><label><input type="checkbox" name="replace_main" value="1" <?=!empty($current['replace_main'])?'checked':''?>> Reemplazar contenido central con HTML del panel</label></div>
        <div class="field"><label>Nombre visible en el panel</label><input name="display_name" value="<?=mc_h($current['display_name'] ?? '')?>" placeholder="Ej. Crédito Ordinario"></div>
        <div class="field"><label>Título de pestaña del navegador</label><input name="browser_title" value="<?=mc_h($current['browser_title'] ?? '')?>"></div>
        <div class="field full"><label>Título principal / H1</label><input name="heading" value="<?=mc_h($current['heading'] ?? '')?>" placeholder="Vacío = conservar el actual"></div>
        <div class="field full"><label>Subtítulo / introducción</label><textarea name="subtitle" rows="3" placeholder="Vacío = conservar el actual"><?=mc_h($current['subtitle'] ?? '')?></textarea></div>
        <div class="field"><label>Imagen principal / hero</label><input type="file" name="hero_image" accept="image/*"><?php if(!empty($current['hero_image'])):?><img class="preview-img" style="display:block;margin-top:8px;max-height:140px" src="../<?=mc_h($current['hero_image'])?>"><?php endif;?></div>
        <div class="field"><label>Selector CSS de hero</label><input name="hero_selector" value="<?=mc_h($current['hero_selector'] ?? '')?>" placeholder=".hero, .hero-section"></div>
        <div class="field"><label>Selector del contenido central</label><input name="target_selector" value="<?=mc_h($current['target_selector'] ?? 'main')?>" placeholder="main"></div>
        <div class="field"><label>Selector del título</label><input name="heading_selector" value="<?=mc_h($current['heading_selector'] ?? 'main h1')?>" placeholder="main h1"></div>
        <div class="field full"><label>Selector del subtítulo</label><input name="subtitle_selector" value="<?=mc_h($current['subtitle_selector'] ?? '')?>" placeholder=".hero-subtitle o main h1 + p"></div>
        <div class="field full"><label>HTML del contenido central</label><textarea name="body_html" rows="18" spellcheck="false" style="font-family:Consolas,monospace" placeholder="Activa 'Reemplazar contenido central' para usar este HTML."><?=mc_h($current['body_html'] ?? '')?></textarea><p class="help">Se permiten etiquetas de contenido y diseño; scripts y atributos peligrosos se eliminan antes de mostrarse al público.</p></div>
        <div class="field full"><label>CSS personalizado del módulo</label><textarea name="custom_css" rows="10" spellcheck="false" style="font-family:Consolas,monospace" placeholder="CSS opcional solo para este módulo"><?=mc_h($current['custom_css'] ?? '')?></textarea></div>
      </div>

      <div class="actions" style="margin-top:18px"><button class="btn primary" type="submit">Guardar módulo</button><a class="btn light" href="../<?=mc_h($selected)?>" target="_blank">Vista previa</a></div>
    </form>
  </section>
</div>
<style>@media(max-width:900px){.grid[style*="280px"]{grid-template-columns:1fr!important}.grid[style*="280px"] aside{position:static!important}}</style>
<?php mc_admin_footer(); ?>
