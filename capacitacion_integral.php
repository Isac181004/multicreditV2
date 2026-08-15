<?php
// capacitacion_integral.php
include 'encabezado.php'; 
?>

<!-- Estilos para las animaciones y el diseño -->
<style>
    .reveal-item {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease-out;
    }
    .reveal-item.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    .hover-scale { transition: transform 0.3s ease; }
    .hover-scale:hover { transform: scale(1.02); }
    .reveal-item {
        opacity: 0;
        transform: translateY(40px); /* Un poco más de distancia para el efecto */
        transition: all 1.2s cubic-bezier(0.2, 0.8, 0.2, 1); /* Curva cinemática */
    }
    .reveal-item.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Hover de alta gama */
    .hover-scale { 
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.6s ease; 
    }
    .hover-scale:hover { 
        transform: scale(1.03); 
        box-shadow: 0 15px 30px rgba(0,0,0,0.1); /* Agrega sombra al acercar */
    }
</style>

<main class="max-w-6xl mx-auto py-16 px-6">
    
    <!-- Hero / Título -->
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

        <!-- Botón de descarga -->
        <div class="mt-8">
            <a href="septiembre-2010.doc" download="Cronograma_Actividades.doc" 
               class="inline-flex items-center bg-brand-green hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300 shadow-md">
                <i class="fas fa-file-word mr-3"></i> Descargar Cronograma (Word)
            </a>
        </div>
    </section>

    <!-- Galería de Fotos -->
    <section class="reveal-item scroll-anim mt-20">
        <h2 class="text-2xl font-bold text-gray-800 mb-10 text-center">Nuestras Actividades</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Foto 1: Alfabetización -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover-scale">
                <img src="https://multicredit.wordpress.com/wp-content/uploads/2010/07/pc100077.jpg" alt="Cursos de Alfabetización" class="w-full h-64 object-cover rounded-lg mb-4">
                <h3 class="text-center font-bold text-gray-700">Cursos de Alfabetización</h3>
            </div>

            <!-- Foto 2: Tejidos -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover-scale">
                <img src="https://multicredit.wordpress.com/wp-content/uploads/2010/07/img_1600.jpg" alt="Cursos de tejidos" class="w-full h-64 object-cover rounded-lg mb-4">
                <h3 class="text-center font-bold text-gray-700">Cursos de tejidos</h3>
            </div>

            <!-- Foto 3: Esparcimiento -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover-scale">
                <img src="https://multicredit.wordpress.com/wp-content/uploads/2010/07/img_2977.jpg" alt="Actividad de esparcimiento" class="w-full h-64 object-cover rounded-lg mb-4">
                <h3 class="text-center font-bold text-gray-700">Actividad de esparcimiento</h3>
            </div>

        </div>
    </section>

</main>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.scroll-anim').forEach(el => observer.observe(el));
    });
</script>

<?php 
include 'footer.php'; 
?>