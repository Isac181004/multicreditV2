<?php
// Página individual de producto: Crédito Esparcimiento
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédito Esparcimiento | CEPRODEMIC MULTICREDIT</title>
    <meta name="description" content="También hay espacio para disfrutar y compartir. Conoce Crédito Esparcimiento, una alternativa de financiamiento de Multicredit.">
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
</head>
<body class="bg-gray-50 text-gray-800 overflow-x-hidden">
<?php include 'encabezado.php'; ?>

<main class="pt-[88px] md:pt-[96px]">
    <!-- HERO -->
    <section class="relative overflow-hidden bg-gradient-to-br from-[#176b2b] via-[#23863a] to-[#2e9e43] text-white">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:18px_18px]"></div>
        <div class="absolute -right-24 -top-24 w-80 h-80 rounded-full bg-white/10"></div>
        <div class="max-w-7xl mx-auto px-4 md:px-10 py-16 md:py-24 relative z-10">
            <div class="max-w-4xl">
                <a href="creditos.php" class="inline-flex items-center gap-2 text-green-50 hover:text-white text-sm font-bold mb-7">
                    <i class="fas fa-arrow-left"></i> Volver a Créditos
                </a>
                <div class="flex flex-col md:flex-row gap-7 md:items-center">
                    <div class="w-20 h-20 rounded-3xl bg-purple-50 text-purple-700 flex items-center justify-center text-3xl shadow-xl shrink-0">
                        <i class="fas fa-face-smile-beam"></i>
                    </div>
                    <div>
                        <span class="inline-flex bg-white/10 border border-white/20 px-4 py-2 rounded-full text-xs font-extrabold uppercase tracking-widest">
                            Crédito Consumo
                        </span>
                        <h1 class="text-4xl md:text-6xl font-black mt-4 tracking-tight">Crédito Esparcimiento</h1>
                        <p class="text-lg md:text-xl text-green-50 mt-4 max-w-3xl leading-relaxed">También hay espacio para disfrutar y compartir.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INTRO + CTA -->
    <section class="py-14 md:py-16 px-4 md:px-10 bg-white">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-3 gap-7">
            <div class="lg:col-span-2">
                <span class="text-brand-orange text-xs font-extrabold uppercase tracking-[0.15em]">Conoce esta alternativa</span>
                <h2 class="text-3xl md:text-4xl font-black mt-2">Pensado para una necesidad concreta</h2>
                <p class="text-gray-600 text-lg leading-relaxed mt-5 max-w-4xl">Una alternativa de financiamiento destinada a necesidades de esparcimiento y actividades personales o familiares, sujeta a evaluación y condiciones vigentes.</p>
                <p class="text-gray-500 text-sm leading-relaxed mt-4">
                    En CEPRODEMIC – Multicredit, cada solicitud es evaluada de acuerdo con el perfil del cliente,
                    su capacidad de pago, la finalidad del financiamiento y las condiciones vigentes del producto.
                </p>
            </div>
            <div class="rounded-3xl bg-gray-50 border border-gray-200 p-6 md:p-7 shadow-sm">
                <span class="text-xs font-extrabold uppercase tracking-wider text-gray-400">¿Quieres saber más?</span>
                <h3 class="text-2xl font-black mt-2">Habla con un asesor</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-3">Recibe orientación sobre requisitos, condiciones y el proceso de evaluación.</p>
                <a href="https://wa.me/51968876759?text=Hola%20Multicredit%2C%20deseo%20informaci%C3%B3n%20sobre%20Cr%C3%A9dito%20Esparcimiento." target="_blank" rel="noopener noreferrer"
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

    <!-- PARA QUIÉN -->
    <section class="py-14 md:py-18 px-4 md:px-10 bg-gray-50">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-8">
            <div class="bg-white rounded-3xl border border-gray-100 p-7 md:p-9 shadow-sm">
                <span class="text-brand-green text-xs font-extrabold uppercase tracking-widest">¿Para quién está pensado?</span>
                <h2 class="text-2xl md:text-3xl font-black mt-2">Una solución que parte de tu necesidad</h2>
                <ul class="mt-7 space-y-4 text-gray-600 leading-relaxed">
                    <li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Personas y familias</span></li>
<li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Clientes que desean financiar una actividad de esparcimiento</span></li>
<li class="flex gap-3"><i class="fas fa-check-circle text-brand-green mt-1"></i><span>Personas que buscan organizar un gasto personal o familiar</span></li>
                </ul>
            </div>
            <div class="bg-white rounded-3xl border border-gray-100 p-7 md:p-9 shadow-sm">
                <span class="text-brand-orange text-xs font-extrabold uppercase tracking-widest">¿En qué puedes utilizarlo?</span>
                <h2 class="text-2xl md:text-3xl font-black mt-2">Financiamiento con un propósito</h2>
                <ul class="mt-7 space-y-4 text-gray-600 leading-relaxed">
                    <li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Actividades recreativas</span></li>
<li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Viajes o paseos</span></li>
<li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Celebraciones</span></li>
<li class="flex gap-3"><i class="fas fa-circle-check text-brand-green mt-1"></i><span>Otras necesidades de esparcimiento contempladas por el producto</span></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- CARACTERÍSTICAS -->
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

    <!-- REQUISITOS -->
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

    <!-- PROCESO -->
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

    <!-- FAQ -->
    <section class="py-14 md:py-18 px-4 md:px-10 bg-gray-50">
        <div class="max-w-4xl mx-auto">
            <div class="text-center">
                <span class="text-brand-green text-xs font-extrabold uppercase tracking-widest">Preguntas frecuentes</span>
                <h2 class="text-3xl md:text-4xl font-black mt-2">Lo que necesitas saber</h2>
            </div>
            <div class="space-y-3 mt-9"><details class="group rounded-2xl border border-gray-200 bg-white p-5">
            <summary class="cursor-pointer list-none flex items-center justify-between gap-4 font-extrabold text-gray-800">
                <span>¿Qué actividades puedo financiar?</span><i class="fas fa-plus text-brand-green group-open:rotate-45 transition"></i>
            </summary>
            <p class="text-gray-600 text-sm leading-relaxed mt-4 pr-8">Las actividades deben estar dentro de las condiciones del producto y ser aprobadas según la evaluación.</p>
        </details><details class="group rounded-2xl border border-gray-200 bg-white p-5">
            <summary class="cursor-pointer list-none flex items-center justify-between gap-4 font-extrabold text-gray-800">
                <span>¿Puedo solicitarlo para una actividad familiar?</span><i class="fas fa-plus text-brand-green group-open:rotate-45 transition"></i>
            </summary>
            <p class="text-gray-600 text-sm leading-relaxed mt-4 pr-8">La solicitud puede ser evaluada de acuerdo con las condiciones vigentes.</p>
        </details><details class="group rounded-2xl border border-gray-200 bg-white p-5">
            <summary class="cursor-pointer list-none flex items-center justify-between gap-4 font-extrabold text-gray-800">
                <span>¿Cuánto puedo solicitar?</span><i class="fas fa-plus text-brand-green group-open:rotate-45 transition"></i>
            </summary>
            <p class="text-gray-600 text-sm leading-relaxed mt-4 pr-8">El monto depende de la evaluación y de las condiciones del producto.</p>
        </details></div>
        </div>
    </section>

    <!-- CTA FINAL -->
    <section class="px-4 md:px-10 py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto rounded-3xl bg-gradient-to-r from-[#176b2b] to-[#2e9e43] text-white p-8 md:p-12 flex flex-col lg:flex-row items-center justify-between gap-7">
            <div>
                <span class="text-green-100 text-xs font-extrabold uppercase tracking-widest">CEPRODEMIC – Multicredit</span>
                <h2 class="text-3xl md:text-4xl font-black mt-2">¿Quieres conocer si este crédito es para ti?</h2>
                <p class="text-green-50 mt-3 max-w-2xl">Habla con un asesor y recibe orientación sobre el producto y el proceso de evaluación.</p>
            </div>
            <a href="https://wa.me/51968876759?text=Hola%20Multicredit%2C%20deseo%20informaci%C3%B3n%20sobre%20Cr%C3%A9dito%20Esparcimiento." target="_blank" rel="noopener noreferrer"
               class="shrink-0 inline-flex items-center gap-2 bg-brand-orange hover:bg-orange-500 text-white px-7 py-4 rounded-full font-extrabold shadow-lg transition">
                <i class="fab fa-whatsapp text-xl"></i> Hablar con un asesor
            </a>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
