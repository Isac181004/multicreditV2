<?php
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Servicios | CEPRODEMIC MULTICREDIT
    </title>

    <meta
        name="description"
        content="Servicios de CEPRODEMIC MULTICREDIT: capacitación, educación financiera, acompañamiento al emprendedor y soluciones de financiamiento."
    >


     
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


        



        .svc-hero {

            position:
                relative;

            min-height:
                92vh;

            display:
                flex;

            align-items:
                center;

            overflow:
                hidden;

            background:
                #063718;

        }


        .svc-hero-image {

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

            transform:
                scale(1.03);

            animation:
                svcHeroZoom
                18s
                ease-out
                forwards;

        }


        @keyframes svcHeroZoom {

            from {
                transform:
                    scale(1.03);
            }

            to {
                transform:
                    scale(1.10);
            }

        }


        .svc-hero-overlay {

            position:
                absolute;

            inset:
                0;

            background:

                linear-gradient(
                    90deg,
                    rgba(3,38,17,.96) 0%,
                    rgba(4,54,24,.85) 32%,
                    rgba(5,62,28,.50) 66%,
                    rgba(3,31,14,.12) 100%
                );

        }


        .svc-hero-bottom {

            position:
                absolute;

            left:
                0;

            right:
                0;

            bottom:
                0;

            height:
                180px;

            background:

                linear-gradient(
                    to bottom,
                    transparent,
                    rgba(0,0,0,.25)
                );

        }


        .svc-hero-content {

            position:
                relative;

            z-index:
                5;

            width:
                100%;

            padding:
                150px 20px 105px;

        }


        .svc-hero-grid {

            max-width:
                1180px;

            margin:
                0 auto;

            display:
                grid;

            grid-template-columns:
                minmax(0, 1.12fr)
                minmax(300px, .88fr);

            gap:
                50px;

            align-items:
                center;

        }


        .svc-eyebrow {

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
                #ffffff;

            font-size:
                .74rem;

            font-weight:
                400;

            text-transform:
                uppercase;

            letter-spacing:
                .17em;

        }


        .svc-eyebrow i {

            color:
                #f26e22;

        }


        .svc-hero-title {

            margin-top:
                27px;

            max-width:
                850px;

            color:
                white;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.4rem,
                    5vw,
                    4.8rem
                );

            line-height:
                .98;

            font-weight:
                900;

            letter-spacing:
                -.06em;

        }


        .svc-hero-title span {

            color:
                #f26e22;

        }


        .svc-hero-text {

            max-width:
                690px;

            margin-top:
                27px;

            color:
                rgba(255,255,255,.87);

            font-size:
                1.1rem;

            line-height:
                1.8;

        }


        .svc-actions {

            display:
                flex;

            flex-wrap:
                wrap;

            gap:
                14px;

            margin-top:
                36px;

        }


        .svc-btn-primary {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                10px;

            min-height:
                54px;

            padding:
                0 27px;

            border-radius:
                10px;

            background:
                #f26e22;

            color:
                #ffffff;

            text-decoration:
                none;

            font-size:
                .82rem;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                .05em;

            box-shadow:
                0 18px 44px
                rgba(242,110,34,.30);

            transition:
                transform .35s ease,
                box-shadow .35s ease,
                background .3s ease;

        }


        .svc-btn-primary:hover {

            transform:
                translateY(-4px);

            background:
                #ff7d32;

            box-shadow:
                0 24px 52px
                rgba(242,110,34,.40);

        }


        .svc-btn-outline {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                10px;

            min-height:
                54px;

            padding:
                0 27px;

            border-radius:
                10px;

            border:
                1px solid
                rgba(255,255,255,.36);

            color:
                white;

            background:
                rgba(255,255,255,.08);

            backdrop-filter:
                blur(10px);

            text-decoration:
                none;

            font-size:
                .82rem;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                .05em;

            transition:
                .3s ease;

        }


        .svc-btn-outline:hover {

            transform:
                translateY(-4px);

            background:
                white;

            color:
                #0d5c2e;

        }


        



        .svc-hero-card {

            position:
                relative;

            overflow:
                hidden;

            min-height:
                460px;

            border:
                1px solid
                rgba(255,255,255,.20);

            border-radius:
                24px;

            background:
                rgba(255,255,255,.10);

            backdrop-filter:
                blur(12px);

            box-shadow:
                0 30px 90px
                rgba(0,0,0,.22);

        }


        .svc-hero-card::before {

            content:
                "";

            position:
                absolute;

            inset:
                0;

            background:

                linear-gradient(
                    135deg,
                    rgba(255,255,255,.14),
                    transparent 45%,
                    rgba(242,110,34,.12)
                );

        }


        .svc-hero-card-image {

            position:
                absolute;

            inset:
                18px;

            overflow:
                hidden;

            border-radius:
                18px;

        }


        .svc-hero-card-image img {

            width:
                100%;

            height:
                100%;

            object-fit:
                cover;

            transition:
                transform .8s ease;

        }


        .svc-hero-card:hover
        .svc-hero-card-image img {

            transform:
                scale(1.06);

        }


        .svc-floating-year {

            position:
                absolute;

            left:
                30px;

            bottom:
                30px;

            z-index:
                5;

            padding:
                19px 22px;

            border-radius:
                15px;

            background:
                rgba(255,255,255,.94);

            box-shadow:
                0 20px 45px
                rgba(0,0,0,.22);

        }


        .svc-floating-year strong {

            display:
                block;

            color:
                #0d5c2e;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                2.2rem;

            line-height:
                1;

            font-weight:
                900;

        }


        .svc-floating-year span {

            display:
                block;

            margin-top:
                4px;

            color:
                #67746c;

            font-size:
                .78rem;

            font-weight:
                700;

        }


        



        .svc-trust {

            position:
                relative;

            z-index:
                20;

            margin-top:
                -55px;

            padding:
                0 20px;

        }


        .svc-trust-box {

            max-width:
                1180px;

            margin:
                auto;

            display:
                grid;

            grid-template-columns:
                repeat(4,1fr);

            background:
                rgba(255,255,255,.98);

            border:
                1px solid
                #e5ebe7;

            border-radius:
                20px;

            overflow:
                hidden;

            box-shadow:
                0 25px 70px
                rgba(5,39,18,.13);

        }


        .svc-trust-item {

            padding:
                30px 24px;

            text-align:
                center;

            position:
                relative;

        }


        .svc-trust-item:not(:last-child)::after {

            content:
                "";

            position:
                absolute;

            right:
                0;

            top:
                25%;

            width:
                1px;

            height:
                50%;

            background:
                #e4ebe6;

        }


        .svc-trust-number {

            color:
                #0d5c2e;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                2.25rem;

            font-weight:
                900;

            line-height:
                1;

        }


        .svc-trust-label {

            margin-top:
                7px;

            color:
                #69766f;

            font-size:
                .82rem;

            font-weight:
                600;

        }


        



        .svc-section {

            padding:
                110px 20px;

        }


        .svc-section-white {

            background:
                white;

        }


        .svc-section-light {

            background:
                #f7faf8;

        }


        .svc-container {

            max-width:
                1180px;

            margin:
                0 auto;

        }


        .svc-kicker {

            color:
                #f26e22;

            font-size:
                .76rem;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                .2em;

        }


        .svc-heading {

            max-width:
                800px;

            margin:
                0 auto 60px;

            text-align:
                center;

        }


        .svc-heading h2 {

            margin-top:
                12px;

            color:
                #10271a;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.4rem,
                    5vw,
                    4.4rem
                );

            font-weight:
                900;

            line-height:
                1.02;

            letter-spacing:
                -.05em;

        }


        .svc-heading p {

            margin-top:
                18px;

            color:
                #69756e;

            font-size:
                1rem;

            line-height:
                1.8;

        }


        



        .svc-intro-grid {

            display:
                grid;

            grid-template-columns:
                minmax(0,.95fr)
                minmax(0,1.05fr);

            gap:
                70px;

            align-items:
                center;

        }


        .svc-intro-image {

            position:
                relative;

        }


        .svc-intro-image::before {

            content:
                "";

            position:
                absolute;

            left:
                -18px;

            bottom:
                -18px;

            width:
                80%;

            height:
                80%;

            border-radius:
                20px;

            background:
                #e8f2ea;

            z-index:
                0;

        }


        .svc-intro-image img {

            position:
                relative;

            z-index:
                2;

            width:
                100%;

            height:
                510px;

            object-fit:
                cover;

            border-radius:
                22px;

            box-shadow:
                0 30px 75px
                rgba(5,39,18,.15);

        }


        .svc-intro-card {

            position:
                absolute;

            right:
                -22px;

            bottom:
                25px;

            z-index:
                5;

            max-width:
                270px;

            padding:
                23px;

            background:
                white;

            border-radius:
                17px;

            border-left:
                4px solid
                #f26e22;

            box-shadow:
                0 20px 50px
                rgba(5,39,18,.16);

        }


        .svc-intro-card strong {

            display:
                block;

            color:
                #0d5c2e;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                1.15rem;

            font-weight:
                900;

        }


        .svc-intro-card p {

            margin-top:
                7px;

            color:
                #6b766f;

            font-size:
                .82rem;

            line-height:
                1.6;

        }


        .svc-intro-content h2 {

            margin-top:
                12px;

            color:
                #10271a;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.5rem,
                    5vw,
                    4.5rem
                );

            font-weight:
                900;

            line-height:
                1.01;

            letter-spacing:
                -.055em;

        }


        .svc-intro-content > p {

            margin-top:
                24px;

            color:
                #67736c;

            font-size:
                1.04rem;

            line-height:
                1.85;

        }


        .svc-check-list {

            margin-top:
                30px;

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                12px;

        }


        .svc-check {

            display:
                flex;

            align-items:
                flex-start;

            gap:
                11px;

            padding:
                13px 14px;

            border:
                1px solid
                #e2e9e4;

            border-radius:
                13px;

            background:
                #f8faf9;

            color:
                #334138;

            font-size:
                .82rem;

            font-weight:
                700;

        }


        .svc-check i {

            color:
                #f26e22;

            margin-top:
                3px;

        }


        



        .svc-bento {

            display:
                grid;

            grid-template-columns:
                repeat(12,1fr);

            gap:
                18px;

        }


        .svc-card {

            position:
                relative;

            overflow:
                hidden;

            min-height:
                335px;

            padding:
                30px;

            border-radius:
                20px;

            border:
                1px solid
                #e0e8e3;

            background:
                #ffffff;

            box-shadow:
                0 14px 38px
                rgba(5,39,18,.05);

            transition:
                transform .4s
                cubic-bezier(.23,1,.32,1),
                box-shadow .4s ease,
                border-color .3s ease;

        }


        .svc-card:hover {

            transform:
                translateY(-9px);

            box-shadow:
                0 28px 60px
                rgba(5,39,18,.12);

            border-color:
                rgba(13,92,46,.24);

        }


        .svc-card-large {

            grid-column:
                span 7;

        }


        .svc-card-medium {

            grid-column:
                span 5;

        }


        .svc-card-half {

            grid-column:
                span 4;

        }


        .svc-card-image {

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

            opacity:
                .82;

            transition:
                transform .7s ease;

        }


        .svc-card:hover
        .svc-card-image {

            transform:
                scale(1.06);

        }


        .svc-card-image-overlay {

            position:
                absolute;

            inset:
                0;

            background:
                linear-gradient(
                    135deg,
                    rgba(4,37,17,.93),
                    rgba(6,72,33,.57),
                    rgba(3,42,19,.18)
                );

        }


        .svc-card-content {

            position:
                relative;

            z-index:
                4;

            height:
                100%;

            display:
                flex;

            flex-direction:
                column;

        }


        .svc-card-number {

            position:
                absolute;

            top:
                21px;

            right:
                23px;

            color:
                #dce7df;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                2.5rem;

            line-height:
                1;

            font-weight:
                900;

        }


        .svc-card-icon {

            width:
                58px;

            height:
                58px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                15px;

            background:
                #edf7ef;

            color:
                #0d5c2e;

            font-size:
                1.2rem;

        }


        .svc-card-icon-orange {

            background:
                #fff0e7;

            color:
                #f26e22;

        }


        .svc-card-white {

            color:
                white;

        }


        .svc-card-white
        .svc-card-icon {

            background:
                rgba(255,255,255,.13);

            color:
                #fff;

        }


        .svc-card-white
        .svc-card-number {

            color:
                rgba(255,255,255,.26);

        }


        .svc-card h3 {

            margin-top:
                23px;

            color:
                #16271d;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                1.35rem;

            line-height:
                1.25;

            font-weight:
                900;

        }


        .svc-card-white h3 {

            color:
                white;

        }


        .svc-card p {

            margin-top:
                11px;

            color:
                #69756e;

            font-size:
                .88rem;

            line-height:
                1.75;

        }


        .svc-card-white p {

            color:
                rgba(255,255,255,.78);

        }


        .svc-card a {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                9px;

            margin-top:
                auto;

            padding-top:
                23px;

            color:
                #0d5c2e;

            text-decoration:
                none;

            font-size:
                .82rem;

            font-weight:
                800;

            transition:
                gap .25s ease,
                color .25s ease;

        }


        .svc-card a:hover {

            gap:
                14px;

            color:
                #f26e22;

        }


        .svc-card-white a {

            color:
                white;

        }


        .svc-card-white a:hover {

            color:
                #f26e22;

        }


        



        .svc-featured {

            display:
                grid;

            grid-template-columns:
                minmax(0,1.1fr)
                minmax(0,.9fr);

            gap:
                0;

            overflow:
                hidden;

            border-radius:
                24px;

            background:
                linear-gradient(
                    135deg,
                    #073818,
                    #0d5c2e
                );

            box-shadow:
                0 30px 75px
                rgba(5,39,18,.16);

        }


        .svc-featured-content {

            padding:
                55px;

            color:
                white;

        }


        .svc-featured-content h2 {

            margin-top:
                12px;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.3rem,
                    4vw,
                    4.2rem
                );

            line-height:
                1.01;

            font-weight:
                900;

            letter-spacing:
                -.05em;

        }


        .svc-featured-content p {

            max-width:
                620px;

            margin-top:
                20px;

            color:
                rgba(255,255,255,.77);

            line-height:
                1.8;

        }


        .svc-featured-list {

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                12px;

            margin-top:
                30px;

        }


        .svc-featured-item {

            display:
                flex;

            align-items:
                flex-start;

            gap:
                10px;

            color:
                rgba(255,255,255,.88);

            font-size:
                .86rem;

            font-weight:
                700;

        }


        .svc-featured-item i {

            color:
                #f26e22;

            margin-top:
                4px;

        }


        .svc-featured-image {

            min-height:
                500px;

            overflow:
                hidden;

        }


        .svc-featured-image img {

            width:
                100%;

            height:
                100%;

            object-fit:
                cover;

            transition:
                transform .8s ease;

        }


        .svc-featured:hover
        .svc-featured-image img {

            transform:
                scale(1.05);

        }


        



        .svc-final {

            padding:
                110px 20px;

            background:
                #f7faf8;

        }


        .svc-final-box {

            position:
                relative;

            overflow:
                hidden;

            max-width:
                1180px;

            min-height:
                470px;

            margin:
                auto;

            border-radius:
                25px;

            display:
                flex;

            align-items:
                center;

            background:
                #063718;

            box-shadow:
                0 30px 75px
                rgba(5,39,18,.17);

        }


        .svc-final-image {

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


        .svc-final-overlay {

            position:
                absolute;

            inset:
                0;

            background:
                linear-gradient(
                    90deg,
                    rgba(3,37,16,.97),
                    rgba(5,61,28,.75),
                    rgba(5,45,21,.38)
                );

        }


        .svc-final-content {

            position:
                relative;

            z-index:
                5;

            max-width:
                760px;

            padding:
                65px;

            color:
                white;

        }


        .svc-final-content h2 {

            margin-top:
                10px;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2rem,
                    4vw,
                    3.5rem
                );

            line-height:
                1;

            font-weight:
                900;

            letter-spacing:
                -.05em;

        }


        .svc-final-content p {

            margin-top:
                20px;

            color:
                rgba(255,255,255,.78);

            font-size:
                1rem;

            line-height:
                1.8;

        }


        



        .svc-reveal {

            opacity:
                0;

            transform:
                translateY(35px);

            transition:
                opacity .9s
                cubic-bezier(.16,1,.3,1),

                transform .9s
                cubic-bezier(.16,1,.3,1);

        }


        .svc-reveal.show {

            opacity:
                1;

            transform:
                translateY(0);

        }


        



        @media (max-width: 1000px) {

            .svc-hero-grid {

                grid-template-columns:
                    1fr;

            }


            .svc-hero-card {

                max-width:
                    680px;

                min-height:
                    390px;

                margin:
                    0 auto;

            }


            .svc-intro-grid {

                grid-template-columns:
                    1fr;

            }


            .svc-bento {

                grid-template-columns:
                    repeat(2,1fr);

            }


            .svc-card-large,
            .svc-card-medium,
            .svc-card-half {

                grid-column:
                    span 1;

            }


            .svc-featured {

                grid-template-columns:
                    1fr;

            }


            .svc-featured-image {

                min-height:
                    360px;

            }

        }


        @media (max-width: 767px) {

            .svc-hero {

                min-height:
                    auto;

            }


            .svc-hero-content {

                padding:
                    120px 20px 85px;

            }


            .svc-hero-title {

                font-size:
                    clamp(
                        2.8rem,
                        13vw,
                        5rem
                    );

            }


            .svc-actions {

                flex-direction:
                    column;

            }


            .svc-btn-primary,
            .svc-btn-outline {

                width:
                    100%;

            }


            .svc-hero-card {

                min-height:
                    350px;

            }


            .svc-trust {

                margin-top:
                    -30px;

            }


            .svc-trust-box {

                grid-template-columns:
                    1fr 1fr;

            }


            .svc-trust-item {

                padding:
                    22px 14px;

            }


            .svc-trust-item:nth-child(2)::after {

                display:
                    none;

            }


            .svc-trust-number {

                font-size:
                    1.75rem;

            }


            .svc-section {

                padding:
                    80px 20px;

            }


            .svc-intro-image img {

                height:
                    390px;

            }


            .svc-intro-card {

                right:
                    10px;

                bottom:
                    18px;

            }


            .svc-check-list {

                grid-template-columns:
                    1fr;

            }


            .svc-bento {

                grid-template-columns:
                    1fr;

            }


            .svc-card-large,
            .svc-card-medium,
            .svc-card-half {

                grid-column:
                    span 1;

            }


            .svc-featured-content {

                padding:
                    38px 28px;

            }


            .svc-featured-list {

                grid-template-columns:
                    1fr;

            }


            .svc-featured-image {

                min-height:
                    320px;

            }


            .svc-final-box {

                min-height:
                    500px;

            }


            .svc-final-content {

                padding:
                    40px 28px;

            }

        }


        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {

                animation-duration:
                    .01ms !important;

                animation-iteration-count:
                    1 !important;

                transition-duration:
                    .01ms !important;

            }

        }

    </style>

</head>


<body>

<?php include 'encabezado.php'; ?>






<section class="svc-hero">


    <img
        src="img/cajamarca.webp"
        alt="Cajamarca - CEPRODEMIC MULTICREDIT"
        class="svc-hero-image"
    >


    <div class="svc-hero-overlay"></div>

    <div class="svc-hero-bottom"></div>


    <div class="svc-hero-content">

        <div class="svc-hero-grid">


            <div class="svc-reveal">


                <span class="svc-eyebrow">

                    <i class="fas fa-seedling"></i>

                    Desarrollo y servicios

                </span>


                <h1 class="svc-hero-title">

                    Más que un crédito,

                    <span>
                        acompañamos tu crecimiento.
                    </span>

                </h1>


                <p class="svc-hero-text">

                    En CEPRODEMIC MULTICREDIT creemos
                    que el financiamiento funciona mejor
                    cuando está acompañado de orientación,
                    organización y herramientas para tomar
                    mejores decisiones.

                </p>


                <div class="svc-actions">


                    <a
                        href="#servicios"
                        class="svc-btn-primary"
                    >

                        Conocer nuestros servicios

                        <i class="fas fa-arrow-down"></i>

                    </a>


                    <a
                        href="contacto.php"
                        class="svc-btn-outline"
                    >

                        Hablar con nosotros

                        <i class="fas fa-arrow-right"></i>

                    </a>


                </div>


            </div>


            <div class="svc-hero-card svc-reveal">


                <div class="svc-hero-card-image">

                    <img
                        src="img/img2.webp"
                        alt="Cajamarca"
                    >

                </div>


                <div class="svc-floating-year">

                    <strong>
                        2009
                    </strong>

                    <span>
                        Desde Cajamarca
                    </span>

                </div>


            </div>


        </div>

    </div>

</section>






<section class="svc-trust">

    <div class="svc-trust-box">


        <div class="svc-trust-item">

            <div class="svc-trust-number">
                15+
            </div>

            <div class="svc-trust-label">
                años de experiencia
            </div>

        </div>


        <div class="svc-trust-item">

            <div class="svc-trust-number">
                5K+
            </div>

            <div class="svc-trust-label">
                clientes atendidos
            </div>

        </div>


        <div class="svc-trust-item">

            <div class="svc-trust-number">
                4
            </div>

            <div class="svc-trust-label">
                agencias
            </div>

        </div>


        <div class="svc-trust-item">

            <div class="svc-trust-number">
                100%
            </div>

            <div class="svc-trust-label">
                atención cercana
            </div>

        </div>


    </div>

</section>






<section class="svc-section svc-section-white">

    <div class="svc-container">

        <div class="svc-intro-grid">


            <div class="svc-intro-image svc-reveal">

                <img
                    src="img/img1.webp"
                    alt="Cajamarca"
                >


                <div class="svc-intro-card">

                    <strong>
                        Finanzas con propósito
                    </strong>

                    <p>

                        Acompañamos a emprendedores,
                        familias y grupos organizados
                        con una atención cercana.

                    </p>

                </div>

            </div>


            <div class="svc-intro-content svc-reveal">

                <span class="svc-kicker">
                    Nuestro enfoque
                </span>


                <h2>

                    Crecer también
                    es aprender.

                </h2>


                <p>

                    Además de nuestras soluciones
                    financieras, promovemos conocimientos
                    y acompañamiento para que nuestros
                    clientes puedan aprovechar mejor sus
                    oportunidades.

                </p>


                <div class="svc-check-list">


                    <div class="svc-check">

                        <i class="fas fa-check"></i>

                        Orientación cercana

                    </div>


                    <div class="svc-check">

                        <i class="fas fa-check"></i>

                        Educación financiera

                    </div>


                    <div class="svc-check">

                        <i class="fas fa-check"></i>

                        Acompañamiento al emprendedor

                    </div>


                    <div class="svc-check">

                        <i class="fas fa-check"></i>

                        Trabajo organizado

                    </div>


                </div>


                <a
                    href="creditos.php"
                    class="inline-flex items-center gap-2 mt-8 text-brand-green font-extrabold hover:text-brand-orange transition"
                >

                    Ver opciones de crédito

                    <i class="fas fa-arrow-right"></i>

                </a>


            </div>


        </div>

    </div>

</section>






<section
    id="servicios"
    class="svc-section svc-section-light"
>

    <div class="svc-container">


        <div class="svc-heading svc-reveal">

            <span class="svc-kicker">
                Lo que hacemos
            </span>


            <h2>

                Servicios que fortalecen
                a nuestros clientes.

            </h2>


            <p>

                Nuestro trabajo va más allá del
                financiamiento. Buscamos crear
                relaciones duraderas y aportar
                herramientas para el crecimiento.

            </p>

        </div>


        <div class="svc-bento">


            



            <article
                class="svc-card svc-card-large svc-card-white svc-reveal"
            >

                <img
                    src="img/img3.webp"
                    alt="acompañamiento al emprendedor"
                    class="svc-card-image"
                >


                <div class="svc-card-image-overlay"></div>


                <div class="svc-card-content">


                    <span class="svc-card-number">
                        01
                    </span>


                    <div class="svc-card-icon">

                        <i class="fas fa-chalkboard-teacher"></i>

                    </div>


                    <h3>

                        Acompañamiento al emprendedor

                    </h3>


                    <p>

                    Una atención cercana para conocer
                    las necesidades del negocio y orientar
                    al cliente hacia la alternativa que
                    mejor corresponda a su situación.

                    </p>


                    <a
                        href="conocenos.php"
                    >

                        Ver creditos

                        <i class="fas fa-arrow-right"></i>

                    </a>


                </div>

            </article>

            



            <article
                class="svc-card svc-card-half svc-reveal"
            >

                <span class="svc-card-number">
                    02
                </span>


                <div class="svc-card-icon svc-card-icon-orange">

                    <i class="fas fa-users"></i>

                </div>


                <h3>
                    Bancos Comunales
                </h3>


                <p>

                    Una metodología grupal basada en
                    organización, confianza, responsabilidad
                    y acompañamiento para facilitar el acceso
                    a servicios financieros.

                </p>


                <a href="bancos-comunales.php">

                    Conocer Bancos Comunales

                    <i class="fas fa-arrow-right"></i>

                </a>

            </article>
            <article
                class="svc-card svc-card-half svc-reveal"
            >

                <span class="svc-card-number">
                    03
                </span>


                <div class="svc-card-icon">

                    <i class="fas fa-handshake"></i>

                </div>


                <h3>
                    Grupos Solidarios
                </h3>


                <p>

                    Financiamiento grupal que promueve
                    la organización y la responsabilidad
                    solidaria entre sus integrantes.

                </p>


                <a href="grupos-solidarios.php">

                    Conocer la modalidad

                    <i class="fas fa-arrow-right"></i>

                </a>

            </article>
            <article
                class="svc-card svc-card-half svc-reveal"
            >

                <span class="svc-card-number">
                    04
                </span>


                <div class="svc-card-icon">

                    <i class="fas fa-handshake"></i>

                </div>


                <h3>
                    Orientación financiera
                </h3>


                <p>

                    ¿No sabes qué producto necesitas?
                        Te ayudamos a identificar la
                        alternativa de crédito de acuerdo
                        con tu objetivo y situación.

                </p>


                <a
                        href="https://wa.me/51968876759?text=Hola%2C%20necesito%20orientaci%C3%B3n%20para%20elegir%20un%20cr%C3%A9dito."
                        target="_blank"
                        rel="noopener noreferrer"
                    >

                        Hablar con un asesor

                        <i class="fas fa-arrow-right"></i>

                    </a>

            </article>

        </div>

    </div>

</section>






<section class="svc-section svc-section-white">

    <div class="svc-container">


        <div class="svc-featured svc-reveal">


            <div class="svc-featured-content">


                <span class="svc-kicker text-orange-300">
                    Desde Cajamarca
                </span>


                <h2>

                    Finanzas con
                    acompañamiento
                    y cercanía.

                </h2>


                <p>

                    CEPRODEMIC, conocido comercialmente
                    como Multicredit, inició sus operaciones
                    en Cajamarca en 2009 con el objetivo
                    de acercar servicios financieros a
                    pequeños emprendedores.

                </p>


                <div class="svc-featured-list">


                    <div class="svc-featured-item">

                        <i class="fas fa-circle-check"></i>

                        Atención personalizada

                    </div>


                    <div class="svc-featured-item">

                        <i class="fas fa-circle-check"></i>

                        Orientación financiera

                    </div>


                    <div class="svc-featured-item">

                        <i class="fas fa-circle-check"></i>

                        Servicios para emprendedores

                    </div>


                    <div class="svc-featured-item">

                        <i class="fas fa-circle-check"></i>

                        Acompañamiento cercano

                    </div>


                </div>


                <div class="mt-9">

                    <a
                        href="conocenos.php"
                        class="svc-btn-primary"
                    >

                        Conocer nuestra historia

                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>


            </div>


            <div class="svc-featured-image">

                <img
                    src="img/img5.webp"
                    alt="Cajamarca"
                >

            </div>


        </div>

    </div>

</section>






<section class="svc-final">

    <div class="svc-final-box svc-reveal">


        <img
            src="img/img7.webp"
            alt="Cajamarca"
            class="svc-final-image"
        >


        <div class="svc-final-overlay"></div>


        <div class="svc-final-content">


            <span class="svc-kicker text-orange-300">
                Estamos para ayudarte
            </span>


            <h2>

                Tu próximo paso
                comienza con una
                conversación.

            </h2>


            <p>

                Cuéntanos qué necesitas y recibe
                orientación sobre nuestros créditos,
                servicios y alternativas de atención.

            </p>


            <div class="flex flex-col sm:flex-row gap-3 mt-8">


                <a
                    href="https://wa.me/51968876759?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20los%20servicios%20de%20Multicredit."
                    target="_blank"
                    rel="noopener noreferrer"
                    class="svc-btn-primary"
                >

                    <i class="fab fa-whatsapp"></i>

                    Hablar con un asesor

                </a>


                <a
                    href="contacto.php"
                    class="svc-btn-outline"
                >

                    Ver contacto

                    <i class="fas fa-arrow-right"></i>

                </a>


            </div>


        </div>


    </div>

</section>






<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const elements =
            document.querySelectorAll(
                '.svc-reveal'
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
                        threshold: .12
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


    }
);

</script>


<?php include 'footer.php'; ?>


</body>

</html>
