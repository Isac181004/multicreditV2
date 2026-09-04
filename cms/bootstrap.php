<?php

if (!defined('MC_ROOT')) {
    define('MC_ROOT', dirname(__DIR__));
}
if (!defined('MC_DATA_DIR')) {
    define('MC_DATA_DIR', __DIR__ . '/data');
}

function mc_default_site() {
    return [
        'brand_name' => 'CEPRODEMIC MULTICREDIT',
        'logo' => 'img/logo.jpg',
        'hero_badge' => 'CEPRODEMIC MULTICREDIT',
        'hero_title' => 'Financiamiento rápido para',
        'hero_highlight' => 'hacer crecer tu negocio',
        'hero_subtitle' => 'Más de 15 años impulsando emprendedores y familias en Cajamarca.',
        'hero_image' => 'img/cajamarca.webp',
        'hero_primary_label' => 'Solicitar Crédito',
        'hero_primary_url' => 'https://wa.me/51968782473?text=Hola%2C%20deseo%20solicitar%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito.',
        'hero_secondary_label' => 'Simular Crédito',
        'hero_secondary_url' => 'creditos.php',
        'value_eyebrow' => 'Tu crecimiento es nuestra prioridad',
        'value_title' => 'Una opción crediticia pensada para tus metas',
        'value_text' => 'Promovemos el desarrollo de los pequeños y microempresarios del Perú. Transformamos tus metas en realidades financieras con acompañamiento cercano.',
        'value_image' => 'img/img2.png',
        'final_cta_title' => '¿Listo para dar el siguiente paso?',
        'final_cta_text' => 'Conversa con nuestro equipo y conoce las alternativas de financiamiento.',
        'news_title' => 'Noticias y publicaciones',
        'news_subtitle' => 'Información institucional y comunicados de CEPRODEMIC MULTICREDIT.',
        'news_hero_image' => 'img/cajamarca.webp',

        'address1' => "Jr. Los Naranjos Nro. 513\nUrb. Los Rosales, Cajamarca",
        'address2' => "Jr. Moore Nro. 230\nSan Marcos, Cajamarca",
        'address3' => "Jr. Leoncio Prado Nro. 268\nCajabamba, Cajamarca",
        'address4' => "Jr. Alfonso Ugarte Nro. 920\nHuamachuco, La Libertad",
        'email' => 'informes@ceprodemic.com',
        'telefono' => '968 782 473',
        'phone2' => '976 782 829',
        'phone3' => '976 327 494',
        'phone4' => '993 647 493',
        'whatsapp1' => '51968782473',
        'whatsapp2' => '51976782829',
        'whatsapp3' => '51976327494',
        'whatsapp4' => '51993647493',

        // Compatibilidad con versiones anteriores del panel.
        'address' => "Jr. Los Naranjos Nro. 513\nUrb. Los Rosales, Cajamarca",
        'phone1' => '968 782 473',
        'whatsapp' => '51968782473',

        'footer_tagline' => 'Financiamiento para crecer, oportunidades para avanzar.',
        'footer_since' => 'Desde 2009 acompañando a emprendedores y familias.',
        'copyright_year' => '2026',

        // Encabezado editable.
        'nav_home_label' => 'Inicio',
        'nav_home_url' => 'index.php',
        'nav_credits_label' => 'Créditos',
        'nav_credits_url' => 'creditos.php',
        'nav_services_label' => 'Servicios',
        'nav_services_url' => 'servicios.php',
        'nav_about_label' => 'Nosotros',
        'nav_about_url' => 'conocenos.php',
        'nav_contact_label' => 'Contacto',
        'nav_contact_url' => 'contacto.php',
        'header_cta_label' => 'Solicitar crédito',
        'header_cta_url' => 'https://wa.me/51968782473?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito.',
        'credit_mega_title' => 'Encuentra el crédito ideal para ti',
        'credit_mega_subtitle' => 'Soluciones para impulsar tu negocio y cumplir tus objetivos.',
        'credit_mega_all_label' => 'Ver todos los créditos',
        'credit_mega_all_url' => 'creditos.php',
        'credit_micro_title' => 'Crédito Microempresa',
        'credit_consumo_title' => 'Crédito Consumo',

        'credit_ordinario_label' => 'Crédito Ordinario',
        'credit_ordinario_desc' => 'Capital flexible para tu negocio.',
        'credit_ordinario_url' => 'credito-ordinario.php',
        'credit_diario_label' => 'Crédito Diario',
        'credit_diario_desc' => 'Cuotas adaptadas al flujo diario.',
        'credit_diario_url' => 'credito-diario.php',
        'credit_empeno_label' => 'Crediempeño',
        'credit_empeno_desc' => 'Liquidez con respaldo prendario.',
        'credit_empeno_url' => 'crediempeno.php',
        'credit_moto_label' => 'Credimoto',
        'credit_moto_desc' => 'Financia la moto que necesitas.',
        'credit_moto_url' => 'credimoto.php',
        'credit_grupal_label' => 'Crédito Grupal',
        'credit_grupal_desc' => 'Bancos comunales y grupos solidarios.',
        'credit_grupal_url' => 'credito-grupal.php',
        'credit_educacion_label' => 'Educación',
        'credit_educacion_desc' => 'Invierte en estudios y capacitación.',
        'credit_educacion_url' => 'educacion.php',
        'credit_salud_label' => 'Salud',
        'credit_salud_desc' => 'Respaldo para cuidar a tu familia.',
        'credit_salud_url' => 'salud.php',
        'credit_esparcimiento_label' => 'Esparcimiento',
        'credit_esparcimiento_desc' => 'Haz realidad tus planes personales.',
        'credit_esparcimiento_url' => 'esparcimiento.php',

        // Pie editable.
        'footer_interest_title' => 'Sitios de interés',
        'interest_links' => [
            ['label'=>'SBS','url'=>'https://www.sbs.gob.pe/'],
            ['label'=>'FENACREP','url'=>'https://www.fenacrep.org/es'],
            ['label'=>'SUNARP','url'=>'https://www.sunarp.gob.pe/'],
            ['label'=>'SUNAT','url'=>'https://www.sunat.gob.pe/'],
            ['label'=>'El Peruano','url'=>'https://elperuano.pe/'],
            ['label'=>'RENIEC','url'=>'https://www.reniec.gob.pe/'],
            ['label'=>'Experian','url'=>'https://www.experian.com.pe/'],
        ],
    ];
}

function mc_default_news() {
    return [
        [
            'id' => 'asamblea-2026',
            'title' => 'Convocatoria Asamblea General Ordinaria de Socios',
            'category' => 'Institucional',
            'date' => '2026-03-01',
            'summary' => 'Comunicado institucional dirigido a los socios. Para consultar agenda, documentación y condiciones de participación, comunícate directamente con nuestro equipo.',
            'body' => 'Comunicado institucional dirigido a los socios. Para consultar agenda, documentación y condiciones de participación, comunícate directamente con nuestro equipo.',
            'image' => 'img/target6.webp',
            'published' => true,
            'created_at' => '2026-03-01 09:00:00',
            'updated_at' => '2026-03-01 09:00:00',
        ],
        [
            'id' => 'asamblea-2025',
            'title' => 'Convocatoria Asamblea General Ordinaria de Socios',
            'category' => 'Institucional',
            'date' => '2025-03-01',
            'summary' => 'Publicación histórica de convocatoria institucional. La información oficial y sus documentos relacionados pueden solicitarse en nuestros canales de atención.',
            'body' => 'Publicación histórica de convocatoria institucional. La información oficial y sus documentos relacionados pueden solicitarse en nuestros canales de atención.',
            'image' => 'img/target5.webp',
            'published' => true,
            'created_at' => '2025-03-01 09:00:00',
            'updated_at' => '2025-03-01 09:00:00',
        ],
        [
            'id' => 'asamblea-2024',
            'title' => 'Convocatoria Asamblea General Extraordinaria',
            'category' => 'Comunidad',
            'date' => '2024-09-01',
            'summary' => 'Registro de comunicación institucional extraordinaria. Para verificar documentación o solicitar una copia, utiliza el formulario de contacto.',
            'body' => 'Registro de comunicación institucional extraordinaria. Para verificar documentación o solicitar una copia, utiliza el formulario de contacto.',
            'image' => 'img/cajamarca.webp',
            'published' => true,
            'created_at' => '2024-09-01 09:00:00',
            'updated_at' => '2024-09-01 09:00:00',
        ],
    ];
}

function mc_read_json($file, $default = []) {
    if (!is_file($file)) return $default;
    $raw = @file_get_contents($file);
    if ($raw === false || trim($raw) === '') return $default;
    $data = json_decode($raw, true);
    return is_array($data) ? $data : $default;
}

function mc_write_json($file, $data) {
    if (!is_dir(dirname($file))) @mkdir(dirname($file), 0775, true);
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if ($json === false) return false;
    $tmp = $file . '.tmp';
    if (@file_put_contents($tmp, $json . PHP_EOL, LOCK_EX) === false) return false;
    return @rename($tmp, $file);
}

function mc_site() {
    $defaults = mc_default_site();
    $stored = mc_read_json(MC_DATA_DIR . '/site.json', []);
    return array_replace_recursive($defaults, $stored);
}

function mc_news($publishedOnly = false) {
    $items = mc_read_json(MC_DATA_DIR . '/news.json', mc_default_news());
    if ($publishedOnly) {
        $items = array_values(array_filter($items, function($n){ return !empty($n['published']); }));
    }
    usort($items, function($a, $b) {
        return strcmp((string)($b['date'] ?? ''), (string)($a['date'] ?? ''));
    });
    return $items;
}

function mc_h($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function mc_nl2br($value) {
    return nl2br(mc_h($value));
}

function mc_month_label($date) {
    $months = [1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6=>'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre'];
    $ts = strtotime((string)$date);
    if (!$ts) return '';
    return ($months[(int)date('n',$ts)] ?? '') . ' ' . date('Y',$ts);
}

function mc_safe_local_path($relative) {
    $relative = str_replace('\\','/', trim((string)$relative));
    $relative = ltrim($relative, '/');
    if ($relative === '' || strpos($relative, '..') !== false) return '';
    return $relative;
}

function mc_default_page_config() {
    return [
        'enabled' => false,
        'display_name' => '',
        'browser_title' => '',
        'heading' => '',
        'subtitle' => '',
        'hero_image' => '',
        'hero_selector' => '',
        'heading_selector' => 'main h1',
        'subtitle_selector' => '',
        'replace_main' => false,
        'target_selector' => 'main',
        'body_html' => '',
        'custom_css' => '',
    ];
}

function mc_pages() {
    return mc_read_json(MC_DATA_DIR . '/pages.json', []);
}

function mc_write_pages($pages) {
    return mc_write_json(MC_DATA_DIR . '/pages.json', is_array($pages) ? $pages : []);
}

function mc_page_config($module) {
    $module = basename((string)$module);
    $pages = mc_pages();
    $stored = isset($pages[$module]) && is_array($pages[$module]) ? $pages[$module] : [];
    return array_merge(mc_default_page_config(), $stored);
}

function mc_current_module() {
    $script = (string)($_SERVER['SCRIPT_NAME'] ?? '');
    return basename($script ?: 'index.php');
}

function mc_sanitize_admin_html($html) {
    $html = trim((string)$html);
    if ($html === '') return '';
    $allowed = '<div><section><article><header><footer><main><aside><nav><h1><h2><h3><h4><h5><h6><p><span><strong><b><em><i><u><small><br><hr><ul><ol><li><a><img><figure><figcaption><blockquote><table><thead><tbody><tfoot><tr><th><td><button>';
    $html = strip_tags($html, $allowed);

    if (!class_exists('DOMDocument')) {
        $html = preg_replace('/\son[a-z]+\s*=\s*(["\']).*?\1/iu', '', $html);
        $html = preg_replace('/javascript\s*:/iu', '', $html);
        return $html;
    }

    $doc = new DOMDocument('1.0', 'UTF-8');
    $previous = libxml_use_internal_errors(true);
    $doc->loadHTML('<?xml encoding="UTF-8"><div id="mc-root">'.$html.'</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    libxml_use_internal_errors($previous);

    $xpath = new DOMXPath($doc);
    foreach ($xpath->query('//*[@*]') as $node) {
        if (!$node instanceof DOMElement) continue;
        $remove = [];
        foreach ($node->attributes as $attr) {
            $name = strtolower($attr->name);
            $value = trim($attr->value);
            if (strpos($name, 'on') === 0 || $name === 'srcdoc') $remove[] = $attr->name;
            if (in_array($name, ['href','src','action','formaction'], true) && preg_match('/^\s*javascript:/i', $value)) $remove[] = $attr->name;
        }
        foreach (array_unique($remove) as $name) $node->removeAttribute($name);
        if ($node->tagName === 'a') {
            $target = $node->getAttribute('target');
            if ($target === '_blank') $node->setAttribute('rel', 'noopener noreferrer');
        }
    }

    $root = $doc->getElementById('mc-root');
    if (!$root) return $html;
    $out = '';
    foreach ($root->childNodes as $child) $out .= $doc->saveHTML($child);
    return $out;
}

function mc_render_module_runtime($module = null) {
    $module = $module ? basename((string)$module) : mc_current_module();
    $cfg = mc_page_config($module);
    if (empty($cfg['enabled'])) return;

    $payload = [
        'browserTitle' => (string)$cfg['browser_title'],
        'heading' => (string)$cfg['heading'],
        'subtitle' => (string)$cfg['subtitle'],
        'heroImage' => mc_safe_local_path((string)$cfg['hero_image']),
        'heroSelector' => (string)$cfg['hero_selector'],
        'headingSelector' => (string)$cfg['heading_selector'],
        'subtitleSelector' => (string)$cfg['subtitle_selector'],
        'replaceMain' => !empty($cfg['replace_main']),
        'targetSelector' => (string)$cfg['target_selector'],
        'bodyHtml' => mc_sanitize_admin_html((string)$cfg['body_html']),
    ];

    $css = trim((string)$cfg['custom_css']);
    if ($css !== '') {
        $css = preg_replace('~</?script[^>]*>|</?style[^>]*>~i', '', $css);
        echo "<style id=\"mc-module-custom-css\">\n" . $css . "\n</style>\n";
    }

    echo '<script id="mc-module-runtime">window.MC_MODULE_CONFIG=' . json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . ';document.addEventListener("DOMContentLoaded",function(){var c=window.MC_MODULE_CONFIG||{};function q(sel,fallback){try{return document.querySelector(sel||fallback||"")}catch(e){return null}}if(c.browserTitle)document.title=c.browserTitle;if(c.heading){var h=q(c.headingSelector,"main h1, #contenido-principal h1, h1");if(h)h.textContent=c.heading}if(c.subtitle){var s=q(c.subtitleSelector,".hero-subtitle, .lead, main h1 + p, #contenido-principal h1 + p");if(s)s.textContent=c.subtitle}if(c.heroImage){var hero=q(c.heroSelector,"[data-cms-hero], .hero, .hero-section");if(hero){hero.style.backgroundImage="url("+JSON.stringify(c.heroImage).slice(1,-1)+")";hero.style.backgroundSize="cover";hero.style.backgroundPosition="center"}}if(c.replaceMain&&c.bodyHtml){var target=q(c.targetSelector,"main");if(target)target.innerHTML=c.bodyHtml}});</script>' . "\n";
}

if (!is_file(MC_DATA_DIR . '/site.json')) mc_write_json(MC_DATA_DIR . '/site.json', mc_default_site());
if (!is_file(MC_DATA_DIR . '/news.json')) mc_write_json(MC_DATA_DIR . '/news.json', mc_default_news());
if (!is_file(MC_DATA_DIR . '/pages.json')) mc_write_json(MC_DATA_DIR . '/pages.json', []);
?>
