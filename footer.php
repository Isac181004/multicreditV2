<footer id="contacto" class="bg-white">
    <div class="bg-brand-green text-white text-center py-3 font-bold text-lg">
        Sitios de interés
    </div>

    <div class="bg-white py-6 flex flex-wrap justify-center items-center gap-x-6 gap-y-3 px-4 border-b">
        <span class="text-blue-900 font-bold text-lg">SBS</span>
        <span class="text-blue-900 font-bold text-lg">FENACREP</span>
        <span class="text-gray-700 font-bold text-lg">SUNARP</span>
        <span class="text-blue-800 font-bold text-lg">SUNAT</span>
        <span class="text-red-600 font-bold text-lg">El Peruano</span>
        <span class="text-gray-600 font-bold text-lg">RENIEC</span>
        <span class="text-purple-700 font-bold text-lg">Experian</span>
    </div>

    <div class="bg-gray-100 py-12 px-4 md:px-20 grid grid-cols-1 md:grid-cols-4 gap-8 items-start text-center">
        <div class="flex flex-col items-center">
            <img src="img/logo.jpg" alt="CEPRODEMIC MULTICREDIT" class="h-16 w-auto object-contain mb-3">
            <p class="font-bold text-gray-800">Financiamiento para crecer, oportunidades para avanzar.</p>
            <p class="text-sm text-gray-500 mt-2">Desde 2009 acompañando a emprendedores y familias.</p>
        </div>

        <div class="flex flex-col items-center">
            <div class="bg-white rounded-full w-12 h-12 flex items-center justify-center text-brand-green mb-3 shadow">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <h5 class="font-bold text-sm mb-1">DIRECCIÓN</h5>
            <p class="text-xs text-gray-600">Jr. Los Naranjos Nro. 513<br>Urb. Los Rosales, Cajamarca</p>
        </div>

        <div class="flex flex-col items-center">
            <div class="bg-white rounded-full w-12 h-12 flex items-center justify-center text-brand-green mb-3 shadow">
                <i class="fas fa-envelope"></i>
            </div>
            <h5 class="font-bold text-sm mb-1">CORREO</h5>
            <a href="mailto:informes@ceprodemic.com" class="text-xs text-gray-600 hover:text-brand-green transition">informes@ceprodemic.com</a>
        </div>

        <div class="flex flex-col items-center">
            <div class="bg-white rounded-full w-12 h-12 flex items-center justify-center text-brand-green mb-3 shadow">
                <i class="fas fa-phone-alt"></i>
            </div>
            <h5 class="font-bold text-sm mb-1">TELÉFONOS</h5>
            <a href="tel:+51968876759" class="text-xs text-gray-600 hover:text-brand-green transition">968 876 759</a>
            <a href="tel:+51973972743" class="text-xs text-gray-600 hover:text-brand-green transition">973 972 743</a>
        </div>
    </div>

    <div class="bg-gray-200 py-6 px-4 md:px-20 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-700">
        <div class="flex items-center gap-3">
            <img src="img/logo.jpg" alt="Logo CEPRODEMIC MULTICREDIT" class="h-8 w-auto object-contain">
            <span class="font-semibold">© CEPRODEMIC MULTICREDIT 2026</span>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-5">
            <a href="#" class="hover:text-brand-orange transition">
                <i class="fas fa-file-alt text-brand-orange mr-1"></i> Política de Privacidad
            </a>
            <a href="#" class="hover:text-brand-orange transition">
                <i class="fas fa-asterisk text-brand-orange mr-1"></i> Términos y condiciones
            </a>
            <a href="#" class="bg-white border rounded px-4 py-2 flex items-center shadow-sm hover:shadow transition">
                <i class="fas fa-book text-blue-800 text-2xl mr-2"></i>
                <span class="text-left leading-tight">
                    <span class="text-xs font-bold text-gray-800 block">Libro de</span>
                    <span class="text-xs font-bold text-gray-800 block">reclamaciones</span>
                    <span class="bg-blue-800 text-white text-[10px] px-1 rounded block w-max">DIGITAL</span>
                </span>
            </a>
        </div>
    </div>

    <div class="bg-gray-200 pb-4 text-center text-xs text-gray-500">
        Diseño y Desarrollo ABC Producciones
    </div>
</footer>

<style>
    /* Botón flotante WhatsApp con esquina institucional + pulso sutil */
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

<a href="https://wa.me/51968876759?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."
   target="_blank" rel="noopener noreferrer" aria-label="Contactar por WhatsApp"
   class="wa-float fixed bottom-6 right-6 text-white rounded-2xl w-14 h-14 flex items-center justify-center text-3xl z-50">
    <i class="fab fa-whatsapp"></i>
</a>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ once: true, offset: 100 });
</script>