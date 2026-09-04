<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédito Diario | CEPRODEMIC MULTICREDIT</title>
    <meta name="description" content="Una modalidad pensada para el movimiento diario de tu negocio. Conoce Crédito Diario, una alternativa de financiamiento de Multicredit.">
    <script>
        tailwind = window.tailwind || {};
        tailwind.config = {
            theme: { extend: { colors: {
                'brand-green':'#2e9e43',
                'brand-green-dark':'#1c7a30',
                'brand-orange':'#f26e22'
            } } }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/mc-productos-ultra.css?v=<?= filemtime(__DIR__ . '/css/mc-productos-ultra.css') ?>">

<style id="mc-diario-color-visible">
:root{
  --verde-oscuro:#0a3f22;
  --verde:#16813a;
  --verde-claro:#e8f7ed;
  --naranja:#e85c12;
  --azul:#1f5f9e;
  --morado:#7042a5;
  --dorado:#9a6500;
  --rojo:#b73d49;
  --texto:#23352a;
  --texto-suave:#465b4d;
  --blanco:#ffffff;
}

html{scroll-behavior:smooth}
body.mc-ultra-page{background:#eef4ef!important;color:var(--texto)!important;font-family:'Inter',sans-serif!important}
body.mc-ultra-page h1,body.mc-ultra-page h2,body.mc-ultra-page h3{font-family:'Poppins',sans-serif!important}

 
main > section:nth-of-type(1){
  min-height:70vh;
  display:flex;
  align-items:center;
  background:
    linear-gradient(100deg,rgba(4,27,14,.82) 0%,rgba(8,56,29,.66) 43%,rgba(8,56,29,.30) 75%,rgba(8,56,29,.12) 100%),
    url('img/font11.webp') center/cover no-repeat!important;
  position:relative;
}
main > section:nth-of-type(1)::after{content:"";position:absolute;inset:auto 0 0;height:120px;background:linear-gradient(to top,#eef4ef,transparent);pointer-events:none}
main > section:nth-of-type(1)>div{position:relative;z-index:2}
main > section:nth-of-type(1) h1{color:#fff!important;text-shadow:0 7px 24px rgba(0,0,0,.38)}
main > section:nth-of-type(1) p{color:#f2fff5!important;text-shadow:0 3px 14px rgba(0,0,0,.34)}
main > section:nth-of-type(1) a{color:#f7fff9!important}
main > section:nth-of-type(1) a:hover{color:#fff!important}
main > section:nth-of-type(1) span{color:#fff!important}
main > section:nth-of-type(1) .w-20{background:rgba(255,255,255,.94)!important;color:var(--verde)!important}

 
main > section:nth-of-type(2){
  background:
    linear-gradient(90deg,rgba(244,249,245,.76),rgba(244,249,245,.70)),
    url('img/font3.jpg') center/cover no-repeat!important;
}
main > section:nth-of-type(2) .lg\\:col-span-2{background:rgba(255,255,255,.80);padding:28px;border-radius:28px;box-shadow:0 18px 44px rgba(12,24,19,.10);backdrop-filter:blur(10px)}
main > section:nth-of-type(2) .lg\\:col-span-2>span{color:var(--naranja)!important}
main > section:nth-of-type(2) h2{color:var(--verde-oscuro)!important}
main > section:nth-of-type(2) p{color:#2d4636!important}
main > section:nth-of-type(2) .rounded-3xl{background:rgba(255,255,255,.91)!important;border-color:rgba(255,255,255,.72)!important;box-shadow:0 20px 48px rgba(10,63,34,.14)!important}
main > section:nth-of-type(2) .rounded-3xl>span{color:var(--azul)!important}
main > section:nth-of-type(2) .rounded-3xl h3{color:var(--verde-oscuro)!important}
main > section:nth-of-type(2) .rounded-3xl p{color:#3f5547!important}
main > section:nth-of-type(2) a.border{color:var(--verde-oscuro)!important;border-color:var(--verde)!important;background:#f4fff7!important}

 
main > section:nth-of-type(3){
  background:
    linear-gradient(180deg,rgba(232,242,234,.72),rgba(243,248,244,.80)),
    url('img/font3.jpg') center/cover no-repeat!important;
}
main > section:nth-of-type(3) .bg-white{background:rgba(255,255,255,.89)!important;backdrop-filter:blur(10px);box-shadow:0 20px 48px rgba(12,24,19,.11)!important}
main > section:nth-of-type(3) .bg-white:first-child>span{color:var(--verde)!important}
main > section:nth-of-type(3) .bg-white:last-child>span{color:var(--naranja)!important}
main > section:nth-of-type(3) h2{color:var(--verde-oscuro)!important}
main > section:nth-of-type(3) li span{color:#32483a!important;font-weight:600}
main > section:nth-of-type(3) li i{color:var(--verde)!important}

 
main > section:nth-of-type(4){
  background:
    linear-gradient(180deg,rgba(248,250,248,.77),rgba(248,250,248,.83)),
    url('img/font3.jpg') center/cover no-repeat!important;
}
main > section:nth-of-type(4) .text-center>span{color:var(--naranja)!important}
main > section:nth-of-type(4) .text-center h2{color:var(--verde-oscuro)!important}
main > section:nth-of-type(4) .text-center p{color:#3d5546!important}
main > section:nth-of-type(4) .grid>div{background:rgba(255,255,255,.90)!important;border-color:rgba(255,255,255,.74)!important;box-shadow:0 16px 38px rgba(12,24,19,.10);transition:transform .28s ease,box-shadow .28s ease}
main > section:nth-of-type(4) .grid>div:hover{transform:translateY(-6px);box-shadow:0 24px 52px rgba(12,24,19,.15)}
main > section:nth-of-type(4) .grid>div:nth-child(1) i,main > section:nth-of-type(4) .grid>div:nth-child(1) h3{color:var(--verde)!important}
main > section:nth-of-type(4) .grid>div:nth-child(2) i,main > section:nth-of-type(4) .grid>div:nth-child(2) h3{color:var(--azul)!important}
main > section:nth-of-type(4) .grid>div:nth-child(3) i,main > section:nth-of-type(4) .grid>div:nth-child(3) h3{color:var(--naranja)!important}
main > section:nth-of-type(4) .grid>div:nth-child(4) i,main > section:nth-of-type(4) .grid>div:nth-child(4) h3{color:var(--morado)!important}
main > section:nth-of-type(4) .grid p{color:#465a4d!important}

 
main > section:nth-of-type(5){
  background:
    linear-gradient(180deg,rgba(236,244,238,.75),rgba(246,249,246,.82)),
    url('img/font3.jpg') center/cover no-repeat!important;
}
main > section:nth-of-type(5) .text-center>span{color:var(--verde)!important}
main > section:nth-of-type(5) .text-center h2{color:var(--verde-oscuro)!important}
main > section:nth-of-type(5) .text-center p{color:#42584a!important}
main > section:nth-of-type(5) .mt-9.bg-white{background:rgba(255,255,255,.91)!important;box-shadow:0 20px 48px rgba(12,24,19,.12)!important}
main > section:nth-of-type(5) .grid span{color:#344a3b!important;font-weight:600}
main > section:nth-of-type(5) .grid i{color:var(--naranja)!important}
main > section:nth-of-type(5) .bg-orange-50{background:#fff1e7!important;color:#75431f!important;border-color:#ffd6bd!important}
main > section:nth-of-type(5) .bg-orange-50 i{color:var(--naranja)!important}

 
main > section:nth-of-type(6){
  background:
    linear-gradient(180deg,rgba(248,250,248,.80),rgba(248,250,248,.84)),
    url('img/font3.jpg') center/cover no-repeat!important;
}
main > section:nth-of-type(6) .text-center>span{color:var(--naranja)!important}
main > section:nth-of-type(6) .text-center h2{color:var(--verde-oscuro)!important}
main > section:nth-of-type(6) .grid>div{background:rgba(255,255,255,.88);border-radius:22px;padding:24px 16px;box-shadow:0 14px 34px rgba(12,24,19,.09)}
main > section:nth-of-type(6) .grid>div:nth-child(1) .rounded-full{background:#e8f7ed!important;color:var(--verde)!important}
main > section:nth-of-type(6) .grid>div:nth-child(2) .rounded-full{background:#eaf2fb!important;color:var(--azul)!important}
main > section:nth-of-type(6) .grid>div:nth-child(3) .rounded-full{background:#fff0e6!important;color:var(--naranja)!important}
main > section:nth-of-type(6) .grid>div:nth-child(4) .rounded-full{background:#f2ebfb!important;color:var(--morado)!important}
main > section:nth-of-type(6) h3{color:#173d27!important}
main > section:nth-of-type(6) p{color:#52665a!important}

 
main > section:nth-of-type(7){
  background:
    linear-gradient(180deg,rgba(236,244,238,.76),rgba(247,249,247,.84)),
    url('img/font3.jpg') center/cover no-repeat!important;
}
main > section:nth-of-type(7) .text-center>span{color:var(--verde)!important}
main > section:nth-of-type(7) .text-center h2{color:var(--verde-oscuro)!important}
main > section:nth-of-type(7) details{background:rgba(255,255,255,.91)!important;border-color:rgba(255,255,255,.76)!important;box-shadow:0 12px 30px rgba(12,24,19,.08)}
main > section:nth-of-type(7) summary span{color:#173d27!important}
main > section:nth-of-type(7) summary i{color:var(--naranja)!important}
main > section:nth-of-type(7) details p{color:#465a4d!important}

 
main > section:nth-of-type(8){
  background:
    linear-gradient(180deg,rgba(236,244,238,.72),rgba(247,249,247,.84)),
    url('img/font3.jpg') center/cover no-repeat!important;
}
main > section:nth-of-type(8) .rounded-3xl{
  background:
    linear-gradient(105deg,rgba(5,47,22,.78),rgba(31,126,54,.70)),
    url('img/bank.webp') center/cover no-repeat!important;
  box-shadow:0 24px 58px rgba(8,54,27,.24)!important;
}
main > section:nth-of-type(8) span{color:#bdf6cb!important}
main > section:nth-of-type(8) h2{color:#fff!important;text-shadow:0 4px 14px rgba(0,0,0,.28)}
main > section:nth-of-type(8) p{color:#effff3!important}
main > section:nth-of-type(8) a{color:#fff!important;background:var(--naranja)!important}

 
main .text-gray-800{color:#173d27!important}
main .text-gray-600{color:#3f5547!important}
main .text-gray-500{color:#52665a!important}
main .text-gray-400{color:#68796d!important}
main .text-brand-green{color:var(--verde)!important}
main .text-brand-orange{color:var(--naranja)!important}

 
main .rounded-3xl,main .rounded-2xl,main details{transition:transform .28s ease,box-shadow .28s ease}
main .rounded-3xl:hover,main .rounded-2xl:hover,main details:hover{transform:translateY(-4px)}

@media(max-width:900px){
 main>section:nth-of-type(1){min-height:60vh;background-position:66% center!important}
 main>section:nth-of-type(n+2){background-position:center!important}
 main>section:nth-of-type(2) .lg\\:col-span-2{padding:22px}
}
</style>


<style id="mc-footer-visibility-fix">





footer,
footer *{
    visibility:visible !important;
}

footer{
    display:block !important;
    position:relative !important;
    z-index:30 !important;
    opacity:1 !important;
    transform:none !important;
    filter:none !important;
    min-height:0 !important;
    height:auto !important;
    overflow:visible !important;
    isolation:isolate;
}

footer [data-aos],
footer .aos-init,
footer .aos-animate,
footer .mc-reveal,
footer .mc-reveal-left,
footer .mc-reveal-right{
    opacity:1 !important;
    visibility:visible !important;
    transform:none !important;
    filter:none !important;
}

 
body.mc-ultra-page > footer,
body.mc-ultra-page footer{
    opacity:1 !important;
}

 
main .mc-reveal{
    visibility:visible !important;
}
main .mc-reveal.mc-visible{
    opacity:1 !important;
    transform:none !important;
    filter:none !important;
}
</style>

</head>
<body class="bg-gray-50 text-gray-800 overflow-x-hidden mc-ultra-page" data-product="diario">
<?php include 'encabezado.php'; ?>

<main class="pt-[88px] md:pt-[96px]">
     
    <section class="relative overflow-hidden bg-gradient-to-br from-[#176b2b] via-[#23863a] to-[#2e9e43] text-white">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:18px_18px]"></div>
        <div class="absolute -right-24 -top-24 w-80 h-80 rounded-full bg-white/10"></div>
        <div class="max-w-7xl mx-auto px-4 md:px-10 py-16 md:py-24 relative z-10">
            <div class="max-w-4xl">
                <a href="creditos.php" class="inline-flex items-center gap-2 text-green-50 hover:text-white text-sm font-bold mb-7">
                    <i class="fas fa-arrow-left"></i> Volver a Créditos
                </a>
                <div class="flex flex-col md:flex-row gap-7 md:items-center">
                    <div class="w-20 h-20 rounded-3xl bg-green-50 text-green-700 flex items-center justify-center text-3xl shadow-xl shrink-0">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <div>
                        <span class="inline-flex bg-white/10 border border-white/20 px-4 py-2 rounded-full text-xs font-extrabold uppercase tracking-widest">
                            Crédito Microempresa
                        </span>
                        <h1 class="text-4xl md:text-6xl font-black mt-4 tracking-tight">Crédito Diario</h1>
                        <p class="text-lg md:text-xl text-green-50 mt-4 max-w-3xl leading-relaxed">Una modalidad pensada para el movimiento diario de tu negocio.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

     
    <section class="py-14 md:py-16 px-4 md:px-10 bg-white">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-3 gap-7">
            <div class="lg:col-span-2">
                <span class="text-brand-orange text-xs font-extrabold uppercase tracking-[0.15em]">Conoce esta alternativa</span>
                <h2 class="text-3xl md:text-4xl font-black mt-2">Pensado para una necesidad concreta</h2>
                <p class="text-gray-600 text-lg leading-relaxed mt-5 max-w-4xl">Financiamiento dirigido a emprendedores que manejan un flujo frecuente de ingresos y buscan una modalidad de pago diario, de acuerdo con las condiciones del producto.</p>
                <p class="text-gray-500 text-sm leading-relaxed mt-4">
                    En CEPRODEMIC – Multicredit, cada solicitud es evaluada de acuerdo con el perfil del cliente,
                    su capacidad de pago, la finalidad del financiamiento y las condiciones vigentes del producto.
                </p>
            </div>
            <div class="rounded-3xl bg-gray-50 border border-gray-200 p-6 md:p-7 shadow-sm">
                <span class="text-xs font-extrabold uppercase tracking-wider text-gray-400">¿Quieres saber más?</span>
                <h3 class="text-2xl font-black mt-2">Habla con un asesor</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3">Recibe orientación sobre requisitos, condiciones y el proceso de evaluación.</p>
                <a href="https://wa.me/51968782473?text=Hola%20Multicredit%2C%20deseo%20informaci%C3%B3n%20sobre%20Cr%C3%A9dito%20Diario." target="_blank" rel="noopener noreferrer"
                   class="mt-6 w-full inline-flex items-center justify-center gap-2 bg-brand-orange hover:bg-orange-500 text-white px-5 py-3.5 rounded-full font-extrabold transition">
                    <i class="fab fa-whatsapp text-lg"></i> Solicitar información
                </a>
                <a href="creditos.php#simulador"
                   class="mt-3 w-full inline-flex items-center justify-center gap-2 border border-brand-green text-brand-green hover:bg-green-50 px-5 py-3.5 rounded-full font-extrabold transition">
                    <i class="fas fa-calculator"></i> Ir al simulador
                </a>
            </div>
        </div>
    </section>

     
    <section class="py-14 md:py-18 px-4 md:px-10 bg-gray-50">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-8">
            <div class="bg-white rounded-3xl border border-gray-100 p-7 md:p-9 shadow-sm">
                <span class="text-brand-green text-xs font-extrabold uppercase tracking-widest">¿Para quién está pensado?</span>
                <h2 class="text-2xl md:text-3xl font-black mt-2">Una solución que parte de tu necesidad</h2>
                <ul class="mt-7 space-y-4 text-gray-600 leading-relaxed">
                    <li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Comerciantes y emprendedores</span></li>
<li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Negocios con ingresos frecuentes</span></li>
<li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Actividades que requieren capital de trabajo</span></li>
<li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Personas que prefieren organizar pagos con frecuencia diaria</span></li>
                </ul>
            </div>
            <div class="bg-white rounded-3xl border border-gray-100 p-7 md:p-9 shadow-sm">
                <span class="text-brand-orange text-xs font-extrabold uppercase tracking-widest">¿En qué puedes utilizarlo?</span>
                <h2 class="text-2xl md:text-3xl font-black mt-2">Financiamiento con un propósito</h2>
                <ul class="mt-7 space-y-4 text-gray-600 leading-relaxed">
                    <li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Compra y reposición de mercadería</span></li>
<li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Capital de trabajo</span></li>
<li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Abastecimiento del negocio</span></li>
<li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Necesidades operativas de corto plazo</span></li>
                </ul>
            </div>
        </div>
    </section>

     
    <section class="py-14 md:py-18 px-4 md:px-10 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-brand-orange text-xs font-extrabold uppercase tracking-widest">Información del producto</span>
                <h2 class="text-3xl md:text-4xl font-black mt-2">Características a confirmar con tu asesor</h2>
                <p class="text-gray-600 mt-3">Mostramos la estructura que tendrá la ficha comercial sin publicar datos que todavía no hemos validado.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-10">
                <div class="rounded-2xl border border-gray-200 p-5">
                    <i class="fas fa-money-bill-wave text-brand-green text-2xl"></i>
                    <h3 class="font-black mt-4">Monto</h3>
                    <p class="text-sm text-gray-500 mt-1">Según evaluación y condiciones vigentes.</p>
                </div>
                <div class="rounded-2xl border border-gray-200 p-5">
                    <i class="fas fa-calendar-alt text-brand-green text-2xl"></i>
                    <h3 class="font-black mt-4">Plazo</h3>
                    <p class="text-sm text-gray-500 mt-1">Se determina según el producto y evaluación.</p>
                </div>
                <div class="rounded-2xl border border-gray-200 p-5">
                    <i class="fas fa-percent text-brand-green text-2xl"></i>
                    <h3 class="font-black mt-4">Tasa y costos</h3>
                    <p class="text-sm text-gray-500 mt-1">Consulta las condiciones vigentes antes de contratar.</p>
                </div>
                <div class="rounded-2xl border border-gray-200 p-5">
                    <i class="fas fa-handshake text-brand-green text-2xl"></i>
                    <h3 class="font-black mt-4">Garantías</h3>
                    <p class="text-sm text-gray-500 mt-1">Dependen del producto y del resultado de la evaluación.</p>
                </div>
            </div>
        </div>
    </section>

     
    <section class="py-14 md:py-18 px-4 md:px-10 bg-gray-50">
        <div class="max-w-5xl mx-auto">
            <div class="text-center">
                <span class="text-brand-green text-xs font-extrabold uppercase tracking-widest">Antes de solicitar</span>
                <h2 class="text-3xl md:text-4xl font-black mt-2">Requisitos referenciales</h2>
                <p class="text-gray-600 mt-3">La documentación exacta puede variar según el producto y la evaluación.</p>
            </div>
            <div class="mt-9 bg-white rounded-3xl border border-gray-200 p-7 md:p-9">
                <div class="grid md:grid-cols-2 gap-5 text-gray-600">
                    <div class="flex gap-3"><i class="fas fa-id-card text-brand-orange mt-1"></i><span>Documento de identidad vigente.</span></div>
                    <div class="flex gap-3"><i class="fas fa-chart-line text-brand-orange mt-1"></i><span>Información que permita conocer tu capacidad de pago.</span></div>
                    <div class="flex gap-3"><i class="fas fa-file-lines text-brand-orange mt-1"></i><span>Documentación relacionada con la finalidad del crédito, cuando corresponda.</span></div>
                    <div class="flex gap-3"><i class="fas fa-folder-open text-brand-orange mt-1"></i><span>Documentación adicional según el producto y evaluación.</span></div>
                </div>
                <div class="mt-7 rounded-2xl bg-orange-50 border border-orange-100 p-4 text-sm text-gray-600">
                    <i class="fas fa-circle-info text-brand-orange mr-1"></i>
                    Estos requisitos son referenciales. Antes de iniciar una solicitud, confirma con Multicredit la documentación vigente para este producto.
                </div>
            </div>
        </div>
    </section>

     
    <section class="py-14 md:py-18 px-4 md:px-10 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center">
                <span class="text-brand-orange text-xs font-extrabold uppercase tracking-widest">Proceso</span>
                <h2 class="text-3xl md:text-4xl font-black mt-2">¿Cómo solicitarlo?</h2>
            </div>
            <div class="grid md:grid-cols-4 gap-5 mt-10">
                <div class="text-center"><div class="mx-auto w-12 h-12 rounded-full bg-green-50 text-brand-green flex items-center justify-center font-black">01</div><h3 class="font-black mt-4">Consulta</h3><p class="text-sm text-gray-500 mt-1">Cuéntanos qué necesitas financiar.</p></div>
                <div class="text-center"><div class="mx-auto w-12 h-12 rounded-full bg-green-50 text-brand-green flex items-center justify-center font-black">02</div><h3 class="font-black mt-4">Requisitos</h3><p class="text-sm text-gray-500 mt-1">Conoce la documentación que corresponde.</p></div>
                <div class="text-center"><div class="mx-auto w-12 h-12 rounded-full bg-green-50 text-brand-green flex items-center justify-center font-black">03</div><h3 class="font-black mt-4">Evaluación</h3><p class="text-sm text-gray-500 mt-1">Se analiza tu solicitud y capacidad de pago.</p></div>
                <div class="text-center"><div class="mx-auto w-12 h-12 rounded-full bg-green-50 text-brand-green flex items-center justify-center font-black">04</div><h3 class="font-black mt-4">Respuesta</h3><p class="text-sm text-gray-500 mt-1">Recibes información sobre el resultado y condiciones.</p></div>
            </div>
        </div>
    </section>

     
    <section class="py-14 md:py-18 px-4 md:px-10 bg-gray-50">
        <div class="max-w-4xl mx-auto">
            <div class="text-center">
                <span class="text-brand-green text-xs font-extrabold uppercase tracking-widest">Preguntas frecuentes</span>
                <h2 class="text-3xl md:text-4xl font-black mt-2">Lo que necesitas saber</h2>
            </div>
            <div class="space-y-3 mt-9"><details class="group rounded-2xl border border-gray-200 bg-white p-5">
            <summary class="cursor-pointer list-none flex items-center justify-between gap-4 font-extrabold text-gray-800">
                <span>¿El pago es necesariamente diario?</span><i class="fas fa-plus text-brand-green group-open:rotate-45 transition"></i>
            </summary>
            <p class="text-gray-600 text-sm leading-relaxed mt-4 pr-8">La modalidad y frecuencia de pago corresponden a las condiciones del producto y a la evaluación realizada.</p>
        </details><details class="group rounded-2xl border border-gray-200 bg-white p-5">
            <summary class="cursor-pointer list-none flex items-center justify-between gap-4 font-extrabold text-gray-800">
                <span>¿Puedo solicitarlo para mi pequeño negocio?</span><i class="fas fa-plus text-brand-green group-open:rotate-45 transition"></i>
            </summary>
            <p class="text-gray-600 text-sm leading-relaxed mt-4 pr-8">Puedes solicitar una evaluación si desarrollas una actividad económica. La aprobación depende del análisis correspondiente.</p>
        </details><details class="group rounded-2xl border border-gray-200 bg-white p-5">
            <summary class="cursor-pointer list-none flex items-center justify-between gap-4 font-extrabold text-gray-800">
                <span>¿Qué monto puedo obtener?</span><i class="fas fa-plus text-brand-green group-open:rotate-45 transition"></i>
            </summary>
            <p class="text-gray-600 text-sm leading-relaxed mt-4 pr-8">El monto se determina de acuerdo con tu capacidad de pago, historial y las condiciones vigentes.</p>
        </details></div>
        </div>
    </section>

     
    <section class="px-4 md:px-10 py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto rounded-3xl bg-gradient-to-r from-[#176b2b] to-[#2e9e43] text-white p-8 md:p-12 flex flex-col lg:flex-row items-center justify-between gap-7">
            <div>
                <span class="text-green-100 text-xs font-extrabold uppercase tracking-widest">CEPRODEMIC – Multicredit</span>
                <h2 class="text-3xl md:text-4xl font-black mt-2">¿Quieres conocer si este crédito es para ti?</h2>
                <p class="text-green-50 mt-3 max-w-2xl">Habla con un asesor y recibe orientación sobre el producto y el proceso de evaluación.</p>
            </div>
            <a href="https://wa.me/51968782473?text=Hola%20Multicredit%2C%20deseo%20informaci%C3%B3n%20sobre%20Cr%C3%A9dito%20Diario." target="_blank" rel="noopener noreferrer"
               class="shrink-0 inline-flex items-center gap-2 bg-brand-orange hover:bg-orange-500 text-white px-7 py-4 rounded-full font-extrabold shadow-lg transition">
                <i class="fab fa-whatsapp text-xl"></i> Hablar con un asesor
            </a>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>

<script src="js/mc-productos-ultra.js" defer></script>

<script id="mc-footer-reveal-failsafe">
document.addEventListener('DOMContentLoaded', function () {
    function asegurarVisibilidad() {
        document.querySelectorAll('main .mc-reveal').forEach(function (el) {
            el.classList.add('mc-visible');
        });

        const footer = document.querySelector('footer');
        if (footer) {
            footer.style.setProperty('display', 'block', 'important');
            footer.style.setProperty('opacity', '1', 'important');
            footer.style.setProperty('visibility', 'visible', 'important');
            footer.style.setProperty('transform', 'none', 'important');

            footer.querySelectorAll('*').forEach(function (el) {
                el.style.setProperty('visibility', 'visible', 'important');

                if (
                    el.hasAttribute('data-aos') ||
                    el.classList.contains('aos-init') ||
                    el.classList.contains('mc-reveal')
                ) {
                    el.style.setProperty('opacity', '1', 'important');
                    el.style.setProperty('transform', 'none', 'important');
                    el.style.setProperty('filter', 'none', 'important');
                }
            });
        }
    }

     
    setTimeout(asegurarVisibilidad, 350);
    setTimeout(asegurarVisibilidad, 1200);
});
</script>

</body>
</html>
