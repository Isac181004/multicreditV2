<?php
if (!function_exists('mc_site')) require_once __DIR__ . '/cms/bootstrap.php';
$mcSiteHeader = mc_site();
$mcNewsLabel = trim((string)($mcSiteHeader['nav_news_label'] ?? 'Noticias')) ?: 'Noticias';
$mcNewsUrl = trim((string)($mcSiteHeader['nav_news_url'] ?? 'noticias.php')) ?: 'noticias.php';
?>
<link rel="stylesheet" href="css/mc-polish.css">
<link rel="stylesheet" href="css/mc-navy-theme.css">

<a class="mc-skip-link" href="#contenido-principal">Saltar al contenido</a>

<header id="main-header" class="mc-header-v2">
    <div class="mc-header-inner">
        <a href="<?= mc_h($mcSiteHeader['nav_home_url'] ?? 'index.php') ?>" class="mc-logo" aria-label="<?= mc_h($mcSiteHeader['brand_name'] ?? 'CEPRODEMIC MULTICREDIT') ?>">
            <img src="<?= mc_h($mcSiteHeader['logo'] ?? 'img/logo.jpg') ?>" alt="<?= mc_h($mcSiteHeader['brand_name'] ?? 'CEPRODEMIC MULTICREDIT') ?>">
        </a>

        <nav class="mc-desktop-nav" aria-label="Navegación principal">
            <a href="<?= mc_h($mcSiteHeader['nav_home_url'] ?? 'index.php') ?>"><?= mc_h($mcSiteHeader['nav_home_label'] ?? 'Inicio') ?></a>
            <a href="<?= mc_h($mcNewsUrl) ?>"><?= mc_h($mcNewsLabel) ?></a>

            <div class="mc-credit-menu">
                <a href="<?= mc_h($mcSiteHeader['nav_credits_url'] ?? 'creditos.php') ?>" class="mc-credit-trigger" aria-haspopup="true">
                    <?= mc_h($mcSiteHeader['nav_credits_label'] ?? 'Créditos') ?>
                    <i class="fas fa-chevron-down" aria-hidden="true"></i>
                </a>

                <div class="mc-credit-mega" role="menu" aria-label="Productos de crédito">
                    <div class="mc-credit-mega-top">
                        <div class="mc-credit-mega-title">
                            <span class="mc-credit-mega-icon"><i class="fas fa-hand-holding-dollar" aria-hidden="true"></i></span>
                            <div>
                                <strong><?= mc_h($mcSiteHeader['credit_mega_title'] ?? 'Encuentra el crédito ideal para ti') ?></strong>
                                <span><?= mc_h($mcSiteHeader['credit_mega_subtitle'] ?? '') ?></span>
                            </div>
                        </div>
                        <a href="<?= mc_h($mcSiteHeader['credit_mega_all_url'] ?? 'creditos.php') ?>" class="mc-credit-mega-all">
                            <?= mc_h($mcSiteHeader['credit_mega_all_label'] ?? 'Ver todos los créditos') ?>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="mc-credit-mega-body">
                        <section class="mc-credit-section">
                            <div class="mc-credit-section-heading"><i class="fas fa-store"></i><?= mc_h($mcSiteHeader['credit_micro_title'] ?? 'Crédito Microempresa') ?></div>
                            <div class="mc-credit-grid">
                                <?php
                                $micro = [
                                    ['ordinario','fa-briefcase','Crédito Ordinario'],
                                    ['diario','fa-calendar-day','Crédito Diario'],
                                    ['empeno','fa-gem','Crediempeño'],
                                    ['moto','fa-motorcycle','Credimoto'],
                                    ['grupal','fa-people-group','Crédito Grupal'],
                                ];
                                foreach ($micro as [$key,$icon,$fallback]): ?>
                                    <a href="<?= mc_h($mcSiteHeader['credit_'.$key.'_url'] ?? 'creditos.php') ?>" class="mc-credit-card">
                                        <span class="mc-credit-card-icon"><i class="fas <?= mc_h($icon) ?>"></i></span>
                                        <span><strong><?= mc_h($mcSiteHeader['credit_'.$key.'_label'] ?? $fallback) ?></strong><small><?= mc_h($mcSiteHeader['credit_'.$key.'_desc'] ?? '') ?></small></span>
                                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </section>

                        <section class="mc-credit-section">
                            <div class="mc-credit-section-heading"><i class="fas fa-house-user"></i><?= mc_h($mcSiteHeader['credit_consumo_title'] ?? 'Crédito Consumo') ?></div>
                            <div class="mc-credit-grid mc-credit-grid-consumo">
                                <?php
                                $consumo = [
                                    ['educacion','fa-graduation-cap','Educación'],
                                    ['salud','fa-heart-pulse','Salud'],
                                    ['esparcimiento','fa-umbrella-beach','Esparcimiento'],
                                ];
                                foreach ($consumo as [$key,$icon,$fallback]): ?>
                                    <a href="<?= mc_h($mcSiteHeader['credit_'.$key.'_url'] ?? 'creditos.php') ?>" class="mc-credit-card">
                                        <span class="mc-credit-card-icon"><i class="fas <?= mc_h($icon) ?>"></i></span>
                                        <span><strong><?= mc_h($mcSiteHeader['credit_'.$key.'_label'] ?? $fallback) ?></strong><small><?= mc_h($mcSiteHeader['credit_'.$key.'_desc'] ?? '') ?></small></span>
                                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <a href="<?= mc_h($mcSiteHeader['nav_services_url'] ?? 'servicios.php') ?>"><?= mc_h($mcSiteHeader['nav_services_label'] ?? 'Servicios') ?></a>
            <a href="<?= mc_h($mcSiteHeader['nav_about_url'] ?? 'conocenos.php') ?>"><?= mc_h($mcSiteHeader['nav_about_label'] ?? 'Nosotros') ?></a>
            <a href="<?= mc_h($mcSiteHeader['nav_contact_url'] ?? 'contacto.php') ?>"><?= mc_h($mcSiteHeader['nav_contact_label'] ?? 'Contacto') ?></a>
            <a href="#admin" class="mc-admin-link" data-mc-admin-open aria-label="Abrir administración" title="Administración"><i class="fas fa-user-shield" aria-hidden="true"></i></a>
        </nav>

        <a href="<?= mc_h($mcSiteHeader['header_cta_url'] ?? '#') ?>" target="_blank" rel="noopener noreferrer" class="mc-header-button">
            <i class="fab fa-whatsapp" aria-hidden="true"></i>
            <?= mc_h($mcSiteHeader['header_cta_label'] ?? 'Solicitar crédito') ?>
        </a>

        <button type="button" id="mc-mobile-toggle" class="mc-mobile-toggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="mc-mobile-menu">
            <i class="fas fa-bars" aria-hidden="true"></i>
        </button>
    </div>

    <nav id="mc-mobile-menu" aria-label="Navegación móvil">
        <a href="<?= mc_h($mcSiteHeader['nav_home_url'] ?? 'index.php') ?>"><i class="fas fa-house"></i><?= mc_h($mcSiteHeader['nav_home_label'] ?? 'Inicio') ?></a>
        <a href="<?= mc_h($mcNewsUrl) ?>"><i class="fas fa-newspaper"></i><?= mc_h($mcNewsLabel) ?></a>
        <a href="<?= mc_h($mcSiteHeader['nav_credits_url'] ?? 'creditos.php') ?>"><i class="fas fa-hand-holding-dollar"></i><?= mc_h($mcSiteHeader['nav_credits_label'] ?? 'Créditos') ?></a>
        <a href="<?= mc_h($mcSiteHeader['nav_services_url'] ?? 'servicios.php') ?>"><i class="fas fa-layer-group"></i><?= mc_h($mcSiteHeader['nav_services_label'] ?? 'Servicios') ?></a>
        <a href="<?= mc_h($mcSiteHeader['nav_about_url'] ?? 'conocenos.php') ?>"><i class="fas fa-building"></i><?= mc_h($mcSiteHeader['nav_about_label'] ?? 'Nosotros') ?></a>
        <a href="<?= mc_h($mcSiteHeader['nav_contact_url'] ?? 'contacto.php') ?>"><i class="fas fa-headset"></i><?= mc_h($mcSiteHeader['nav_contact_label'] ?? 'Contacto') ?></a>
        <a href="#admin" data-mc-admin-open><i class="fas fa-user-shield"></i>Administración</a>
        <a href="<?= mc_h($mcSiteHeader['header_cta_url'] ?? '#') ?>" target="_blank" rel="noopener noreferrer" class="mobile-whatsapp"><i class="fab fa-whatsapp"></i><?= mc_h($mcSiteHeader['header_cta_label'] ?? 'Solicitar crédito') ?></a>
    </nav>
</header>

<?php require_once __DIR__ . '/admin/login_overlay.php'; mc_render_module_runtime(); ?>

<script>
(function(){
    const header=document.getElementById('main-header');
    const toggle=document.getElementById('mc-mobile-toggle');
    const menu=document.getElementById('mc-mobile-menu');
    const update=()=>header&&header.classList.toggle('scrolled',window.scrollY>28);
    update(); window.addEventListener('scroll',update,{passive:true});
    if(!toggle||!menu)return;
    const close=()=>{menu.classList.remove('open');toggle.setAttribute('aria-expanded','false');toggle.innerHTML='<i class="fas fa-bars" aria-hidden="true"></i>';};
    toggle.addEventListener('click',()=>{const open=menu.classList.toggle('open');toggle.setAttribute('aria-expanded',open?'true':'false');toggle.innerHTML=open?'<i class="fas fa-xmark" aria-hidden="true"></i>':'<i class="fas fa-bars" aria-hidden="true"></i>';});
    menu.querySelectorAll('a').forEach(a=>a.addEventListener('click',close));
    document.addEventListener('click',e=>{if(menu.classList.contains('open')&&!menu.contains(e.target)&&!toggle.contains(e.target))close();});
})();
</script>
