<?php if (!function_exists('mc_site')) require_once __DIR__ . '/cms/bootstrap.php'; $mcSiteFooter = mc_site(); ?>
<footer id="pie-contacto" class="bg-white">
    <div class="bg-brand-green text-white text-center py-3 font-bold text-lg">
        Sitios de interés
    </div>

    <div class="bg-white py-6 flex flex-wrap justify-center items-center gap-x-6 gap-y-3 px-4 border-b">
        <span class="text-blue-900 font-bold text-lg" onclick="window.open('https://www.sbs.gob.pe/', '_blank')">SBS</span>
        <span class="text-blue-900 font-bold text-lg" onclick="window.open('https://www.fenacrep.org/es', '_blank')">FENACREP</span>
        <span class="text-gray-700 font-bold text-lg" onclick="window.open('https://www.sunarp.gob.pe/', '_blank')">SUNARP</span>
        <span class="text-blue-800 font-bold text-lg" onclick="window.open('https://www.sunat.gob.pe/', '_blank')">SUNAT</span>
        <span class="text-red-600 font-bold text-lg" onclick="window.open('https://elperuano.pe/', '_blank')">El Peruano</span>
        <span class="text-gray-600 font-bold text-lg" onclick="window.open('https://www.reniec.gob.pe/', '_blank')">RENIEC</span>
        <span class="text-purple-700 font-bold text-lg" onclick="window.open('https://www.experian.com.pe/', '_blank')">Experian</span>
    </div>

    <div class="bg-gray-100 py-12 px-4 md:px-20 grid grid-cols-1 md:grid-cols-4 gap-8 items-start text-center">
        <div class="flex flex-col items-center">
            <img src="<?= mc_h($mcSiteFooter['logo']) ?>" alt="CEPRODEMIC MULTICREDIT" class="h-16 w-auto object-contain mb-3">
            <p class="font-bold text-gray-800"><?= mc_h($mcSiteFooter['footer_tagline']) ?></p>
            <p class="text-sm text-gray-500 mt-2"><?= mc_h($mcSiteFooter['footer_since']) ?></p>
        </div>

        <div class="flex flex-col items-center">
            <div class="bg-white rounded-full w-12 h-12 flex items-center justify-center text-brand-green mb-3 shadow">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <h5 class="font-bold text-sm mb-1">DIRECCIÓN</h5>
            <p class="text-xs text-gray-600"><?= mc_nl2br($mcSiteFooter['address']) ?></p>
        </div>

        <div class="flex flex-col items-center">
            <div class="bg-white rounded-full w-12 h-12 flex items-center justify-center text-brand-green mb-3 shadow">
                <i class="fas fa-envelope"></i>
            </div>
            <h5 class="font-bold text-sm mb-1">CORREO</h5>
            <a href="mailto:<?= mc_h($mcSiteFooter['email']) ?>" class="text-xs text-gray-600 hover:text-brand-green transition"><?= mc_h($mcSiteFooter['email']) ?></a>
        </div>

        <div class="flex flex-col items-center">
            <div class="bg-white rounded-full w-12 h-12 flex items-center justify-center text-brand-green mb-3 shadow">
                <i class="fas fa-phone-alt"></i>
            </div>
            <h5 class="font-bold text-sm mb-1">TELÉFONOS</h5>
            <a href="tel:+<?= preg_replace('/\D/','',$mcSiteFooter['whatsapp']) ?>" class="text-xs text-gray-600 hover:text-brand-green transition"><?= mc_h($mcSiteFooter['phone1']) ?></a>
            <a href="tel:<?= preg_replace('/\D/','',$mcSiteFooter['phone2']) ?>" class="text-xs text-gray-600 hover:text-brand-green transition"><?= mc_h($mcSiteFooter['phone2']) ?></a>
        </div>
    </div>

    <div class="bg-gray-200 py-6 px-4 md:px-20 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-700">
        <div class="flex items-center gap-3">
            <img src="<?= mc_h($mcSiteFooter['logo']) ?>" alt="Logo CEPRODEMIC MULTICREDIT" class="h-8 w-auto object-contain">
            <span class="font-semibold">© CEPRODEMIC MULTICREDIT <?= mc_h($mcSiteFooter['copyright_year']) ?></span>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-5">
            <a href="informacion-legal.php#privacidad" class="hover:text-brand-orange transition">
                <i class="fas fa-file-alt text-brand-orange mr-1"></i> Política de Privacidad
            </a>
            <a href="informacion-legal.php#terminos" class="hover:text-brand-orange transition">
                <i class="fas fa-asterisk text-brand-orange mr-1"></i> Términos y condiciones
            </a>
            <a href="contacto.php#contacto" class="bg-white border rounded px-4 py-2 flex items-center shadow-sm hover:shadow transition">
                <i class="fas fa-book text-blue-800 text-2xl mr-2"></i>
                <span class="text-left leading-tight">
                    <span class="text-xs font-bold text-gray-800 block">Libro de</span>
                    <span class="text-xs font-bold text-gray-800 block">reclamaciones</span>
                    <span class="bg-blue-800 text-white text-[10px] px-1 rounded block w-max">ATENCIÓN</span>
                </span>
            </a>
        </div>
    </div>

    <div class="bg-gray-200 pb-4 text-center text-xs text-gray-500">
        Diseño y Desarrollo ABC Producciones · <a href="admin/" class="hover:text-brand-green"><i class="fas fa-lock"></i> Administración</a>
    </div>
</footer>

<style>
     
    .wa-float {
        background: #25D366;
        box-shadow: 0 8px 24px rgba(37,211,102,.45);
        transition: transform .35s cubic-bezier(.23,1,.32,1), box-shadow .35s ease;
    }
    .wa-float:hover { transform: translateY(-4px) scale(1.05); box-shadow: 0 14px 32px rgba(37,211,102,.55); }
    .wa-float::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 9999px;
        box-shadow: 0 0 0 0 rgba(37,211,102,.5);
        animation: waPulse 2.6s ease-out infinite;
    }
    @keyframes waPulse {
        0%   { box-shadow: 0 0 0 0 rgba(37,211,102,.45); }
        70%  { box-shadow: 0 0 0 16px rgba(37,211,102,0); }
        100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); }
    }
    @media (prefers-reduced-motion: reduce) { .wa-float::after { animation: none; } }
</style>

<a href="https://wa.me/<?= preg_replace('/\D/','',$mcSiteFooter['whatsapp']) ?>?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."
   target="_blank" rel="noopener noreferrer" aria-label="Contactar por WhatsApp"
   class="wa-float fixed bottom-6 right-6 text-white rounded-2xl w-14 h-14 flex items-center justify-center text-3xl z-50">
    <i class="fab fa-whatsapp"></i>
</a>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  if (window.AOS) {
    AOS.init({ once: true, offset: 100 });
  }
</script>
<script src="js/mc-polish.js" defer></script>
