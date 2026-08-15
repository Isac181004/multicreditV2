<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | CEPRODEMIC MULTICREDIT</title>

    <script>
        tailwind = window.tailwind || {};
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-green': '#0d5c2e',
                        'brand-green-dark': '#083d1f',
                        'brand-green-deep': '#052712',
                        'brand-orange': '#f26e22'
                    }
                }
            }
        };
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/mc-pro.css">

    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; }
        .contact-card { transition: transform .4s cubic-bezier(.23,1,.32,1), box-shadow .4s ease; }
        .contact-card:hover { transform: translateY(-6px); box-shadow: 0 22px 50px rgba(5,39,18,.12); }
        .contact-icon { transition: transform .4s ease; }
        .contact-card:hover .contact-icon { transform: scale(1.08) rotate(-3deg); }
    </style>

    <?php include 'encabezado.php'; ?>

<style id="multicredit-visibility-fix">
    html, body { overflow-x: hidden !important; }
    .mc-safe-light, .mc-safe-light * { color: #17221a !important; }
    .mc-safe-muted { color: #5d6a61 !important; }
    .mc-safe-link { color: #0d5c2e !important; }
    img { max-width: 100%; height: auto; }
    @media (max-width: 900px) { .mc-hero-fix { min-height: 460px !important; } }
    @media (max-width: 640px) { .mc-hero-fix { min-height: 500px !important; } }
</style>
</head>

<body class="bg-gray-50 overflow-x-hidden">
<main class="bg-gray-50 pt-20 mc-page">

    <!-- HERO -->
    <section class="contact-hero mc-hero-fix min-h-[52vh] flex items-center">
        <div class="max-w-7xl mx-auto w-full px-5 sm:px-8 py-20">
            <div class="max-w-3xl text-white mc-reveal">
                <span class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-5 py-2 text-xs font-bold uppercase tracking-[.15em]">
                    <i class="fas fa-headset text-brand-orange"></i> Atención Multicredit
                </span>
                <h1 class="font-display text-4xl md:text-6xl font-black leading-tight mt-6">
                    Estamos para <span class="text-brand-orange">ayudarte.</span>
                </h1>
                <p class="mt-6 text-lg md:text-xl text-white/90 leading-relaxed max-w-2xl">
                    Comunícate con nuestro equipo, selecciona la sede más cercana
                    y recibe orientación sobre créditos, requisitos y el proceso de evaluación.
                </p>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section class="max-w-7xl mx-auto px-5 sm:px-8 py-16">
        <div class="max-w-3xl mx-auto text-center mb-12 mc-reveal">
            <span class="text-brand-green font-extrabold uppercase tracking-widest text-sm">Canales de atención</span>
            <h2 class="font-display text-3xl md:text-4xl font-black text-gray-900 mt-3">Hablemos de tu próximo proyecto</h2>
            <p class="text-gray-600 mt-5 text-lg leading-relaxed">
                Elige el canal que te resulte más cómodo y recibe orientación de nuestro equipo Multicredit.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">

            <!-- INFORMACIÓN -->
            <div class="contact-card tilt-3d mc-reveal mc-safe-light bg-white rounded-2xl p-8 border border-gray-100">
                <div class="tilt-layer">
                <div class="contact-icon w-16 h-16 rounded-2xl bg-green-50 text-brand-green flex items-center justify-center text-2xl mb-6">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="font-display text-2xl font-black text-gray-900">Nuestros canales</h3>
                <p class="mc-safe-muted text-gray-600 mt-3 leading-relaxed">
                    Estamos disponibles para ayudarte con información sobre créditos, requisitos, simulaciones y nuestras agencias.
                </p>

                <div class="space-y-6 mt-8">
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 rounded-xl bg-green-50 text-brand-green flex items-center justify-center flex-none"><i class="fab fa-whatsapp text-xl"></i></div>
                        <div><p class="font-extrabold text-gray-900">WhatsApp</p>
                        <a href="https://wa.me/51968876759" target="_blank" rel="noopener noreferrer" class="mc-safe-muted text-gray-600 hover:text-brand-green transition">968 876 759 · Escribir ahora</a></div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 rounded-xl bg-orange-50 text-brand-orange flex items-center justify-center flex-none"><i class="fas fa-phone"></i></div>
                        <div><p class="font-extrabold text-gray-900">Teléfonos</p><p class="mc-safe-muted text-gray-600">968 876 759<br>973 972 743</p></div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 rounded-xl bg-green-50 text-brand-green flex items-center justify-center flex-none"><i class="fas fa-envelope"></i></div>
                        <div><p class="font-extrabold text-gray-900">Correo</p>
                        <a href="mailto:informes@ceprodemic.com" class="mc-safe-muted text-gray-600 hover:text-brand-green transition">informes@ceprodemic.com</a></div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 rounded-xl bg-orange-50 text-brand-orange flex items-center justify-center flex-none"><i class="fas fa-location-dot"></i></div>
                        <div><p class="font-extrabold text-gray-900">Sede principal</p><p class="mc-safe-muted text-gray-600 leading-relaxed">Jr. Los Naranjos Nro. 513<br>Urb. Los Rosales, Cajamarca</p></div>
                    </div>
                </div>

                <div class="mt-10 pt-8 border-t border-gray-100">
                    <h4 class="font-display text-xl font-black text-gray-900">Agencias y atención</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-5">
                        <div class="mc-safe-light bg-gray-50 rounded-xl p-4 border border-gray-100"><p class="font-extrabold text-gray-900">Sede Principal</p><small class="text-gray-500">Cajamarca</small></div>
                        <div class="mc-safe-light bg-gray-50 rounded-xl p-4 border border-gray-100"><p class="font-extrabold text-gray-900">Agencia</p><small class="text-gray-500">Huamachuco</small></div>
                        <div class="mc-safe-light bg-gray-50 rounded-xl p-4 border border-gray-100"><p class="font-extrabold text-gray-900">Agencia</p><small class="text-gray-500">Cajabamba</small></div>
                        <div class="mc-safe-light bg-gray-50 rounded-xl p-4 border border-gray-100"><p class="font-extrabold text-gray-900">Agencia</p><small class="text-gray-500">San Marcos</small></div>
                    </div>
                </div>
                </div>
            </div>

            <!-- FORMULARIO -->
            <div class="contact-card tilt-3d mc-reveal mc-safe-light bg-white rounded-2xl p-8 border border-gray-100">
                <div class="tilt-layer">
                <div class="contact-icon w-16 h-16 rounded-2xl bg-orange-50 text-brand-orange flex items-center justify-center text-2xl mb-6">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h3 class="font-display text-2xl font-black text-gray-900">Solicita información</h3>
                <p class="mc-safe-muted text-gray-600 mt-3 leading-relaxed">
                    Déjanos tus datos y elige dónde deseas ser atendido. Tu consulta será enviada directamente a WhatsApp.
                </p>

                <form id="contactForm" class="mt-7">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-extrabold text-gray-700 mb-2">Nombres y apellidos</label>
                            <input id="nombre" required placeholder="Ej. Juan Pérez"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-brand-green focus:ring-4 focus:ring-green-100">
                        </div>
                        <div>
                            <label class="block text-sm font-extrabold text-gray-700 mb-2">Teléfono</label>
                            <input id="telefono" required inputmode="tel" placeholder="Ej. 999 999 999"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-brand-green focus:ring-4 focus:ring-green-100">
                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm font-extrabold text-gray-700 mb-2">¿Qué necesitas?</label>
                        <select id="tema" class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-brand-green focus:ring-4 focus:ring-green-100">
                            <option>Información sobre un crédito</option>
                            <option>Simulación de crédito</option>
                            <option>Requisitos para solicitar un crédito</option>
                            <option>Información sobre una agencia</option>
                            <option>Otro</option>
                        </select>
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm font-extrabold text-gray-700 mb-2">Sede donde deseas ser atendido</label>
                        <select id="sede" class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-brand-green focus:ring-4 focus:ring-green-100">
                            <option>Sede Principal - Cajamarca</option>
                            <option>Agencia Huamachuco</option>
                            <option>Agencia Cajabamba</option>
                            <option>Agencia San Marcos</option>
                        </select>
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm font-extrabold text-gray-700 mb-2">Mensaje</label>
                        <textarea id="mensaje" rows="5" placeholder="Cuéntanos brevemente qué necesitas..."
                                  class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-brand-green focus:ring-4 focus:ring-green-100 resize-y"></textarea>
                    </div>

                    <button type="submit"
                            class="btn-shine w-full mt-6 inline-flex justify-center items-center gap-2 bg-brand-green hover:bg-brand-green-dark text-white font-extrabold px-6 py-4 rounded-lg transition">
                        <i class="fab fa-whatsapp text-lg"></i> Enviar consulta por WhatsApp
                    </button>
                </form>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-white border-y border-gray-100">
        <div class="max-w-6xl mx-auto px-5 sm:px-8 py-16">
            <div class="mc-safe-light bg-gray-50 rounded-2xl p-8 md:p-10 border border-gray-100 text-center mc-reveal">
                <span class="text-brand-orange font-extrabold uppercase tracking-widest text-sm">Atención cercana</span>
                <h2 class="font-display text-3xl md:text-4xl font-black text-gray-900 mt-3">¿Necesitas orientación?</h2>
                <p class="mc-safe-muted text-gray-600 mt-4 leading-relaxed max-w-2xl mx-auto">
                    Cuéntanos qué necesitas financiar y un asesor podrá orientarte sobre las alternativas disponibles.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-3 mt-7">
                    <a href="creditos.php"
                       class="inline-flex justify-center items-center gap-2 bg-brand-green hover:bg-brand-green-dark text-white font-extrabold px-6 py-3 rounded-lg transition hover:-translate-y-0.5">
                        <i class="fas fa-layer-group"></i> Ver créditos
                    </a>
                    <a href="https://wa.me/51968876759?text=Hola%2C%20deseo%20orientaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."
                       target="_blank" rel="noopener noreferrer"
                       class="btn-shine inline-flex justify-center items-center gap-2 bg-brand-orange text-white font-extrabold px-6 py-3 rounded-lg transition">
                        <i class="fab fa-whatsapp"></i> Hablar con un asesor
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.getElementById("contactForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const n = document.getElementById("nombre").value.trim();
    const t = document.getElementById("telefono").value.trim();
    const tema = document.getElementById("tema").value;
    const sede = document.getElementById("sede").value;
    const m = document.getElementById("mensaje").value.trim();
    const msg =
        "Hola Multicredit, deseo información.\\n\\n" +
        "*Nombre:* " + n + "\\n" +
        "*Teléfono:* " + t + "\\n" +
        "*Tema:* " + tema + "\\n" +
        "*Sede elegida:* " + sede + "\\n" +
        "*Mensaje:* " +
        (m || "Deseo recibir orientación sobre el proceso y requisitos.");
    window.open("https://wa.me/51968876759?text=" + encodeURIComponent(msg), "_blank");
});
</script>

<?php include 'footer.php'; ?>
<script src="js/mc-pro.js" defer></script>
</body>
</html>