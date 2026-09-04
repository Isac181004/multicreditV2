<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capacitación Integral | CEPRODEMIC MULTICREDIT</title>
    <meta name="description" content="Conoce el programa de capacitación integral de CEPRODEMIC MULTICREDIT y sus actividades para las socias de Bancos Comunales.">
    <script>
        tailwind = window.tailwind || {};
        tailwind.config = {theme:{extend:{colors:{
            'brand-green':'#0d5c2e',
            'brand-green-dark':'#063718',
            'brand-orange':'#f26e22'
        }}}};
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">

     
    <style>
    .reveal-item {
        opacity: 0;
        transform: translateY(32px);
        transition: opacity .8s ease, transform .8s cubic-bezier(.2, .8, .2, 1);
    }
    .reveal-item.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    .hover-scale { 
        transition: transform .35s ease, box-shadow .35s ease;
    }
    .hover-scale:hover { 
        transform: translateY(-5px);
        box-shadow: 0 18px 38px rgba(3,31,13,.12);
    }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 overflow-x-hidden">
<?php include 'encabezado.php'; ?>

<main class="pt-[72px] md:pt-[82px]">
    
     
    <section class="mb-16 reveal-item scroll-anim text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">Capacitación Integral</h1>
        <div class="prose prose-lg text-gray-600 max-w-3xl">
            <p class="mb-4">
                DHF tiene directamente a su cargo el tema de capacitación integral, para lo cual cuenta con una Responsable que trabaja en la Casa Esperanza. 
                Este programa está dirigido exclusivamente a las socias de los bancos comunales e incluye una variedad de actividades orientadas a adquirir nuevos conocimientos, habilidades y destrezas para la unidad familiar.
            </p>
            <p>
                Es un espacio diseñado para que las mujeres puedan relajarse, aumentar su autoestima y compartir experiencias. El costo del servicio es cubierto por el proyecto, aportando las socias solo el 50% del material requerido, llevándose además el producto elaborado al terminar la clase.
            </p>
        </div>

         
        <div class="mt-8">
            <a href="docs/septiembre-2010.doc" download="Cronograma_Actividades.doc"
               class="inline-flex items-center bg-brand-green hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300 shadow-md">
                <i class="fas fa-file-word mr-3"></i> Descargar Cronograma (Word)
            </a>
        </div>
    </section>

     
    <section class="reveal-item scroll-anim mt-20">
        <h2 class="text-2xl font-bold text-gray-800 mb-10 text-center">Nuestras Actividades</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
             
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover-scale">
                <img src="img/target6.webp" alt="Cursos de Alfabetización" class="w-full h-64 object-cover rounded-lg mb-4">
                <h3 class="text-center font-bold text-gray-700">Cursos de Alfabetización</h3>
            </div>

             
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover-scale">
                <img src="img/target5.webp" alt="Cursos de tejidos" class="w-full h-64 object-cover rounded-lg mb-4">
                <h3 class="text-center font-bold text-gray-700">Cursos de tejidos</h3>
            </div>

             
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover-scale">
                <img src="img/target7.webp" alt="Actividad de esparcimiento" class="w-full h-64 object-cover rounded-lg mb-4">
                <h3 class="text-center font-bold text-gray-700">Actividad de esparcimiento</h3>
            </div>

        </div>
    </section>

</main>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const items = document.querySelectorAll('.scroll-anim');

        if (!('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            items.forEach(el => el.classList.add('is-visible'));
            return;
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        items.forEach(el => observer.observe(el));
    });
</script>

<?php include 'footer.php'; ?>
</body>
</html>
