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
        'address1' => 'Jr. Los Naranjos Nro. 513\nUrb. Los Rosales, Cajamarca',
        'address2' => 'Jr. Moore Nro. 230\San Marcos, Cajamarca',
        'address3' => 'Jr. Leoncio Prado Nro. 268\Cajabamba, Cajamarca',
        'address4' => 'Jr. Alfonso Ugarte Nro. 920\Huamachuco, La Libertad',
        'email' => 'informes@ceprodemic.com',
        'telefono' => '968 782 473',
        'phone2' => '976 782 829',
        'phone3' => '976 327 494',
        'phone4' => '993 647 493',
        'whatsapp1' => '51968782473',
        'whatsapp2' => '51976782829',
        'whatsapp3' => '51976327494',
        'whatsapp4' => '51993647493',
        'footer_tagline' => 'Financiamiento para crecer, oportunidades para avanzar.',
        'footer_since' => 'Desde 2009 acompañando a emprendedores y familias.',
        'copyright_year' => '2026',
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
    return array_merge($defaults, $stored);
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


if (!is_file(MC_DATA_DIR . '/site.json')) mc_write_json(MC_DATA_DIR . '/site.json', mc_default_site());
if (!is_file(MC_DATA_DIR . '/news.json')) mc_write_json(MC_DATA_DIR . '/news.json', mc_default_news());
?>
