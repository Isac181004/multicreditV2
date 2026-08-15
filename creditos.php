<?php
// Cargar los estilos y librerías ANTES de encabezado.php.
// El archivo encabezado.php utiliza clases Tailwind, por eso deben estar disponibles desde el inicio.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEPRODEMIC MULTICREDIT - Créditos</title>
    <script>
        tailwind = window.tailwind || {};
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-green': '#2e9e43',
                        'brand-green-dark': '#1c7a30',
                        'brand-orange': '#f26e22'
                    }
                }
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
<style>
    .service-hero {
        background:
            linear-gradient(90deg, rgba(10,55,20,.92), rgba(10,55,20,.62), rgba(10,55,20,.18)),
            url('img/cajamarca.jpg') center/cover no-repeat;
    }
</style>
<style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .credit-product-card { min-height: 310px; }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        
        /* ===== SIMULADOR: SOLO ESTILOS DEL BLOQUE DEL SIMULADOR ===== */
        .simulator-section {
            background: linear-gradient(180deg, #f7f9f8 0%, #eef3ef 100%);
        }
        .simulator-shell {
            border: 1px solid #e3e9e4;
            border-radius: 28px;
            box-shadow: 0 22px 60px rgba(15, 23, 42, .09);
            overflow: hidden;
        }
        .sim-card {
            background: #fff;
            border: 1px solid #e8ece9;
            border-radius: 22px;
        }
        .sim-label {
            color: #475569;
            font-size: .82rem;
            font-weight: 700;
        }
        .sim-number {
            border: 1px solid #dbe3dd;
            border-radius: 12px;
            background: #fbfcfb;
            color: #166534;
            font-weight: 800;
            padding: .55rem .7rem;
            outline: none;
        }
        .sim-number:focus {
            border-color: #2e9e43;
            box-shadow: 0 0 0 4px rgba(46,158,67,.10);
        }
        .sim-range {
            width: 100%;
            accent-color: #2e9e43;
            cursor: pointer;
        }
        .sim-result {
            background:
                radial-gradient(circle at 90% 8%, rgba(255,255,255,.16), transparent 25%),
                linear-gradient(145deg, #176b2b 0%, #23863a 60%, #2e9e43 100%);
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .sim-result::after {
            content: "";
            position: absolute;
            width: 210px;
            height: 210px;
            border-radius: 50%;
            background: rgba(255,255,255,.06);
            left: -105px;
            bottom: -120px;
        }
        .sim-result > * { position: relative; z-index: 1; }
        .sim-main-number {
            font-size: clamp(2.3rem, 4vw, 3.25rem);
            line-height: 1;
            font-weight: 900;
            letter-spacing: -.04em;
        }
        .sim-result-box {
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 18px;
        }
        .sim-result-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255,255,255,.13);
        }
        .sim-result-row:last-child { border-bottom: 0; }
        .sim-muted { color: rgba(255,255,255,.70); }
        .sim-chart-card {
            background: #fff;
            border: 1px solid #e7ece8;
            border-radius: 20px;
            padding: 18px;
            min-height: 315px;
        }
        .sim-chart-wrap {
            height: 235px;
            position: relative;
        }
        .sim-table {
            width: 100%;
            border-collapse: collapse;
        }
        .sim-table th {
            background: #176b2b;
            color: #fff;
            padding: 12px 10px;
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .04em;
            text-align: right;
            white-space: nowrap;
        }
        .sim-table th:first-child,
        .sim-table td:first-child { text-align: center; }
        .sim-table td {
            padding: 10px;
            border-bottom: 1px solid #edf1ee;
            color: #475569;
            font-size: .78rem;
            text-align: right;
            white-space: nowrap;
        }
        .sim-table tbody tr:nth-child(even) { background: #f8faf9; }
        .sim-table tbody tr:hover { background: #edf8ef; }
        .sim-toggle {
            border: 1px solid #dbe5dd;
            background: #fff;
            color: #166534;
        }
        .sim-toggle:hover { background: #f0f8f2; }
        .sim-whatsapp {
            background: #20c765;
            box-shadow: 0 10px 25px rgba(32,199,101,.18);
        }
        .sim-whatsapp:hover { background: #18ae56; }
        @media (max-width: 767px) {
            .simulator-shell { border-radius: 20px; }
            .sim-chart-card { min-height: 290px; }
            .sim-chart-wrap { height: 215px; }
        }
    </style>

<style id="credit-visual-fix">
/* ===== CREDITS PAGE: VISUAL STABILITY / TEXT VISIBILITY ===== */
.credit-page{
    overflow-x:hidden;
    color:#17221a;
}
.credit-page .credit-hero{
    position:relative;
    display:flex;
    align-items:center;
    min-height:52vh !important;
    padding:80px 0 !important;
    background:
        linear-gradient(90deg, rgba(10,55,20,.92), rgba(10,55,20,.62), rgba(10,55,20,.18)),
        url('img/cajamarca.jpg') center/cover no-repeat !important;
    overflow:hidden;
}
.credit-page .credit-hero > div{
    position:relative;
    z-index:2;
    width:100%;
}
.credit-page .credit-hero h1,
.credit-page .credit-hero p,
.credit-page .credit-hero span,
.credit-page .credit-hero a{
    position:relative;
    z-index:3;
}
.credit-page .credit-hero h1{
    color:#fff !important;
}
.credit-page .credit-hero p{
    color:rgba(255,255,255,.92) !important;
}
.credit-page .credit-hero .text-brand-orange{
    color:#f26e22 !important;
}

/* Intro block: prevent clipping, inherited colors or collapsed layout. */
.credit-page .credit-intro-grid{
    display:grid;
    grid-template-columns:minmax(0,2fr) minmax(280px,1fr);
    gap:20px;
    align-items:stretch;
}
.credit-page .credit-intro-main{
    min-width:0;
    background:#f8faf9 !important;
    border:1px solid #e5ece7 !important;
    border-radius:28px !important;
    padding:28px 32px !important;
    color:#17221a !important;
    overflow:visible;
}
.credit-page .credit-intro-main h2{
    color:#1f2937 !important;
    opacity:1 !important;
    visibility:visible !important;
}
.credit-page .credit-intro-main p{
    color:#475569 !important;
    opacity:1 !important;
    visibility:visible !important;
}

/* The "¿No sabes cuál elegir?" card was showing white text on a light
   background. Force the intended green card and its text. */
.credit-page .credit-help-card{
    min-width:0;
    background:linear-gradient(135deg,#1c7a30 0%,#2e9e43 100%) !important;
    color:#fff !important;
    border-radius:28px !important;
    padding:28px 32px !important;
    display:flex !important;
    flex-direction:column !important;
    justify-content:center !important;
    box-shadow:0 16px 35px rgba(23,107,43,.16);
}
.credit-page .credit-help-card *{
    color:#fff !important;
    opacity:1 !important;
    visibility:visible !important;
}
.credit-page .credit-help-card h3{
    font-size:1.25rem !important;
    font-weight:900 !important;
    margin:0 !important;
}
.credit-page .credit-help-card p{
    color:rgba(255,255,255,.92) !important;
    font-size:.95rem !important;
    line-height:1.6 !important;
    margin-top:8px !important;
}

/* Microenterprise advisor CTA: same problem class of white text on a
   washed-out background. */
.credit-page .credit-advisor-card{
    background:linear-gradient(135deg,#1c7a30 0%,#145a25 100%) !important;
    color:#fff !important;
    border-radius:28px !important;
    padding:28px !important;
    min-height:310px;
    display:flex !important;
    flex-direction:column !important;
    justify-content:space-between !important;
    box-shadow:0 16px 35px rgba(23,107,43,.18);
}
.credit-page .credit-advisor-card *{
    opacity:1 !important;
    visibility:visible !important;
}
.credit-page .credit-advisor-card h3,
.credit-page .credit-advisor-card p{
    color:#fff !important;
}
.credit-page .credit-advisor-card p{
    color:rgba(255,255,255,.90) !important;
    line-height:1.6 !important;
}
.credit-page .credit-advisor-card .bg-white\/10{
    background:rgba(255,255,255,.12) !important;
}
.credit-page .credit-advisor-card a{
    background:#f26e22 !important;
    color:#fff !important;
}

/* Prevent cards or their contents from becoming invisible due to external CSS. */
.credit-page .credit-product-card-fix{
    min-width:0;
    min-height:310px !important;
    overflow:visible !important;
    color:#17221a !important;
}
.credit-page .credit-product-card-fix h3{
    color:#1f2937 !important;
    opacity:1 !important;
    visibility:visible !important;
}
.credit-page .credit-product-card-fix p{
    color:#475569 !important;
    opacity:1 !important;
    visibility:visible !important;
}
.credit-page .credit-product-card-fix a{
    color:#1c7a30 !important;
    opacity:1 !important;
    visibility:visible !important;
}

/* Mobile layout */
@media (max-width:900px){
    .credit-page .credit-intro-grid{
        grid-template-columns:1fr;
    }
    .credit-page .credit-hero{
        min-height:58vh !important;
        padding:72px 0 !important;
    }
}
@media (max-width:520px){
    .credit-page .credit-hero{
        min-height:62vh !important;
    }
    .credit-page .credit-intro-main,
    .credit-page .credit-help-card{
        padding:24px !important;
    }
}
</style>

</head>
<body class="bg-gray-50 overflow-x-hidden credit-page">

<?php
include 'encabezado.php';
?>
<!-- ================= HERO CRÉDITOS ================= -->
<section class="credit-hero">
    <div class="max-w-7xl mx-auto w-full px-5 sm:px-8 py-20">
        <div class="max-w-3xl text-white">

            <span class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-5 py-2 text-xs font-bold uppercase tracking-[.15em]">
                <i class="fas fa-hand-holding-dollar text-brand-orange"></i>
                Soluciones financieras
            </span>

            <h1 class="font-display text-4xl md:text-6xl font-extrabold leading-tight mt-6">
                Encuentra el crédito que
                <span class="text-brand-orange">se adapta a ti.</span>
            </h1>

            <p class="mt-6 text-lg md:text-xl text-white/90 leading-relaxed max-w-2xl">
                En Multicredit contamos con alternativas para pequeños emprendedores,
                negocios, familias y grupos organizados. Conoce nuestras líneas de
                Microempresa y Consumo.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 mt-8">
                <a href="#microempresa"
                   class="inline-flex items-center justify-center gap-2 bg-brand-orange hover:bg-orange-500 text-white px-7 py-3.5 rounded-full font-extrabold shadow-lg transition">
                    Ver créditos
                    <i class="fas fa-arrow-down"></i>
                </a>

                <a href="#simulador"
                   class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 border border-white/25 text-white px-7 py-3.5 rounded-full font-extrabold transition">
                    <i class="fas fa-calculator"></i>
                    Simular crédito
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ================= PRESENTACIÓN ================= -->
<section class="py-14 md:py-16 px-4 md:px-10 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="credit-intro-grid">
            <div class="credit-intro-main">
                <span class="text-brand-orange text-xs font-extrabold uppercase tracking-[0.14em]">
                    Desde 2009
                </span>
                <h2 class="text-2xl md:text-3xl font-black text-gray-800 mt-2">
                    Financiamiento para crecer, oportunidades para avanzar.
                </h2>
                <p class="text-gray-600 leading-relaxed mt-4 max-w-3xl">
                    El Centro de Promoción y Desarrollo de las Microfinanzas (CEPRODEMIC),
                    conocido comercialmente como Multicredit, inició sus operaciones en
                    Cajamarca en el año 2009 con el objetivo de acercar servicios financieros
                    a pequeños emprendedores.
                </p>
            </div>

            <div class="credit-help-card">
                <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center mb-5">
                    <i class="fas fa-compass text-xl"></i>
                </div>
                <h3 class="text-xl font-black">¿No sabes cuál elegir?</h3>
                <p class="text-green-50 text-sm leading-relaxed mt-2">
                    Revisa cada alternativa y luego usa nuestro simulador para obtener
                    una referencia del financiamiento que estás evaluando.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= MICROEMPRESA ================= -->
<section id="microempresa" class="py-16 md:py-20 px-4 md:px-10 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 mb-10">
            <div>
                <span class="inline-flex items-center gap-2 bg-orange-50 text-brand-orange px-4 py-2 rounded-full text-xs font-extrabold uppercase tracking-wider">
                    <i class="fas fa-store"></i>
                    Línea 01
                </span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-800 mt-4">
                    Créditos Microempresa
                </h2>
                <p class="text-gray-600 mt-3 max-w-2xl leading-relaxed">
                    Alternativas dirigidas a emprendedores y pequeños negocios que buscan
                    financiamiento de acuerdo con su actividad y necesidad.
                </p>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">

            <!-- Ordinario -->
            <article class="credit-product-card credit-product-card-fix bg-white rounded-3xl border border-gray-100 shadow-sm p-6 md:p-7 flex flex-col hover:-translate-y-1 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div class="w-14 h-14 rounded-2xl bg-orange-50 text-brand-orange flex items-center justify-center text-xl">
                        <i class="fas fa-store"></i>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Microempresa</span>
                </div>
                <h3 class="text-xl font-black text-gray-800 mt-5">Crédito Ordinario</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3 flex-1">
                    Una alternativa de financiamiento para atender las necesidades de
                    inversión y capital de trabajo de tu actividad económica.
                </p>
                <a href="credito-ordinario.php"
                   class="mt-6 inline-flex items-center gap-2 text-brand-green font-extrabold text-sm hover:text-brand-green-dark">
                    Conocer este crédito <i class="fas fa-arrow-right"></i>
                </a>
            </article>

            <!-- Diario -->
            <article class="credit-product-card credit-product-card-fix bg-white rounded-3xl border border-gray-100 shadow-sm p-6 md:p-7 flex flex-col hover:-translate-y-1 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div class="w-14 h-14 rounded-2xl bg-green-50 text-brand-green flex items-center justify-center text-xl">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Microempresa</span>
                </div>
                <h3 class="text-xl font-black text-gray-800 mt-5">Crédito Diario</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3 flex-1">
                    Financiamiento pensado para emprendedores que manejan un flujo
                    frecuente de ingresos y prefieren una modalidad de pago diario.
                </p>
                <a href="credito-diario.php"
                   class="mt-6 inline-flex items-center gap-2 text-brand-green font-extrabold text-sm hover:text-brand-green-dark">
                    Conocer este crédito <i class="fas fa-arrow-right"></i>
                </a>
            </article>

            <!-- CrediEmpeño -->
            <article class="credit-product-card credit-product-card-fix bg-white rounded-3xl border border-gray-100 shadow-sm p-6 md:p-7 flex flex-col hover:-translate-y-1 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
                        <i class="fas fa-gem"></i>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Microempresa</span>
                </div>
                <h3 class="text-xl font-black text-gray-800 mt-5">CrediEmpeño</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3 flex-1">
                    Opción de financiamiento respaldada por una garantía prendaria,
                    sujeta a la evaluación y condiciones del producto.
                </p>
                <a href="crediempeno.php"
                   class="mt-6 inline-flex items-center gap-2 text-brand-green font-extrabold text-sm hover:text-brand-green-dark">
                    Solicitar información <i class="fas fa-arrow-right"></i>
                </a>
            </article>

            <!-- CrediMoto -->
            <article class="credit-product-card credit-product-card-fix bg-white rounded-3xl border border-gray-100 shadow-sm p-6 md:p-7 flex flex-col hover:-translate-y-1 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                        <i class="fas fa-motorcycle"></i>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Microempresa</span>
                </div>
                <h3 class="text-xl font-black text-gray-800 mt-5">CrediMoto</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3 flex-1">
                    Financiamiento orientado a la adquisición de una motocicleta para
                    trabajo, movilidad o generación de ingresos, según evaluación.
                </p>
                <a href="credimoto.php"
                   class="mt-6 inline-flex items-center gap-2 text-brand-green font-extrabold text-sm hover:text-brand-green-dark">
                    Solicitar información <i class="fas fa-arrow-right"></i>
                </a>
            </article>

            <!-- Grupal -->
            <article class="credit-product-card credit-product-card-fix bg-white rounded-3xl border border-gray-100 shadow-sm p-6 md:p-7 flex flex-col hover:-translate-y-1 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Microempresa</span>
                </div>
                <h3 class="text-xl font-black text-gray-800 mt-5">Crédito Grupal</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3">
                    Soluciones de financiamiento para personas organizadas en grupos,
                    bajo las condiciones y metodología correspondiente.
                </p>

                <div class="grid grid-cols-2 gap-2 mt-5">
                    <a href="bancos-comunales.php"
                       class="rounded-xl bg-gray-50 border border-gray-100 p-3 text-xs font-bold text-gray-700 hover:border-brand-green hover:text-brand-green transition">
                        <i class="fas fa-landmark mr-1"></i> Bancos Comunales
                    </a>
                    <a href="grupos-solidarios.php"
                       class="rounded-xl bg-gray-50 border border-gray-100 p-3 text-xs font-bold text-gray-700 hover:border-brand-green hover:text-brand-green transition">
                        <i class="fas fa-people-group mr-1"></i> Grupos Solidarios
                    </a>
                </div>
            </article>

            <!-- CTA -->
            <article class="credit-advisor-card">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center text-xl">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3 class="text-xl font-black mt-5">¿Necesitas orientación?</h3>
                    <p class="text-green-50 text-sm leading-relaxed mt-3">
                        Cuéntanos qué necesitas financiar y un asesor podrá orientarte
                        sobre la alternativa que corresponda a tu caso.
                    </p>
                </div>
                <a href="https://wa.me/51968876759?text=Hola%2C%20deseo%20orientaci%C3%B3n%20sobre%20un%20cr%C3%A9dito%20Microempresa."
                   target="_blank" rel="noopener noreferrer"
                   class="mt-6 inline-flex items-center justify-center gap-2 bg-brand-orange hover:bg-orange-500 text-white px-5 py-3 rounded-full font-extrabold transition">
                    <i class="fab fa-whatsapp"></i>
                    Hablar con un asesor
                </a>
            </article>
        </div>
    </div>
</section>

<!-- ================= CONSUMO ================= -->
<section id="consumo" class="py-16 md:py-20 px-4 md:px-10 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="mb-10">
            <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-4 py-2 rounded-full text-xs font-extrabold uppercase tracking-wider">
                <i class="fas fa-heart"></i>
                Línea 02
            </span>
            <h2 class="text-3xl md:text-4xl font-black text-gray-800 mt-4">
                Créditos Consumo
            </h2>
            <p class="text-gray-600 mt-3 max-w-2xl leading-relaxed">
                Alternativas destinadas a necesidades personales y familiares como
                educación, salud y esparcimiento.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-5">

            <article class="rounded-3xl border border-gray-100 bg-gray-50 p-6 md:p-7 hover:bg-white hover:shadow-xl transition">
                <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center text-xl">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="text-xl font-black text-gray-800 mt-5">Educación</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3">
                    Para atender necesidades relacionadas con estudios, formación y
                    otros gastos educativos, de acuerdo con las condiciones del producto.
                </p>
                <a href="educacion.php"
                   class="inline-flex items-center gap-2 mt-6 text-brand-green font-extrabold text-sm">
                    Conocer este crédito <i class="fas fa-arrow-right"></i>
                </a>
            </article>

            <article class="rounded-3xl border border-gray-100 bg-gray-50 p-6 md:p-7 hover:bg-white hover:shadow-xl transition">
                <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-xl">
                    <i class="fas fa-heart-pulse"></i>
                </div>
                <h3 class="text-xl font-black text-gray-800 mt-5">Salud</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3">
                    Una alternativa para afrontar gastos vinculados a atención y
                    necesidades de salud, según evaluación.
                </p>
                <a href="salud.php"
                   class="inline-flex items-center gap-2 mt-6 text-brand-green font-extrabold text-sm">
                    Conocer este crédito <i class="fas fa-arrow-right"></i>
                </a>
            </article>

            <article class="rounded-3xl border border-gray-100 bg-gray-50 p-6 md:p-7 hover:bg-white hover:shadow-xl transition">
                <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-xl">
                    <i class="fas fa-face-smile-beam"></i>
                </div>
                <h3 class="text-xl font-black text-gray-800 mt-5">Esparcimiento</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3">
                    Financiamiento destinado a actividades y necesidades de
                    esparcimiento, sujeto a las condiciones y evaluación correspondientes.
                </p>
                <a href="esparcimiento.php"
                   class="inline-flex items-center gap-2 mt-6 text-brand-green font-extrabold text-sm">
                    Conocer este crédito <i class="fas fa-arrow-right"></i>
                </a>
            </article>
        </div>
    </div>
</section>

<!-- ================= COMPARADOR / ORIENTACIÓN ================= -->
<section class="py-16 px-4 md:px-10 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="text-brand-orange text-xs font-extrabold uppercase tracking-[0.14em]">
                Elige con información
            </span>
            <h2 class="text-3xl md:text-4xl font-black text-gray-800 mt-2">
                ¿Qué necesitas financiar?
            </h2>
            <p class="text-gray-600 mt-3">
                Una forma sencilla de identificar por dónde empezar.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="#microempresa" class="bg-white rounded-2xl border border-gray-100 p-5 hover:shadow-lg transition">
                <i class="fas fa-boxes-stacked text-brand-orange text-2xl"></i>
                <h3 class="font-black text-gray-800 mt-4">Mi negocio</h3>
                <p class="text-sm text-gray-500 mt-1">Capital de trabajo o inversión.</p>
            </a>

            <a href="#microempresa" class="bg-white rounded-2xl border border-gray-100 p-5 hover:shadow-lg transition">
                <i class="fas fa-motorcycle text-blue-600 text-2xl"></i>
                <h3 class="font-black text-gray-800 mt-4">Una motocicleta</h3>
                <p class="text-sm text-gray-500 mt-1">Conoce CrediMoto.</p>
            </a>

            <a href="#consumo" class="bg-white rounded-2xl border border-gray-100 p-5 hover:shadow-lg transition">
                <i class="fas fa-graduation-cap text-blue-700 text-2xl"></i>
                <h3 class="font-black text-gray-800 mt-4">Una necesidad familiar</h3>
                <p class="text-sm text-gray-500 mt-1">Educación, salud o esparcimiento.</p>
            </a>

            <a href="credito-grupal.php" class="bg-white rounded-2xl border border-gray-100 p-5 hover:shadow-lg transition">
                <i class="fas fa-users text-purple-600 text-2xl"></i>
                <h3 class="font-black text-gray-800 mt-4">Un crédito grupal</h3>
                <p class="text-sm text-gray-500 mt-1">Bancos comunales o grupos solidarios.</p>
            </a>
        </div>
    </div>
</section>

<!-- Nota institucional -->
<section class="px-4 md:px-10 pb-10 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="rounded-2xl border border-gray-200 bg-white p-5 text-xs md:text-sm text-gray-500 leading-relaxed">
            <i class="fas fa-circle-info text-brand-green mr-1"></i>
            La información presentada en esta página es de carácter informativo.
            Las condiciones, montos, plazos, tasas, requisitos y aprobación están
            sujetos a la evaluación y a las condiciones vigentes de cada producto.
            El simulador muestra resultados referenciales y no constituye una oferta
            ni una aprobación de crédito.
        </div>
    </div>
</section>

<section id="simulador" class="py-16 bg-gray-50">
<div class="max-w-6xl mx-auto px-5 sm:px-8">
<div class="max-w-3xl mx-auto text-center mb-10">
<span class="text-brand-green font-extrabold uppercase tracking-widest text-sm">Simulador</span>
<h2 class="font-display text-3xl md:text-4xl font-extrabold text-gray-900 mt-3">Simula tu crédito en pocos pasos</h2>
<p class="text-gray-600 mt-4 text-lg">Elige tu crédito, indica cuánto necesitas y descubre una cuota referencial.</p>
</div>
<div class="grid lg:grid-cols-5 gap-6 items-start">
<div class="lg:col-span-3 bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8">
<div class="space-y-8">
<div>
<div class="flex items-center justify-between mb-4"><div><p class="text-xs font-extrabold uppercase tracking-widest text-brand-green">Paso 1</p><h3 class="font-display text-xl font-extrabold mt-1">¿Qué crédito necesitas?</h3></div><span id="simProductoBadge" class="text-xs font-bold bg-green-50 text-brand-green px-3 py-1.5 rounded-full">Ordinario</span></div>
<div class="grid sm:grid-cols-2 gap-3" id="simProductos">
<button type="button" class="sim-producto sim-activo text-left rounded-2xl border-2 border-brand-green bg-green-50 p-4" data-producto="Ordinario"><b>Crédito Ordinario</b><span class="block text-xs text-gray-500">Microempresa · Mensual</span></button>
<button type="button" class="sim-producto text-left rounded-2xl border border-gray-200 p-4" data-producto="Diario"><b>Crédito Diario</b><span class="block text-xs text-gray-500">30 días · Diario</span></button>
<button type="button" class="sim-producto text-left rounded-2xl border border-gray-200 p-4" data-producto="CrediEmpeño"><b>CrediEmpeño</b><span class="block text-xs text-gray-500">3 meses · Mensual</span></button>
<button type="button" class="sim-producto text-left rounded-2xl border border-gray-200 p-4" data-producto="CrediMoto"><b>CrediMoto</b><span class="block text-xs text-gray-500">Microempresa · Mensual</span></button>
<button type="button" class="sim-producto text-left rounded-2xl border border-gray-200 p-4" data-producto="Grupos Solidarios"><b>Grupos Solidarios</b><span class="block text-xs text-gray-500">6 a 12 meses · Mensual</span></button>
<button type="button" class="sim-producto text-left rounded-2xl border border-gray-200 p-4" data-producto="Bancos Comunales"><b>Bancos Comunales</b><span class="block text-xs text-gray-500">6 a 12 meses · Mensual</span></button>
<button type="button" class="sim-producto text-left rounded-2xl border border-gray-200 p-4" data-producto="Educación"><b>Educación</b><span class="block text-xs text-gray-500">Consumo · Mensual</span></button>
<button type="button" class="sim-producto text-left rounded-2xl border border-gray-200 p-4" data-producto="Salud"><b>Salud</b><span class="block text-xs text-gray-500">Consumo · Mensual</span></button>
<button type="button" class="sim-producto text-left rounded-2xl border border-gray-200 p-4" data-producto="Esparcimiento"><b>Esparcimiento</b><span class="block text-xs text-gray-500">Consumo · Mensual</span></button>
</div></div>

<div class="mb-6 rounded-2xl border border-gray-100 bg-gray-50 p-4">
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
    <div>
      <p class="text-xs font-extrabold uppercase tracking-widest text-brand-green">Fecha de simulación</p>
      <p class="text-sm text-gray-600 mt-1">El interés se calcula con los días reales de cada período.</p>
    </div>
    <input id="simFecha" type="date" class="border border-gray-200 rounded-xl px-4 py-2 font-bold bg-white">
  </div>
</div>
<div>
<div class="flex items-end justify-between mb-3"><div><p class="text-xs font-extrabold uppercase tracking-widest text-brand-green">Paso 2</p><h3 class="font-display text-xl font-extrabold mt-1">¿Cuánto necesitas?</h3></div><div class="text-right"><div class="text-xs text-gray-500">Monto solicitado</div><div id="simMontoVista" class="text-3xl font-extrabold text-brand-green">S/ 100</div></div></div>
<div class="flex items-center gap-2 bg-gray-50 rounded-2xl border border-gray-200 px-4 py-3"><span class="font-extrabold text-gray-500">S/</span><input id="simMonto" type="number" min="100" step="100" value="100" class="w-full bg-transparent outline-none text-2xl font-extrabold" inputmode="numeric"></div>
<input id="simMontoSlider" type="range" min="100" max="20000" step="100" value="100" class="w-full mt-5">
<div class="flex justify-between text-xs text-gray-400 mt-1"><span>S/ 100</span><span id="simMaxMontoLabel">S/ 20,000</span></div>
<div class="flex flex-wrap gap-2 mt-4">
<button type="button" class="sim-monto bg-gray-100 px-4 py-2 rounded-full text-sm font-bold" data-monto="500">S/ 500</button>
<button type="button" class="sim-monto bg-gray-100 px-4 py-2 rounded-full text-sm font-bold" data-monto="1000">S/ 1,000</button>
<button type="button" class="sim-monto bg-gray-100 px-4 py-2 rounded-full text-sm font-bold" data-monto="2000">S/ 2,000</button>
<button type="button" class="sim-monto bg-gray-100 px-4 py-2 rounded-full text-sm font-bold" data-monto="5000">S/ 5,000</button>
</div>
</div>
<div id="simTasaWrap"><div class="flex items-center justify-between mb-3"><div><p class="text-xs font-extrabold uppercase tracking-widest text-brand-green">Tasa</p><h3 class="font-display text-xl font-extrabold mt-1">Tasa referencial</h3></div><select id="simTasa" class="border border-gray-200 rounded-xl px-4 py-2 font-extrabold bg-white" aria-label="Tasa del crédito"></select></div><p class="text-sm text-gray-500">Puedes ajustar la tasa dentro del rango vigente.</p></div>
<div id="simPlazoWrap"><p class="text-xs font-extrabold uppercase tracking-widest text-brand-green">Paso 3</p><h3 class="font-display text-xl font-extrabold mt-1 mb-3">¿En cuánto tiempo quieres pagarlo?</h3><div id="simPlazos" class="flex flex-wrap gap-2"></div></div>
<div id="simDiarioInfo" class="hidden rounded-2xl bg-orange-50 p-5 text-sm"><b>30 pagos diarios.</b> El 18.55% corresponde al interés total de los 30 días.</div>
</div></div>
<div class="lg:col-span-2 sim-result-panel rounded-3xl p-7 md:p-8 lg:sticky lg:top-24">
<span class="sim-pill rounded-full px-3 py-1 text-xs font-extrabold uppercase">Tu simulación</span>
<p class="sim-muted text-sm mt-6">Cuota referencial</p><div id="simCuota" class="sim-main-number mt-1">S/ 0</div><p id="simFrecuencia" class="sim-muted">mensual</p>
<div class="sim-result-box mt-7 p-4 space-y-1 text-sm">
<div class="flex justify-between"><span class="sim-row-label">Producto</span><b id="simResultadoProducto">Crédito Ordinario</b></div>
<div class="flex justify-between"><span class="sim-row-label">Monto</span><b id="simResultadoMonto">S/ 100</b></div>
<div class="flex justify-between"><span class="sim-row-label">Tasa</span><b id="simResultadoTasa">3.6%</b></div>
<div class="flex justify-between"><span class="sim-row-label">Plazo</span><b id="simResultadoPlazo">12 meses</b></div>
<div class="flex justify-between"><span class="sim-row-label">Total estimado</span><b id="simTotal">S/ 0</b></div>
<div class="flex justify-between"><span class="sim-row-label">Interés estimado</span><b id="simInteres">S/ 0</b></div>
</div>
<div class="mt-7 space-y-3"><button type="button" id="simTablaBtn" class="w-full sim-table-btn font-extrabold rounded-full py-3.5"><i class="fas fa-calendar-check mr-2"></i>Ver mi cronograma</button>
<button type="button" id="simSolicitarBtn" class="w-full inline-flex justify-center items-center gap-2 sim-whatsapp-btn font-extrabold rounded-full py-3.5 border-0 cursor-pointer"><i class="fab fa-whatsapp"></i>Solicitar información por WhatsApp</button></div>
<p class="sim-note text-xs mt-5">Simulación referencial. Las condiciones finales están sujetas a evaluación crediticia.</p>
</div></div>
<div id="simTablaWrap" class="hidden mt-6 bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-sm">
  <div class="p-5 md:p-6 border-b bg-white">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
      <div>
        <p class="text-xs font-extrabold uppercase tracking-widest text-brand-green">Cronograma de pagos</p>
        <h3 class="font-display text-2xl font-extrabold mt-1">Mi cronograma</h3>
        <p class="text-sm text-gray-500 mt-1">Vista referencial basada en el método de cálculo de Multicredit.</p>
      </div>
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-xs">
        <div class="rounded-xl bg-gray-50 px-3 py-2"><span class="block text-gray-400">Producto</span><b id="cronProducto">-</b></div>
        <div class="rounded-xl bg-gray-50 px-3 py-2"><span class="block text-gray-400">Monto</span><b id="cronMonto">-</b></div>
        <div class="rounded-xl bg-gray-50 px-3 py-2"><span class="block text-gray-400">Tasa mensual</span><b id="cronTasa">-</b></div>
        <div class="rounded-xl bg-gray-50 px-3 py-2"><span class="block text-gray-400">Plazo</span><b id="cronPlazo">-</b></div>
      </div>
    </div>
  </div>
  <div class="overflow-x-auto">
    <table class="min-w-[920px] w-full text-sm">
      <thead class="bg-gray-50 border-b">
        <tr>
          <th class="text-left px-3 py-3">No.</th>
          <th class="text-left px-3 py-3">Fecha</th>
          <th class="text-right px-3 py-3">Capital</th>
          <th class="text-right px-3 py-3">Interés</th>
          <th class="text-right px-3 py-3">Desgrav.</th>
          <th class="text-right px-3 py-3">Previs.</th>
          <th class="text-right px-3 py-3">Aporte</th>
          <th class="text-right px-3 py-3">Cuota</th>
          <th class="text-right px-3 py-3">Saldo</th>
          <th class="text-center px-3 py-3">Est.</th>
        </tr>
      </thead>
      <tbody id="simTablaBody"></tbody>
      <tfoot id="simTablaFoot" class="bg-gray-50 border-t font-extrabold"></tfoot>
    </table>
  </div>
  <div class="p-4 md:p-5 bg-gray-50 border-t flex flex-col md:flex-row md:items-center md:justify-between gap-3">
    <p class="text-xs text-gray-500"><b>Regla de redondeo:</b> la cuota regular se redondea al sol superior y la última cuota se ajusta para cancelar exactamente el saldo.</p>
    <button type="button" id="simTablaCerrar" class="rounded-full border border-gray-200 bg-white px-5 py-2.5 text-sm font-extrabold hover:bg-gray-100">Cerrar cronograma</button>
  </div>
</div>
</div></section>

<style id="simulador-visible-fix">
.sim-result-panel{background:#176b2b !important;background:linear-gradient(145deg,#145a25 0%,#1f7b35 55%,#2e9e43 100%) !important;color:#fff !important;min-height:520px;box-shadow:0 18px 45px rgba(23,107,43,.20);}
.sim-result-panel *{color:inherit;}
.sim-result-panel .sim-pill{display:inline-block;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.22);color:#fff !important;}
.sim-result-panel .sim-muted{color:rgba(255,255,255,.78) !important;}
.sim-result-panel .sim-main-number{color:#fff !important;font-size:clamp(2.7rem,5vw,4rem);line-height:1;font-weight:900;letter-spacing:-.045em;}
.sim-result-panel .sim-result-box{background:rgba(0,0,0,.13);border:1px solid rgba(255,255,255,.15);border-radius:18px;color:#fff !important;}
.sim-result-panel .sim-row-label{color:rgba(255,255,255,.72) !important;}
.sim-result-panel b{color:#fff !important;}
.sim-result-panel .sim-table-btn{display:block;background:#fff !important;color:#176b2b !important;text-align:center;border:0;cursor:pointer;}
.sim-result-panel .sim-whatsapp-btn{display:inline-flex;background:#20c765 !important;color:#fff !important;text-decoration:none;}
.sim-result-panel .sim-note{color:rgba(255,255,255,.62) !important;}
@media(max-width:1023px){.sim-result-panel{min-height:auto;position:relative!important;top:auto!important;}}
</style>
<style>
.sede-option:focus{outline:none;box-shadow:0 0 0 4px rgba(46,158,67,.10)}
#enviarSedeWhatsApp:disabled{opacity:.7}
.sim-producto.sim-activo{border-color:#187038;background:#f0fdf4}.sim-plazo{border:1px solid #e5e7eb;background:#fff;padding:.7rem 1rem;border-radius:9999px;font-weight:800}.sim-plazo.sim-activo{background:#187038;color:#fff}.sim-monto.sim-activo{background:#f0fdf4;color:#187038}
</style>
<script>
/* MULTICREDIT V10 - SIMULADOR UNIFICADO Y FUNCIONAL */
(()=>{const C={
Ordinario:{a:3.6,b:4,t:6,T:24,m:20000,d:1},Diario:{a:18.55,b:18.55,t:30,T:30,m:10000,d:30},
CrediEmpeño:{a:5,b:6,t:3,T:3,m:20000,d:1},CrediMoto:{a:3.6,b:4,t:6,T:24,m:30000,d:1},
"Grupos Solidarios":{a:3.6,b:3.6,t:6,T:12,m:20000,d:1},"Bancos Comunales":{a:3,b:3,t:6,T:12,m:20000,d:1},
Educación:{a:3,b:3.6,t:6,T:24,m:15000,d:1},Salud:{a:2.5,b:3,t:3,T:24,m:15000,d:1},
Esparcimiento:{a:3.6,b:4,t:6,T:24,m:15000,d:1}};
let s={p:"Ordinario",a:100,r:3.6,n:12,rows:[]};const $=x=>document.getElementById(x),money=x=>"S/ "+Number(x||0).toLocaleString("es-PE",{minimumFractionDigits:2,maximumFractionDigits:2}),m0=x=>"S/ "+Math.round(x||0).toLocaleString("es-PE");
function rates(){let c=C[s.p],q=$("simTasa");q.innerHTML="";for(let r=c.a;r<=c.b+.001;r+=.1){r=Math.round(r*10)/10;let o=new Option(r.toFixed(r%1?1:2)+"%",r);if(r===c.a)o.selected=true;q.add(o)}q.disabled=c.a===c.b;s.r=c.a}
function terms(){let c=C[s.p],w=$("simPlazos");w.innerHTML="";$("simDiarioInfo").classList.toggle("hidden",s.p!=="Diario");$("simPlazoWrap").classList.toggle("hidden",s.p==="Diario");if(s.p==="Diario"){s.n=30;return} s.n=Math.min(c.T,Math.max(c.t,s.n));for(let n=c.t;n<=c.T;n++){let b=document.createElement("button");b.className="sim-plazo"+(n===s.n?" sim-activo":"");b.textContent=n+" meses";b.onclick=()=>{s.n=n;terms();calc()};w.appendChild(b)}}
function amount(v){v=Math.round(Number(v)/100)*100;if(!isFinite(v))v=100;v=Math.max(100,Math.min(C[s.p].m,v));s.a=v;$("simMonto").value=v;$("simMontoSlider").value=v;$("simMontoVista").textContent=m0(v);$("simResultadoMonto").textContent=money(v);calc()}
function monthly(){
  const P=Number(s.a);
  const displayedRate=Number(s.r)/100;

  /*
   * Legacy precision:
   * the old system displays 3.6000%, but the observed six-row
   * schedule is reproduced when the internal rate is 3.5999%.
   * That is only 0.0001 percentage point below the displayed rate.
   * We keep the public value at 3.6% and use the internal precision
   * only for the calculation.
   */
  const r=Math.max(0, displayedRate-0.000001);
  const n=Number(s.n);
  const issue=$("simFecha")?.value || "2026-08-11";

  function addMonthsSameDay(dateStr,months){
    const d=new Date(dateStr+"T00:00:00");
    const day=d.getDate();
    const target=new Date(d.getFullYear(),d.getMonth()+months,1);
    const last=new Date(target.getFullYear(),target.getMonth()+1,0).getDate();
    target.setDate(Math.min(day,last));
    return target.toISOString().slice(0,10);
  }
  function daysBetween(a,b){
    return Math.max(1,Math.round(
      (new Date(b+"T00:00:00")-new Date(a+"T00:00:00"))/86400000
    ));
  }
  function cents(x){ return Math.round((x+Number.EPSILON)*100)/100; }

  const dates=[issue];
  for(let i=1;i<=n;i++) dates.push(addMonthsSameDay(issue,i));
  const periods=[];
  for(let i=0;i<n;i++) periods.push(daysBetween(dates[i],dates[i+1]));

  // First determine the regular fixed installment.
  function endBalance(payment){
    let bal=P;
    for(let i=0;i<n;i++){
      const pr=Math.pow(1+r,periods[i]/30)-1;
      bal=bal+bal*pr-payment;
    }
    return bal;
  }

  let lo=0,hi=Math.max(P*3,100);
  for(let k=0;k<100;k++){
    const mid=(lo+hi)/2;
    if(endBalance(mid)>0) lo=mid; else hi=mid;
  }
  const exactPayment=(lo+hi)/2;
  const regular=Math.ceil(exactPayment-1e-9);

  // Accounting table: balance and interest are rounded to cents
  // at each installment, matching the displayed legacy schedule.
  let bal=cents(P), rows=[];
  for(let i=1;i<=n;i++){
    const opening=cents(bal);
    const days=periods[i-1];
    const pr=Math.pow(1+r,days/30)-1;
    const interest=cents(opening*pr);

    let payment=regular;
    let principal=cents(payment-interest);

    if(i===n){
      principal=opening;
      payment=cents(opening+interest);
    }else if(principal>opening){
      principal=opening;
      payment=cents(opening+interest);
    }

    const closing=cents(Math.max(0,opening-principal));
    rows.push({
      i,date:dates[i],days,op:opening,interest,
      principal,payment,cl:closing
    });
    bal=closing;
  }

  return rows;
}

function daily(){
  const P=Number(s.a);
  const totalRate=0.1855; // FIJO: 18.55% por los 30 días
  const totalInterest=Math.round(P*totalRate*100)/100;
  const totalToPay=Math.round((P+totalInterest)*100)/100;
  const dailyPayment=Math.ceil((totalToPay/30)*100)/100;
  const issue=$("simFecha")?.value || "2026-08-11";

  function addDays(dateStr,days){
    const d=new Date(dateStr+"T00:00:00");
    d.setDate(d.getDate()+days);
    return d.toISOString().slice(0,10);
  }
  function cents(x){return Math.round((x+Number.EPSILON)*100)/100;}

  let remaining=totalToPay;
  let interestAccum=0;
  const rows=[];

  for(let i=1;i<=30;i++){
    const opening=i===1?P:rows[i-2].cl;

    // 18.55% is the total interest for the 30-day operation.
    // It is allocated over 30 days only for display.
    const interest=i===30
      ? cents(totalInterest-interestAccum)
      : cents(totalInterest/30);

    const payment=i===30
      ? cents(remaining)
      : Math.min(dailyPayment,cents(remaining));

    const principal=cents(payment-interest);
    const closing=cents(Math.max(0,remaining-payment));

    rows.push({
      i,
      date:addDays(issue,i),
      days:1,
      op:cents(opening),
      interest,
      principal,
      payment,
      cl:closing
    });

    interestAccum=cents(interestAccum+interest);
    remaining=closing;
  }

  return rows;
}
function calc(){
  let rows=s.p==="Diario"?daily():monthly();
  s.rows=rows;
  let total=rows.reduce((a,x)=>a+x.payment,0), interest=rows.reduce((a,x)=>a+x.interest,0);
  $("simCuota").textContent=s.p==="Diario"?money(rows[0]?.payment||0):m0(rows[0]?.payment||0);
  $("simFrecuencia").textContent=s.p==="Diario"?"por día · 30 días":"por mes";
  $("simResultadoProducto").textContent=s.p;
  $("simResultadoTasa").textContent=s.p==="Diario"?"18.55%":s.r.toFixed(s.r%1?1:2)+"%";
  $("simResultadoPlazo").textContent=s.p==="Diario"?"30 días":s.n+" meses";
  $("simTotal").textContent=money(total);
  $("simInteres").textContent=money(interest);

  $("cronProducto").textContent=s.p;
  $("cronMonto").textContent=money(s.a);
  $("cronTasa").textContent=s.p==="Diario"?"18.55% total":""+s.r.toFixed(s.r%1?1:2)+"% mensual";
  $("cronPlazo").textContent=s.p==="Diario"?"30 días":s.n+" meses";

  const fmtDate=d=>{
    if(!d) return "-";
    const [y,m,day]=d.split('-');
    return `${day}/${m}/${y}`;
  };
  let b=$( "simTablaBody" );
  b.innerHTML="";
  rows.forEach(x=>{
    const last=x.i===rows.length;
    b.insertAdjacentHTML("beforeend",`<tr class="border-t border-gray-100 ${last?'bg-green-50/50':''}">
      <td class="px-3 py-3 font-bold">${x.i}</td>
      <td class="px-3 py-3">${fmtDate(x.date)}</td>
      <td class="px-3 py-3 text-right">${money(x.principal)}</td>
      <td class="px-3 py-3 text-right">${money(x.interest)}</td>
      <td class="px-3 py-3 text-right">S/ 0.00</td>
      <td class="px-3 py-3 text-right">S/ 0.00</td>
      <td class="px-3 py-3 text-right">S/ 0.00</td>
      <td class="px-3 py-3 text-right font-extrabold">${money(x.payment)}</td>
      <td class="px-3 py-3 text-right font-extrabold">${money(x.cl)}</td>
      <td class="px-3 py-3 text-center">${last?'✓':'-'}</td>
    </tr>`);
  });
  $("simTablaFoot").innerHTML=`<tr>
    <td class="px-3 py-3" colspan="2">TOTAL</td>
    <td class="px-3 py-3 text-right">${money(rows.reduce((a,x)=>a+x.principal,0))}</td>
    <td class="px-3 py-3 text-right">${money(interest)}</td>
    <td class="px-3 py-3 text-right">S/ 0.00</td>
    <td class="px-3 py-3 text-right">S/ 0.00</td>
    <td class="px-3 py-3 text-right">S/ 0.00</td>
    <td class="px-3 py-3 text-right">${money(total)}</td>
    <td class="px-3 py-3 text-right">S/ 0.00</td>
    <td></td>
  </tr>`;

  const sedeResumen=$('sedeResumenSimulacion');
  if(sedeResumen){
    sedeResumen.textContent=`${s.p} · ${money(s.a)} · ${s.p==="Diario"?"30 días":s.n+" meses"} · Cuota ${s.p==="Diario"?money(rows[0]?.payment||0):m0(rows[0]?.payment||0)}`;
  }
}
let sedeSeleccionada="";
const modalSede=$("modalSedeCredito");
const abrirSede=()=>{
  calc();
  modalSede.classList.remove("hidden");
  modalSede.classList.add("flex");
};
const cerrarSede=()=>{
  modalSede.classList.add("hidden");
  modalSede.classList.remove("flex");
};
$("simSolicitarBtn")?.addEventListener("click",abrirSede);
$("cerrarModalSede")?.addEventListener("click",cerrarSede);
$("cancelarSede")?.addEventListener("click",cerrarSede);
modalSede?.addEventListener("click",e=>{if(e.target===modalSede)cerrarSede()});
document.querySelectorAll(".sede-option").forEach(btn=>btn.addEventListener("click",()=>{
  sedeSeleccionada=btn.dataset.sede;
  document.querySelectorAll(".sede-option").forEach(x=>{
    x.classList.remove("border-brand-green","bg-green-50");
    x.classList.add("border-gray-200");
    const dot=x.querySelector(".sede-radio");
    dot.classList.remove("border-brand-green"); dot.classList.add("border-gray-300");
    dot.querySelector("span")?.classList.add("hidden");
  });
  btn.classList.remove("border-gray-200"); btn.classList.add("border-brand-green","bg-green-50");
  const dot=btn.querySelector(".sede-radio");
  dot.classList.remove("border-gray-300"); dot.classList.add("border-brand-green");
  dot.querySelector("span")?.classList.remove("hidden");
  $("enviarSedeWhatsApp").disabled=false;
}));
$("enviarSedeWhatsApp")?.addEventListener("click",()=>{
  if(!sedeSeleccionada)return;
  const cuota=$("simCuota").textContent;
  const total=$("simTotal").textContent;
  const interes=$("simInteres").textContent;
  const tasa=s.p==="Diario"?"18.55%":s.r.toFixed(s.r%1?1:2)+"%";
  const plazo=s.p==="Diario"?"30 días":s.n+" meses";
  const msg=`Hola Multicredit, deseo solicitar información sobre un préstamo.\n\n*Crédito:* ${s.p}\n*Monto solicitado:* ${money(s.a)}\n*Plazo:* ${plazo}\n*Tasa referencial:* ${tasa}\n*Cuota referencial:* ${cuota}\n*Total referencial:* ${total}\n*Interés estimado:* ${interes}\n*Sede elegida:* ${sedeSeleccionada}\n\nQuisiera recibir información sobre los requisitos y el proceso para solicitar el préstamo.`;
  window.open("https://wa.me/51968876759?text="+encodeURIComponent(msg),"_blank","noopener,noreferrer");
  cerrarSede();
});

function product(p){s.p=p;let c=C[p];s.a=Math.min(s.a,c.m);$("simProductoBadge").textContent=p;document.querySelectorAll(".sim-producto").forEach(x=>x.classList.toggle("sim-activo",x.dataset.producto===p));$("simMontoSlider").max=c.m;$("simMaxMontoLabel").textContent=m0(c.m);rates();terms();amount(s.a)}
document.querySelectorAll(".sim-producto").forEach(b=>b.addEventListener("click",e=>{e.preventDefault();product(b.dataset.producto);}));document.querySelectorAll(".sim-monto").forEach(b=>b.onclick=()=>amount(b.dataset.monto));$("simMonto").oninput=e=>amount(e.target.value);$("simMontoSlider").oninput=e=>amount(e.target.value);$("simTasa").onchange=e=>{s.r=+e.target.value;calc()};
$("simFecha").onchange=()=>calc();
$("simTablaBtn").onclick=()=>{
  const w=$("simTablaWrap"), hidden=w.classList.toggle("hidden");
  $("simTablaBtn").innerHTML=hidden?'<i class="fas fa-calendar-check mr-2"></i>Ver mi cronograma':'<i class="fas fa-chevron-up mr-2"></i>Ocultar mi cronograma';
  if(!hidden) w.scrollIntoView({behavior:"smooth",block:"start"});
};
$("simTablaCerrar").onclick=()=>{
  $("simTablaWrap").classList.add("hidden");
  $("simTablaBtn").innerHTML='<i class="fas fa-calendar-check mr-2"></i>Ver mi cronograma';
};
rates();terms();$("simMaxMontoLabel").textContent=m0(C.Ordinario.m);if($("simFecha")&&!$("simFecha").value){$("simFecha").value="2026-08-11"}amount(100)})();
</script>

<!-- MODAL DE SEDE PARA SOLICITAR INFORMACIÓN -->
<div id="modalSedeCredito" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[80] hidden items-center justify-center p-4">
  <div class="bg-white w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden">
    <div class="bg-gradient-to-r from-brand-green-dark to-brand-green text-white px-6 py-6 md:px-8">
      <div class="flex items-start justify-between gap-4">
        <div>
          <span class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-widest">
            <i class="fas fa-location-dot"></i> Último paso
          </span>
          <h3 class="text-2xl md:text-3xl font-black mt-3">¿Dónde deseas ser atendido?</h3>
          <p class="text-green-50 text-sm mt-2">Elige la sede más cercana a ti y te enviaremos a WhatsApp con los datos de tu simulación.</p>
        </div>
        <button type="button" id="cerrarModalSede" class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white text-xl">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    <div class="p-6 md:p-8">
      <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4 mb-6">
        <div class="flex items-center gap-3">
          <div class="w-11 h-11 rounded-xl bg-green-100 text-brand-green flex items-center justify-center"><i class="fas fa-calculator"></i></div>
          <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Tu simulación</p>
            <p id="sedeResumenSimulacion" class="font-extrabold text-gray-800 mt-1">Crédito Ordinario · S/ 100 · 12 meses</p>
          </div>
        </div>
      </div>

      <p class="text-sm font-extrabold text-gray-800 mb-3">Selecciona una sede</p>
      <div id="opcionesSede" class="grid sm:grid-cols-2 gap-3">
        <button type="button" class="sede-option text-left rounded-2xl border-2 border-gray-200 p-4 hover:border-brand-green hover:bg-green-50 transition" data-sede="Sede Principal - Cajamarca" data-ciudad="Cajamarca">
          <span class="flex items-center gap-3"><span class="sede-radio w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center"><span class="hidden w-2.5 h-2.5 rounded-full bg-brand-green"></span></span><b>Sede Principal</b></span>
          <span class="block text-xs text-gray-500 mt-2 ml-8">Cajamarca</span>
        </button>
        <button type="button" class="sede-option text-left rounded-2xl border-2 border-gray-200 p-4 hover:border-brand-green hover:bg-green-50 transition" data-sede="Agencia Huamachuco" data-ciudad="Huamachuco">
          <span class="flex items-center gap-3"><span class="sede-radio w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center"><span class="hidden w-2.5 h-2.5 rounded-full bg-brand-green"></span></span><b>Agencia Huamachuco</b></span>
          <span class="block text-xs text-gray-500 mt-2 ml-8">Huamachuco</span>
        </button>
        <button type="button" class="sede-option text-left rounded-2xl border-2 border-gray-200 p-4 hover:border-brand-green hover:bg-green-50 transition" data-sede="Agencia Cajabamba" data-ciudad="Cajabamba">
          <span class="flex items-center gap-3"><span class="sede-radio w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center"><span class="hidden w-2.5 h-2.5 rounded-full bg-brand-green"></span></span><b>Agencia Cajabamba</b></span>
          <span class="block text-xs text-gray-500 mt-2 ml-8">Cajabamba</span>
        </button>
        <button type="button" class="sede-option text-left rounded-2xl border-2 border-gray-200 p-4 hover:border-brand-green hover:bg-green-50 transition" data-sede="Agencia San Marcos" data-ciudad="San Marcos">
          <span class="flex items-center gap-3"><span class="sede-radio w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center"><span class="hidden w-2.5 h-2.5 rounded-full bg-brand-green"></span></span><b>Agencia San Marcos</b></span>
          <span class="block text-xs text-gray-500 mt-2 ml-8">San Marcos</span>
        </button>
      </div>

      <div class="mt-6 flex flex-col sm:flex-row gap-3">
        <button type="button" id="cancelarSede" class="sm:w-1/3 rounded-full border border-gray-200 bg-white py-3.5 font-bold text-gray-600 hover:bg-gray-50">Cancelar</button>
        <button type="button" id="enviarSedeWhatsApp" disabled class="sm:flex-1 rounded-full bg-[#20c765] disabled:bg-gray-300 disabled:cursor-not-allowed text-white py-3.5 font-extrabold flex items-center justify-center gap-2 shadow-lg">
          <i class="fab fa-whatsapp text-lg"></i> Continuar por WhatsApp
        </button>
      </div>
      <p class="text-[11px] text-gray-400 text-center mt-4">El mensaje incluirá tu crédito simulado, monto, plazo, cuota referencial y la sede que elegiste.</p>
    </div>
  </div>
</div>

<div id="panelRequisitos" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl overflow-hidden animate-[fadeIn_0.2s_ease-out]">
        <div class="bg-gray-800 text-white p-4 flex justify-between items-center">
            <h4 class="font-bold text-sm uppercase tracking-wide"><i class="fas fa-file-invoice mr-2 text-brand-orange"></i>Requisitos Generales</h4>
            <button id="cerrarPanel" class="text-white hover:text-brand-orange text-lg focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-6 space-y-4 text-sm text-gray-600 leading-relaxed">
            <p class="font-semibold text-gray-800 border-b pb-1">Para Personas Naturales o Negocios:</p>
            <ul class="space-y-2.5 list-none pl-0">
                <div class="flex items-start"><i class="fas fa-id-card text-brand-green mt-1 mr-3 text-xs"></i><li>Copia de DNI vigente (titular y cónyuge en caso aplique).</li></div>
                <div class="flex items-start"><i class="fas fa-receipt text-brand-green mt-1 mr-3 text-xs"></i><li>Recibo de servicios públicos (Luz o Agua) de tu domicilio actual.</li></div>
                <div class="flex items-start"><i class="fas fa-file-signature text-brand-green mt-1 mr-3 text-xs"></i><li>Documentos que acrediten tus ingresos (Boletas de compra, facturas, cuadernos de control o constancias).</li></div>
                <div class="flex items-start"><i class="fas fa-map-marker-alt text-brand-green mt-1 mr-3 text-xs"></i><li>Tener una antigüedad mínima de 6 meses operando tu negocio o actividad productiva en la región.</li></div>
            </ul>
            <div class="bg-orange-50 border-l-4 border-brand-orange p-3 rounded text-xs text-brand-orange mt-4">
                <i class="fas fa-exclamation-circle mr-1"></i> <strong>Sujeto a evaluación:</strong> Recuerda que tu asesor técnico de campo te visitará para darte las máximas facilidades de trámite.
            </div>
        </div>
        <div class="bg-gray-50 px-6 py-3 flex justify-end border-t">
            <button onclick="document.getElementById('panelRequisitos').classList.add('hidden')" class="bg-brand-green hover:bg-green-700 text-white text-xs font-bold py-2 px-5 rounded-lg transition shadow">Entendido</button>
        </div>
    </div>
</div>

<script src="js/app.js"></script>


<?php include 'footer.php'; ?>