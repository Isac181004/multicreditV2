<?php
require_once __DIR__ . '/cms/bootstrap.php';
$mcSite = mc_site();
$mcNews = mc_news(true);

function mc_news_images_public($news) {
    $out = [];
    if (!empty($news['images']) && is_array($news['images'])) {
        foreach ($news['images'] as $index => $image) {
            if (is_string($image)) {
                $path = trim($image);
                $alt = (string)($news['title'] ?? '');
            } elseif (is_array($image)) {
                $path = trim((string)($image['path'] ?? ''));
                $alt = trim((string)($image['alt'] ?? ($news['title'] ?? '')));
            } else continue;
            if ($path !== '') $out[] = ['path'=>$path,'alt'=>$alt,'order'=>$index];
        }
    }
    if (!$out && !empty($news['image'])) {
        $out[] = ['path'=>(string)$news['image'],'alt'=>(string)($news['title'] ?? ''),'order'=>0];
    }
    return $out;
}

usort($mcNews, function($a,$b){
    $ta = strtotime((string)($a['published_at'] ?? $a['created_at'] ?? $a['date'] ?? '')) ?: 0;
    $tb = strtotime((string)($b['published_at'] ?? $b['created_at'] ?? $b['date'] ?? '')) ?: 0;
    if ($ta === $tb) return strcmp((string)($b['date'] ?? ''),(string)($a['date'] ?? ''));
    return $tb <=> $ta;
});
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= mc_h($mcSite['news_title'] ?? 'Noticias') ?> | CEPRODEMIC MULTICREDIT</title>
<meta name="description" content="<?= mc_h($mcSite['news_subtitle'] ?? 'Noticias y publicaciones de Multicredit') ?>">
<script>tailwind=window.tailwind||{};tailwind.config={theme:{extend:{colors:{'brand-green':'#071525','brand-green-dark':'#071525','brand-orange':'#0B1F3A'},fontFamily:{sans:['Inter','sans-serif'],display:['Poppins','sans-serif']}}}};</script>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/mc-noticias.css">

    <link rel="stylesheet" href="css/mc-brand-2026.css?v=20260915">
    <link rel="icon" type="image/png" href="uploads/logo/20260904_232938_5c89c80d.png">
</head>
<body class="overflow-x-hidden">
<?php include 'encabezado.php'; ?>
<main class="pt-[82px]" id="contenido-principal">
    <section class="mc-news-hero">
        <img class="mc-news-hero-bg" src="<?= mc_h($mcSite['news_hero_image'] ?? 'img/cajamarca.webp') ?>" alt="" decoding="async">
        <div class="mc-news-hero-inner">
            <span class="mc-news-eyebrow"><i class="fas fa-newspaper"></i> Actualidad institucional</span>
            <h1><?= mc_h($mcSite['news_title'] ?? 'Noticias y publicaciones') ?></h1>
            <p><?= mc_h($mcSite['news_subtitle'] ?? 'Información institucional y comunicados de CEPRODEMIC MULTICREDIT.') ?></p>
        </div>
    </section>

    <section class="mc-news-shell" aria-labelledby="mc-news-list-title">
        <div class="mc-news-toolbar">
            <div>
                <h2 id="mc-news-list-title">Últimas publicaciones</h2>
                <p>Las noticias más recientes aparecen primero.</p>
            </div>
            <span class="mc-news-count"><?= count($mcNews) ?> <?= count($mcNews) === 1 ? 'publicación' : 'publicaciones' ?></span>
        </div>

        <div class="mc-news-grid">
            <?php if (!$mcNews): ?>
                <div class="mc-news-empty">
                    <i class="fas fa-newspaper"></i>
                    <h2>No hay publicaciones disponibles</h2>
                    <p>Vuelve pronto para conocer las novedades de Multicredit.</p>
                </div>
            <?php else: foreach ($mcNews as $n):
                $images = mc_news_images_public($n);
                $cover = $images[0]['path'] ?? 'img/cajamarca.webp';
                $summary = trim((string)($n['summary'] ?? ''));
                if ($summary === '') $summary = mb_substr(trim(strip_tags((string)($n['body'] ?? ''))),0,190,'UTF-8');
            ?>
                <article class="mc-news-card">
                    <a class="mc-news-cover" href="noticia.php?id=<?= urlencode((string)$n['id']) ?>" aria-label="Leer <?= mc_h($n['title'] ?? 'noticia') ?>">
                        <img src="<?= mc_h($cover) ?>" alt="<?= mc_h($n['title'] ?? '') ?>" loading="lazy" decoding="async">
                        <?php if (count($images) > 1): ?><span class="mc-news-photo-count"><i class="fas fa-images"></i><?= count($images) ?> fotos</span><?php endif; ?>
                    </a>
                    <div class="mc-news-card-body">
                        <div class="mc-news-meta">
                            <span class="mc-news-category"><?= mc_h($n['category'] ?? 'Institucional') ?></span>
                            <span><i class="far fa-calendar-alt"></i> <?= mc_h(date('d/m/Y', strtotime((string)($n['date'] ?? 'now')))) ?></span>
                        </div>
                        <h2><?= mc_h($n['title'] ?? '') ?></h2>
                        <?php if ($summary !== ''): ?><p><?= mc_h($summary) ?><?= mb_strlen($summary,'UTF-8') >= 190 ? '…' : '' ?></p><?php endif; ?>
                        <a class="mc-news-read" href="noticia.php?id=<?= urlencode((string)$n['id']) ?>">Ver noticia completa <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            <?php endforeach; endif; ?>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
