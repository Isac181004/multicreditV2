<?php
if (!function_exists('mc_site')) require_once __DIR__ . '/cms/bootstrap.php';
$mcSiteFooter = mc_site();
$mcInterestLinks = $mcSiteFooter['interest_links'] ?? [
    ['label'=>'SBS','url'=>'https://www.sbs.gob.pe/'],
    ['label'=>'FENACREP','url'=>'https://www.fenacrep.org/es'],
    ['label'=>'SUNARP','url'=>'https://www.sunarp.gob.pe/'],
    ['label'=>'SUNAT','url'=>'https://www.sunat.gob.pe/'],
    ['label'=>'El Peruano','url'=>'https://elperuano.pe/'],
    ['label'=>'RENIEC','url'=>'https://www.reniec.gob.pe/'],
    ['label'=>'Experian','url'=>'https://www.experian.com.pe/'],
];
$mcSedes = [];
for ($i=1; $i<=4; $i++) {
    $phoneKey = $i === 1 ? 'telefono' : 'phone'.$i;
    $address = trim((string)($mcSiteFooter['address'.$i] ?? ''));
    $phone = trim((string)($mcSiteFooter[$phoneKey] ?? ''));
    $wa = trim((string)($mcSiteFooter['whatsapp'.$i] ?? ''));
    if ($address !== '' || $phone !== '' || $wa !== '') {
        $mcSedes[] = ['n'=>$i,'address'=>$address,'phone'=>$phone,'wa'=>$wa];
    }
}
$mcPrimaryWa = preg_replace('/\D+/', '', (string)($mcSiteFooter['whatsapp1'] ?? $mcSiteFooter['whatsapp'] ?? '51968782473'));
?>
<footer id="pie-contacto" class="bg-white">
    <div class="bg-brand-green text-white text-center py-3 font-bold text-lg">
        <?= mc_h($mcSiteFooter['footer_interest_title'] ?? 'Sitios de interés') ?>
    </div>

    <div class="bg-white py-6 flex flex-wrap justify-center items-center gap-x-6 gap-y-3 px-4 border-b">
        <?php foreach ((array)$mcInterestLinks as $link):
            if (!is_array($link)) continue;
            $label = trim((string)($link['label'] ?? ''));
            $url = trim((string)($link['url'] ?? ''));
            if ($label === '' || $url === '') continue;
        ?>
            <a href="<?= mc_h($url) ?>" target="_blank" rel="noopener noreferrer" class="text-gray-700 font-bold text-lg hover:text-brand-green transition"><?= mc_h($label) ?></a>
        <?php endforeach; ?>
    </div>

    <div class="bg-gray-100 py-12 px-4 md:px-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[1.15fr_2fr] gap-10 items-start">
            <div class="flex flex-col items-center lg:items-start text-center lg:text-left">
                <img src="<?= mc_h($mcSiteFooter['logo']) ?>" alt="<?= mc_h($mcSiteFooter['brand_name'] ?? 'CEPRODEMIC MULTICREDIT') ?>" class="h-16 w-auto object-contain mb-3">
                <p class="font-bold text-gray-800"><?= mc_h($mcSiteFooter['footer_tagline'] ?? '') ?></p>
                <p class="text-sm text-gray-500 mt-2"><?= mc_h($mcSiteFooter['footer_since'] ?? '') ?></p>
                <?php if (!empty($mcSiteFooter['email'])): ?>
                    <a href="mailto:<?= mc_h($mcSiteFooter['email']) ?>" class="text-sm text-brand-green font-semibold mt-4 hover:text-brand-orange transition"><i class="fas fa-envelope mr-2"></i><?= mc_h($mcSiteFooter['email']) ?></a>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
                <?php foreach ($mcSedes as $sede): ?>
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-200 text-center">
                        <div class="bg-green-50 rounded-full w-11 h-11 flex items-center justify-center text-brand-green mx-auto mb-3"><i class="fas fa-map-marker-alt"></i></div>
                        <h5 class="font-extrabold text-sm mb-2">SEDE <?= (int)$sede['n'] ?></h5>
                        <?php if ($sede['address'] !== ''): ?><p class="text-xs text-gray-600 min-h-[48px]"><?= mc_nl2br($sede['address']) ?></p><?php endif; ?>
                        <?php if ($sede['phone'] !== ''): ?><a href="tel:<?= mc_h(preg_replace('/\D+/', '', $sede['phone'])) ?>" class="block text-xs font-semibold text-gray-700 mt-3 hover:text-brand-green"><?= mc_h($sede['phone']) ?></a><?php endif; ?>
                        <?php if ($sede['wa'] !== ''): ?><a href="https://wa.me/<?= mc_h(preg_replace('/\D+/', '', $sede['wa'])) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-xs font-bold text-green-700 mt-2"><i class="fab fa-whatsapp"></i> WhatsApp</a><?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="bg-gray-200 py-6 px-4 md:px-20 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-700">
        <div class="flex items-center gap-3">
            <img src="<?= mc_h($mcSiteFooter['logo']) ?>" alt="Logo <?= mc_h($mcSiteFooter['brand_name'] ?? 'CEPRODEMIC MULTICREDIT') ?>" class="h-8 w-auto object-contain">
            <span class="font-semibold">© <?= mc_h($mcSiteFooter['brand_name'] ?? 'CEPRODEMIC MULTICREDIT') ?> <?= mc_h($mcSiteFooter['copyright_year'] ?? date('Y')) ?></span>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-5">
            <a href="informacion-legal.php#privacidad" class="hover:text-brand-orange transition"><i class="fas fa-file-alt text-brand-orange mr-1"></i> Política de Privacidad</a>
            <a href="informacion-legal.php#terminos" class="hover:text-brand-orange transition"><i class="fas fa-asterisk text-brand-orange mr-1"></i> Términos y condiciones</a>
            <a href="contacto.php#contacto" class="bg-white border rounded px-4 py-2 flex items-center shadow-sm hover:shadow transition">
                <i class="fas fa-book text-blue-800 text-2xl mr-2"></i>
                <span class="text-left leading-tight"><span class="text-xs font-bold text-gray-800 block">Libro de</span><span class="text-xs font-bold text-gray-800 block">reclamaciones</span><span class="bg-blue-800 text-white text-[10px] px-1 rounded block w-max">ATENCIÓN</span></span>
            </a>
        </div>
    </div>

    <div class="bg-gray-200 pb-4 text-center text-xs text-gray-500">
        Diseño y Desarrollo ABC Producciones · <a href="#admin" data-mc-admin-open class="hover:text-brand-green"><i class="fas fa-lock"></i> Administración</a>
    </div>
</footer>

<style>
.wa-float{background:#25D366;box-shadow:0 8px 24px rgba(37,211,102,.45);transition:transform .35s cubic-bezier(.23,1,.32,1),box-shadow .35s ease}.wa-float:hover{transform:translateY(-4px) scale(1.05);box-shadow:0 14px 32px rgba(37,211,102,.55)}.wa-float::after{content:'';position:absolute;inset:0;border-radius:9999px;box-shadow:0 0 0 0 rgba(37,211,102,.5);animation:waPulse 2.6s ease-out infinite}@keyframes waPulse{0%{box-shadow:0 0 0 0 rgba(37,211,102,.45)}70%{box-shadow:0 0 0 16px rgba(37,211,102,0)}100%{box-shadow:0 0 0 0 rgba(37,211,102,0)}}@media(prefers-reduced-motion:reduce){.wa-float::after{animation:none}}
</style>

<?php if ($mcPrimaryWa !== ''): ?>
<a href="https://wa.me/<?= mc_h($mcPrimaryWa) ?>?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito." target="_blank" rel="noopener noreferrer" aria-label="Contactar por WhatsApp" class="wa-float fixed bottom-6 right-6 text-white rounded-2xl w-14 h-14 flex items-center justify-center text-3xl z-50"><i class="fab fa-whatsapp"></i></a>
<?php endif; ?>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>if(window.AOS){AOS.init({once:true,offset:100});}</script>
<script src="js/mc-polish.js" defer></script>
