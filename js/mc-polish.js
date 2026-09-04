



(function () {
    'use strict';

    function currentFile() {
        const path = window.location.pathname.split('/').pop() || 'index.php';
        return path.split('?')[0].split('#')[0] || 'index.php';
    }

    function pageSlug(file) {
        return file
            .replace(/\.php$/i, '')
            .replace(/[^a-z0-9]+/gi, '-')
            .replace(/^-|-$/g, '')
            .toLowerCase() || 'index';
    }

    function activeSection(file) {
        const creditPages = new Set([
            'creditos.php',
            'credito-ordinario.php',
            'credito-diario.php',
            'crediempeno.php',
            'credimoto.php',
            'credito-grupal.php',
            'bancos-comunales.php',
            'grupos-solidarios.php',
            'educacion.php',
            'salud.php',
            'esparcimiento.php'
        ]);

        const servicePages = new Set([
            'servicios.php',
            'microcredito.php',
            'capacitacion_integral.php'
        ]);

        if (creditPages.has(file)) return 'creditos.php';
        if (servicePages.has(file)) return 'servicios.php';
        if (file === 'noticias.php') return 'index.php';
        if (file === 'informacion-legal.php') return 'contacto.php';
        return file;
    }

    function markCurrentNavigation(file) {
        const activeHref = activeSection(file);
        document.querySelectorAll('#main-header nav a[href]').forEach((link) => {
            const href = (link.getAttribute('href') || '').split('?')[0].split('#')[0];
            if (href !== activeHref) return;
            link.classList.add('active');
            link.setAttribute('aria-current', 'page');
        });
    }

    function prepareMainContent() {
        const main = document.querySelector('main') || document.querySelector('body > section');
        if (!main) return;
        if (!main.id) main.id = 'contenido-principal';
        if (!main.hasAttribute('tabindex')) main.setAttribute('tabindex', '-1');
    }

    function improveImages() {
        document.querySelectorAll('img').forEach((image) => {
            const isPriority = image.closest('#main-header') || image.classList.contains('hero-image');
            if (!image.hasAttribute('decoding')) image.setAttribute('decoding', 'async');
            if (!isPriority && !image.hasAttribute('loading')) image.setAttribute('loading', 'lazy');
        });
    }

    function protectExternalLinks() {
        document.querySelectorAll('a[target="_blank"]').forEach((link) => {
            const values = new Set((link.getAttribute('rel') || '').split(/\s+/).filter(Boolean));
            values.add('noopener');
            values.add('noreferrer');
            link.setAttribute('rel', Array.from(values).join(' '));
        });
    }

    function addEscapeMenuClose() {
        const toggle = document.getElementById('mc-mobile-toggle');
        const menu = document.getElementById('mc-mobile-menu');
        if (!toggle || !menu) return;

        document.addEventListener('keydown', (event) => {
            if (event.key !== 'Escape' || !menu.classList.contains('open')) return;
            menu.classList.remove('open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.innerHTML = '<i class="fas fa-bars" aria-hidden="true"></i>';
            toggle.focus();
        });
    }

    function init() {
        const file = currentFile();
        document.body.classList.add('mc-site', `mc-page-${pageSlug(file)}`);
        markCurrentNavigation(file);
        prepareMainContent();
        improveImages();
        protectExternalLinks();
        addEscapeMenuClose();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init, { once: true });
    } else {
        init();
    }
})();
