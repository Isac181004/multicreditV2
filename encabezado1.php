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

            <a href="creditos.php">
                Créditos
            </a>

            <a href="servicios.php">
                Servicios
            </a>

            <a href="conocenos.php">
                Nosotros
            </a>

            <a href="contacto.php">
                Contacto
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
