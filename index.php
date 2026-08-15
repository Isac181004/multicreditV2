<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEPRODEMIC MULTICREDIT | Financiamiento para crecer</title>
    <meta name="description" content="CEPRODEMIC MULTICREDIT: financiamiento para emprendedores y familias. Conoce nuestros créditos, simula tu cuota y solicita información.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">
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
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; line-height: 1.6; }
        .font-display { font-family: 'Poppins', sans-serif; }

        /* Hero: gradiente esmeralda profundo + grano */
        .hero-gradient {
            background:
                linear-gradient(90deg, rgba(5,39,18,.92) 0%, rgba(8,61,31,.62) 48%, rgba(13,92,46,.25) 100%);
        }
        .hero-image { animation: kenBurns 20s ease-out forwards; }
        @keyframes kenBurns { from { transform: scale(1); } to { transform: scale(1.10); } }

        /* Grano sutil global */
        .grain::after {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.05'/%3E%3C/svg%3E");
            mix-blend-mode: overlay;
        }

        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        .floating { animation: float 6s ease-in-out infinite; }

        /* Stat cards */
        .stat-card { transition: transform .4s cubic-bezier(.23,1,.32,1), box-shadow .4s ease; }
        .stat-card:hover { transform: translateY(-6px); box-shadow: 0 22px 50px rgba(13,92,46,.18); }

        /* Service cards — bento con glow de borde */
        .service-card {
            position: relative;
            background: #fff;
            border: 1px solid #ececec;
            transition: border-color .35s ease, transform .35s cubic-bezier(.23,1,.32,1), box-shadow .35s ease;
            overflow: hidden;
        }
        .service-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: radial-gradient(280px circle at var(--mx,50%) var(--my,50%), rgba(13,92,46,.10), transparent 60%);
            opacity: 0;
            transition: opacity .35s ease;
            pointer-events: none;
        }
        .service-card:hover {
            transform: translateY(-8px);
            border-color: #0d5c2e;
            box-shadow: 0 20px 50px rgba(13,92,46,.12);
        }
        .service-card:hover::before { opacity: 1; }

        .news-card { transition: transform .4s cubic-bezier(.23,1,.32,1), box-shadow .4s ease; }
        .news-card:hover { transform: translateY(-6px); box-shadow: 0 24px 55px rgba(0,0,0,.14); }
        .news-card img { transition: transform .7s cubic-bezier(.23,1,.32,1); }
        .news-card:hover img { transform: scale(1.06); }

        /* Reveal con easing "vault" */
        .reveal { opacity: 0; transform: translateY(40px); transition: opacity .9s cubic-bezier(.16,1,.3,1), transform .9s cubic-bezier(.16,1,.3,1); }
        .reveal.in { opacity: 1; transform: translateY(0); }

        /* Botón primario institucional */
        .btn-primary {
            background: #f26e22;
            color: #fff;
            font-weight: 800;
            border-radius: 10px;
            transition: transform .4s cubic-bezier(.23,1,.32,1), box-shadow .4s ease, background .3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 60%; height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,.35), transparent);
            transform: skewX(-20deg);
            transition: left .6s ease;
        }
        .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(242,110,34,.30);
            background: #ff7d32;
        }
        .btn-primary:hover::after { left: 120%; }

        .btn-ghost {
            background: rgba(255,255,255,.08);
            color: #fff;
            border: 1px solid rgba(255,255,255,.35);
            border-radius: 10px;
            font-weight: 800;
            transition: .35s ease;
        }
        .btn-ghost:hover { background: #fff; color: #0d5c2e; transform: translateY(-4px); }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 overflow-x-hidden">

<?php include 'encabezado.php'; ?>

<!-- HERO PRINCIPAL -->
<section class="relative min-h-[92vh] flex items-center overflow-hidden grain">
    <img src="img/cajamarca.jpg" alt="Cajamarca" class="hero-image absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 hero-gradient"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/45 via-transparent to-black/10"></div>

    <div class="relative z-10 max-w-7xl mx-auto w-full px-5 sm:px-8 pt-28 pb-20">
        <div class="max-w-3xl text-white reveal">
            <span class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur-md rounded-full px-5 py-2 text-xs md:text-sm font-bold uppercase tracking-[.15em] mb-7">
                <span class="w-2 h-2 rounded-full bg-brand-orange"></span>
                CEPRODEMIC MULTICREDIT
            </span>

            <h1 class="font-display text-4xl sm:text-5xl lg:text-7xl font-black leading-[1.04] tracking-tight">
                Financiamiento rápido para
                <span class="text-brand-orange block sm:inline">hacer crecer tu negocio</span>
            </h1>

            <p class="mt-7 text-lg md:text-2xl text-white/90 leading-relaxed max-w-2xl">
                Más de 15 años impulsando emprendedores y familias en Cajamarca.
            </p>

            <div class="mt-9 flex flex-col sm:flex-row gap-4">
                <a href="https://wa.me/51968876759?text=Hola%2C%20deseo%20solicitar%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."
                   target="_blank" rel="noopener noreferrer"
                   class="btn-primary inline-flex justify-center items-center gap-2 px-8 py-4 shadow-2xl">
                    <i class="fas fa-hand-holding-usd"></i> Solicitar Crédito
                </a>
                <a href="creditos.php" class="btn-ghost inline-flex justify-center items-center gap-2 px-8 py-4 backdrop-blur-md">
                    <i class="fas fa-calculator"></i> Simular Crédito
                </a>
            </div>

            <div class="mt-9 flex flex-wrap gap-x-7 gap-y-3 text-sm text-white/80">
                <span><i class="fas fa-check-circle text-brand-orange mr-2"></i>Atención personalizada</span>
                <span><i class="fas fa-check-circle text-brand-orange mr-2"></i>Proceso claro</span>
                <span><i class="fas fa-check-circle text-brand-orange mr-2"></i>Soluciones para emprendedores</span>
            </div>
        </div>
    </div>
</section>

<!-- FRANJA DE CONFIANZA -->
<section class="relative z-20 -mt-8 px-4">
    <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-2xl grid grid-cols-2 lg:grid-cols-4 overflow-hidden border border-gray-100">
        <div class="stat-card p-6 md:p-8 text-center border-b lg:border-b-0 lg:border-r border-gray-100">
            <div class="text-3xl md:text-4xl font-display font-black text-brand-green"><span class="counter" data-target="15">0</span>+</div>
            <p class="text-gray-500 font-semibold mt-1">Años de experiencia</p>
        </div>
        <div class="stat-card p-6 md:p-8 text-center border-b lg:border-b-0 lg:border-r border-gray-100">
            <div class="text-3xl md:text-4xl font-display font-black text-brand-green"><span class="counter" data-target="5000">0</span>+</div>
            <p class="text-gray-500 font-semibold mt-1">Clientes atendidos</p>
        </div>
        <div class="stat-card p-6 md:p-8 text-center border-r border-gray-100">
            <div class="text-3xl md:text-4xl font-display font-black text-brand-green"><span class="counter" data-target="4">0</span></div>
            <p class="text-gray-500 font-semibold mt-1">Agencias</p>
        </div>
        <div class="stat-card p-6 md:p-8 text-center">
            <div class="text-3xl md:text-4xl font-display font-black text-brand-green"><span class="counter" data-target="95">0</span>%</div>
            <p class="text-gray-500 font-semibold mt-1">Satisfacción</p>
        </div>
    </div>
</section>

<!-- PROPUESTA DE VALOR -->
<section id="bienvenidos" class="py-24 md:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
        <div class="relative reveal">
            <div class="absolute -inset-5 bg-brand-green/10 rounded-[2rem] blur-2xl"></div>
            <img src="img/img2.png" alt="Emprendedor" class="relative floating w-full max-w-lg mx-auto drop-shadow-2xl rounded-2xl">
        </div>

        <div class="reveal">
            <span class="text-brand-orange font-extrabold uppercase tracking-[.2em] text-sm">Tu crecimiento es nuestra prioridad</span>
            <h2 class="font-display text-4xl md:text-5xl font-black text-gray-900 leading-tight mt-3">
                Una opción crediticia pensada para tus metas
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed mt-6">
                Promovemos el desarrollo de los pequeños y microempresarios del Perú. Transformamos tus metas en realidades financieras con acompañamiento cercano.
            </p>

            <div class="grid sm:grid-cols-2 gap-5 mt-8">
                <div class="flex gap-4">
                    <span class="w-11 h-11 shrink-0 rounded-xl bg-green-50 text-brand-green flex items-center justify-center"><i class="fas fa-bolt"></i></span>
                    <div><h3 class="font-bold">Crédito ágil</h3><p class="text-sm text-gray-500 mt-1">Proceso claro y sin trámites innecesarios.</p></div>
                </div>
                <div class="flex gap-4">
                    <span class="w-11 h-11 shrink-0 rounded-xl bg-orange-50 text-brand-orange flex items-center justify-center"><i class="fas fa-user-check"></i></span>
                    <div><h3 class="font-bold">Atención personalizada</h3><p class="text-sm text-gray-500 mt-1">Te acompañamos durante el proceso.</p></div>
                </div>
                <div class="flex gap-4">
                    <span class="w-11 h-11 shrink-0 rounded-xl bg-green-50 text-brand-green flex items-center justify-center"><i class="fas fa-chart-line"></i></span>
                    <div><h3 class="font-bold">Impulsa tu negocio</h3><p class="text-sm text-gray-500 mt-1">Soluciones orientadas al crecimiento.</p></div>
                </div>
                <div class="flex gap-4">
                    <span class="w-11 h-11 shrink-0 rounded-xl bg-orange-50 text-brand-orange flex items-center justify-center"><i class="fas fa-shield-alt"></i></span>
                    <div><h3 class="font-bold">Confianza</h3><p class="text-sm text-gray-500 mt-1">Una relación financiera cercana y transparente.</p></div>
                </div>
            </div>

            <a href="creditos.php" class="inline-flex items-center gap-2 mt-9 text-brand-green font-extrabold hover:text-brand-orange transition">
                Conocer nuestros créditos <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- TIPOS DE CRÉDITO / CTA -->
<section class="bg-brand-green py-20 px-5 relative overflow-hidden text-white grain">
    <div class="absolute -right-32 -top-32 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute -left-32 -bottom-32 w-96 h-96 bg-brand-orange/20 rounded-full blur-3xl"></div>

    <div class="max-w-6xl mx-auto relative z-10 text-center reveal">
        <span class="text-white/70 uppercase tracking-[.25em] text-sm font-bold">Soluciones para tus objetivos</span>
        <h2 class="font-display text-4xl md:text-5xl font-black mt-3">Créditos para Persona Natural y Jurídica</h2>
        <p class="max-w-2xl mx-auto text-white/80 mt-5 leading-relaxed">
            Conoce las alternativas disponibles y encuentra una opción acorde a las necesidades de tu negocio o proyecto.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
            <a href="creditos.php" class="bg-white text-brand-green hover:bg-gray-100 font-extrabold px-8 py-4 rounded-lg transition hover:-translate-y-1">Ver créditos</a>
            <a href="https://wa.me/51968876759?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20los%20cr%C3%A9ditos%20disponibles."
               target="_blank" rel="noopener noreferrer"
               class="border-2 border-white/70 hover:bg-brand-orange hover:border-brand-orange font-extrabold px-8 py-4 rounded-lg transition hover:-translate-y-1">
                Hablar con un asesor
            </a>
        </div>
    </div>
</section>

<!-- PROCESO -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-5 sm:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 reveal">
            <span class="text-brand-orange font-extrabold uppercase tracking-[.2em] text-sm">Simple y transparente</span>
            <h2 class="font-display text-4xl font-black text-gray-900 mt-3">Solicita tu crédito en 4 pasos</h2>
            <p class="text-gray-500 mt-4">Te acompañamos desde la primera consulta hasta el desembolso.</p>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            <div class="service-card rounded-2xl p-7 text-center reveal">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-green-50 text-brand-green flex items-center justify-center text-2xl"><i class="fas fa-comments"></i></div>
                <span class="block text-brand-orange font-black text-sm mt-5">01</span>
                <h3 class="font-bold text-xl mt-1">Solicita información</h3>
                <p class="text-gray-500 text-sm mt-3">Cuéntanos qué necesitas y recibe orientación.</p>
            </div>
            <div class="service-card rounded-2xl p-7 text-center reveal">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-orange-50 text-brand-orange flex items-center justify-center text-2xl"><i class="fas fa-file-signature"></i></div>
                <span class="block text-brand-orange font-black text-sm mt-5">02</span>
                <h3 class="font-bold text-xl mt-1">Evaluación</h3>
                <p class="text-gray-500 text-sm mt-3">Revisamos tu solicitud y documentación.</p>
            </div>
            <div class="service-card rounded-2xl p-7 text-center reveal">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-green-50 text-brand-green flex items-center justify-center text-2xl"><i class="fas fa-check-circle"></i></div>
                <span class="block text-brand-orange font-black text-sm mt-5">03</span>
                <h3 class="font-bold text-xl mt-1">Aprobación</h3>
                <p class="text-gray-500 text-sm mt-3">Conoce el resultado y las condiciones de tu crédito.</p>
            </div>
            <div class="service-card rounded-2xl p-7 text-center reveal">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-orange-50 text-brand-orange flex items-center justify-center text-2xl"><i class="fas fa-hand-holding-usd"></i></div>
                <span class="block text-brand-orange font-black text-sm mt-5">04</span>
                <h3 class="font-bold text-xl mt-1">Desembolso</h3>
                <p class="text-gray-500 text-sm mt-3">Recibe los fondos para impulsar tus objetivos.</p>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIOS -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-5 sm:px-8">
        <div class="text-center mb-12 reveal">
            <span class="text-brand-orange font-extrabold uppercase tracking-[.2em] text-sm">Experiencias</span>
            <h2 class="font-display text-4xl font-black text-gray-900 mt-3">Lo que dicen nuestros clientes</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-7">
            <article class="bg-gray-50 rounded-2xl p-8 border border-gray-100 reveal">
                <div class="text-brand-orange tracking-widest">★★★★★</div>
                <p class="text-gray-600 leading-relaxed mt-5">"Gracias a Multicredit pude ampliar mi negocio y seguir invirtiendo en mis metas."</p>
                <div class="flex items-center gap-3 mt-7">
                    <div class="w-11 h-11 rounded-full bg-brand-green text-white flex items-center justify-center font-bold">MD</div>
                    <div><strong class="block">María Díaz</strong><span class="text-xs text-gray-400">Cliente</span></div>
                </div>
            </article>
            <article class="bg-gray-50 rounded-2xl p-8 border border-gray-100 reveal">
                <div class="text-brand-orange tracking-widest">★★★★★</div>
                <p class="text-gray-600 leading-relaxed mt-5">"La atención fue clara y el proceso resultó sencillo. Me orientaron en cada paso."</p>
                <div class="flex items-center gap-3 mt-7">
                    <div class="w-11 h-11 rounded-full bg-brand-orange text-white flex items-center justify-center font-bold">JR</div>
                    <div><strong class="block">José Rojas</strong><span class="text-xs text-gray-400">Cliente</span></div>
                </div>
            </article>
            <article class="bg-gray-50 rounded-2xl p-8 border border-gray-100 reveal">
                <div class="text-brand-orange tracking-widest">★★★★★</div>
                <p class="text-gray-600 leading-relaxed mt-5">"Encontré una alternativa para continuar creciendo y recibí una atención cercana."</p>
                <div class="flex items-center gap-3 mt-7">
                    <div class="w-11 h-11 rounded-full bg-brand-green text-white flex items-center justify-center font-bold">LP</div>
                    <div><strong class="block">Luis Pérez</strong><span class="text-xs text-gray-400">Cliente</span></div>
                </div>
            </article>
        </div>
        <p class="text-center text-xs text-gray-400 mt-6">*Los testimonios deben reemplazarse por testimonios reales y autorizados antes de publicar.</p>
    </div>
</section>

<!-- AGENCIAS -->
<section id="agencias" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 grid lg:grid-cols-2 gap-12 items-center">
        <div class="reveal">
            <span class="text-brand-orange font-extrabold uppercase tracking-[.2em] text-sm">Cerca de ti</span>
            <h2 class="font-display text-4xl md:text-5xl font-black text-gray-900 mt-3">Nuestras oficinas</h2>
            <p class="text-gray-500 leading-relaxed mt-5">Encuentra atención en diferentes puntos de la región.</p>

            <div class="grid sm:grid-cols-2 gap-4 mt-8">
                <div class="bg-white rounded-2xl p-5 shadow-sm flex items-center gap-4 hover:shadow-md transition"><i class="fas fa-map-marker-alt text-brand-green text-xl"></i><strong>Cajamarca</strong></div>
                <div class="bg-white rounded-2xl p-5 shadow-sm flex items-center gap-4 hover:shadow-md transition"><i class="fas fa-map-marker-alt text-brand-green text-xl"></i><strong>Huamachuco</strong></div>
                <div class="bg-white rounded-2xl p-5 shadow-sm flex items-center gap-4 hover:shadow-md transition"><i class="fas fa-map-marker-alt text-brand-green text-xl"></i><strong>Cajabamba</strong></div>
                <div class="bg-white rounded-2xl p-5 shadow-sm flex items-center gap-4 hover:shadow-md transition"><i class="fas fa-map-marker-alt text-brand-green text-xl"></i><strong>San Marcos</strong></div>
            </div>
        </div>

        <div class="rounded-2xl overflow-hidden shadow-xl min-h-[360px] bg-slate-200 relative reveal">
            <iframe
                title="Mapa de ubicación de CEPRODEMIC MULTICREDIT"
                src="https://www.google.com/maps?q=Cajamarca%2C%20Per%C3%BA&output=embed"
                class="absolute inset-0 w-full h-full border-0"
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<!-- PUBLICACIONES -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-5 sm:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-5 mb-12">
            <div class="reveal">
                <span class="text-brand-orange font-extrabold uppercase tracking-[.2em] text-sm">Actualidad</span>
                <h2 class="font-display text-4xl font-black text-gray-900 mt-3">Noticias y publicaciones</h2>
            </div>
            <a href="#" class="text-brand-green font-bold hover:text-brand-orange transition">Ver todas <i class="fas fa-arrow-right ml-1"></i></a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
            <article class="news-card bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100 reveal">
                <div class="h-48 overflow-hidden bg-gray-100"><img src="img/target6.png" alt="Encuentro anual de trabajadores" class="w-full h-full object-cover"></div>
                <div class="p-7">
                    <div class="text-xs font-bold text-brand-orange uppercase">Institucional · Marzo 2026</div>
                    <h3 class="font-bold text-xl mt-3">Convocatoria Asamblea General Ordinaria de Socios</h3>
                    <a href="#" class="inline-block mt-5 text-brand-green font-bold">Leer más →</a>
                </div>
            </article>
            <article class="news-card bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100 reveal">
                <div class="h-48 overflow-hidden bg-gray-100"><img src="img/target5.png" alt="Productos artesanales" class="w-full h-full object-cover"></div>
                <div class="p-7">
                    <div class="text-xs font-bold text-brand-orange uppercase">Institucional · Marzo 2025</div>
                    <h3 class="font-bold text-xl mt-3">Convocatoria Asamblea General Ordinaria de Socios</h3>
                    <a href="#" class="inline-block mt-5 text-brand-green font-bold">Leer más →</a>
                </div>
            </article>
            <article class="news-card bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100 reveal">
                <div class="h-48 overflow-hidden bg-gray-100"><img src="img/cajamarca.jpg" alt="Cajamarca" class="w-full h-full object-cover"></div>
                <div class="p-7">
                    <div class="text-xs font-bold text-brand-orange uppercase">Comunidad · Septiembre 2024</div>
                    <h3 class="font-bold text-xl mt-3">Convocatoria Asamblea General Extraordinaria</h3>
                    <a href="#" class="inline-block mt-5 text-brand-green font-bold">Leer más →</a>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="relative py-20 bg-brand-green overflow-hidden grain">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_20%_20%,white,transparent_35%)]"></div>
    <div class="relative max-w-5xl mx-auto px-5 text-center text-white reveal">
        <h2 class="font-display text-4xl md:text-5xl font-black">¿Listo para dar el siguiente paso?</h2>
        <p class="text-white/80 text-lg mt-4">Conversa con nuestro equipo y conoce las alternativas de financiamiento.</p>
        <a href="https://wa.me/51968876759?text=Hola%2C%20deseo%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito."
           target="_blank" rel="noopener noreferrer"
           class="btn-primary inline-flex items-center gap-2 mt-8 px-9 py-4">
            <i class="fab fa-whatsapp text-xl"></i> Solicitar Crédito
        </a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Counters
    const counters = document.querySelectorAll('.counter');
    let started = false;
    const animateCounters = () => {
        if (started) return;
        started = true;
        counters.forEach(counter => {
            const target = Number(counter.dataset.target);
            const duration = 1600;
            const start = performance.now();
            const update = now => {
                const progress = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                counter.textContent = Math.floor(target * eased).toLocaleString('es-PE');
                if (progress < 1) requestAnimationFrame(update);
            };
            requestAnimationFrame(update);
        });
    };
    const stats = document.querySelector('.counter');
    if ('IntersectionObserver' in window && stats) {
        const o = new IntersectionObserver(es => { if (es[0].isIntersecting) { animateCounters(); o.disconnect(); } }, { threshold: 0.35 });
        o.observe(stats);
    } else { animateCounters(); }

    // Reveal con stagger (sustituye a AOS)
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                // stagger por bloque
                const siblings = entry.target.parentElement.querySelectorAll('.reveal');
                const idx = Array.from(siblings).indexOf(entry.target);
                setTimeout(() => entry.target.classList.add('in'), Math.max(0, idx) * 120);
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });
    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

    // Glow de borde siguiendo el cursor en service-cards
    document.querySelectorAll('.service-card').forEach(card => {
        card.addEventListener('mousemove', e => {
            const r = card.getBoundingClientRect();
            card.style.setProperty('--mx', `${e.clientX - r.left}px`);
            card.style.setProperty('--my', `${e.clientY - r.top}px`);
        });
    });
});
</script>

<?php include 'footer.php'; ?>

</body>
</html>