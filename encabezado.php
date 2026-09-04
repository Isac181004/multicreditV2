<?php if (!function_exists('mc_site')) require_once __DIR__ . '/cms/bootstrap.php'; $mcSiteHeader = mc_site(); ?>
<style>






:root {
    --mc-green: #063718;
    --mc-green-2: #0d5c2e;
    --mc-orange: #f26e22;
}






#main-header {

    position: fixed;

    top: 0;
    left: 0;

    width: 100%;

    z-index: 99999;

    background:
        rgba(3, 43, 19, .88);

    border-bottom:
        1px solid
        rgba(255,255,255,.10);

    backdrop-filter:
        blur(16px);

    -webkit-backdrop-filter:
        blur(16px);

    box-sizing: border-box;
}






#main-header .mc-header-inner {

    width:
        min(
            1180px,
            calc(100% - 40px)
        );

    height:
        82px;

    margin:
        0 auto;

    display:
        flex;

    align-items:
        center;

    justify-content:
        space-between;

    gap:
        25px;
}






#main-header .mc-logo {

    display:
        flex;

    align-items:
        center;

    flex-shrink:
        0;

    text-decoration:
        none;

}

#main-header .mc-logo img {

    display:
        block;

    width:
        auto;

    height:
        150px;

    max-width:
        180px;

    object-fit:
        contain;

}






#main-header .mc-desktop-nav {

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        28px;

    flex:
        1;

}

#main-header .mc-desktop-nav a {

    position:
        relative;

    display:
        inline-flex;

    align-items:
        center;

    color:
        rgba(255,255,255,.92);

    text-decoration:
        none;

    font-size:
        .72rem;

    font-weight:
        800;

    text-transform:
        uppercase;

    letter-spacing:
        .08em;

    white-space:
        nowrap;

    padding:
        8px 0;

    transition:
        color .25s ease;

}

#main-header .mc-desktop-nav a::after {

    content:
        "";

    position:
        absolute;

    left:
        0;

    bottom:
        0;

    width:
        0;

    height:
        2px;

    background:
        var(--mc-orange);

    border-radius:
        99px;

    transition:
        width .3s ease;

}

#main-header .mc-desktop-nav a:hover {

    color:
        white;

}

#main-header .mc-desktop-nav a:hover::after {

    width:
        100%;

}





#main-header .mc-credit-menu {

    display:
        flex;

    align-items:
        center;

    align-self:
        stretch;

}

#main-header .mc-credit-trigger {

    gap:
        7px;

    cursor:
        pointer;

}

#main-header .mc-credit-trigger i {

    font-size:
        .62rem;

    transition:
        transform .3s ease,
        color .3s ease;

}

#main-header .mc-credit-menu:hover .mc-credit-trigger,
#main-header .mc-credit-menu:focus-within .mc-credit-trigger {

    color:
        white;

}

#main-header .mc-credit-menu:hover .mc-credit-trigger::after,
#main-header .mc-credit-menu:focus-within .mc-credit-trigger::after {

    width:
        100%;

}

#main-header .mc-credit-menu:hover .mc-credit-trigger i,
#main-header .mc-credit-menu:focus-within .mc-credit-trigger i {

    color:
        var(--mc-orange);

    transform:
        rotate(180deg);

}

#main-header .mc-credit-mega {

    position:
        absolute;

    top:
        100%;

    left:
        50%;

    width:
        min(1180px, calc(100% - 32px));

    max-height:
        calc(100vh - 105px);

    overflow-y:
        auto;

    padding:
        0;

    border:
        1px solid rgba(6,55,24,.12);

    border-top:
        4px solid var(--mc-orange);

    border-radius:
        0 0 22px 22px;

    background:
        #ffffff;

    box-shadow:
        0 28px 65px rgba(0,0,0,.24);

    opacity:
        0;

    visibility:
        hidden;

    pointer-events:
        none;

    transform:
        translate(-50%, 14px);

    transform-origin:
        top center;

    transition:
        opacity .25s ease,
        visibility .25s ease,
        transform .32s cubic-bezier(.22,1,.36,1);

    overscroll-behavior:
        contain;

}

#main-header .mc-credit-menu:hover .mc-credit-mega,
#main-header .mc-credit-menu:focus-within .mc-credit-mega {

    opacity:
        1;

    visibility:
        visible;

    pointer-events:
        auto;

    transform:
        translate(-50%, 0);

}

#main-header .mc-credit-mega-top {

    display:
        flex;

    align-items:
        center;

    justify-content:
        space-between;

    gap:
        24px;

    padding:
        19px 24px;

    background:
        linear-gradient(110deg, #063718 0%, #0d5c2e 72%, #14743c 100%);

    color:
        white;

}

#main-header .mc-credit-mega-title {

    display:
        flex;

    align-items:
        center;

    gap:
        13px;

}

#main-header .mc-credit-mega-title > i {

    display:
        grid;

    place-items:
        center;

    width:
        42px;

    height:
        42px;

    border-radius:
        12px;

    background:
        rgba(255,255,255,.12);

    color:
        var(--mc-orange);

    font-size:
        1.05rem;

}

#main-header .mc-credit-mega-title strong {

    display:
        block;

    font-family:
        'Poppins', sans-serif;

    font-size:
        .96rem;

    font-weight:
        800;

    letter-spacing:
        .01em;

}

#main-header .mc-credit-mega-title span {

    display:
        block;

    margin-top:
        2px;

    color:
        rgba(255,255,255,.72);

    font-size:
        .73rem;

    font-weight:
        500;

}

#main-header .mc-credit-mega-all {

    flex-shrink:
        0;

    gap:
        9px;

    padding:
        10px 14px !important;

    border:
        1px solid rgba(255,255,255,.18);

    border-radius:
        10px;

    background:
        rgba(255,255,255,.10);

    color:
        white !important;

    font-size:
        .66rem !important;

}

#main-header .mc-credit-mega-all::after {

    display:
        none;

}

#main-header .mc-credit-mega-all:hover {

    background:
        var(--mc-orange);

}

#main-header .mc-credit-mega-body {

    display:
        grid;

    gap:
        18px;

    padding:
        22px 24px 25px;

    background:
        linear-gradient(180deg, #ffffff 0%, #f6faf7 100%);

}

#main-header .mc-credit-section {

    min-width:
        0;

}

#main-header .mc-credit-section-heading {

    display:
        flex;

    align-items:
        center;

    gap:
        9px;

    margin-bottom:
        11px;

    padding:
        9px 13px;

    border-radius:
        9px;

    background:
        #eaf4ed;

    color:
        var(--mc-green-2);

    font-family:
        'Poppins', sans-serif;

    font-size:
        .72rem;

    font-weight:
        900;

    letter-spacing:
        .08em;

    text-transform:
        uppercase;

}

#main-header .mc-credit-section-heading i {

    color:
        var(--mc-orange);

}

#main-header .mc-credit-grid {

    display:
        grid;

    grid-template-columns:
        repeat(5, minmax(0, 1fr));

    gap:
        10px;

}

#main-header .mc-credit-grid-consumo {

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

}

#main-header .mc-credit-card {

    display:
        grid;

    grid-template-columns:
        42px 1fr 16px;

    align-items:
        center;

    gap:
        10px;

    min-height:
        76px;

    padding:
        11px 12px !important;

    border:
        1px solid #dfe9e2;

    border-radius:
        12px;

    background:
        #ffffff;

    color:
        #1d2a22 !important;

    text-align:
        left;

    text-transform:
        none !important;

    letter-spacing:
        0 !important;

    box-shadow:
        0 7px 18px rgba(6,55,24,.05);

    transition:
        transform .25s ease,
        border-color .25s ease,
        box-shadow .25s ease,
        background .25s ease !important;

}

#main-header .mc-credit-card::after {

    display:
        none;

}

#main-header .mc-credit-card-icon {

    display:
        grid;

    place-items:
        center;

    width:
        42px;

    height:
        42px;

    border-radius:
        11px;

    background:
        #edf7ef;

    color:
        var(--mc-green-2);

    font-size:
        .96rem;

    transition:
        background .25s ease,
        color .25s ease,
        transform .25s ease;

}

#main-header .mc-credit-card strong {

    display:
        block;

    color:
        #152219;

    font-size:
        .72rem;

    font-weight:
        850;

    line-height:
        1.25;

}

#main-header .mc-credit-card small {

    display:
        block;

    margin-top:
        4px;

    color:
        #718077;

    font-size:
        .61rem;

    font-weight:
        500;

    line-height:
        1.35;

}

#main-header .mc-credit-card > .fa-arrow-right {

    color:
        #a8b7ad;

    font-size:
        .67rem;

    transition:
        transform .25s ease,
        color .25s ease;

}

#main-header .mc-credit-card:hover {

    border-color:
        rgba(242,110,34,.55);

    background:
        #fffaf7;

    box-shadow:
        0 14px 28px rgba(6,55,24,.11);

    transform:
        translateY(-3px);

}

#main-header .mc-credit-card:hover .mc-credit-card-icon {

    background:
        var(--mc-orange);

    color:
        white;

    transform:
        scale(1.05);

}

#main-header .mc-credit-card:hover > .fa-arrow-right {

    color:
        var(--mc-orange);

    transform:
        translateX(3px);

}





@media (max-width: 1050px) and (min-width: 768px) {

    #main-header .mc-credit-grid {

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

    }

    #main-header .mc-credit-grid-consumo {

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

    }

}






#main-header .mc-header-button {

    flex-shrink:
        0;

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        8px;

    min-height:
        43px;

    padding:
        0 16px;

    border-radius:
        9px;

    background:
        var(--mc-orange);

    color:
        white;

    text-decoration:
        none;

    font-size:
        .68rem;

    font-weight:
        900;

    text-transform:
        uppercase;

    letter-spacing:
        .04em;

    white-space:
        nowrap;

    box-shadow:
        0 8px 22px
        rgba(242,110,34,.22);

    transition:
        transform .25s ease,
        background .25s ease;

}

#main-header .mc-header-button:hover {

    background:
        #ff7c30;

    transform:
        translateY(-2px);

}






#main-header .mc-mobile-toggle {

    display:
        none;

    width:
        46px;

    height:
        46px;

    align-items:
        center;

    justify-content:
        center;

    flex-shrink:
        0;

    border:
        1px solid
        rgba(255,255,255,.16);

    border-radius:
        12px;

    background:
        rgba(255,255,255,.08);

    color:
        white;

    cursor:
        pointer;

}






#mc-mobile-menu {

    display:
        none;

    position:
        fixed;

    top:
        82px;

    left:
        12px;

    right:
        12px;

    max-height:
        calc(100vh - 100px);

    overflow-y:
        auto;

    border:
        1px solid
        rgba(255,255,255,.10);

    border-radius:
        18px;

    background:
        rgba(3, 43, 19, .97);

    backdrop-filter:
        blur(18px);

    -webkit-backdrop-filter:
        blur(18px);

    box-shadow:
        0 25px 60px
        rgba(0,0,0,.30);

    padding:
        10px;

}

#mc-mobile-menu.open {

    display:
        block;

}

#mc-mobile-menu a {

    display:
        flex;

    align-items:
        center;

    gap:
        12px;

    width:
        100%;

    min-height:
        48px;

    padding:
        0 15px;

    border-radius:
        11px;

    color:
        white;

    text-decoration:
        none;

    font-size:
        .78rem;

    font-weight:
        800;

    text-transform:
        uppercase;

    letter-spacing:
        .06em;

}

#mc-mobile-menu a:hover {

    background:
        rgba(255,255,255,.08);

}

#mc-mobile-menu .mobile-whatsapp {

    margin-top:
        8px;

    justify-content:
        center;

    background:
        var(--mc-orange);

}






#main-header.scrolled {

    background:
        rgba(3,43,19,.96);

    box-shadow:
        0 12px 35px
        rgba(0,0,0,.18);

}

#main-header.scrolled .mc-header-inner {

    height:
        70px;

}






@media (max-width: 950px) {

    #main-header .mc-desktop-nav {

        gap:
            17px;

    }

    #main-header .mc-desktop-nav a {

        font-size:
            .64rem;

    }

}






@media (max-width: 767px) {

    #main-header .mc-header-inner {

        width:
            calc(100% - 24px);

        height:
            68px;

    }


    #main-header .mc-logo img {

        height:
            42px;

        max-width:
            150px;

    }


    #main-header .mc-desktop-nav,
    #main-header .mc-header-button {

        display:
            none !important;

    }


    #main-header .mc-mobile-toggle {

        display:
            flex;

    }


    #mc-mobile-menu {

        top:
            78px;

    }


    #main-header.scrolled .mc-header-inner {

        height:
            64px;

    }


    #main-header.scrolled #mc-mobile-menu {

        top:
            73px;

    }

}






@media (max-width: 380px) {

    #main-header .mc-header-inner {

        width:
            calc(100% - 18px);

    }

    #main-header .mc-logo img {

        height:
            39px;

        max-width:
            135px;

    }

}

</style>

 
<link rel="stylesheet" href="css/mc-polish.css">

<a class="mc-skip-link" href="#contenido-principal">
    Saltar al contenido
</a>

<header id="main-header">

    <div class="mc-header-inner">


         

        <a
            href="index.php"
            class="mc-logo"
            aria-label="CEPRODEMIC MULTICREDIT"
        >

            <img
                src="<?= mc_h($mcSiteHeader['logo']) ?>"
                alt="CEPRODEMIC MULTICREDIT"
            >

        </a>


         

        <nav class="mc-desktop-nav">

            <a href="index.php">
                Inicio
            </a>

            <div class="mc-credit-menu">

                <a
                    href="creditos.php"
                    class="mc-credit-trigger"
                    aria-haspopup="true"
                >
                    Créditos

                    <i class="fas fa-chevron-down" aria-hidden="true"></i>
                </a>


                <div class="mc-credit-mega">

                    <div class="mc-credit-mega-top">

                        <div class="mc-credit-mega-title">

                            <i class="fas fa-hand-holding-dollar" aria-hidden="true"></i>

                            <div>

                                <strong>
                                    Encuentra el crédito ideal para ti
                                </strong>

                                <span>
                                    Soluciones para impulsar tu negocio y cumplir tus objetivos.
                                </span>

                            </div>

                        </div>


                        <a href="creditos.php" class="mc-credit-mega-all">

                            Ver todos los créditos

                            <i class="fas fa-arrow-right" aria-hidden="true"></i>

                        </a>

                    </div>


                    <div class="mc-credit-mega-body">

                        <section class="mc-credit-section" aria-labelledby="mc-microempresa-title">

                            <div class="mc-credit-section-heading" id="mc-microempresa-title">

                                <i class="fas fa-store" aria-hidden="true"></i>

                                Crédito Microempresa

                            </div>


                            <div class="mc-credit-grid">

                                <a href="credito-ordinario.php" class="mc-credit-card">

                                    <span class="mc-credit-card-icon">
                                        <i class="fas fa-briefcase" aria-hidden="true"></i>
                                    </span>

                                    <span>
                                        <strong>Crédito Ordinario</strong>
                                        <small>Capital flexible para tu negocio.</small>
                                    </span>

                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>

                                </a>


                                <a href="credito-diario.php" class="mc-credit-card">

                                    <span class="mc-credit-card-icon">
                                        <i class="fas fa-calendar-day" aria-hidden="true"></i>
                                    </span>

                                    <span>
                                        <strong>Crédito Diario</strong>
                                        <small>Cuotas adaptadas al flujo diario.</small>
                                    </span>

                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>

                                </a>


                                <a href="crediempeno.php" class="mc-credit-card">

                                    <span class="mc-credit-card-icon">
                                        <i class="fas fa-gem" aria-hidden="true"></i>
                                    </span>

                                    <span>
                                        <strong>Crediempeño</strong>
                                        <small>Liquidez con respaldo prendario.</small>
                                    </span>

                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>

                                </a>


                                <a href="credimoto.php" class="mc-credit-card">

                                    <span class="mc-credit-card-icon">
                                        <i class="fas fa-motorcycle" aria-hidden="true"></i>
                                    </span>

                                    <span>
                                        <strong>Credimoto</strong>
                                        <small>Financia la moto que necesitas.</small>
                                    </span>

                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>

                                </a>


                                <a href="credito-grupal.php" class="mc-credit-card">

                                    <span class="mc-credit-card-icon">
                                        <i class="fas fa-people-group" aria-hidden="true"></i>
                                    </span>

                                    <span>
                                        <strong>Crédito Grupal</strong>
                                        <small>Bancos comunales y grupos solidarios.</small>
                                    </span>

                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>

                                </a>

                            </div>

                        </section>


                        <section class="mc-credit-section" aria-labelledby="mc-consumo-title">

                            <div class="mc-credit-section-heading" id="mc-consumo-title">

                                <i class="fas fa-house-user" aria-hidden="true"></i>

                                Crédito Consumo

                            </div>


                            <div class="mc-credit-grid mc-credit-grid-consumo">

                                <a href="educacion.php" class="mc-credit-card">

                                    <span class="mc-credit-card-icon">
                                        <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                    </span>

                                    <span>
                                        <strong>Educación</strong>
                                        <small>Invierte en estudios y capacitación.</small>
                                    </span>

                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>

                                </a>


                                <a href="salud.php" class="mc-credit-card">

                                    <span class="mc-credit-card-icon">
                                        <i class="fas fa-heart-pulse" aria-hidden="true"></i>
                                    </span>

                                    <span>
                                        <strong>Salud</strong>
                                        <small>Respaldo para cuidar a tu familia.</small>
                                    </span>

                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>

                                </a>


                                <a href="esparcimiento.php" class="mc-credit-card">

                                    <span class="mc-credit-card-icon">
                                        <i class="fas fa-umbrella-beach" aria-hidden="true"></i>
                                    </span>

                                    <span>
                                        <strong>Esparcimiento</strong>
                                        <small>Haz realidad tus planes personales.</small>
                                    </span>

                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>

                                </a>

                            </div>

                        </section>

                    </div>

                </div>

            </div>

            <a href="servicios.php">
                Servicios
            </a>

            <a href="conocenos.php">
                Nosotros
            </a>

            <a href="contacto.php">
                Contacto
            </a>
            <a href="admin/login.php">
                👤
            </a>

        </nav>


         

        <a
            href="https://wa.me/51968782473?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."
            target="_blank"
            rel="noopener noreferrer"
            class="mc-header-button"
        >

            <i class="fab fa-whatsapp"></i>

            Solicitar crédito

        </a>


         

        <button
            type="button"
            id="mc-mobile-toggle"
            class="mc-mobile-toggle"
            aria-label="Abrir menú"
            aria-expanded="false"
        >

            <i class="fas fa-bars"></i>

        </button>


    </div>


     

    <nav id="mc-mobile-menu">


        <a href="index.php">

            <i class="fas fa-house"></i>

            Inicio

        </a>


        <a href="creditos.php">

            <i class="fas fa-hand-holding-dollar"></i>

            Créditos

        </a>


        <a href="servicios.php">

            <i class="fas fa-layer-group"></i>

            Servicios

        </a>


        <a href="conocenos.php">

            <i class="fas fa-building"></i>

            Nosotros

        </a>


        <a href="contacto.php">

            <i class="fas fa-headset"></i>

            Contacto

        </a>


        <a
            href="https://wa.me/51968782473?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."
            target="_blank"
            rel="noopener noreferrer"
            class="mobile-whatsapp"
        >

            <i class="fab fa-whatsapp"></i>

            Solicitar crédito

        </a>


    </nav>

</header>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const header =
            document.getElementById(
                'main-header'
            );


        const toggle =
            document.getElementById(
                'mc-mobile-toggle'
            );


        const mobileMenu =
            document.getElementById(
                'mc-mobile-menu'
            );


        



        function updateHeader() {

            if (
                window.scrollY >
                30
            ) {

                header.classList.add(
                    'scrolled'
                );

            } else {

                header.classList.remove(
                    'scrolled'
                );

            }

        }


        updateHeader();


        window.addEventListener(
            'scroll',
            updateHeader,
            {
                passive:
                    true
            }
        );


        



        if (
            toggle &&
            mobileMenu
        ) {


            toggle.addEventListener(
                'click',
                function () {


                    const isOpen =
                        mobileMenu.classList.contains(
                            'open'
                        );


                    if (isOpen) {

                        mobileMenu.classList.remove(
                            'open'
                        );

                        toggle.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                        toggle.innerHTML =
                            '<i class="fas fa-bars"></i>';

                    } else {

                        mobileMenu.classList.add(
                            'open'
                        );

                        toggle.setAttribute(
                            'aria-expanded',
                            'true'
                        );

                        toggle.innerHTML =
                            '<i class="fas fa-xmark"></i>';

                    }

                }
            );


            mobileMenu
                .querySelectorAll('a')
                .forEach(
                    function (link) {

                        link.addEventListener(
                            'click',
                            function () {

                                mobileMenu.classList.remove(
                                    'open'
                                );

                                toggle.setAttribute(
                                    'aria-expanded',
                                    'false'
                                );

                                toggle.innerHTML =
                                    '<i class="fas fa-bars"></i>';

                            }
                        );

                    }
                );

        }


        



        document.addEventListener(
            'click',
            function (event) {

                if (
                    mobileMenu &&
                    toggle &&
                    mobileMenu.classList.contains(
                        'open'
                    ) &&
                    !mobileMenu.contains(
                        event.target
                    ) &&
                    !toggle.contains(
                        event.target
                    )
                ) {

                    mobileMenu.classList.remove(
                        'open'
                    );

                    toggle.setAttribute(
                        'aria-expanded',
                        'false'
                    );

                    toggle.innerHTML =
                        '<i class="fas fa-bars"></i>';

                }

            }
        );


    }
);

</script>
