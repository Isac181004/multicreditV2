<!-- ENCABEZADO PREMIUM CEPRODEMIC MULTICREDIT -->
<!-- ENCABEZADO PREMIUM CEPRODEMIC MULTICREDIT -->
<style>
    :root {
        --brand-green: #0d5c2e;
        --brand-green-dark: #083d1f;
        --brand-green-deep: #052712;
        --brand-orange: #f26e22;
        --brand-orange-soft: #ffe1d2;
    }

    /* Encabezado sólido */
    #main-header {
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 100;
        background: var(--brand-green-dark) !important;
        color: #fff !important;
        border-bottom: 1px solid rgba(255,255,255,.10);
        box-shadow: 0 5px 24px rgba(0,0,0,.22);
        transition: background .35s ease, box-shadow .35s ease;
    }

    /* Grano sutil para evitar fondo "plano" */
    #main-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.045'/%3E%3C/svg%3E");
        pointer-events: none;
        opacity: .6;
    }

    #main-header .nav-container {
        height: 88px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: height .35s ease;
        position: relative;
        z-index: 2;
    }

    .nav-link {
        position: relative;
        padding-bottom: 5px;
        color: #fff !important;
        text-decoration: none !important;
        transition: color .25s ease;
    }
    .nav-link:hover { color: var(--brand-orange-soft) !important; }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background: var(--brand-orange);
        transition: width .35s cubic-bezier(.23,1,.32,1);
    }
    .nav-link:hover::after,
    .nav-link.active::after { width: 100%; }

    /* Botón magnético */
    .btn-header {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;
        background: var(--brand-orange);
        color: #fff !important;
        text-decoration: none !important;
        padding: .8rem 1.5rem;
        border-radius: 8px; /* esquina institucional */
        font-weight: 800;
        font-size: .82rem;
        letter-spacing: .02em;
        box-shadow: 0 10px 28px rgba(242,110,34,.30);
        transition: transform .4s cubic-bezier(.23,1,.32,1), box-shadow .4s ease, background .3s ease;
    }
    .btn-header:hover {
        transform: translateY(-3px) scale(1.03);
        background: #ff7d32;
        box-shadow: 0 16px 38px rgba(242,110,34,.42);
    }

    .header-scrolled {
        background: var(--brand-green-deep) !important;
        box-shadow: 0 10px 32px rgba(0,0,0,.30) !important;
    }
    .header-scrolled .nav-container { height: 72px !important; }

    @media (max-width: 767px) {
        #main-header .nav-container { height: 72px; }
        #main-header { background: var(--brand-green-dark) !important; }
    }
</style>

<header id="main-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="nav-container">
            <div class="flex-shrink-0 flex items-center">
                <a href="index.php" aria-label="CEPRODEMIC MULTICREDIT - Inicio">
                    <img src="img/logo.jpg" alt="CEPRODEMIC MULTICREDIT" class="h-12 md:h-14 w-auto object-contain">
                </a>
            </div>

            <nav class="hidden md:flex items-center space-x-7 text-xs lg:text-sm uppercase tracking-[0.14em] font-bold">
                <a href="index.php" class="nav-link">Inicio</a>
                <a href="creditos.php" class="nav-link">Créditos</a>
                <a href="servicios.php" class="nav-link">Servicios</a>
                <a href="conocenos.php" class="nav-link">Nosotros</a>
                <a href="contacto.php" class="nav-link">Contacto</a>
            </nav>

            <div class="hidden md:flex items-center">
                <a href="https://wa.me/51968876759?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."
                   target="_blank" rel="noopener noreferrer"
                   class="btn-header" id="magnetic-btn">
                    <i class="fab fa-whatsapp text-base"></i> Solicitar Crédito
                </a>
            </div>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" type="button" aria-label="Abrir menú" aria-expanded="false"
                        class="text-white focus:outline-none p-2">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-[#083d1f] border-t border-white/10 absolute w-full shadow-xl">
        <div class="px-5 pt-3 pb-6 space-y-1 text-center uppercase tracking-widest text-sm font-semibold">
            <a href="index.php" class="block px-3 py-3 rounded-lg hover:bg-white/10">Inicio</a>
            <a href="creditos.php" class="block px-3 py-3 rounded-lg hover:bg-white/10">Créditos</a>
            <a href="servicios.php" class="block px-3 py-3 rounded-lg hover:bg-white/10">Servicios</a>
            <a href="conocenos.php" class="block px-3 py-3 rounded-lg hover:bg-white/10">Nosotros</a>
            <a href="contacto.php" class="block px-3 py-3 rounded-lg hover:bg-white/10">Contacto</a>
            <div class="pt-3">
                <a href="https://wa.me/51968876759?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."
                   target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 bg-[#f26e22] text-white px-7 py-3 rounded-lg font-bold">
                    <i class="fab fa-whatsapp"></i> Solicitar Crédito
                </a>
            </div>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('main-header');
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    const updateHeader = () => {
        if (window.scrollY > 50) header.classList.add('header-scrolled');
        else header.classList.remove('header-scrolled');
    };
    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });

    // Botón magnético
    const magnetic = document.getElementById('magnetic-btn');
    if (magnetic && window.matchMedia('(pointer:fine)').matches) {
        magnetic.addEventListener('mousemove', (e) => {
            const r = magnetic.getBoundingClientRect();
            const x = e.clientX - r.left - r.width / 2;
            const y = e.clientY - r.top - r.height / 2;
            magnetic.style.transform = `translate(${x * 0.25}px, ${y * 0.35 - 3}px)`;
        });
        magnetic.addEventListener('mouseleave', () => { magnetic.style.transform = ''; });
    }

    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', () => {
            const open = !mobileMenu.classList.contains('hidden');
            mobileMenu.classList.toggle('hidden');
            mobileBtn.setAttribute('aria-expanded', String(!open));
        });
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                mobileBtn.setAttribute('aria-expanded', 'false');
            });
        });
    }
});
</script>