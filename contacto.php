<?php require_once __DIR__ . '/cms/bootstrap.php'; $mcSite = mc_site(); $mcSite['email'] = 'infomulticredit@gmail.com'; ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Contacto | CEPRODEMIC MULTICREDIT
    </title>


     

    <script src="https://cdn.tailwindcss.com"></script>


     

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >


     

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@500;600;700;800;900&display=swap"
        rel="stylesheet"
    >


    <script>

        tailwind.config = {

            theme: {

                extend: {

                    colors: {

                        'brand-green':
                            '#0d5c2e',

                        'brand-green-dark':
                            '#083d1f',

                        'brand-green-deep':
                            '#052712',

                        'brand-orange':
                            '#f26e22'

                    },

                    fontFamily: {

                        sans: [
                            'Inter',
                            'sans-serif'
                        ],

                        display: [
                            'Poppins',
                            'sans-serif'
                        ]

                    }

                }

            }

        };

    </script>


    <style>

        



        html {
            scroll-behavior: smooth;
        }

        body {

            margin: 0;

            font-family:
                'Inter',
                sans-serif;

            color:
                #17221a;

            background:
                #ffffff;

            line-height:
                1.6;

            overflow-x:
                hidden;

        }


        .font-display {

            font-family:
                'Poppins',
                sans-serif;

        }


        



        .contact-hero {

            position:
                relative;

            min-height:
                78vh;

            display:
                flex;

            align-items:
                center;

            overflow:
                hidden;

            background:
                #063718;

        }


        .contact-hero-image {

            position:
                absolute;

            inset:
                0;

            width:
                100%;

            height:
                100%;

            object-fit:
                cover;

            animation:
                contactHeroZoom
                18s
                ease-out
                forwards;

        }


        @keyframes contactHeroZoom {

            from {
                transform:
                    scale(1);
            }

            to {
                transform:
                    scale(1.08);
            }

        }


        .contact-hero-overlay {

            position:
                absolute;

            inset:
                0;

            background:

                linear-gradient(
                    90deg,
                    rgba(3,38,17,.97) 0%,
                    rgba(5,57,27,.85) 40%,
                    rgba(5,65,30,.49) 68%,
                    rgba(3,31,14,.10) 100%
                );

        }


        .contact-hero-content {

            position:
                relative;

            z-index:
                5;

            max-width:
                1180px;

            width:
                100%;

            margin:
                0 auto;

            padding:
                145px
                20px
                105px;

        }


        .contact-eyebrow {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                10px;

            padding:
                9px 15px;

            border:
                1px solid
                rgba(255,255,255,.24);

            border-radius:
                999px;

            background:
                rgba(255,255,255,.08);

            backdrop-filter:
                blur(10px);

            color:
                white;

            font-size:
                .74rem;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                .16em;

        }


        .contact-eyebrow i {

            color:
                #f26e22;

        }


        .contact-hero h1 {

            max-width:
                850px;

            margin-top:
                27px;

            color:
                white;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.8rem,
                    5.6vw,
                    5.5rem
                );

            line-height:
                .98;

            font-weight:
                900;

            letter-spacing:
                -.055em;

        }


        .contact-hero h1 span {

            color:
                #f26e22;

        }


        .contact-hero p {

            max-width:
                700px;

            margin-top:
                25px;

            color:
                rgba(255,255,255,.87);

            font-size:
                1.08rem;

            line-height:
                1.8;

        }


        .contact-hero-actions {

            display:
                flex;

            flex-wrap:
                wrap;

            gap:
                13px;

            margin-top:
                32px;

        }


        .contact-btn {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                9px;

            min-height:
                52px;

            padding:
                0 25px;

            border-radius:
                10px;

            color:
                white;

            text-decoration:
                none;

            font-weight:
                800;

            transition:
                transform .3s ease;

        }


        .contact-btn-primary {

            background:
                #f26e22;

            box-shadow:
                0 18px 42px
                rgba(242,110,34,.28);

        }


        .contact-btn-secondary {

            border:
                1px solid
                rgba(255,255,255,.34);

            background:
                rgba(255,255,255,.08);

            backdrop-filter:
                blur(10px);

        }


        .contact-btn:hover {

            transform:
                translateY(-4px);

        }


        .contact-btn-secondary:hover {

            background:
                white;

            color:
                #0d5c2e;

        }


        



        .contact-section {

            padding:
                105px 20px;

        }


        .contact-section-light {

            background:
                #f7faf8;

        }


        .contact-container {

            max-width:
                1180px;

            margin:
                0 auto;

        }


        .contact-grid {

            display:
                grid;

            grid-template-columns:
                .9fr
                1.1fr;

            gap:
                22px;

            align-items:
                stretch;

        }


        .contact-card-premium {

            position:
                relative;

            overflow:
                hidden;

            padding:
                38px;

            border:
                1px solid
                #e2e9e4;

            border-radius:
                22px;

            background:
                white;

            box-shadow:
                0 18px 45px
                rgba(5,39,18,.06);

            transition:
                transform .35s ease,
                box-shadow .35s ease;

        }


        .contact-card-premium:hover {

            transform:
                translateY(-6px);

            box-shadow:
                0 27px 58px
                rgba(5,39,18,.10);

        }


        .contact-card-premium h2 {

            margin-top:
                20px;

            color:
                #10271a;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                1.65rem;

            font-weight:
                900;

        }


        .contact-card-premium > p {

            margin-top:
                10px;

            color:
                #69756e;

            line-height:
                1.8;

        }


        .contact-main-icon {

            width:
                62px;

            height:
                62px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                16px;

            background:
                #edf7ef;

            color:
                #0d5c2e;

            font-size:
                1.35rem;

        }


        



        .contact-info-list {

            margin-top:
                28px;

            display:
                grid;

            gap:
                16px;

        }


        .contact-info {

            display:
                flex;

            align-items:
                flex-start;

            gap:
                13px;

            padding:
                14px;

            border:
                1px solid
                #e5ebe6;

            border-radius:
                14px;

            background:
                #f8faf9;

        }


        .contact-info-icon {

            flex:
                0 0 auto;

            width:
                45px;

            height:
                45px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                12px;

            background:
                #edf7ef;

            color:
                #0d5c2e;

        }


        .contact-info:nth-child(2)
        .contact-info-icon,
        .contact-info:nth-child(4)
        .contact-info-icon {

            background:
                #fff0e7;

            color:
                #f26e22;

        }


        .contact-info strong {

            display:
                block;

            color:
                #1d2c23;

            font-size:
                .85rem;

        }


        .contact-info span,
        .contact-info a {

            display:
                block;

            margin-top:
                3px;

            color:
                #68756e;

            font-size:
                .82rem;

            line-height:
                1.55;

            text-decoration:
                none;

        }


        .contact-info a:hover {

            color:
                #0d5c2e;

        }


        



        .agency-block {

            margin-top:
                30px;

            padding-top:
                25px;

            border-top:
                1px solid
                #e4ebe6;

        }


        .agency-block h3 {

            color:
                #192a20;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                1.15rem;

            font-weight:
                900;

        }


        .agency-grid {

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                10px;

            margin-top:
                15px;

        }


        .agency-item {

            padding:
                13px;

            border:
                1px solid
                #e2e9e4;

            border-radius:
                12px;

            background:
                #f8faf9;

        }


        .agency-item strong {

            display:
                block;

            color:
                #1d2c23;

            font-size:
                .82rem;

        }


        .agency-item span {

            display:
                block;

            margin-top:
                2px;

            color:
                #7a847e;

            font-size:
                .76rem;

        }


        



        .contact-form-card {

            background:
                linear-gradient(
                    135deg,
                    #ffffff,
                    #f9fbfa
                );

        }


        .contact-form-heading {

            display:
                flex;

            gap:
                16px;

            align-items:
                flex-start;

        }


        .contact-form-heading .contact-main-icon {

            background:
                #fff0e7;

            color:
                #f26e22;

        }


        .contact-form-heading h2 {

            margin-top:
                0;

        }


        .contact-form-label {

            display:
                block;

            margin-bottom:
                7px;

            color:
                #303d35;

            font-size:
                .82rem;

            font-weight:
                800;

        }


        .contact-input,
        .contact-select,
        .contact-textarea {

            width:
                100%;

            border:
                1px solid
                #dfe7e2;

            border-radius:
                13px;

            background:
                white;

            padding:
                13px 14px;

            outline:
                none;

            color:
                #24332a;

            font-size:
                .9rem;

            transition:
                border-color .25s ease,
                box-shadow .25s ease;

        }


        .contact-input:focus,
        .contact-select:focus,
        .contact-textarea:focus {

            border-color:
                #0d5c2e;

            box-shadow:
                0 0 0 4px
                rgba(13,92,46,.09);

        }


        .contact-textarea {

            resize:
                vertical;

            min-height:
                130px;

        }


        .contact-submit {

            width:
                100%;

            min-height:
                54px;

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                10px;

            margin-top:
                22px;

            border:
                0;

            border-radius:
                11px;

            background:
                #0d5c2e;

            color:
                white;

            font-weight:
                800;

            cursor:
                pointer;

            box-shadow:
                0 15px 32px
                rgba(13,92,46,.18);

            transition:
                transform .3s ease,
                background .3s ease;

        }


        .contact-submit:hover {

            transform:
                translateY(-3px);

            background:
                #083d1f;

        }


        



        .contact-bottom-grid {

            display:
                grid;

            grid-template-columns:
                1fr
                1fr;

            gap:
                22px;

            margin-top:
                22px;

        }


        .contact-map {

            overflow:
                hidden;

            min-height:
                410px;

            border-radius:
                22px;

            box-shadow:
                0 20px 50px
                rgba(5,39,18,.12);

            background:
                #dfe8e1;

        }


        .contact-map iframe {

            display:
                block;

            width:
                100%;

            height:
                410px;

            border:
                0;

        }


        .contact-photo {

            position:
                relative;

            overflow:
                hidden;

            min-height:
                410px;

            border-radius:
                22px;

        }


        .contact-photo img {

            width:
                100%;

            height:
                100%;

            object-fit:
                cover;

        }


        .contact-photo-overlay {

            position:
                absolute;

            inset:
                0;

            display:
                flex;

            align-items:
                flex-end;

            padding:
                30px;

            background:
                linear-gradient(
                    to top,
                    rgba(3,38,17,.85),
                    transparent 65%
                );

            color:
                white;

        }


        .contact-photo-overlay h3 {

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                1.55rem;

            font-weight:
                900;

        }


        .contact-photo-overlay p {

            margin-top:
                5px;

            color:
                rgba(255,255,255,.75);

            font-size:
                .84rem;

        }


        



        .contact-cta {

            position:
                relative;

            overflow:
                hidden;

            margin-top:
                90px;

            padding:
                95px 20px;

            background:
                #063718;

            color:
                white;

        }


        .contact-cta-image {

            position:
                absolute;

            inset:
                0;

            width:
                100%;

            height:
                100%;

            object-fit:
                cover;

        }


        .contact-cta-overlay {

            position:
                absolute;

            inset:
                0;

            background:
                linear-gradient(
                    90deg,
                    rgba(3,38,17,.96),
                    rgba(5,59,27,.76),
                    rgba(3,31,14,.38)
                );

        }


        .contact-cta-content {

            position:
                relative;

            z-index:
                5;

            max-width:
                800px;

            margin:
                auto;

            text-align:
                center;

        }


        .contact-cta-content h2 {

            margin-top:
                12px;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.4rem,
                    5vw,
                    4.4rem
                );

            line-height:
                1;

            font-weight:
                900;

            letter-spacing:
                -.05em;

        }


        .contact-cta-content p {

            margin-top:
                18px;

            color:
                rgba(255,255,255,.78);

            line-height:
                1.8;

        }


        



        .contact-reveal {

            opacity:
                0;

            transform:
                translateY(32px);

            transition:
                opacity .85s
                cubic-bezier(.16,1,.3,1),

                transform .85s
                cubic-bezier(.16,1,.3,1);

        }


        .contact-reveal.show {

            opacity:
                1;

            transform:
                translateY(0);

        }


        



        @media (max-width:1000px) {

            .contact-grid,
            .contact-bottom-grid {

                grid-template-columns:
                    1fr;

            }

        }


        @media (max-width:767px) {

            .contact-hero {

                min-height:
                    76vh;

            }


            .contact-hero-content {

                padding:
                    120px 20px 85px;

            }


            .contact-hero h1 {

                font-size:
                    clamp(
                        2.7rem,
                        12vw,
                        4.8rem
                    );

            }


            .contact-hero p {

                font-size:
                    1rem;

            }


            .contact-hero-actions {

                flex-direction:
                    column;

            }


            .contact-btn {

                width:
                    100%;

            }


            .contact-section {

                padding:
                    80px 20px;

            }


            .contact-card-premium {

                padding:
                    28px 22px;

            }


            .agency-grid {

                grid-template-columns:
                    1fr;

            }


            .contact-map,
            .contact-map iframe,
            .contact-photo {

                min-height:
                    340px;

            }


            .contact-map iframe {

                height:
                    340px;

            }


            .contact-cta {

                margin-top:
                    60px;

                padding:
                    80px 20px;

            }

        }

    </style>

</head>


<body>


<?php include 'encabezado.php'; ?>






<section class="contact-hero">


    <img
        src="img/cajamarca.webp"
        alt="Cajamarca - CEPRODEMIC MULTICREDIT"
        class="contact-hero-image"
    >


    <div class="contact-hero-overlay"></div>


    <div class="contact-hero-content contact-reveal">


        <span class="contact-eyebrow">

            <i class="fas fa-headset"></i>

            Atención Multicredit

        </span>


        <h1>

            Estamos para

            <span>
                ayudarte.
            </span>

        </h1>


        <p>

            Comunícate con nuestro equipo,
            selecciona la sede más cercana y recibe
            orientación sobre créditos, requisitos y
            el proceso de evaluación.

        </p>


        <div class="contact-hero-actions">


            <a
                href="https://wa.me/<?= preg_replace('/\D/','',$mcSite['whatsapp']) ?>"
                target="_blank"
                rel="noopener noreferrer"
                class="contact-btn contact-btn-primary"
            >

                <i class="fab fa-whatsapp"></i>

                Escribir por WhatsApp

            </a>


            <a
                href="#contacto"
                class="contact-btn contact-btn-secondary"
            >

                <i class="fas fa-arrow-down"></i>

                Ver canales

            </a>


        </div>


    </div>

</section>






<section
    id="contacto"
    class="contact-section contact-section-light"
>

    <div class="contact-container">


        <div class="contact-grid">


            



            <div class="contact-card-premium contact-reveal">


                <div class="contact-main-icon">

                    <i class="fas fa-headset"></i>

                </div>


                <h2>
                    Nuestros canales.
                </h2>


                <p>

                    Estamos disponibles para ayudarte
                    con información sobre créditos,
                    requisitos, simulaciones y nuestras
                    agencias.

                </p>


                <div class="contact-info-list">


                    <div class="contact-info">

                        <div class="contact-info-icon">

                            <i class="fab fa-whatsapp"></i>

                        </div>

                        <div>

                            <strong>
                                WhatsApp
                            </strong>

                            <a
                                href="https://wa.me/<?= preg_replace('/\D/','',$mcSite['whatsapp1']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <?= mc_h($mcSite['telefono']) ?> · Cajamarca- Escribir ahora 
                            </a>
                            <a
                                href="https://wa.me/<?= preg_replace('/\D/','',$mcSite['whatsapp2']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <?= mc_h($mcSite['phone2']) ?> · San Marcos- Escribir ahora
                            </a>
                            <a
                                href="https://wa.me/<?= preg_replace('/\D/','',$mcSite['whatsapp3']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <?= mc_h($mcSite['phone3']) ?> · Cajabamba- Escribir ahora
                            </a>
                            <a
                                href="https://wa.me/<?= preg_replace('/\D/','',$mcSite['whatsapp4']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <?= mc_h($mcSite['phone4']) ?> · Huamachuco- Escribir ahora
                            </a>

                        </div>

                    </div>


                    <div class="contact-info">

                        <div class="contact-info-icon">

                            <i class="fas fa-phone"></i>

                        </div>

                        <div>

                            <strong>
                                Teléfonos
                            </strong>

                            <span>
                                <?= mc_h($mcSite['telefono']) ?><br>
                                <?= mc_h($mcSite['phone2']) ?><br>
                                <?= mc_h($mcSite['phone3']) ?><br>
                                <?= mc_h($mcSite['phone4']) ?>
                            </span>

                        </div>

                    </div>


                    <div class="contact-info">

                        <div class="contact-info-icon">

                            <i class="fas fa-envelope"></i>

                        </div>

                        <div>

                            <strong>
                                Correo
                            </strong>

                            <a
                                href="mailto:<?= mc_h($mcSite['email']) ?>"
                            >
                                <?= mc_h($mcSite['email']) ?>
                            </a>

                        </div>

                    </div>


                    <div class="contact-info">

                        <div class="contact-info-icon">

                            <i class="fas fa-location-dot"></i>

                        </div>

                        <div>

                            <strong>
                                Sede principal
                            </strong>

                            <span>

                                <?= mc_nl2br($mcSite['address1']) ?><br>
                                <?= mc_nl2br($mcSite['address2']) ?><br>
                                <?= mc_nl2br($mcSite['address3']) ?><br>
                                <?= mc_nl2br($mcSite['address4']) ?>

                            </span>

                        </div>

                    </div>


                </div>


                <div class="agency-block">


                    <h3>
                        Agencias y atención.
                    </h3>


                    <div class="agency-grid">


                        <div class="agency-item">

                            <strong>
                                Sede Principal
                            </strong>

                            <span>
                                Cajamarca
                            </span>

                        </div>


                        <div class="agency-item">

                            <strong>
                                Agencia
                            </strong>

                            <span>
                                Huamachuco
                            </span>

                        </div>


                        <div class="agency-item">

                            <strong>
                                Agencia
                            </strong>

                            <span>
                                Cajabamba
                            </span>

                        </div>


                        <div class="agency-item">

                            <strong>
                                Agencia
                            </strong>

                            <span>
                                San Marcos
                            </span>

                        </div>


                    </div>


                </div>


            </div>


            



            <div
                class="contact-card-premium contact-form-card contact-reveal"
            >


                <div class="contact-form-heading">


                    <div class="contact-main-icon">

                        <i class="fab fa-whatsapp"></i>

                    </div>


                    <div>

                        <h2>
                            Solicita información.
                        </h2>

                        <p
                            class="text-[#69756e] mt-2"
                        >

                            Déjanos tus datos y elige
                            dónde deseas ser atendido.
                            Tu consulta será enviada
                            directamente a WhatsApp.

                        </p>

                    </div>


                </div>


                <form
                    id="contactForm"
                    class="mt-8"
                >


                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 gap-4"
                    >


                        <div>

                            <label
                                for="nombre"
                                class="contact-form-label"
                            >
                                Nombres y apellidos
                            </label>


                            <input
                                id="nombre"
                                required
                                placeholder="Ej. Juan Pérez"
                                class="contact-input"
                            >

                        </div>


                        <div>

                            <label
                                for="telefono"
                                class="contact-form-label"
                            >
                                Teléfono
                            </label>


                            <input
                                id="telefono"
                                required
                                inputmode="tel"
                                placeholder="Ej. 999 999 999"
                                class="contact-input"
                            >

                        </div>


                    </div>


                    <div class="mt-5">

                        <label
                            for="tema"
                            class="contact-form-label"
                        >
                            ¿Qué necesitas?
                        </label>


                        <select
                            id="tema"
                            class="contact-select"
                        >

                            <option>
                                Información sobre un crédito
                            </option>

                            <option>
                                Simulación de crédito
                            </option>

                            <option>
                                Requisitos para solicitar un crédito
                            </option>

                            <option>
                                Información sobre una agencia
                            </option>

                            <option>
                                Otro
                            </option>

                        </select>

                    </div>


                    <div class="mt-5">

                        <label
                            for="sede"
                            class="contact-form-label"
                        >
                            Sede donde deseas ser atendido
                        </label>


                        <select
                            id="sede"
                            class="contact-select"
                        >

                            <option value="cajamarca">
                                Sede Principal - Cajamarca
                            </option>

                            <option value="huamachuco">
                                Agencia Huamachuco
                            </option>

                            <option value="cajabamba">
                                Agencia Cajabamba
                            </option>

                            <option value="san-marcos">
                                Agencia San Marcos
                            </option>

                        </select>

                    </div>


                    <div class="mt-5">

                        <label
                            for="mensaje"
                            class="contact-form-label"
                        >
                            Mensaje
                        </label>


                        <textarea
                            id="mensaje"
                            rows="5"
                            placeholder="Cuéntanos brevemente qué necesitas..."
                            class="contact-textarea"
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        class="contact-submit"
                    >

                        <i class="fab fa-whatsapp text-lg"></i>

                        Enviar consulta por WhatsApp

                    </button>


                </form>


            </div>


        </div>


        



        <div class="contact-bottom-grid">


            <div class="contact-photo contact-reveal">

                <img
                    src="img/img3.webp"
                    alt="Cajamarca"
                    loading="lazy"
                >


                <div class="contact-photo-overlay">

                    <div>

                        <h3>
                            Estamos cerca de ti.
                        </h3>

                        <p>
                            Atención personalizada para
                            acompañarte en tu proyecto.
                        </p>

                    </div>

                </div>

            </div>


            <div class="contact-map contact-reveal">

                <iframe
                    title="Mapa de ubicación de CEPRODEMIC MULTICREDIT"
                    src="https://www.google.com/maps?q=multicredit%2C%20Per%C3%BA&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>

            </div>


        </div>


    </div>

</section>






<section class="contact-cta">


    <img
        src="img/cajamarca.webp"
        alt="Cajamarca"
        class="contact-cta-image"
    >


    <div class="contact-cta-overlay"></div>


    <div class="contact-cta-content contact-reveal">


        <span class="text-brand-orange uppercase tracking-[.2em] text-sm font-extrabold">
            Atención cercana
        </span>


        <h2>

            Hablemos de tu
            próximo proyecto.

        </h2>


        <p>

            Cuéntanos qué necesitas financiar
            y un asesor podrá orientarte sobre
            las alternativas disponibles.

        </p>


        <div
            class="flex flex-col sm:flex-row justify-center gap-3 mt-8"
        >


            <a
                href="creditos.php"
                class="contact-btn contact-btn-primary"
            >

                <i class="fas fa-layer-group"></i>

                Ver créditos

            </a>


            <a
                href="https://wa.me/<?= preg_replace('/\D/','',$mcSite['whatsapp']) ?>?text=Hola%2C%20deseo%20orientaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."
                target="_blank"
                rel="noopener noreferrer"
                class="contact-btn contact-btn-secondary"
            >

                <i class="fab fa-whatsapp"></i>

                Hablar con un asesor

            </a>


        </div>


    </div>

</section>






<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        



        const elements =
            document.querySelectorAll(
                '.contact-reveal'
            );


        if (
            'IntersectionObserver'
            in window
        ) {


            const observer =
                new IntersectionObserver(
                    function (entries) {

                        entries.forEach(
                            function (entry) {

                                if (
                                    entry.isIntersecting
                                ) {

                                    entry.target.classList.add(
                                        'show'
                                    );

                                    observer.unobserve(
                                        entry.target
                                    );

                                }

                            }
                        );

                    },
                    {
                        threshold:
                            .12
                    }
                );


            elements.forEach(
                function (element) {

                    observer.observe(
                        element
                    );

                }
            );


        } else {


            elements.forEach(
                function (element) {

                    element.classList.add(
                        'show'
                    );

                }
            );

        }


        



        const form =
            document.getElementById(
                'contactForm'
            );


        if (!form) {
            return;
        }


        form.addEventListener(
            'submit',
            function (e) {

                e.preventDefault();


                const nombre =
                    document
                        .getElementById('nombre')
                        .value
                        .trim();


                const telefono =
                    document
                        .getElementById('telefono')
                        .value
                        .trim();


                const tema =
                    document
                        .getElementById('tema')
                        .value;


                const sedeSelect =
                    document
                        .getElementById('sede');


                const sede =
                    sedeSelect
                        .options[sedeSelect.selectedIndex]
                        .text;


                const numerosPorSede = {
                    cajamarca: "51968782473",
                    "san-marcos": "51976782829",
                    cajabamba: "51976327494",
                    huamachuco: "51993647493"
                };


                const numeroWhatsApp =
                    numerosPorSede[sedeSelect.value] ||
                    numerosPorSede.cajamarca;


                const mensaje =
                    document
                        .getElementById('mensaje')
                        .value
                        .trim();


                const textoMensaje =

                    "Hola Multicredit, deseo información.\n\n" +

                    "*Nombre:* " +
                    nombre +
                    "\n" +

                    "*Teléfono:* " +
                    telefono +
                    "\n" +

                    "*Tema:* " +
                    tema +
                    "\n" +

                    "*Sede elegida:* " +
                    sede +
                    "\n" +

                    "*Mensaje:* " +

                    (
                        mensaje ||
                        "Deseo recibir orientación sobre el proceso y requisitos."
                    );


                const whatsappURL =

                    "https://wa.me/" +
                    numeroWhatsApp +
                    "?text=" +
                    encodeURIComponent(
                        textoMensaje
                    );


                window.open(
                    whatsappURL,
                    "_blank",
                    "noopener,noreferrer"
                );

            }
        );


    }
);

</script>


<?php include 'footer.php'; ?>


</body>

</html>
