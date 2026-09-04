<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información legal | CEPRODEMIC MULTICREDIT</title>
    <meta name="description" content="Política de privacidad, condiciones de uso e información de atención de CEPRODEMIC MULTICREDIT.">
    <script>
        tailwind = window.tailwind || {};
        tailwind.config = {theme:{extend:{colors:{
            'brand-green':'#0d5c2e',
            'brand-green-dark':'#063718',
            'brand-orange':'#f26e22'
        },fontFamily:{sans:['Inter','sans-serif'],display:['Poppins','sans-serif']}}}};
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800 overflow-x-hidden">
<?php include 'encabezado.php'; ?>

<main class="pt-[82px]">
    <section class="bg-brand-green-dark text-white">
        <div class="max-w-6xl mx-auto px-5 sm:px-8 py-16 md:py-24">
            <span class="text-brand-orange text-xs font-black uppercase tracking-[.18em]">Transparencia</span>
            <h1 class="font-display text-4xl md:text-6xl font-black mt-4">Información legal</h1>
            <p class="text-white/78 text-lg mt-5 max-w-2xl">Consulta las condiciones generales de uso de este sitio y el tratamiento de la información enviada por nuestros canales de atención.</p>
        </div>
    </section>

    <section class="py-16 md:py-24">
        <div class="max-w-5xl mx-auto px-5 sm:px-8 grid lg:grid-cols-[240px_1fr] gap-8 lg:gap-12">
            <nav class="lg:sticky lg:top-28 h-max rounded-2xl border border-green-100 bg-white p-5 shadow-sm" aria-label="Contenido legal">
                <a href="#privacidad" class="block rounded-xl px-4 py-3 font-bold text-brand-green hover:bg-green-50">Política de privacidad</a>
                <a href="#terminos" class="block rounded-xl px-4 py-3 font-bold text-brand-green hover:bg-green-50">Términos y condiciones</a>
                <a href="contacto.php#contacto" class="block rounded-xl px-4 py-3 font-bold text-brand-orange hover:bg-orange-50">Canales de atención</a>
            </nav>

            <div class="space-y-8">
                <article id="privacidad" class="glass-card rounded-3xl p-7 md:p-10 scroll-mt-28">
                    <div class="w-12 h-12 rounded-xl bg-green-50 text-brand-green flex items-center justify-center text-xl"><i class="fas fa-shield-halved"></i></div>
                    <h2 class="text-3xl font-black mt-5">Política de privacidad</h2>
                    <p class="text-gray-600 mt-4">La información que una persona decide enviar mediante WhatsApp, teléfono o correo se utiliza para atender su consulta, orientar sobre productos y coordinar la atención solicitada.</p>
                    <p class="text-gray-600 mt-4">Evita enviar contraseñas, claves bancarias u otra información secreta mediante formularios o mensajes. Para actualizar o consultar tus datos, comunícate por los canales oficiales publicados en este sitio.</p>
                </article>

                <article id="terminos" class="glass-card rounded-3xl p-7 md:p-10 scroll-mt-28">
                    <div class="w-12 h-12 rounded-xl bg-orange-50 text-brand-orange flex items-center justify-center text-xl"><i class="fas fa-file-contract"></i></div>
                    <h2 class="text-3xl font-black mt-5">Términos y condiciones</h2>
                    <p class="text-gray-600 mt-4">El contenido del sitio es informativo. Los montos, tasas, plazos, requisitos y resultados del simulador son referenciales y pueden variar conforme a la evaluación y a las condiciones vigentes del producto.</p>
                    <p class="text-gray-600 mt-4">La aprobación de un crédito está sujeta a evaluación. Antes de contratar, solicita y revisa la información oficial proporcionada por CEPRODEMIC MULTICREDIT.</p>
                </article>

                <div class="rounded-3xl bg-brand-green-dark text-white p-7 md:p-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <h2 class="text-2xl font-black">¿Necesitas orientación?</h2>
                        <p class="text-white/75 mt-2">Nuestro equipo puede ayudarte con una consulta o reclamo.</p>
                    </div>
                    <a href="contacto.php#contacto" class="inline-flex items-center justify-center gap-2 bg-brand-orange text-white px-6 py-3.5 rounded-xl font-black">
                        Ir a atención <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
