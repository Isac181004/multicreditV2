<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Conoce la historia de CEPRODEMIC MULTICREDIT y nuestro compromiso con emprendedores y familias de Cajamarca."
    >

    <title>Nosotros | CEPRODEMIC MULTICREDIT</title>

     
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
                        'brand-green': '#0d5c2e',
                        'brand-green-dark': '#083d1f',
                        'brand-green-deep': '#052712',
                        'brand-orange': '#f26e22'
                    },

                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Poppins', 'sans-serif']
                    }
                }
            }
        };
    </script>

    <style>

        



        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #17221a;
            overflow-x: hidden;
        }

        .font-display {
            font-family: 'Poppins', sans-serif;
        }


        



        @keyframes kenBurns {
            0% {
                transform: scale(1) translate3d(0, 0, 0);
            }

            50% {
                transform: scale(1.06) translate3d(-0.5%, -0.5%, 0);
            }

            100% {
                transform: scale(1.12) translate3d(0.5%, 0.5%, 0);
            }
        }

        @keyframes floatImage {
            0%, 100% {
                transform: scale(1.03) translateY(0);
            }

            50% {
                transform: scale(1.07) translateY(-6px);
            }
        }


        



        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition:
                opacity .8s ease,
                transform .8s cubic-bezier(.16, 1, .3, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

         
        .hero-content {
            opacity: 1 !important;
            transform: none !important;
        }


        



        .page-container {
            width: min(1180px, calc(100% - 40px));
            margin: auto;
        }


        



        .about-hero {
            position: relative;
            min-height: 84vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            background: #052712;
        }

        .about-hero-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            animation:
                kenBurns
                22s
                ease-in-out
                infinite alternate;
        }

        .about-hero-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    90deg,
                    rgba(3, 35, 16, .96) 0%,
                    rgba(4, 54, 24, .84) 38%,
                    rgba(5, 63, 30, .54) 68%,
                    rgba(3, 32, 15, .18) 100%
                );
        }

        .about-hero-bottom {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 160px;

            background:
                linear-gradient(
                    to bottom,
                    transparent,
                    rgba(0, 0, 0, .22)
                );
        }

        .hero-inner {
            position: relative;
            z-index: 5;
            padding: 145px 0 105px;
        }

        .hero-copy {
            max-width: 850px;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            padding: 9px 15px;

            border-radius: 999px;

            background:
                rgba(255,255,255,.08);

            border:
                1px solid
                rgba(255,255,255,.22);

            color: white;

            font-size: .74rem;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;

            backdrop-filter: blur(10px);
        }

        .hero-eyebrow i {
            color: #f26e22;
        }

        .hero-title {
            margin-top: 25px;

            max-width: 850px;

            color: white;

            font-family: 'Poppins', sans-serif;

            font-size:
                clamp(
                    2.7rem,
                    5.2vw,
                    5.4rem
                );

            line-height: .98;

            font-weight: 900;

            letter-spacing: -.055em;
        }

        .hero-title span {
            color: #f26e22;
        }

        .hero-text {
            max-width: 690px;

            margin-top: 26px;

            color:
                rgba(255,255,255,.87);

            font-size:
                1.06rem;

            line-height:
                1.8;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            margin-top: 28px;

            padding: 11px 17px;

            border-radius: 999px;

            border: 1px solid
                rgba(255,255,255,.18);

            background:
                rgba(255,255,255,.08);

            color: white;

            font-size: .8rem;
            font-weight: 700;
        }

        .hero-badge i {
            color: #f26e22;
        }


        



        .stats-wrap {
            position: relative;
            z-index: 20;
            margin-top: -52px;
            padding: 0 20px;
        }

        .stats-box {
            width: min(1080px, 100%);
            margin: auto;

            display: grid;
            grid-template-columns: repeat(4, 1fr);

            background: rgba(255,255,255,.98);

            border:
                1px solid
                #e1e9e3;

            border-radius: 20px;

            overflow: hidden;

            box-shadow:
                0 25px 70px
                rgba(5,39,18,.14);
        }

        .stat-item {
            position: relative;
            padding: 29px 18px;
            text-align: center;
        }

        .stat-item:not(:last-child)::after {
            content: "";
            position: absolute;

            top: 25%;
            right: 0;

            width: 1px;
            height: 50%;

            background: #e4eae6;
        }

        .stat-number {
            color: #0d5c2e;

            font-family: 'Poppins', sans-serif;

            font-size: 2rem;

            font-weight: 900;
            line-height: 1;
        }

        .stat-label {
            margin-top: 7px;

            color: #6b766f;

            font-size: .76rem;
            font-weight: 600;
        }


        



        .history-section {
            position: relative;
            padding: 105px 0;

            background: #f4f8f5;

            overflow: hidden;
        }

        .history-background {
            position: absolute;
            inset: 0;

            width: 100%;
            height: 100%;

            object-fit: cover;

            opacity: .12;

            animation:
                kenBurns
                26s
                ease-in-out
                infinite alternate;
        }

        .history-background-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    90deg,
                    rgba(244,248,245,.96),
                    rgba(244,248,245,.88)
                );
        }

        .history-grid {
            position: relative;
            z-index: 5;

            display: grid;

            grid-template-columns:
                minmax(0, .92fr)
                minmax(0, 1.08fr);

            gap: 65px;

            align-items: center;
        }

        .history-visual {
            position: relative;

            height: 500px;

            overflow: hidden;

            border-radius: 24px;

            box-shadow:
                0 30px 70px
                rgba(5,39,18,.16);
        }

        .history-visual img {
            display: block;

            width: 100%;
            height: 100%;

            object-fit: cover;

            animation:
                floatImage
                12s
                ease-in-out
                infinite alternate;
        }

        .history-visual-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    to top,
                    rgba(3,35,16,.66),
                    transparent 60%
                );
        }

        .history-year {
            position: absolute;

            left: 22px;
            bottom: 22px;

            z-index: 5;

            background:
                rgba(255,255,255,.96);

            padding:
                19px 21px;

            border-radius:
                15px;

            border-left:
                4px solid
                #f26e22;

            box-shadow:
                0 18px 40px
                rgba(0,0,0,.18);
        }

        .history-year strong {
            display: block;

            color: #0d5c2e;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                2rem;

            line-height:
                1;

            font-weight:
                900;
        }

        .history-year span {
            display: block;

            margin-top: 5px;

            color: #6c7770;

            font-size: .76rem;

            font-weight: 700;
        }

        .section-label {
            color: #f26e22;

            font-size: .74rem;

            text-transform: uppercase;

            letter-spacing: .19em;

            font-weight: 800;
        }

        .history-content h2 {
            margin-top: 11px;

            color: #10271a;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.2rem,
                    4.5vw,
                    4.1rem
                );

            line-height: 1.02;

            font-weight: 900;

            letter-spacing: -.05em;
        }

        .history-content p {
            margin-top: 16px;

            color: #657169;

            font-size: .96rem;

            line-height: 1.85;
        }

        .history-highlight {
            margin-top: 24px;

            padding: 18px 19px;

            background: white;

            border:
                1px solid
                #dce7df;

            border-radius:
                14px;

            color:
                #37523e;

            line-height:
                1.65;

            box-shadow:
                0 10px 30px
                rgba(5,39,18,.05);
        }


        



        .trajectory-section {
            position: relative;

            overflow: hidden;

            padding: 105px 0;

            background: #052712;

            color: white;
        }

        .trajectory-bg {
            position: absolute;
            inset: -5%;

            width: 110%;
            height: 110%;

            object-fit: cover;

            opacity: .38;

            animation:
                kenBurns
                24s
                ease-in-out
                infinite alternate;
        }

        .trajectory-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    90deg,
                    rgba(3,31,14,.95),
                    rgba(4,59,26,.80),
                    rgba(3,31,14,.94)
                );
        }

        .trajectory-inner {
            position: relative;
            z-index: 5;
        }

        .trajectory-heading {
            max-width: 760px;

            margin:
                0 auto 48px;

            text-align: center;
        }

        .trajectory-heading h2 {
            margin-top: 11px;

            color: white;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.4rem,
                    4.7vw,
                    4.2rem
                );

            line-height: .98;

            font-weight: 900;

            letter-spacing: -.05em;
        }

        .trajectory-heading p {
            margin-top: 17px;

            color:
                rgba(255,255,255,.68);

            line-height: 1.75;
        }

        .trajectory-grid {
            display:
                grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 18px;
        }

        .trajectory-card {
            min-height: 280px;

            padding: 29px;

            border:
                1px solid
                rgba(255,255,255,.15);

            border-radius:
                19px;

            background:
                rgba(255,255,255,.085);

            backdrop-filter:
                blur(13px);

            box-shadow:
                0 20px 45px
                rgba(0,0,0,.12);

            transition:
                transform .35s ease,
                background .35s ease;
        }

        .trajectory-card:hover {
            transform:
                translateY(-7px);

            background:
                rgba(255,255,255,.13);
        }

        .trajectory-number {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 21px;

            border-radius:
                13px;

            background:
                rgba(255,255,255,.10);

            font-weight:
                900;
        }

        .trajectory-card:nth-child(2)
        .trajectory-number {
            background:
                rgba(242,110,34,.17);

            color:
                #ff9a60;
        }

        .trajectory-card:nth-child(3)
        .trajectory-number {
            background:
                rgba(70,140,255,.16);

            color:
                #8ab8ff;
        }

        .trajectory-card h3 {
            color: white;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                1.18rem;

            font-weight:
                900;
        }

        .trajectory-card p {
            margin-top: 10px;

            color:
                rgba(255,255,255,.69);

            font-size:
                .84rem;

            line-height:
                1.72;
        }


        



        .purpose-section {
            position: relative;

            overflow: hidden;

            padding: 105px 0;

            background:
                #e9f2ec;
        }

        .purpose-bg {
            position: absolute;
            inset: 0;

            width: 100%;
            height: 100%;

            object-fit: cover;

            opacity: .11;

            animation:
                kenBurns
                27s
                ease-in-out
                infinite alternate;
        }

        .purpose-overlay {
            position: absolute;
            inset: 0;

            background:
                rgba(239,247,242,.90);
        }

        .purpose-inner {
            position: relative;
            z-index: 5;
        }

        .purpose-heading {
            max-width: 760px;

            margin:
                0 auto 48px;

            text-align: center;
        }

        .purpose-heading h2 {
            margin-top: 11px;

            color: #10271a;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.4rem,
                    4.8vw,
                    4.2rem
                );

            line-height:
                .98;

            font-weight:
                900;

            letter-spacing:
                -.05em;
        }

        .purpose-heading p {
            margin-top: 17px;

            color:
                #647168;

            line-height:
                1.75;
        }

        .purpose-grid {
            display:
                grid;

            grid-template-columns:
                1fr
                1fr;

            gap: 18px;

            max-width:
                1080px;

            margin: auto;
        }

        .purpose-card {
            position:
                relative;

            overflow:
                hidden;

            min-height:
                350px;

            padding:
                35px;

            border-radius:
                22px;

            color:
                white;

            box-shadow:
                0 24px 60px
                rgba(5,39,18,.13);

            transition:
                transform .35s ease,
                box-shadow .35s ease;
        }

        .purpose-card:hover {
            transform:
                translateY(-7px);

            box-shadow:
                0 30px 68px
                rgba(5,39,18,.18);
        }

        .purpose-card.mission {
            background:
                linear-gradient(
                    145deg,
                    #083d1f,
                    #0d5c2e
                );
        }

        .purpose-card.vision {
            background:
                linear-gradient(
                    145deg,
                    #f26e22,
                    #d85812
                );
        }

        .purpose-card::before {
            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            right: -100px;
            top: -110px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.10);
        }

        .purpose-icon {
            position:
                relative;

            z-index: 2;

            width: 60px;
            height: 60px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 16px;

            background:
                rgba(255,255,255,.14);

            color: white;

            font-size:
                1.25rem;
        }

        .purpose-card h3 {
            position: relative;
            z-index: 2;

            margin-top:
                23px;

            color: white;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                1.7rem;

            font-weight:
                900;
        }

        .purpose-card p {
            position:
                relative;

            z-index:
                2;

            margin-top:
                11px;

            color:
                rgba(255,255,255,.85);

            line-height:
                1.8;
        }


        



        .values-section {
            position:
                relative;

            overflow:
                hidden;

            padding:
                110px 0;

            background:
                #032b13;

            color:
                white;
        }

        .values-bg {
            position:
                absolute;

            inset:
                -5%;

            width:
                110%;

            height:
                110%;

            object-fit:
                cover;

            opacity:
                .44;

            animation:
                kenBurns
                24s
                ease-in-out
                infinite alternate;
        }

        .values-overlay {
            position:
                absolute;

            inset:
                0;

            background:
                linear-gradient(
                    135deg,
                    rgba(2,36,15,.94),
                    rgba(4,62,29,.80),
                    rgba(2,34,15,.95)
                );
        }

        .values-inner {
            position:
                relative;

            z-index:
                5;
        }

        .values-heading {
            max-width:
                760px;

            margin:
                0 auto 48px;

            text-align:
                center;
        }

        .values-heading h2 {
            margin-top:
                11px;

            color:
                white;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.4rem,
                    4.8vw,
                    4.2rem
                );

            line-height:
                .98;

            font-weight:
                900;

            letter-spacing:
                -.05em;
        }

        .values-heading p {
            margin-top:
                17px;

            color:
                rgba(255,255,255,.69);

            line-height:
                1.75;
        }

        .values-grid {
            display:
                grid;

            grid-template-columns:
                repeat(5, 1fr);

            gap:
                14px;
        }

        .value-card {
            min-height:
                240px;

            padding:
                26px 17px;

            border:
                1px solid
                rgba(255,255,255,.16);

            border-radius:
                18px;

            background:
                rgba(255,255,255,.085);

            backdrop-filter:
                blur(12px);

            text-align:
                center;

            transition:
                transform .35s ease,
                background .35s ease;
        }

        .value-card:hover {
            transform:
                translateY(-7px);

            background:
                rgba(255,255,255,.13);
        }

        .value-icon {
            width:
                54px;

            height:
                54px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            margin:
                0 auto;

            border-radius:
                14px;

            background:
                rgba(255,255,255,.11);

            color:
                white;

            font-size:
                1.15rem;
        }

        .value-card:nth-child(2)
        .value-icon,

        .value-card:nth-child(4)
        .value-icon {
            background:
                rgba(242,110,34,.16);

            color:
                #ff9b60;
        }

        .value-card h4 {
            margin-top:
                17px;

            color:
                white;

            font-size:
                .94rem;

            font-weight:
                900;
        }

        .value-card p {
            margin-top:
                9px;

            color:
                rgba(255,255,255,.65);

            font-size:
                .76rem;

            line-height:
                1.58;
        }


        



        .focus-section {
            position:
                relative;

            overflow:
                hidden;

            padding:
                105px 0;

            background:
                #f4f8f5;
        }

        .focus-background {
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
                .10;

            animation:
                kenBurns
                26s
                ease-in-out
                infinite alternate;
        }

        .focus-overlay {
            position:
                absolute;

            inset:
                0;

            background:
                rgba(245,249,246,.90);
        }

        .focus-inner {
            position:
                relative;

            z-index:
                5;
        }

        .focus-grid {
            display:
                grid;

            grid-template-columns:
                1.05fr
                .95fr;

            gap:
                60px;

            align-items:
                center;
        }

        .focus-content h2 {
            margin-top:
                11px;

            color:
                #10271a;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.5rem,
                    4.8vw,
                    4.4rem
                );

            line-height:
                .98;

            font-weight:
                900;

            letter-spacing:
                -.05em;
        }

        .focus-content > p {
            margin-top:
                18px;

            color:
                #637069;

            line-height:
                1.85;
        }

        .focus-list {
            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                12px;

            margin-top:
                26px;
        }

        .focus-item {
            display:
                flex;

            gap:
                10px;

            padding:
                14px;

            border:
                1px solid
                #dfe8e2;

            border-radius:
                13px;

            background:
                rgba(255,255,255,.90);

            color:
                #334239;

            font-size:
                .82rem;

            font-weight:
                700;
        }

        .focus-item i {
            color:
                #f26e22;

            margin-top:
                3px;
        }

        .focus-image {
            position:
                relative;

            height:
                460px;

            overflow:
                hidden;

            border-radius:
                24px;

            box-shadow:
                0 30px 70px
                rgba(5,39,18,.15);
        }

        .focus-image img {
            width:
                100%;

            height:
                100%;

            object-fit:
                cover;

            animation:
                kenBurns
                19s
                ease-in-out
                infinite alternate;
        }

        .focus-image::after {
            content:
                "";

            position:
                absolute;

            inset:
                0;

            background:
                linear-gradient(
                    135deg,
                    rgba(3,39,18,.05),
                    rgba(3,39,18,.30)
                );
        }


        



        .final-section {
            position:
                relative;

            overflow:
                hidden;

            padding:
                105px 0;

            background:
                #052712;

            color:
                white;
        }

        .final-bg {
            position:
                absolute;

            inset:
                -5%;

            width:
                110%;

            height:
                110%;

            object-fit:
                cover;

            animation:
                kenBurns
                22s
                ease-in-out
                infinite alternate;
        }

        .final-overlay {
            position:
                absolute;

            inset:
                0;

            background:
                linear-gradient(
                    90deg,
                    rgba(3,31,14,.97),
                    rgba(5,59,27,.78),
                    rgba(3,31,14,.40)
                );
        }

        .final-inner {
            position:
                relative;

            z-index:
                5;
        }

        .final-content {
            max-width:
                800px;

            margin:
                auto;

            text-align:
                center;
        }

        .final-content h2 {
            margin-top:
                10px;

            color:
                white;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                clamp(
                    2.4rem,
                    5vw,
                    4.6rem
                );

            line-height:
                .98;

            font-weight:
                900;

            letter-spacing:
                -.05em;
        }

        .final-content p {
            max-width:
                650px;

            margin:
                18px auto 0;

            color:
                rgba(255,255,255,.76);

            line-height:
                1.8;
        }

        .final-buttons {
            display:
                flex;

            justify-content:
                center;

            flex-wrap:
                wrap;

            gap:
                12px;

            margin-top:
                30px;
        }

        .final-button {
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
                0 24px;

            border-radius:
                10px;

            background:
                #f26e22;

            color:
                white;

            text-decoration:
                none;

            font-weight:
                800;

            transition:
                transform .3s ease;
        }

        .final-button:hover {
            transform:
                translateY(-4px);
        }

        .final-button.alt {
            border:
                1px solid
                rgba(255,255,255,.32);

            background:
                rgba(255,255,255,.10);
        }

        .final-button.alt:hover {
            background:
                white;

            color:
                #0d5c2e;
        }


        






@media (max-width: 900px) {

    



    .page-container {
        width: min(
            100% - 30px,
            720px
        );
    }


    



    .about-hero {
        min-height: 78vh;
    }

    .about-hero-image {
        object-position: 55% center;
    }

    .about-hero-overlay {
        background:
            linear-gradient(
                180deg,
                rgba(3,35,16,.88) 0%,
                rgba(3,45,20,.78) 52%,
                rgba(3,31,14,.93) 100%
            );
    }

    .hero-inner {
        padding:
            120px
            0
            85px;
    }

    .hero-copy {
        max-width:
            100%;
    }

    .hero-title {
        max-width:
            100%;

        font-size:
            clamp(
                2.5rem,
                10vw,
                4.2rem
            );

        line-height:
            1;

        letter-spacing:
            -.045em;
    }

    .hero-text {
        max-width:
            100%;

        font-size:
            .98rem;

        line-height:
            1.7;
    }

    .hero-badge {
        max-width:
            100%;

        font-size:
            .72rem;

        line-height:
            1.4;
    }


    



    .stats-wrap {
        margin-top:
            -28px;

        padding:
            0 15px;
    }

    .stats-box {
        grid-template-columns:
            1fr 1fr;

        border-radius:
            18px;
    }

    .stat-item {
        padding:
            21px 10px;
    }

    .stat-item:nth-child(2)::after {
        display:
            none;
    }

    .stat-number {
        font-size:
            1.55rem;
    }

    .stat-label {
        font-size:
            .67rem;

        line-height:
            1.35;
    }


    



    .history-section {
        padding:
            78px 0;
    }

    .history-grid {
        grid-template-columns:
            1fr;

        gap:
            42px;
    }

    .history-visual {
        height:
            355px;

        border-radius:
            20px;
    }

    .history-visual img {
        animation:
            none;
    }

    .history-year {
        left:
            15px;

        bottom:
            15px;

        padding:
            16px 18px;
    }

    .history-year strong {
        font-size:
            1.8rem;
    }

    .history-content h2 {
        font-size:
            clamp(
                2rem,
                9vw,
                3.4rem
            );

        line-height:
            1.02;
    }

    .history-content p {
        font-size:
            .9rem;

        line-height:
            1.75;
    }

    .history-highlight {
        font-size:
            .82rem;
    }


    



    .trajectory-section {
        padding:
            78px 0;
    }

    .trajectory-heading {
        margin-bottom:
            36px;
    }

    .trajectory-heading h2 {
        font-size:
            clamp(
                2rem,
                9vw,
                3.5rem
            );

        line-height:
            1;
    }

    .trajectory-heading p {
        font-size:
            .88rem;
    }

    .trajectory-grid {
        grid-template-columns:
            1fr;

        gap:
            14px;
    }

    .trajectory-card {
        min-height:
            auto;

        padding:
            24px;

        border-radius:
            18px;
    }

    .trajectory-card p {
        font-size:
            .82rem;
    }


    



    .purpose-section {
        padding:
            78px 0;
    }

    .purpose-heading {
        margin-bottom:
            35px;
    }

    .purpose-heading h2 {
        font-size:
            clamp(
                2rem,
                9vw,
                3.5rem
            );
    }

    .purpose-heading p {
        font-size:
            .88rem;
    }

    .purpose-grid {
        grid-template-columns:
            1fr;

        gap:
            14px;
    }

    .purpose-card {
        min-height:
            auto;

        padding:
            28px 24px;

        border-radius:
            20px;
    }

    .purpose-card h3 {
        font-size:
            1.45rem;
    }

    .purpose-card p {
        font-size:
            .87rem;

        line-height:
            1.75;
    }


    



    .values-section {
        padding:
            78px 0;
    }

    .values-heading {
        margin-bottom:
            35px;
    }

    .values-heading h2 {
        font-size:
            clamp(
                2rem,
                9vw,
                3.5rem
            );
    }

    .values-heading p {
        font-size:
            .88rem;
    }

    .values-grid {
        grid-template-columns:
            1fr 1fr;

        gap:
            11px;
    }

    .value-card {
        min-height:
            205px;

        padding:
            22px 13px;

        border-radius:
            16px;
    }

    .value-icon {
        width:
            48px;

        height:
            48px;

        font-size:
            1rem;
    }

    .value-card h4 {
        font-size:
            .82rem;

        margin-top:
            14px;
    }

    .value-card p {
        font-size:
            .69rem;

        line-height:
            1.5;
    }


    



    .focus-section {
        padding:
            78px 0;
    }

    .focus-grid {
        grid-template-columns:
            1fr;

        gap:
            38px;
    }

    .focus-content h2 {
        font-size:
            clamp(
                2.1rem,
                9vw,
                3.6rem
            );
    }

    .focus-content > p {
        font-size:
            .9rem;

        line-height:
            1.75;
    }

    .focus-list {
        grid-template-columns:
            1fr;

        gap:
            10px;
    }

    .focus-item {
        font-size:
            .8rem;
    }

    .focus-image {
        height:
            350px;

        border-radius:
            20px;
    }

    .focus-image img {
        min-height:
            0;
    }


    



    .final-section {
        padding:
            78px 0;
    }

    .final-content h2 {
        font-size:
            clamp(
                2.2rem,
                9vw,
                3.8rem
            );
    }

    .final-content p {
        font-size:
            .9rem;
    }

    .final-buttons {
        flex-direction:
            column;

        width:
            100%;
    }

    .final-button {
        width:
            100%;
    }

}






@media (max-width: 480px) {

    .page-container {
        width:
            calc(100% - 24px);
    }


     

    .about-hero {
        min-height:
            76vh;
    }

    .hero-inner {
        padding:
            112px
            0
            75px;
    }

    .hero-eyebrow {
        font-size:
            .62rem;

        padding:
            8px 12px;

        letter-spacing:
            .11em;
    }

    .hero-title {
        font-size:
            clamp(
                2.35rem,
                12vw,
                3.5rem
            );
    }

    .hero-text {
        font-size:
            .9rem;

        line-height:
            1.65;
    }

    .hero-badge {
        display:
            flex;

        align-items:
            flex-start;

        border-radius:
            14px;

        padding:
            11px 13px;
    }


     

    .stats-wrap {
        padding:
            0 10px;

        margin-top:
            -22px;
    }

    .stats-box {
        border-radius:
            16px;
    }

    .stat-item {
        padding:
            18px 7px;
    }

    .stat-number {
        font-size:
            1.35rem;
    }

    .stat-label {
        font-size:
            .61rem;
    }


     

    .history-visual {
        height:
            300px;
    }

    .history-content h2 {
        font-size:
            2.15rem;
    }

    .history-content p {
        font-size:
            .86rem;
    }


     

    .trajectory-card {
        padding:
            21px;
    }

    .trajectory-number {
        width:
            44px;

        height:
            44px;
    }


     

    .purpose-card {
        padding:
            25px 20px;
    }


     

    .values-grid {
        grid-template-columns:
            1fr;
    }

    .value-card {
        min-height:
            auto;

        padding:
            23px 18px;
    }

    .value-card p {
        max-width:
            280px;

        margin:
            8px auto 0;
    }


     

    .focus-image {
        height:
            300px;
    }


     

    .final-button {
        min-height:
            50px;

        font-size:
            .82rem;
    }

}






html,
body {
    width:
        100%;

    max-width:
        100%;

    overflow-x:
        hidden !important;
}






img {
    max-width:
        100%;
}






@media (hover: none) {

    .trajectory-card:hover,
    .purpose-card:hover,
    .value-card:hover {
        transform:
            none;
    }

}
    </style>

</head>


<body>


<?php include 'encabezado.php'; ?>






<section class="about-hero">

    <img
        src="img/cajamarca.webp"
        alt="Cajamarca"
        class="about-hero-image"
    >

    <div class="about-hero-overlay"></div>

    <div class="about-hero-bottom"></div>


    <div class="page-container hero-inner">

        <div class="hero-copy hero-content">


            <span class="hero-eyebrow">

                <i class="fas fa-building"></i>

                CEPRODEMIC · MULTICREDIT

            </span>


            <h1 class="hero-title">

                Desde 2009,

                <span>
                    acercando oportunidades financieras.
                </span>

            </h1>


            <p class="hero-text">

                Conoce la historia de una institución
                que nació en Cajamarca con el propósito
                de acercar servicios financieros a
                pequeños emprendedores y acompañar
                sus proyectos de crecimiento.

            </p>


            <div class="hero-badge">

                <i class="fas fa-calendar-check"></i>

                Operaciones iniciadas en Cajamarca en 2009

            </div>


        </div>

    </div>

</section>






<section class="stats-wrap">

    <div class="stats-box">


        <div class="stat-item">

            <div class="stat-number">
                15+
            </div>

            <div class="stat-label">
                años de experiencia
            </div>

        </div>


        <div class="stat-item">

            <div class="stat-number">
                2009
            </div>

            <div class="stat-label">
                inicio de operaciones
            </div>

        </div>


        <div class="stat-item">

            <div class="stat-number">
                4
            </div>

            <div class="stat-label">
                puntos de atención
            </div>

        </div>


        <div class="stat-item">

            <div class="stat-number">
                +5K
            </div>

            <div class="stat-label">
                clientes atendidos
            </div>

        </div>


    </div>

</section>






<section class="history-section">

    <img
        src="img/cajamarca.webp"
        alt=""
        aria-hidden="true"
        class="history-background"
    >

    <div class="history-background-overlay"></div>


    <div class="page-container">


        <div class="history-grid">


            <div class="history-visual reveal">

                <img
                    src="img/cajamarca.webp"
                    alt="Cajamarca"
                >

                <div class="history-visual-overlay"></div>


                <div class="history-year">

                    <strong>
                        2009
                    </strong>

                    <span>
                        Inicio de operaciones
                    </span>

                </div>

            </div>


            <div class="history-content reveal">

                <span class="section-label">
                    Nuestra historia
                </span>


                <h2>

                    Una institución
                    nacida para acercar
                    las microfinanzas.

                </h2>


                <p>

                    El <strong>Centro de Promoción y
                    Desarrollo de las Microfinanzas
                    (CEPRODEMIC)</strong>, conocido
                    comercialmente como
                    <strong>Multicredit</strong>,
                    inició sus operaciones en Cajamarca
                    en el año 2009.

                </p>


                <p>

                    Su propósito inicial fue acercar
                    servicios financieros a pequeños
                    emprendedores, facilitando
                    alternativas de financiamiento que
                    respondieran a las necesidades de
                    sus actividades económicas.

                </p>


                <p>

                    Con el tiempo, la propuesta se ha
                    desarrollado alrededor de diferentes
                    soluciones de crédito para microempresa
                    y consumo, junto con modalidades
                    grupales como los bancos comunales
                    y los grupos solidarios.

                </p>


                <div class="history-highlight">

                    <i class="fas fa-handshake text-brand-orange mr-2"></i>

                    Nuestro enfoque combina
                    financiamiento, acompañamiento
                    y cercanía con las personas que
                    buscan impulsar sus proyectos.

                </div>


            </div>


        </div>

    </div>

</section>






<section class="trajectory-section">

    <img
        src="img/cajamarca.webp"
        alt=""
        aria-hidden="true"
        class="trajectory-bg"
    >

    <div class="trajectory-overlay"></div>


    <div class="page-container trajectory-inner">


        <div class="trajectory-heading reveal">

            <span class="section-label">
                Trayectoria
            </span>


            <h2>

                Una historia que
                sigue creciendo.

            </h2>


            <p>

                Conoce los principales momentos de
                nuestra trayectoria institucional.

            </p>

        </div>


        <div class="trajectory-grid">


            <article class="trajectory-card reveal">

                <div class="trajectory-number">
                    01
                </div>

                <h3>
                    2009 · Inicio
                </h3>

                <p>

                    CEPRODEMIC inicia operaciones
                    en Cajamarca con el objetivo
                    de acercar servicios financieros
                    a pequeños emprendedores.

                </p>

            </article>


            <article class="trajectory-card reveal">

                <div class="trajectory-number">
                    02
                </div>

                <h3>
                    Desarrollo
                </h3>

                <p>

                    La oferta se desarrolla alrededor
                    de soluciones de financiamiento
                    para actividades productivas,
                    emprendimientos y necesidades
                    de consumo.

                </p>

            </article>


            <article class="trajectory-card reveal">

                <div class="trajectory-number">
                    03
                </div>

                <h3>
                    Hoy · Multicredit
                </h3>

                <p>

                    La marca comercial Multicredit
                    reúne productos de microempresa
                    y consumo, incluyendo modalidades
                    de crédito grupal.

                </p>

            </article>


        </div>

    </div>

</section>






<section class="purpose-section">

    <img
        src="img/cajamarca.webp"
        alt=""
        aria-hidden="true"
        class="purpose-bg"
    >

    <div class="purpose-overlay"></div>


    <div class="page-container purpose-inner">


        <div class="purpose-heading reveal">

            <span class="section-label">
                Nuestro propósito
            </span>


            <h2>
                Misión y visión.
            </h2>


            <p>

                Una propuesta institucional centrada
                en el acceso responsable al financiamiento
                y en el desarrollo de las personas.

            </p>

        </div>


        <div class="purpose-grid">


            <article class="purpose-card mission reveal">

                <div class="purpose-icon">

                    <i class="fas fa-bullseye"></i>

                </div>


                <h3>
                    Misión
                </h3>


                <p>

                    Brindar soluciones financieras
                    accesibles y responsables que
                    contribuyan al desarrollo de
                    pequeños emprendedores, familias
                    y grupos organizados, con atención
                    cercana y orientación adecuada
                    a sus necesidades.

                </p>

            </article>


            <article class="purpose-card vision reveal">

                <div class="purpose-icon">

                    <i class="fas fa-eye"></i>

                </div>


                <h3>
                    Visión
                </h3>


                <p>

                    Consolidarnos como una institución
                    cercana y confiable en el ámbito
                    de las microfinanzas, reconocida
                    por su atención, compromiso con
                    sus clientes y aporte al desarrollo
                    económico de su entorno.

                </p>

            </article>


        </div>

    </div>

</section>






<section class="values-section">

    <img
        src="img/cajamarca.webp"
        alt=""
        aria-hidden="true"
        class="values-bg"
    >

    <div class="values-overlay"></div>


    <div class="page-container values-inner">


        <div class="values-heading reveal">

            <span class="section-label">
                Lo que nos guía
            </span>


            <h2>
                Nuestros valores.
            </h2>


            <p>

                Principios que deben reflejarse en
                cada interacción con nuestros clientes
                y comunidades.

            </p>

        </div>


        <div class="values-grid">


            <article class="value-card reveal">

                <div class="value-icon">

                    <i class="fas fa-shield-heart"></i>

                </div>


                <h4>
                    Confianza
                </h4>


                <p>

                    Construimos relaciones basadas
                    en respeto y transparencia.

                </p>

            </article>


            <article class="value-card reveal">

                <div class="value-icon">

                    <i class="fas fa-scale-balanced"></i>

                </div>


                <h4>
                    Responsabilidad
                </h4>


                <p>

                    Promovemos decisiones financieras
                    conscientes y sostenibles.

                </p>

            </article>


            <article class="value-card reveal">

                <div class="value-icon">

                    <i class="fas fa-people-group"></i>

                </div>


                <h4>
                    Solidaridad
                </h4>


                <p>

                    Valoramos la colaboración y el
                    respaldo entre las personas.

                </p>

            </article>


            <article class="value-card reveal">

                <div class="value-icon">

                    <i class="fas fa-heart"></i>

                </div>


                <h4>
                    Cercanía
                </h4>


                <p>

                    Escuchamos las necesidades de
                    nuestros clientes y sus negocios.

                </p>

            </article>


            <article class="value-card reveal">

                <div class="value-icon">

                    <i class="fas fa-seedling"></i>

                </div>


                <h4>
                    Desarrollo
                </h4>


                <p>

                    Buscamos que el financiamiento
                    se convierta en oportunidades.

                </p>

            </article>


        </div>

    </div>

</section>






<section class="focus-section">

    <img
        src="img/cajamarca.webp"
        alt=""
        aria-hidden="true"
        class="focus-background"
    >

    <div class="focus-overlay"></div>


    <div class="page-container focus-inner">


        <div class="focus-grid">


            <div class="focus-content reveal">


                <span class="section-label">
                    Nuestro enfoque
                </span>


                <h2>

                    Más que
                    un crédito.

                </h2>


                <p>

                    El financiamiento es una herramienta.
                    Nuestro trabajo parte de comprender
                    para qué necesita el cliente el crédito
                    y orientarlo hacia la alternativa que
                    corresponda a su situación.

                </p>


                <div class="focus-list">


                    <div class="focus-item">

                        <i class="fas fa-check-circle"></i>

                        <span>
                            Soluciones para microempresa
                        </span>

                    </div>


                    <div class="focus-item">

                        <i class="fas fa-check-circle"></i>

                        <span>
                            Créditos para consumo
                        </span>

                    </div>


                    <div class="focus-item">

                        <i class="fas fa-check-circle"></i>

                        <span>
                            Bancos comunales
                        </span>

                    </div>


                    <div class="focus-item">

                        <i class="fas fa-check-circle"></i>

                        <span>
                            Grupos solidarios
                        </span>

                    </div>


                </div>


                <div class="mt-8">

                    <a
                        href="creditos.php"
                        class="final-button"
                        style="display:inline-flex;"
                    >

                        <i class="fas fa-wallet"></i>

                        Ver nuestros créditos

                    </a>

                </div>


            </div>


            <div class="focus-image reveal">

                <img
                    src="img/cajamarca.webp"
                    alt="Cajamarca"
                >

            </div>


        </div>

    </div>

</section>






<section class="final-section">

    <img
        src="img/cajamarca.webp"
        alt="Cajamarca"
        class="final-bg"
    >

    <div class="final-overlay"></div>


    <div class="page-container final-inner">


        <div class="final-content reveal">


            <span class="section-label">
                Da el siguiente paso
            </span>


            <h2>

                Conoce nuestras
                opciones de crédito.

            </h2>


            <p>

                Explora nuestras soluciones de
                microempresa y consumo o conversa
                directamente con un asesor
                de Multicredit.

            </p>


            <div class="final-buttons">


                <a
                    href="creditos.php"
                    class="final-button"
                >

                    <i class="fas fa-wallet"></i>

                    Ver nuestros créditos

                </a>


                <a
                    href="https://wa.me/51968876759?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20los%20cr%C3%A9ditos%20de%20Multicredit."
                    target="_blank"
                    rel="noopener noreferrer"
                    class="final-button alt"
                >

                    <i class="fab fa-whatsapp"></i>

                    Hablar con un asesor

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
                '.reveal'
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
                                        'active'
                                    );

                                    observer.unobserve(
                                        entry.target
                                    );

                                }

                            }
                        );

                    },
                    {
                        threshold: .10
                    }
                );

            elements.forEach(
                function (element) {
                    observer.observe(element);
                }
            );

        } else {

            elements.forEach(
                function (element) {
                    element.classList.add(
                        'active'
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