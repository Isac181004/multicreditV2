<?php
require_once __DIR__ . '/_init.php';
require_once dirname(__DIR__) . '/cms/module_editor_schema.php';
mc_admin_require_login();

$preferredModules = [
    'index.php',
    'creditos.php',
    'credito-ordinario.php',
    'credito-diario.php',
    'crediempeno.php',
    'credimoto.php',
    'credito-grupal.php',
    'bancos-comunales.php',
    'grupos-solidarios.php',
    'educacion.php',
    'salud.php',
    'esparcimiento.php',
    'servicios.php',
    'conocenos.php',
    'contacto.php',
    'microcredito.php',
    'noticias.php',
    'noticia.php',
    'informacion-legal.php',
];

$modules = [];
foreach ($preferredModules as $name) {
    if (is_file(MC_ROOT . '/' . $name)) $modules[] = $name;
}

$selected = basename((string)($_GET['module'] ?? ($modules[0] ?? 'index.php')));
if (!in_array($selected, $modules, true)) $selected = $modules[0] ?? 'index.php';

$pages = mc_pages();
$current = mc_page_config($selected);
$schema = mc_module_editor_schema($selected);
$error = '';

function mc_module_editor_safe_url($value) {
    $value = trim((string)$value);
    if ($value === '') return '';
    if (preg_match('/^\s*(?:javascript|data|vbscript)\s*:/i', $value)) return '';
    return $value;
}

function mc_module_editor_value($current, $key) {
    $structured = isset($current['structured']) && is_array($current['structured']) ? $current['structured'] : [];
    return isset($structured[$key]) ? (string)$structured[$key] : '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    mc_csrf_check();
    $selected = basename((string)($_POST['module'] ?? $selected));

    if (!in_array($selected, $modules, true)) {
        $error = 'Módulo no válido.';
    } else {
        $schema = mc_module_editor_schema($selected);
        if (!empty($schema['redirect'])) {
            header('Location: ' . $schema['redirect']);
            exit;
        }

        $cfg = mc_page_config($selected);
        $fields = mc_module_editor_fields($schema);
        $structured = isset($cfg['structured']) && is_array($cfg['structured']) ? $cfg['structured'] : [];

        $cfg['enabled'] = !empty($_POST['enabled']);
        $cfg['display_name'] = trim((string)($_POST['display_name'] ?? ($schema['label'] ?? '')));
        $cfg['browser_title'] = trim((string)($_POST['browser_title'] ?? ''));
        $cfg['custom_css'] = trim((string)($_POST['custom_css'] ?? ''));

        // Desactiva el antiguo reemplazo genérico para evitar que compita con
        // los controles específicos del módulo.
        $cfg['heading'] = '';
        $cfg['subtitle'] = '';
        $cfg['hero_image'] = '';
        $cfg['hero_selector'] = '';
        $cfg['heading_selector'] = 'main h1';
        $cfg['subtitle_selector'] = '';
        $cfg['replace_main'] = false;
        $cfg['target_selector'] = 'main';
        $cfg['body_html'] = '';

        foreach ($fields as $key => $field) {
            $type = (string)($field['type'] ?? 'text');
            $input = 'sf_' . $key;

            if ($type === 'image') {
                if (!empty($_POST['clear_' . $key])) {
                    unset($structured[$key]);
                    continue;
                }
                $upload = mc_upload_image($input, 'modules');
                if (!$upload['ok']) {
                    $error = $field['label'] . ': ' . $upload['error'];
                    break;
                }
                if ($upload['path'] !== '') $structured[$key] = $upload['path'];
                continue;
            }

            if ($type === 'color') {
                if (empty($_POST['use_' . $key])) {
                    unset($structured[$key]);
                    continue;
                }
                $value = trim((string)($_POST[$input] ?? ''));
                if (!preg_match('/^#[0-9a-fA-F]{6}$/', $value)) {
                    $error = 'El color "' . $field['label'] . '" no es válido.';
                    break;
                }
                $structured[$key] = strtolower($value);
                continue;
            }

            $value = trim((string)($_POST[$input] ?? ''));
            if ($type === 'url') {
                $safe = mc_module_editor_safe_url($value);
                if ($value !== '' && $safe === '') {
                    $error = 'El enlace "' . $field['label'] . '" no es válido.';
                    break;
                }
                $value = $safe;
            }

            if ($value === '') unset($structured[$key]);
            else $structured[$key] = $value;
        }

        if ($error === '') {
            $cfg['structured'] = $structured;
            $pages[$selected] = $cfg;
            if (mc_write_pages($pages)) {
                mc_flash('success', 'Módulo actualizado con su editor específico. Los cambios se aplican sin modificar el PHP original.');
                header('Location: modulos.php?module=' . urlencode($selected));
                exit;
            }
            $error = 'No se pudo guardar cms/data/pages.json. Verifica permisos de escritura.';
        }

        $current = $cfg;
    }
}

$schema = mc_module_editor_schema($selected);
$current = mc_page_config($selected);
$hasStoredModule = isset($pages[$selected]) && is_array($pages[$selected]);
$structured = isset($current['structured']) && is_array($current['structured']) ? $current['structured'] : [];

function mc_render_specific_field($field, $structured) {
    $key = (string)$field['key'];
    $type = (string)($field['type'] ?? 'text');
    $label = (string)($field['label'] ?? $key);
    $help = trim((string)($field['help'] ?? ''));
    $placeholder = (string)($field['placeholder'] ?? '');
    $value = isset($structured[$key]) ? (string)$structured[$key] : '';
    $name = 'sf_' . $key;
    $full = in_array($type, ['textarea','image'], true) ? ' full' : '';
    ?>
    <div class="field mc-specific-field<?=$full?>">
        <label><?=mc_h($label)?></label>
        <?php if ($type === 'textarea'): ?>
            <textarea name="<?=mc_h($name)?>" rows="4" placeholder="<?=mc_h($placeholder)?>"><?=mc_h($value)?></textarea>
        <?php elseif ($type === 'image'): ?>
            <div class="mc-image-field">
                <input type="file" name="<?=mc_h($name)?>" accept="image/jpeg,image/png,image/webp,image/gif">
                <?php if ($value !== ''): ?>
                    <div class="mc-current-image">
                        <img src="../<?=mc_h($value)?>" alt="Vista previa">
                        <label class="mc-clear-check"><input type="checkbox" name="clear_<?=mc_h($key)?>" value="1"> Restaurar imagen original del módulo</label>
                    </div>
                <?php else: ?>
                    <p class="help">No hay una imagen personalizada: se conserva la que ya tiene esta página.</p>
                <?php endif; ?>
            </div>
        <?php elseif ($type === 'color'): 
            $default = (string)($field['default'] ?? '#0d5c2e');
            $pickerValue = preg_match('/^#[0-9a-fA-F]{6}$/', $value) ? $value : $default;
        ?>
            <div class="mc-color-row">
                <input type="color" name="<?=mc_h($name)?>" value="<?=mc_h($pickerValue)?>">
                <code><?=mc_h($pickerValue)?></code>
                <label class="mc-color-use"><input type="checkbox" name="use_<?=mc_h($key)?>" value="1" <?=$value!==''?'checked':''?>> Usar este color</label>
            </div>
        <?php else: ?>
            <input type="<?= $type === 'url' ? 'text' : 'text' ?>" name="<?=mc_h($name)?>" value="<?=mc_h($value)?>" placeholder="<?=mc_h($placeholder)?>" <?= $type === 'url' ? 'inputmode="url"' : '' ?>>
        <?php endif; ?>
        <?php if ($help !== ''): ?><p class="help"><?=mc_h($help)?></p><?php endif; ?>
        <?php if ($type !== 'image' && $type !== 'color'): ?><p class="mc-original-note">Déjalo vacío para conservar el contenido original de la página.</p><?php endif; ?>
    </div>
    <?php
}

mc_admin_header('Editor por módulos');
?>
<style>
.mc-module-layout{display:grid;grid-template-columns:300px minmax(0,1fr);gap:18px;align-items:start}.mc-module-list{display:grid;gap:7px;margin-top:14px;max-height:72vh;overflow:auto;padding-right:3px}.mc-module-link{display:flex!important;align-items:center;gap:9px;justify-content:flex-start!important;text-align:left!important}.mc-module-link small{opacity:.62;margin-left:auto;font-size:10px}.mc-module-kind{display:inline-flex;align-items:center;background:#edf7f0;color:#0d5c2e;border:1px solid #d9ebdf;border-radius:999px;padding:5px 9px;font-size:11px;font-weight:800;margin-top:7px}.mc-editor-head{display:flex;justify-content:space-between;gap:16px;align-items:flex-start;flex-wrap:wrap}.mc-editor-description{max-width:760px}.mc-module-group{border:1px solid #e1e9e4;border-radius:18px;padding:20px;margin-top:16px;background:linear-gradient(180deg,#fff,#fbfcfb)}.mc-module-group h3{margin:0;color:#173322;font-size:17px}.mc-module-group-desc{font-size:12px;color:#758078;margin:5px 0 0}.mc-module-group .form-grid{margin-top:16px}.mc-specific-field{padding:2px 0}.mc-original-note{font-size:11px;color:#9aa39d;margin-top:5px}.mc-image-field input[type=file]{width:100%}.mc-current-image{display:grid;grid-template-columns:minmax(150px,230px) 1fr;gap:14px;align-items:center;margin-top:10px}.mc-current-image img{display:block;width:100%;height:130px;object-fit:cover;border-radius:12px;border:1px solid #dce5df;background:#f4f6f5}.mc-clear-check{font-size:12px!important;font-weight:700!important;color:#6e7771!important}.mc-color-row{display:flex;align-items:center;gap:10px;flex-wrap:wrap}.mc-color-row input[type=color]{width:54px;height:42px;padding:2px;border:1px solid #dce4df;border-radius:9px;background:#fff}.mc-color-row code{background:#f1f4f2;padding:7px 9px;border-radius:8px}.mc-color-use{font-size:12px!important;margin-left:auto}.mc-module-switch{display:flex;align-items:center;gap:10px;padding:14px 16px;border:1px solid #dce7df;background:#f5faf7;border-radius:14px;font-weight:800;color:#173322}.mc-module-switch input{width:18px;height:18px}.mc-advanced{margin-top:18px;border:1px dashed #ccd8d0;border-radius:16px;padding:14px}.mc-advanced summary{cursor:pointer;font-weight:800;color:#526159}.mc-dedicated{padding:34px;text-align:center;border:1px solid #dce8e0;background:#f6fbf8;border-radius:18px;margin-top:18px}.mc-dedicated h3{font-size:22px;color:#173322;margin:0}.mc-dedicated p{max-width:650px;margin:10px auto 18px;color:#66736b}.mc-sticky-actions{position:sticky;bottom:10px;z-index:10;margin-top:20px;padding:12px;background:rgba(255,255,255,.94);border:1px solid #e0e7e2;border-radius:14px;box-shadow:0 10px 30px rgba(18,55,31,.10);backdrop-filter:blur(10px)}
@media(max-width:950px){.mc-module-layout{grid-template-columns:1fr}.mc-module-layout aside{position:static!important}.mc-module-list{max-height:320px}.mc-current-image{grid-template-columns:1fr}.mc-color-use{margin-left:0}}
</style>

<?php if ($error): ?><div class="alert error"><?=mc_h($error)?></div><?php endif; ?>

<div class="mc-module-layout">
    <aside class="card" style="position:sticky;top:18px">
        <h2>Páginas del sitio</h2>
        <p class="help">Cada página tiene ahora controles propios según los elementos que realmente contiene.</p>
        <div class="mc-module-list">
            <?php foreach ($modules as $module):
                $moduleSchema = mc_module_editor_schema($module);
                $label = trim((string)(mc_page_config($module)['display_name'] ?? '')) ?: (string)($moduleSchema['label'] ?? pathinfo($module, PATHINFO_FILENAME));
            ?>
                <a href="modulos.php?module=<?=urlencode($module)?>" class="btn mc-module-link <?=$module===$selected?'primary':'light'?>">
                    <span><?=mc_h($label)?></span><small><?=mc_h($module)?></small>
                </a>
            <?php endforeach; ?>
        </div>
    </aside>

    <section class="card">
        <div class="mc-editor-head">
            <div class="mc-editor-description">
                <h2 style="margin-bottom:2px"><?=mc_h($schema['label'] ?? $selected)?></h2>
                <span class="mc-module-kind"><?=mc_h($schema['kind'] ?? 'Página pública')?></span>
                <p class="help" style="margin-top:10px"><?=mc_h($schema['description'] ?? '')?></p>
            </div>
            <a class="btn orange" href="../<?=mc_h($selected)?>" target="_blank">↗ Ver módulo</a>
        </div>

        <?php if (!empty($schema['redirect'])): ?>
            <div class="mc-dedicated">
                <h3>Este módulo tiene un editor dedicado</h3>
                <p>Inicio contiene componentes propios que ya se administran en su pantalla especializada. Así evitamos mostrar controles que no corresponden a su diseño.</p>
                <a class="btn primary" href="<?=mc_h($schema['redirect'])?>">Abrir editor de Inicio</a>
            </div>
        <?php else: ?>
            <form method="post" enctype="multipart/form-data" style="margin-top:18px">
                <input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
                <input type="hidden" name="module" value="<?=mc_h($selected)?>">

                <label class="mc-module-switch">
                    <input type="checkbox" name="enabled" value="1" <?=(!$hasStoredModule || !empty($current['enabled']))?'checked':''?>>
                    <span>Aplicar las personalizaciones de este módulo</span>
                </label>

                <?php foreach ((array)($schema['groups'] ?? []) as $group): ?>
                    <section class="mc-module-group">
                        <h3><?=mc_h($group['title'] ?? 'Sección')?></h3>
                        <?php if (!empty($group['description'])): ?><p class="mc-module-group-desc"><?=mc_h($group['description'])?></p><?php endif; ?>
                        <div class="form-grid">
                            <?php foreach ((array)($group['fields'] ?? []) as $field) mc_render_specific_field($field, $structured); ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <details class="mc-advanced">
                    <summary>Opciones avanzadas de este módulo</summary>
                    <div class="form-grid" style="margin-top:15px">
                        <div class="field"><label>Nombre visible en administración</label><input name="display_name" value="<?=mc_h($current['display_name'] ?? '')?>" placeholder="<?=mc_h($schema['label'] ?? '')?>"></div>
                        <div class="field"><label>Título de pestaña del navegador</label><input name="browser_title" value="<?=mc_h($current['browser_title'] ?? '')?>" placeholder="Vacío = conservar el actual"></div>
                        <div class="field full"><label>CSS adicional solo para este módulo</label><textarea name="custom_css" rows="7" spellcheck="false" style="font-family:Consolas,monospace" placeholder="Opcional: ajustes de diseño muy específicos"><?=mc_h($current['custom_css'] ?? '')?></textarea><p class="help">No necesitas escribir CSS para usar los controles de colores e imágenes de arriba.</p></div>
                    </div>
                </details>

                <div class="mc-sticky-actions actions">
                    <button class="btn primary" type="submit">Guardar cambios de <?=mc_h($schema['label'] ?? $selected)?></button>
                    <a class="btn light" href="../<?=mc_h($selected)?>" target="_blank">Vista previa</a>
                </div>
            </form>
        <?php endif; ?>
    </section>
</div>
<?php mc_admin_footer(); ?>
