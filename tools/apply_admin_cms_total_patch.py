from pathlib import Path

p = Path('encabezado.php')
text = p.read_text(encoding='utf-8')
original = text

# URLs globales del encabezado.
text = text.replace('href="creditos.php" class="mc-credit-mega-all"', 'href="<?= mc_h($mcSiteHeader[\'credit_mega_all_url\']) ?>" class="mc-credit-mega-all"')
text = text.replace('href="index.php"', 'href="<?= mc_h($mcSiteHeader[\'nav_home_url\']) ?>"')
text = text.replace('href="creditos.php"', 'href="<?= mc_h($mcSiteHeader[\'nav_credits_url\']) ?>"')
text = text.replace('href="servicios.php"', 'href="<?= mc_h($mcSiteHeader[\'nav_services_url\']) ?>"')
text = text.replace('href="conocenos.php"', 'href="<?= mc_h($mcSiteHeader[\'nav_about_url\']) ?>"')
text = text.replace('href="contacto.php"', 'href="<?= mc_h($mcSiteHeader[\'nav_contact_url\']) ?>"')

# CTA de WhatsApp del encabezado: desktop + mobile.
old_wa = 'href="https://wa.me/51968782473?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."'
text = text.replace(old_wa, 'href="<?= mc_h($mcSiteHeader[\'header_cta_url\']) ?>"')

# Textos de navegación desktop/mobile. Se usan reemplazos delimitados por saltos para no tocar contenido de páginas.
labels = {
    'Inicio': "<?= mc_h($mcSiteHeader['nav_home_label']) ?>",
    'Servicios': "<?= mc_h($mcSiteHeader['nav_services_label']) ?>",
    'Nosotros': "<?= mc_h($mcSiteHeader['nav_about_label']) ?>",
    'Contacto': "<?= mc_h($mcSiteHeader['nav_contact_label']) ?>",
    'Solicitar crédito': "<?= mc_h($mcSiteHeader['header_cta_label']) ?>",
}
for old, new in labels.items():
    text = text.replace('\n                ' + old + '\n', '\n                ' + new + '\n')
    text = text.replace('\n            ' + old + '\n', '\n            ' + new + '\n')

# Texto del trigger Créditos.
text = text.replace(
    '                    Créditos\n\n                    <i class="fas fa-chevron-down"',
    "                    <?= mc_h($mcSiteHeader['nav_credits_label']) ?>\n\n                    <i class=\"fas fa-chevron-down\"",
)

# Mega menú.
text = text.replace('                                    Encuentra el crédito ideal para ti', "                                    <?= mc_h($mcSiteHeader['credit_mega_title']) ?>")
text = text.replace('                                    Soluciones para impulsar tu negocio y cumplir tus objetivos.', "                                    <?= mc_h($mcSiteHeader['credit_mega_subtitle']) ?>")
text = text.replace('                            Ver todos los créditos', "                            <?= mc_h($mcSiteHeader['credit_mega_all_label']) ?>")
text = text.replace('                                Crédito Microempresa', "                                <?= mc_h($mcSiteHeader['credit_micro_title']) ?>")
text = text.replace('                                Crédito Consumo', "                                <?= mc_h($mcSiteHeader['credit_consumo_title']) ?>")

products = {
    'ordinario': ('credito-ordinario.php', 'Crédito Ordinario', 'Capital flexible para tu negocio.'),
    'diario': ('credito-diario.php', 'Crédito Diario', 'Cuotas adaptadas al flujo diario.'),
    'empeno': ('crediempeno.php', 'Crediempeño', 'Liquidez con respaldo prendario.'),
    'moto': ('credimoto.php', 'Credimoto', 'Financia la moto que necesitas.'),
    'grupal': ('credito-grupal.php', 'Crédito Grupal', 'Bancos comunales y grupos solidarios.'),
    'educacion': ('educacion.php', 'Educación', 'Invierte en estudios y capacitación.'),
    'salud': ('salud.php', 'Salud', 'Respaldo para cuidar a tu familia.'),
    'esparcimiento': ('esparcimiento.php', 'Esparcimiento', 'Haz realidad tus planes personales.'),
}
for key, (url, label, desc) in products.items():
    text = text.replace(f'href="{url}" class="mc-credit-card"', f'href="<?= mc_h($mcSiteHeader[\'credit_{key}_url\']) ?>" class="mc-credit-card"')
    text = text.replace(f'<strong>{label}</strong>', f"<strong><?= mc_h($mcSiteHeader['credit_{key}_label']) ?></strong>")
    text = text.replace(f'<small>{desc}</small>', f"<small><?= mc_h($mcSiteHeader['credit_{key}_desc']) ?></small>")

# Login administrativo superpuesto sobre la página actual.
text = text.replace(
    '<a href="admin/login.php">\n                👤\n            </a>',
    '<a href="#admin" data-mc-admin-open aria-label="Abrir administración">\n                👤\n            </a>'
)

# Agregar acceso admin al menú móvil si aún no existe.
mobile_contact = """        <a href=\"<?= mc_h($mcSiteHeader['nav_contact_url']) ?>\">\n\n            <i class=\"fas fa-headset\"></i>\n\n            <?= mc_h($mcSiteHeader['nav_contact_label']) ?>\n\n        </a>\n"""
if mobile_contact in text and 'data-mc-admin-open class="mobile-admin"' not in text:
    text = text.replace(mobile_contact, mobile_contact + """\n        <a href=\"#admin\" data-mc-admin-open class=\"mobile-admin\">\n            <i class=\"fas fa-user-shield\"></i>\n            Administración\n        </a>\n""", 1)

# Cargar modal de login y runtime CMS justo después del encabezado.
needle = '</header>\n\n\n<script>'
replacement = "</header>\n\n<?php require_once __DIR__ . '/admin/login_overlay.php'; mc_render_module_runtime(); ?>\n\n<script>"
if needle in text and "admin/login_overlay.php" not in text:
    text = text.replace(needle, replacement, 1)

if text == original:
    raise SystemExit('No se aplicó ningún cambio a encabezado.php')

p.write_text(text, encoding='utf-8')
print('encabezado.php actualizado')
