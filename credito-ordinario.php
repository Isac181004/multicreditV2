<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédito Ordinario | CEPRODEMIC MULTICREDIT</title>
    <meta name="description" content="Financiamiento para fortalecer tu negocio. Conoce Crédito Ordinario, una alternativa de financiamiento de Multicredit.">
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

<style id="mc-ordinario-legibilidad-final">
:root{
    --mc-green:#176b2b;
    --mc-green-dark:#0b4d26;
    --mc-orange:#e85b10;
    --mc-text:#172b20;
    --mc-text-soft:#3f5146;
}

 
main > section:first-of-type{
    min-height:68vh;
    display:flex;
    align-items:center;
    position:relative;
    overflow:hidden;
    background:
        linear-gradient(100deg,
            rgba(5,31,15,.84) 0%,
            rgba(9,66,31,.68) 42%,
            rgba(9,66,31,.40) 72%,
            rgba(9,66,31,.18) 100%),
        url("img/img7.webp")
        center/cover no-repeat !important;
}
main > section:first-of-type h1,
main > section:first-of-type p,
main > section:first-of-type a,
main > section:first-of-type span{
    color:#fff !important;
}
main > section:first-of-type h1{
    text-shadow:0 8px 28px rgba(0,0,0,.35);
}
main > section:first-of-type p{
    color:#f2fff5 !important;
    text-shadow:0 3px 14px rgba(0,0,0,.28);
}

 
main > section:nth-of-type(2){
    background:
        linear-gradient(rgba(248,250,248,.84),rgba(248,250,248,.84)),
        url("img/font1.jpg")
        center/cover no-repeat !important;
}
main > section:nth-of-type(3){
    background:
        linear-gradient(rgba(242,247,243,.72),rgba(247,249,247,.78)),
        url("img/font1.jpg")
        center/cover no-repeat !important;
}
main > section:nth-of-type(4){
    background:
        linear-gradient(rgba(250,250,250,.86),rgba(248,250,248,.88)),
        url("img/font1.jpg")
        center/cover no-repeat !important;
}
main > section:nth-of-type(5){
    background:
        linear-gradient(rgba(243,247,244,.74),rgba(249,250,249,.80)),
        url("img/font1.jpg")
        center/cover no-repeat !important;
}
main > section:nth-of-type(6){
    background:
        linear-gradient(rgba(249,250,249,.86),rgba(247,249,247,.88)),
        url("img/font1.jpg")
        center/cover no-repeat !important;
}
main > section:nth-of-type(7){
    background:
        linear-gradient(rgba(242,247,243,.78),rgba(249,250,249,.84)),
        url("img/font1s.jpg")
        center/cover no-repeat !important;
}





 
main > section:nth-of-type(n+2):not(:last-of-type) h2,
main > section:nth-of-type(n+2):not(:last-of-type) h3{
    color:var(--mc-text) !important;
    opacity:1 !important;
    visibility:visible !important;
    text-shadow:none !important;
}

 
main > section:nth-of-type(n+2):not(:last-of-type) p,
main > section:nth-of-type(n+2):not(:last-of-type) li,
main > section:nth-of-type(n+2):not(:last-of-type) li span,
main > section:nth-of-type(n+2):not(:last-of-type) .text-gray-600,
main > section:nth-of-type(n+2):not(:last-of-type) .text-gray-500,
main > section:nth-of-type(n+2):not(:last-of-type) .text-gray-400{
    color:var(--mc-text-soft) !important;
    opacity:1 !important;
    visibility:visible !important;
    text-shadow:none !important;
}

 
main > section:nth-of-type(n+2):not(:last-of-type) .text-brand-green{
    color:var(--mc-green-dark) !important;
    opacity:1 !important;
}
main > section:nth-of-type(n+2):not(:last-of-type) .text-brand-orange{
    color:var(--mc-orange) !important;
    opacity:1 !important;
}

 
main > section:nth-of-type(n+2):not(:last-of-type) .bg-white.rounded-3xl,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-3xl.bg-gray-50,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-2xl.border,
main > section:nth-of-type(n+2):not(:last-of-type) details.group{
    background:rgba(255,255,255,.93) !important;
    border-color:rgba(255,255,255,.78) !important;
    box-shadow:0 18px 45px rgba(16,34,24,.12) !important;
    backdrop-filter:blur(10px);
}

 
main > section:nth-of-type(n+2):not(:last-of-type) .bg-white.rounded-3xl *,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-3xl.bg-gray-50 *,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-2xl.border *,
main > section:nth-of-type(n+2):not(:last-of-type) details.group *{
    opacity:1 !important;
    visibility:visible !important;
}

 
main > section:nth-of-type(n+2):not(:last-of-type) .bg-white.rounded-3xl h2,
main > section:nth-of-type(n+2):not(:last-of-type) .bg-white.rounded-3xl h3,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-3xl.bg-gray-50 h2,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-3xl.bg-gray-50 h3,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-2xl.border h3,
main > section:nth-of-type(n+2):not(:last-of-type) details.group summary{
    color:#163222 !important;
}

 
main > section:nth-of-type(n+2):not(:last-of-type) .bg-white.rounded-3xl p,
main > section:nth-of-type(n+2):not(:last-of-type) .bg-white.rounded-3xl li,
main > section:nth-of-type(n+2):not(:last-of-type) .bg-white.rounded-3xl li span,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-3xl.bg-gray-50 p,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-3xl.bg-gray-50 li,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-3xl.bg-gray-50 li span,
main > section:nth-of-type(n+2):not(:last-of-type) .rounded-2xl.border p,
main > section:nth-of-type(n+2):not(:last-of-type) details.group p{
    color:#42554a !important;
}

 
main > section:nth-of-type(3) .grid > div{
    background:rgba(255,255,255,.94) !important;
}
main > section:nth-of-type(3) .grid > div:first-child{
    border-top:4px solid #2e9e43 !important;
}
main > section:nth-of-type(3) .grid > div:last-child{
    border-top:4px solid #f26e22 !important;
}
main > section:nth-of-type(3) h2{
    color:#153a25 !important;
}
main > section:nth-of-type(3) ul,
main > section:nth-of-type(3) li,
main > section:nth-of-type(3) li span{
    color:#33483b !important;
}
main > section:nth-of-type(3) li i{
    color:#17783b !important;
}

 
main > section:nth-of-type(5) > div > .text-center span{
    color:#0f6b35 !important;
}
main > section:nth-of-type(5) > div > .text-center h2{
    color:#10331f !important;
}
main > section:nth-of-type(5) > div > .text-center p{
    color:#405348 !important;
}
main > section:nth-of-type(5) .mt-9.bg-white{
    background:rgba(255,255,255,.94) !important;
}
main > section:nth-of-type(5) .mt-9.bg-white span{
    color:#394c41 !important;
}
main > section:nth-of-type(5) .mt-9.bg-white i{
    color:#e85b10 !important;
}

 
main > section:nth-of-type(4) .grid > div{
    background:rgba(255,255,255,.95) !important;
}
main > section:nth-of-type(4) .grid > div h3{
    color:#143923 !important;
}
main > section:nth-of-type(4) .grid > div p{
    color:#506257 !important;
}

 
main > section:nth-of-type(6) .grid > div h3{
    color:#133b23 !important;
}
main > section:nth-of-type(6) .grid > div p{
    color:#52655a !important;
}

 
main > section:nth-of-type(7) summary span{
    color:#173522 !important;
}
main > section:nth-of-type(7) details p{
    color:#46594d !important;
}

 
main > section:last-of-type .rounded-3xl{
    background:
        linear-gradient(115deg,rgba(7,54,27,.88),rgba(36,128,57,.82)),
        url("img/img4.png")
        center/cover no-repeat !important;
}
main > section:last-of-type h2,
main > section:last-of-type p,
main > section:last-of-type span{
    color:#fff !important;
}
main > section:last-of-type h2{
    text-shadow:0 4px 16px rgba(0,0,0,.26);
}

 
main .bg-white.rounded-3xl,
main .rounded-3xl.bg-gray-50,
main .rounded-2xl.border,
main details.group{
    transition:transform .28s ease, box-shadow .28s ease;
}
main .bg-white.rounded-3xl:hover,
main .rounded-3xl.bg-gray-50:hover,
main .rounded-2xl.border:hover,
main details.group:hover{
    transform:translateY(-4px);
    box-shadow:0 25px 55px rgba(16,34,24,.16) !important;
}

 
footer,
footer *{
    visibility:visible !important;
}
footer{
    display:block !important;
    opacity:1 !important;
    transform:none !important;
    filter:none !important;
    position:relative !important;
    z-index:50 !important;
    overflow:visible !important;
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

 
main *{
    visibility:visible;
}
main .mc-reveal.mc-visible,
main .aos-animate{
    opacity:1 !important;
    transform:none !important;
    filter:none !important;
}

@media(max-width:900px){
    main > section:first-of-type{
        min-height:58vh;
        background-position:62% center !important;
    }
}
</style>

</head>
<body class="bg-gray-50 text-gray-800 overflow-x-hidden mc-ultra-page" data-product="ordinario">
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
                    <div class="w-20 h-20 rounded-3xl bg-orange-50 text-orange-600 flex items-center justify-center text-3xl shadow-xl shrink-0">
                        <i class="fas fa-store"></i>
                    </div>
                    <div>
                        <span class="inline-flex bg-white/10 border border-white/20 px-4 py-2 rounded-full text-xs font-extrabold uppercase tracking-widest">
                            Crédito Microempresa
                        </span>
                        <h1 class="text-4xl md:text-6xl font-black mt-4 tracking-tight">Crédito Ordinario</h1>
                        <p class="text-lg md:text-xl text-green-50 mt-4 max-w-3xl leading-relaxed">Financiamiento para fortalecer tu negocio.</p>
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
                <p class="text-gray-600 text-lg leading-relaxed mt-5 max-w-4xl">Una alternativa de financiamiento orientada a pequeños emprendedores que necesitan recursos para capital de trabajo, inversión o necesidades propias de su actividad económica.</p>
                <p class="text-gray-500 text-sm leading-relaxed mt-4">
                    En CEPRODEMIC – Multicredit, cada solicitud es evaluada de acuerdo con el perfil del cliente,
                    su capacidad de pago, la finalidad del financiamiento y las condiciones vigentes del producto.
                </p>
            </div>
            <div class="rounded-3xl bg-gray-50 border border-gray-200 p-6 md:p-7 shadow-sm">
                <span class="text-xs font-extrabold uppercase tracking-wider text-gray-400">¿Quieres saber más?</span>
                <h3 class="text-2xl font-black mt-2">Habla con un asesor</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3">Recibe orientación sobre requisitos, condiciones y el proceso de evaluación.</p>
                <a href="https://wa.me/51968782473?text=Hola%20Multicredit%2C%20deseo%20informaci%C3%B3n%20sobre%20Cr%C3%A9dito%20Ordinario." target="_blank" rel="noopener noreferrer"
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
                    <li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Emprendedores y pequeños negocios</span></li>
<li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Compra de mercadería o insumos</span></li>
<li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Capital de trabajo</span></li>
<li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Inversiones relacionadas con la actividad económica</span></li>
                </ul>
            </div>
            <div class="bg-white rounded-3xl border border-gray-100 p-7 md:p-9 shadow-sm">
                <span class="text-brand-orange text-xs font-extrabold uppercase tracking-widest">¿En qué puedes utilizarlo?</span>
                <h2 class="text-2xl md:text-3xl font-black mt-2">Financiamiento con un propósito</h2>
                <ul class="mt-7 space-y-4 text-gray-600 leading-relaxed">
                    <li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Abastecer inventario</span></li>
<li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Comprar insumos o materia prima</span></li>
<li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Realizar mejoras en el negocio</span></li>
<li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Atender necesidades de liquidez de la actividad</span></li>
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
                <span>¿Quién puede solicitarlo?</span><i class="fas fa-plus text-brand-green group-open:rotate-45 transition"></i>
            </summary>
            <p class="text-gray-600 text-sm leading-relaxed mt-4 pr-8">Personas que desarrollen una actividad económica y cumplan con los criterios de evaluación establecidos para el producto.</p>
        </details><details class="group rounded-2xl border border-gray-200 bg-white p-5">
            <summary class="cursor-pointer list-none flex items-center justify-between gap-4 font-extrabold text-gray-800">
                <span>¿Cuánto puedo solicitar?</span><i class="fas fa-plus text-brand-green group-open:rotate-45 transition"></i>
            </summary>
            <p class="text-gray-600 text-sm leading-relaxed mt-4 pr-8">El monto depende de la evaluación crediticia, capacidad de pago y condiciones vigentes del producto.</p>
        </details><details class="group rounded-2xl border border-gray-200 bg-white p-5">
            <summary class="cursor-pointer list-none flex items-center justify-between gap-4 font-extrabold text-gray-800">
                <span>¿Qué plazo y tasa aplica?</span><i class="fas fa-plus text-brand-green group-open:rotate-45 transition"></i>
            </summary>
            <p class="text-gray-600 text-sm leading-relaxed mt-4 pr-8">El plazo, tasa, frecuencia de pago y demás condiciones se determinan según la evaluación y las condiciones vigentes.</p>
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
            <a href="https://wa.me/51968782473?text=Hola%20Multicredit%2C%20deseo%20informaci%C3%B3n%20sobre%20Cr%C3%A9dito%20Ordinario." target="_blank" rel="noopener noreferrer"
               class="shrink-0 inline-flex items-center gap-2 bg-brand-orange hover:bg-orange-500 text-white px-7 py-4 rounded-full font-extrabold shadow-lg transition">
                <i class="fab fa-whatsapp text-xl"></i> Hablar con un asesor
            </a>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>

<script src="js/mc-productos-ultra.js" defer></script>

<script id="mc-ordinario-visibility-failsafe">
document.addEventListener('DOMContentLoaded', function(){
    function showAll(){
        document.querySelectorAll('main [data-aos], main .mc-reveal, main .mc-reveal-left, main .mc-reveal-right').forEach(function(el){
            el.classList.add('aos-animate','mc-visible');
            el.style.setProperty('opacity','1','important');
            el.style.setProperty('visibility','visible','important');
            el.style.setProperty('transform','none','important');
            el.style.setProperty('filter','none','important');
        });

        const footer=document.querySelector('footer');
        if(footer){
            footer.style.setProperty('display','block','important');
            footer.style.setProperty('opacity','1','important');
            footer.style.setProperty('visibility','visible','important');
            footer.style.setProperty('transform','none','important');
            footer.querySelectorAll('*').forEach(function(el){
                el.style.setProperty('visibility','visible','important');
                if(el.hasAttribute('data-aos') || el.classList.contains('mc-reveal') || el.classList.contains('aos-init')){
                    el.style.setProperty('opacity','1','important');
                    el.style.setProperty('transform','none','important');
                    el.style.setProperty('filter','none','important');
                }
            });
        }
    }
    setTimeout(showAll,250);
    setTimeout(showAll,1000);
});
</script>

</body>
</html>
