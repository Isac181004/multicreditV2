<?php
require_once __DIR__ . '/cms/bootstrap.php';
$mcSite = mc_site();
$id = trim((string)($_GET['id'] ?? ''));
$news = null;
foreach (mc_news(true) as $item) {
    if ((string)($item['id'] ?? '') === $id) { $news = $item; break; }
}
if (!$news) {
    http_response_code(404);
    $news = [
        'id'=>'','title'=>'Noticia no encontrada','category'=>'Multicredit','date'=>date('Y-m-d'),
        'summary'=>'La publicación solicitada no está disponible o fue retirada.','body'=>'','image'=>'','images'=>[]
    ];
}

function mc_detail_images($news) {
    $out = [];
    if (!empty($news['images']) && is_array($news['images'])) {
        foreach ($news['images'] as $i => $image) {
            if (is_string($image)) {
                $path = trim($image); $alt = (string)($news['title'] ?? '');
            } elseif (is_array($image)) {
                $path = trim((string)($image['path'] ?? ''));
                $alt = trim((string)($image['alt'] ?? ($news['title'] ?? '')));
            } else continue;
            if ($path !== '') $out[] = ['path'=>$path,'alt'=>$alt,'order'=>$i];
        }
    }
    if (!$out && !empty($news['image'])) $out[] = ['path'=>(string)$news['image'],'alt'=>(string)($news['title'] ?? ''),'order'=>0];
    return $out;
}
$images = mc_detail_images($news);
$count = count($images);
$galleryClass = $count <= 4 ? 'count-'.$count : 'count-many';
$visibleLimit = $count > 4 ? 5 : $count;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= mc_h($news['title']) ?> | CEPRODEMIC MULTICREDIT</title>
<meta name="description" content="<?= mc_h($news['summary'] ?? '') ?>">
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
        <img class="mc-news-hero-bg" src="<?= mc_h($images[0]['path'] ?? ($mcSite['news_hero_image'] ?? 'img/cajamarca.webp')) ?>" alt="" decoding="async">
        <div class="mc-news-hero-inner">
            <span class="mc-news-eyebrow"><i class="fas fa-newspaper"></i> <?= mc_h($news['category'] ?? 'Institucional') ?></span>
            <h1><?= mc_h($news['title']) ?></h1>
            <p><?= mc_h($news['summary'] ?? '') ?></p>
        </div>
    </section>

    <section class="mc-news-detail-wrap">
        <a href="noticias.php" class="mc-news-back"><i class="fas fa-arrow-left"></i> Volver a Noticias</a>
        <article class="mc-news-detail">
            <header class="mc-news-detail-head">
                <div class="mc-news-meta">
                    <span class="mc-news-category"><?= mc_h($news['category'] ?? 'Institucional') ?></span>
                    <span><i class="far fa-calendar-alt"></i> <?= mc_h(date('d/m/Y', strtotime((string)($news['date'] ?? 'now')))) ?></span>
                    <?php if ($count > 0): ?><span><i class="far fa-images"></i> <?= $count ?> <?= $count === 1 ? 'foto' : 'fotos' ?></span><?php endif; ?>
                </div>
                <h1><?= mc_h($news['title']) ?></h1>
                <?php if (!empty($news['summary'])): ?><p class="mc-news-lead"><?= mc_h($news['summary']) ?></p><?php endif; ?>
            </header>

            <?php if ($count > 0): ?>
                <div class="mc-gallery <?= mc_h($galleryClass) ?>" data-gallery>
                    <?php foreach ($images as $i => $image):
                        if ($i >= $visibleLimit) break;
                        $remaining = $count - $visibleLimit;
                    ?>
                        <button type="button" data-gallery-index="<?= $i ?>" aria-label="Abrir imagen <?= $i + 1 ?> de <?= $count ?>">
                            <img src="<?= mc_h($image['path']) ?>" alt="<?= mc_h($image['alt'] ?: $news['title']) ?>" loading="<?= $i === 0 ? 'eager' : 'lazy' ?>" decoding="async">
                            <?php if ($remaining > 0 && $i === $visibleLimit - 1): ?><span class="mc-gallery-more">+<?= $remaining ?></span><?php endif; ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="mc-news-copy">
                <?php
                $paragraphs = preg_split('/\R{2,}/u', trim((string)($news['body'] ?? '')));
                if (!$paragraphs || (count($paragraphs) === 1 && trim((string)$paragraphs[0]) === '')) {
                    echo '<p>Esta publicación no contiene texto adicional.</p>';
                } else {
                    foreach ($paragraphs as $paragraph) {
                        $paragraph = trim($paragraph);
                        if ($paragraph !== '') echo '<p>'.mc_nl2br($paragraph).'</p>';
                    }
                }
                ?>
            </div>
        </article>
    </section>
</main>

<?php if ($count > 0): ?>
<div class="mc-lightbox" id="mc-news-lightbox" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Galería de imágenes">
    <div class="mc-lightbox-stage">
        <button class="mc-lightbox-close" type="button" aria-label="Cerrar"><i class="fas fa-xmark"></i></button>
        <button class="mc-lightbox-prev" type="button" aria-label="Imagen anterior"><i class="fas fa-chevron-left"></i></button>
        <img class="mc-lightbox-image" src="" alt="">
        <button class="mc-lightbox-next" type="button" aria-label="Imagen siguiente"><i class="fas fa-chevron-right"></i></button>
        <span class="mc-lightbox-counter"></span>
    </div>
</div>
<script>
(function(){
    const images=<?= json_encode(array_values($images), JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) ?>;
    const box=document.getElementById('mc-news-lightbox'); if(!box||!images.length)return;
    const img=box.querySelector('.mc-lightbox-image'), counter=box.querySelector('.mc-lightbox-counter'); let current=0;
    const render=()=>{const item=images[current];img.src=item.path;img.alt=item.alt||<?= json_encode((string)$news['title']) ?>;counter.textContent=(current+1)+' / '+images.length;};
    const open=i=>{current=(i+images.length)%images.length;render();box.classList.add('open');box.setAttribute('aria-hidden','false');document.body.style.overflow='hidden';box.querySelector('.mc-lightbox-close').focus();};
    const close=()=>{box.classList.remove('open');box.setAttribute('aria-hidden','true');document.body.style.overflow='';};
    document.querySelectorAll('[data-gallery-index]').forEach(btn=>btn.addEventListener('click',()=>open(parseInt(btn.dataset.galleryIndex||'0',10))));
    box.querySelector('.mc-lightbox-close').addEventListener('click',close);
    box.querySelector('.mc-lightbox-prev').addEventListener('click',()=>{current=(current-1+images.length)%images.length;render();});
    box.querySelector('.mc-lightbox-next').addEventListener('click',()=>{current=(current+1)%images.length;render();});
    box.addEventListener('click',e=>{if(e.target===box)close();});
    document.addEventListener('keydown',e=>{if(!box.classList.contains('open'))return;if(e.key==='Escape')close();if(e.key==='ArrowLeft'){current=(current-1+images.length)%images.length;render();}if(e.key==='ArrowRight'){current=(current+1)%images.length;render();}});
})();
</script>
<?php endif; ?>

<?php include 'footer.php'; ?>
</body>
</html>
