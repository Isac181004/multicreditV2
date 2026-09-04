<?php
require_once __DIR__ . '/_init.php';
mc_admin_require_login();
$site = mc_site();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    mc_csrf_check();
    $fields = ['footer_interest_title','footer_tagline','footer_since','copyright_year','email',
        'address1','address2','address3','address4','telefono','phone2','phone3','phone4',
        'whatsapp1','whatsapp2','whatsapp3','whatsapp4'];
    foreach ($fields as $field) $site[$field] = trim((string)($_POST[$field] ?? ''));

    $linksText = trim((string)($_POST['interest_links'] ?? ''));
    $links = [];
    if ($linksText !== '') {
        foreach (preg_split('/\R+/', $linksText) as $line) {
            $parts = array_map('trim', explode('|', $line, 2));
            if (($parts[0] ?? '') === '' || ($parts[1] ?? '') === '') continue;
            $links[] = ['label'=>$parts[0], 'url'=>$parts[1]];
        }
    }
    $site['interest_links'] = $links;

    if (mc_write_json(MC_DATA_DIR . '/site.json', $site)) {
        mc_flash('success', 'Pie de página actualizado correctamente.');
        header('Location: pie.php');
        exit;
    }
    $error = 'No se pudo guardar la configuración del pie de página.';
}

$interestLines = [];
foreach ((array)($site['interest_links'] ?? []) as $link) {
    if (!is_array($link)) continue;
    $interestLines[] = trim((string)($link['label'] ?? '')) . '|' . trim((string)($link['url'] ?? ''));
}
mc_admin_header('Pie de página');
?>
<?php if ($error): ?><div class="alert error"><?=mc_h($error)?></div><?php endif; ?>
<form method="post">
<input type="hidden" name="csrf" value="<?=mc_h(mc_csrf_token())?>">
<section class="card" style="margin-bottom:18px">
  <h2>Contenido institucional</h2>
  <div class="form-grid">
    <div class="field"><label>Título de sitios de interés</label><input name="footer_interest_title" value="<?=mc_h($site['footer_interest_title'] ?? 'Sitios de interés')?>"></div>
    <div class="field"><label>Año copyright</label><input name="copyright_year" value="<?=mc_h($site['copyright_year'] ?? date('Y'))?>"></div>
    <div class="field full"><label>Frase principal</label><input name="footer_tagline" value="<?=mc_h($site['footer_tagline'] ?? '')?>"></div>
    <div class="field full"><label>Texto de trayectoria</label><input name="footer_since" value="<?=mc_h($site['footer_since'] ?? '')?>"></div>
    <div class="field full"><label>Sitios de interés</label><textarea name="interest_links" rows="8" spellcheck="false" placeholder="SBS|https://www.sbs.gob.pe/&#10;SUNAT|https://www.sunat.gob.pe/"><?=mc_h(implode("\n", $interestLines))?></textarea><p class="help">Una línea por enlace: NOMBRE|URL</p></div>
  </div>
</section>

<section class="card" style="margin-bottom:18px">
  <h2>Sedes y contacto</h2>
  <div class="form-grid">
    <div class="field full"><label>Correo institucional</label><input type="email" name="email" value="<?=mc_h($site['email'] ?? '')?>"></div>
    <?php for($i=1;$i<=4;$i++):
      $phoneKey = $i===1 ? 'telefono' : 'phone'.$i;
      $waKey = 'whatsapp'.$i;
    ?>
      <div class="field full" style="padding-top:10px;border-top:1px solid #edf1ee"><strong>Sede <?=$i?></strong></div>
      <div class="field full"><label>Dirección sede <?=$i?></label><textarea name="address<?=$i?>" rows="2"><?=mc_h($site['address'.$i] ?? '')?></textarea></div>
      <div class="field"><label>Teléfono sede <?=$i?></label><input name="<?=$phoneKey?>" value="<?=mc_h($site[$phoneKey] ?? '')?>"></div>
      <div class="field"><label>WhatsApp sede <?=$i?> (código país)</label><input name="<?=$waKey?>" value="<?=mc_h($site[$waKey] ?? '')?>"></div>
    <?php endfor; ?>
  </div>
</section>
<div class="actions"><button class="btn primary" type="submit">Guardar pie de página</button><a class="btn orange" href="../index.php#pie-contacto" target="_blank">↗ Ver pie</a></div>
</form>
<?php mc_admin_footer(); ?>
