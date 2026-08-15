<?php
// Cargar los estilos y librerías ANTES de encabezado.php.
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
        .credit-product-card { min-height: 310px; }
        .service-card { transition: transform .4s cubic-bezier(.23,1,.32,1), box-shadow .4s ease, border-color .35s ease; }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style id="multicredit-visibility-fix">
    html, body { overflow-x: hidden !important; }
    .mc-safe-light, .mc-safe-light * { color: #17221a !important; }
    .mc-safe-muted { color: #5d6a61 !important; }
    .mc-safe-link { color: #0d5c2e !important; }
    img { max-width: 100%; height: auto; }
    .mc-hero-fix { min-height: 52vh; }
    @media (max-width: 900px) { .mc-hero-fix { min-height: 460px !important; } }
    @media (max-width: 640px) { .mc-hero-fix { min-height: 500px !important; } }
    </style>
</head>
<body class="bg-gray-50 overflow-x-hidden">
<?php include 'encabezado.php'; ?>
<main class="bg-gray-50 pt-20">
    <section class="service-hero mc-hero-fix min-h-[52vh] flex items-center">
        <div class="max-w-7xl mx-auto w-full px-5 sm:px-8 py-20">
            <div class="max-w-3xl text-white mc-reveal">
                <span class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-5 py-2 text-xs font-bold uppercase tracking-[.15em]">
                    <i class="fas fa-seedling text-brand-orange"></i>
                    Desarrollo y servicios
                </span>
                <h1 class="font-display text-4xl md:text-6xl font-black leading-tight mt-6">
                    Más que un crédito,
                    <span class="text-brand-orange">acompañamos tu crecimiento.</span>
                </h1>
                <p class="mt-6 text-lg md:text-xl text-white/90 leading-relaxed max-w-2xl">
                    En CEPRODEMIC – Multicredit creemos que el financiamiento funciona mejor
                    cuando está acompañado de orientación, organización y herramientas para
                    tomar mejores decisiones.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-5 sm:px-8 py-16">
        <div class="max-w-3xl mx-auto text-center mb-12 mc-reveal">
            <span class="text-brand-green font-extrabold uppercase tracking-widest text-sm">
                Nuestro enfoque
            </span>
            <h2 class="font-display text-3xl md:text-4xl font-black text-gray-900 mt-3">
                Servicios que fortalecen a nuestros clientes
            </h2>
            <p class="text-gray-600 mt-5 text-lg leading-relaxed">
                Además de nuestras soluciones financieras, promovemos conocimientos y
                acompañamiento para que emprendedores, familias y grupos organizados
                puedan aprovechar mejor sus oportunidades.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">

            <article class="service-card tilt-3d mc-reveal mc-safe-light bg-white rounded-2xl p-8 border border-gray-100">
                <div class="tilt-layer">
                <div class="icon-wrap w-16 h-16 rounded-2xl bg-green-50 text-brand-green flex items-center justify-center text-2xl mb-6">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3 class="font-display text-xl font-black text-gray-900">Capacitación integral</h3>
                <p class="mc-safe-muted text-gray-600 mt-3 leading-relaxed">
                    Espacios de aprendizaje orientados a desarrollar conocimientos,
                    habilidades y destrezas útiles para la vida familiar y el
                    fortalecimiento de las actividades económicas.
                </p>
                <a href="capacitacion_integral.php"
                   class="inline-flex items-center gap-2 mt-6 text-brand-green font-extrabold hover:text-brand-green-dark">
                    Conocer más <i class="fas fa-arrow-right text-sm"></i>
                </a>
                </div>
            </article>

            <article class="service-card tilt-3d mc-reveal mc-safe-light bg-white rounded-2xl p-8 border border-gray-100">
                <div class="tilt-layer">
                <div class="icon-wrap w-16 h-16 rounded-2xl bg-orange-50 text-brand-orange flex items-center justify-center text-2xl mb-6">
                    <i class="fas fa-coins"></i>
                </div>
                <h3 class="font-display text-xl font-black text-gray-900">Educación financiera</h3>
                <p class="mc-safe-muted text-gray-600 mt-3 leading-relaxed">
                    Orientación para comprender mejor el crédito, organizar ingresos y
                    gastos, planificar pagos y tomar decisiones financieras responsables.
                </p>
                <a href="creditos.php#simulador"
                   class="inline-flex items-center gap-2 mt-6 text-brand-green font-extrabold hover:text-brand-green-dark">
                    Simular un crédito <i class="fas fa-arrow-right text-sm"></i>
                </a>
                </div>
            </article>

            <article class="service-card tilt-3d mc-reveal mc-safe-light bg-white rounded-2xl p-8 border border-gray-100">
                <div class="tilt-layer">
                <div class="icon-wrap w-16 h-16 rounded-2xl bg-green-50 text-brand-green flex items-center justify-center text-2xl mb-6">
                    <i class="fas fa-store"></i>
                </div>
                <h3 class="font-display text-xl font-black text-gray-900">Acompañamiento al emprendedor</h3>
                <p class="mc-safe-muted text-gray-600 mt-3 leading-relaxed">
                    Una atención cercana para conocer las necesidades del negocio y
                    orientar al cliente hacia la alternativa de financiamiento que
                    mejor corresponda a su situación.
                </p>
                <a href="creditos.php"
                   class="inline-flex items-center gap-2 mt-6 text-brand-green font-extrabold hover:text-brand-green-dark">
                    Ver créditos <i class="fas fa-arrow-right text-sm"></i>
                </a>
                </div>
            </article>

            <article class="service-card tilt-3d mc-reveal mc-safe-light bg-white rounded-2xl p-8 border border-gray-100">
                <div class="tilt-layer">
                <div class="icon-wrap w-16 h-16 rounded-2xl bg-orange-50 text-brand-orange flex items-center justify-center text-2xl mb-6">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="font-display text-xl font-black text-gray-900">Bancos Comunales</h3>
                <p class="mc-safe-muted text-gray-600 mt-3 leading-relaxed">
                    Una metodología grupal basada en organización, confianza,
                    responsabilidad y acompañamiento para facilitar el acceso a
                    servicios financieros.
                </p>
                <a href="bancos-comunales.php"
                   class="inline-flex items-center gap-2 mt-6 text-brand-green font-extrabold hover:text-brand-green-dark">
                    Conocer Bancos Comunales <i class="fas fa-arrow-right text-sm"></i>
                </a>
                </div>
            </article>

            <article class="service-card tilt-3d mc-reveal mc-safe-light bg-white rounded-2xl p-8 border border-gray-100">
                <div class="tilt-layer">
                <div class="icon-wrap w-16 h-16 rounded-2xl bg-green-50 text-brand-green flex items-center justify-center text-2xl mb-6">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="font-display text-xl font-black text-gray-900">Grupos Solidarios</h3>
                <p class="mc-safe-muted text-gray-600 mt-3 leading-relaxed">
                    Financiamiento grupal que promueve la organización y la
                    responsabilidad solidaria entre sus integrantes.
                </p>
                <a href="grupos-solidarios.php"
                   class="inline-flex items-center gap-2 mt-6 text-brand-green font-extrabold hover:text-brand-green-dark">
                    Conocer la modalidad <i class="fas fa-arrow-right text-sm"></i>
                </a>
                </div>
            </article>

            <article class="service-card tilt-3d mc-reveal mc-safe-light bg-white rounded-2xl p-8 border border-gray-100">
                <div class="tilt-layer">
                <div class="icon-wrap w-16 h-16 rounded-2xl bg-orange-50 text-brand-orange flex items-center justify-center text-2xl mb-6">
                    <i class="fas fa-comments"></i>
                </div>
                <h3 class="font-display text-xl font-black text-gray-900">Orientación crediticia</h3>
                <p class="mc-safe-muted text-gray-600 mt-3 leading-relaxed">
                    ¿No sabes qué producto necesitas? Te ayudamos a identificar la
                    alternativa de crédito de acuerdo con tu objetivo y situación.
                </p>
                <a href="https://wa.me/51968876759?text=Hola%2C%20necesito%20orientaci%C3%B3n%20para%20elegir%20un%20cr%C3%A9dito."
                   target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 mt-6 text-brand-green font-extrabold hover:text-brand-green-dark">
                    Hablar con un asesor <i class="fas fa-arrow-right text-sm"></i>
                </a>
                </div>
            </article>
        </div>
    </section>

    <section class="bg-white border-y border-gray-100 mc-safe-light">
        <div class="max-w-6xl mx-auto px-5 sm:px-8 py-16">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="mc-reveal">
                    <span class="text-brand-orange font-extrabold uppercase tracking-widest text-sm">Desde 2009</span>
                    <h2 class="font-display text-3xl md:text-4xl font-black text-gray-900 mt-3">
                        Finanzas con acompañamiento y cercanía
                    </h2>
                    <p class="mc-safe-muted text-gray-600 mt-5 leading-relaxed text-lg">
                        CEPRODEMIC, conocido comercialmente como Multicredit, inició sus
                        operaciones en Cajamarca en 2009 con el objetivo de acercar
                        servicios financieros a pequeños emprendedores.
                    </p>
                    <p class="mc-safe-muted text-gray-600 mt-4 leading-relaxed">
                        Nuestra propuesta combina soluciones de financiamiento con una
                        atención cercana, especialmente en iniciativas vinculadas al
                        emprendimiento y al trabajo organizado.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-2xl p-8 md:p-10 border border-gray-100 mc-reveal">
                    <h3 class="font-display text-2xl font-black text-gray-900">¿Necesitas orientación?</h3>
                    <p class="mc-safe-muted text-gray-600 mt-3 leading-relaxed">
                        Cuéntanos qué necesitas financiar y un asesor podrá orientarte
                        sobre las alternativas disponibles.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 mt-7">
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
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
<script src="js/mc-pro.js" defer></script>
</body>
</html>