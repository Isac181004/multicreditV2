<?php

function mc_me_field($key, $label, $type, $selector = '', $action = 'text', $extra = []) {
    $base = [
        'key'=>$key, 'label'=>$label, 'type'=>$type, 'selector'=>$selector,
        'action'=>$action, 'attr'=>'', 'default'=>'', 'placeholder'=>'',
        'help'=>'', 'rules'=>[]
    ];
    return array_merge($base, is_array($extra) ? $extra : []);
}

function mc_me_group($title, $description, $fields) {
    return ['title'=>$title, 'description'=>$description, 'fields'=>$fields];
}

function mc_me_color($key, $label, $default, $rules) {
    return mc_me_field($key, $label, 'color', '', 'css', ['default'=>$default, 'rules'=>$rules]);
}

function mc_me_product_schema($label) {
    $audience = [mc_me_field('audience_title','Título: para quién','text','main > section:nth-of-type(3) .grid > div:nth-child(1) h2')];
    $uses = [mc_me_field('use_title','Título: en qué utilizarlo','text','main > section:nth-of-type(3) .grid > div:nth-child(2) h2')];
    for ($i=1;$i<=4;$i++) {
        $audience[] = mc_me_field('audience_'.$i,'Para quién · punto '.$i,'text','main > section:nth-of-type(3) .grid > div:nth-child(1) li:nth-child('.$i.') span');
        $uses[] = mc_me_field('use_'.$i,'Uso · punto '.$i,'text','main > section:nth-of-type(3) .grid > div:nth-child(2) li:nth-child('.$i.') span');
    }

    $features = [mc_me_field('features_title','Título de características','text','main > section:nth-of-type(4) .text-center h2')];
    for ($i=1;$i<=4;$i++) {
        $features[] = mc_me_field('feature_'.$i.'_title','Tarjeta '.$i.' · título','text','main > section:nth-of-type(4) .grid > div:nth-child('.$i.') h3');
        $features[] = mc_me_field('feature_'.$i.'_text','Tarjeta '.$i.' · detalle','textarea','main > section:nth-of-type(4) .grid > div:nth-child('.$i.') p');
    }

    $requirements = [mc_me_field('requirements_title','Título de requisitos','text','main > section:nth-of-type(5) .text-center h2')];
    for ($i=1;$i<=4;$i++) {
        $requirements[] = mc_me_field('requirement_'.$i,'Requisito '.$i,'text','main > section:nth-of-type(5) .mt-9 .grid > div:nth-child('.$i.') span');
    }

    $process = [mc_me_field('process_title','Título del proceso','text','main > section:nth-of-type(6) .text-center h2')];
    for ($i=1;$i<=4;$i++) {
        $process[] = mc_me_field('process_'.$i.'_title','Paso '.$i.' · título','text','main > section:nth-of-type(6) .grid > div:nth-child('.$i.') h3');
        $process[] = mc_me_field('process_'.$i.'_text','Paso '.$i.' · texto','textarea','main > section:nth-of-type(6) .grid > div:nth-child('.$i.') p');
    }

    $faq = [mc_me_field('faq_title','Título de preguntas frecuentes','text','main > section:nth-of-type(7) .text-center h2')];
    for ($i=1;$i<=3;$i++) {
        $faq[] = mc_me_field('faq_'.$i.'_q','Pregunta '.$i,'text','main > section:nth-of-type(7) details:nth-child('.$i.') summary span');
        $faq[] = mc_me_field('faq_'.$i.'_a','Respuesta '.$i,'textarea','main > section:nth-of-type(7) details:nth-child('.$i.') p');
    }

    return [
        'label'=>$label,
        'kind'=>'Ficha de producto crediticio',
        'description'=>'Editor basado en la estructura real de esta ficha: portada, presentación, público objetivo, usos, características, requisitos, proceso y preguntas frecuentes.',
        'groups'=>[
            mc_me_group('Portada del crédito','Imagen, categoría, nombre y frase principal.',[
                mc_me_field('hero_image','Imagen de portada','image','','css',['rules'=>[
                    ['selector'=>'main > section:first-of-type','property'=>'background','template'=>"linear-gradient(100deg,rgba(5,31,15,.84),rgba(9,66,31,.56)),url('%s') center/cover no-repeat"]
                ]]),
                mc_me_field('hero_badge','Categoría / etiqueta','text','main > section:first-of-type span.inline-flex','last_text'),
                mc_me_field('hero_title','Nombre del crédito','text','main > section:first-of-type h1'),
                mc_me_field('hero_subtitle','Frase principal','textarea','main > section:first-of-type h1 + p'),
            ]),
            mc_me_group('Presentación y asesor','Contenido comercial ubicado después de la portada.',[
                mc_me_field('intro_eyebrow','Etiqueta de presentación','text','main > section:nth-of-type(2) .lg\\:col-span-2 > span'),
                mc_me_field('intro_title','Título de presentación','text','main > section:nth-of-type(2) .lg\\:col-span-2 > h2'),
                mc_me_field('intro_text','Descripción principal','textarea','main > section:nth-of-type(2) .lg\\:col-span-2 > h2 + p'),
                mc_me_field('advisor_title','Tarjeta asesor · título','text','main > section:nth-of-type(2) .rounded-3xl h3'),
                mc_me_field('advisor_text','Tarjeta asesor · texto','textarea','main > section:nth-of-type(2) .rounded-3xl h3 + p'),
                mc_me_field('advisor_button','Botón WhatsApp · texto','text','main > section:nth-of-type(2) .rounded-3xl a:nth-of-type(1)','last_text'),
                mc_me_field('advisor_url','Botón WhatsApp · enlace','url','main > section:nth-of-type(2) .rounded-3xl a:nth-of-type(1)','attr',['attr'=>'href']),
            ]),
            mc_me_group('Para quién está pensado','Primera tarjeta de orientación.',$audience),
            mc_me_group('En qué puedes utilizarlo','Segunda tarjeta de orientación.',$uses),
            mc_me_group('Características del producto','Cuatro tarjetas comerciales.',$features),
            mc_me_group('Requisitos','Documentación referencial.',$requirements),
            mc_me_group('Proceso de solicitud','Cuatro pasos del proceso.',$process),
            mc_me_group('Preguntas frecuentes','Preguntas y respuestas del producto.',$faq),
            mc_me_group('Diseño de esta ficha','Estos colores solo afectan al módulo seleccionado.',[
                mc_me_color('color_green','Verde principal','#176b2b',[
                    ['selector'=>':root','property'=>'--mc-green','template'=>'%s'],
                    ['selector'=>'main .text-brand-green','property'=>'color','template'=>'%s']
                ]),
                mc_me_color('color_green_dark','Verde oscuro','#0b4d26',[
                    ['selector'=>':root','property'=>'--mc-green-dark','template'=>'%s']
                ]),
                mc_me_color('color_orange','Naranja / acento','#e85b10',[
                    ['selector'=>':root','property'=>'--mc-orange','template'=>'%s'],
                    ['selector'=>'main .text-brand-orange','property'=>'color','template'=>'%s'],
                    ['selector'=>'main .bg-brand-orange','property'=>'background-color','template'=>'%s']
                ]),
            ]),
        ]
    ];
}

function mc_me_group_credit_schema() {
    return [
        'label'=>'Crédito Grupal','kind'=>'Crédito con dos modalidades',
        'description'=>'Editor propio de Crédito Grupal: portada, Bancos Comunales, Grupos Solidarios, presentación y colores.',
        'groups'=>[
            mc_me_group('Portada','',[
                mc_me_field('hero_badge','Categoría','text','main > section:first-of-type span.inline-flex'),
                mc_me_field('hero_title','Título','text','main > section:first-of-type h1'),
                mc_me_field('hero_subtitle','Subtítulo','textarea','main > section:first-of-type h1 + p'),
            ]),
            mc_me_group('Modalidades','Edita cada alternativa independientemente.',[
                mc_me_field('modes_title','Título de modalidades','text','main > section:nth-of-type(2) .text-center h2'),
                mc_me_field('modes_text','Introducción','textarea','main > section:nth-of-type(2) .text-center h2 + p'),
                mc_me_field('bank_title','Bancos Comunales · título','text','main > section:nth-of-type(2) .grid > a:nth-child(1) h3'),
                mc_me_field('bank_text','Bancos Comunales · descripción','textarea','main > section:nth-of-type(2) .grid > a:nth-child(1) p'),
                mc_me_field('bank_url','Bancos Comunales · enlace','url','main > section:nth-of-type(2) .grid > a:nth-child(1)','attr',['attr'=>'href']),
                mc_me_field('solid_title','Grupos Solidarios · título','text','main > section:nth-of-type(2) .grid > a:nth-child(2) h3'),
                mc_me_field('solid_text','Grupos Solidarios · descripción','textarea','main > section:nth-of-type(2) .grid > a:nth-child(2) p'),
                mc_me_field('solid_url','Grupos Solidarios · enlace','url','main > section:nth-of-type(2) .grid > a:nth-child(2)','attr',['attr'=>'href']),
            ]),
            mc_me_group('Presentación y asesor','',[
                mc_me_field('intro_title','Título','text','main > section:nth-of-type(3) .lg\\:col-span-2 h2'),
                mc_me_field('intro_text','Descripción','textarea','main > section:nth-of-type(3) .lg\\:col-span-2 h2 + p'),
                mc_me_field('advisor_title','Tarjeta asesor · título','text','main > section:nth-of-type(3) .rounded-3xl h3'),
                mc_me_field('advisor_text','Tarjeta asesor · texto','textarea','main > section:nth-of-type(3) .rounded-3xl h3 + p'),
            ]),
            mc_me_group('Diseño','',[
                mc_me_color('color_green','Verde principal','#176b2b',[
                    ['selector'=>'main .text-brand-green','property'=>'color','template'=>'%s']
                ]),
                mc_me_color('color_orange','Naranja','#f26e22',[
                    ['selector'=>'main .text-brand-orange','property'=>'color','template'=>'%s'],
                    ['selector'=>'main .bg-brand-orange','property'=>'background-color','template'=>'%s']
                ]),
            ]),
        ]
    ];
}

function mc_me_group_method_schema($label) {
    $process=[];
    for($i=1;$i<=4;$i++){
        $process[]=mc_me_field('step'.$i.'_title','Paso '.$i.' · título','text','main > section:nth-of-type(3) .grid > div:nth-child('.$i.') h3');
        $process[]=mc_me_field('step'.$i.'_text','Paso '.$i.' · texto','textarea','main > section:nth-of-type(3) .grid > div:nth-child('.$i.') p');
    }
    $benefits=[];
    for($i=1;$i<=3;$i++){
        $benefits[]=mc_me_field('benefit'.$i.'_title','Beneficio '.$i.' · título','text','main > section:nth-of-type(4) .grid > div:nth-child('.$i.') h3');
        $benefits[]=mc_me_field('benefit'.$i.'_text','Beneficio '.$i.' · texto','textarea','main > section:nth-of-type(4) .grid > div:nth-child('.$i.') p');
    }
    return [
        'label'=>$label,'kind'=>'Metodología grupal',
        'description'=>'Editor adaptado a la página de metodología: portada, presentación, proceso, beneficios y cierre.',
        'groups'=>[
            mc_me_group('Portada','',[
                mc_me_field('hero_badge','Etiqueta','text','main > section:first-of-type span.inline-flex'),
                mc_me_field('hero_title','Título','text','main > section:first-of-type h1'),
                mc_me_field('hero_subtitle','Subtítulo','textarea','main > section:first-of-type h1 + p'),
            ]),
            mc_me_group('Presentación y asesor','',[
                mc_me_field('intro_title','Título principal','text','main > section:nth-of-type(2) .lg\\:col-span-2 h2'),
                mc_me_field('intro_text','Descripción','textarea','main > section:nth-of-type(2) .lg\\:col-span-2 h2 + p'),
                mc_me_field('advisor_title','Tarjeta asesor · título','text','main > section:nth-of-type(2) .rounded-3xl h3'),
                mc_me_field('advisor_text','Tarjeta asesor · texto','textarea','main > section:nth-of-type(2) .rounded-3xl h3 + p'),
                mc_me_field('advisor_url','WhatsApp del asesor','url','main > section:nth-of-type(2) .rounded-3xl a','attr',['attr'=>'href']),
            ]),
            mc_me_group('Cómo funciona','',$process),
            mc_me_group('Beneficios','',$benefits),
            mc_me_group('Cierre y diseño','',[
                mc_me_field('cta_title','CTA · título','text','main > section:last-of-type h2'),
                mc_me_field('cta_text','CTA · texto','textarea','main > section:last-of-type h2 + p'),
                mc_me_field('cta_url','CTA · enlace','url','main > section:last-of-type a','attr',['attr'=>'href']),
                mc_me_color('color_green','Verde principal','#176b2b',[
                    ['selector'=>'main .text-brand-green','property'=>'color','template'=>'%s']
                ]),
                mc_me_color('color_orange','Naranja','#f26e22',[
                    ['selector'=>'main .text-brand-orange','property'=>'color','template'=>'%s'],
                    ['selector'=>'main .bg-brand-orange','property'=>'background-color','template'=>'%s']
                ]),
            ]),
        ]
    ];
}

function mc_me_services_schema() {
    $cards=[];
    for($i=1;$i<=4;$i++){
        $cards[]=mc_me_field('service'.$i.'_title','Servicio '.$i.' · título','text','#servicios .svc-card:nth-child('.$i.') h3');
        $cards[]=mc_me_field('service'.$i.'_text','Servicio '.$i.' · descripción','textarea','#servicios .svc-card:nth-child('.$i.') p');
    }
    return [
        'label'=>'Servicios','kind'=>'Página institucional de servicios',
        'description'=>'Editor propio para hero, imágenes, introducción, tarjetas, bloque destacado y cierre.',
        'groups'=>[
            mc_me_group('Hero de Servicios','',[
                mc_me_field('hero_image','Imagen de fondo','image','.svc-hero-image','attr',['attr'=>'src']),
                mc_me_field('hero_card_image','Imagen de tarjeta','image','.svc-hero-card-image img','attr',['attr'=>'src']),
                mc_me_field('hero_eyebrow','Etiqueta','text','.svc-eyebrow','last_text'),
                mc_me_field('hero_title','Título antes del destacado','text','.svc-hero-title','first_text'),
                mc_me_field('hero_highlight','Texto destacado','text','.svc-hero-title span'),
                mc_me_field('hero_text','Descripción','textarea','.svc-hero-text'),
                mc_me_field('hero_button_1','Botón principal','text','.svc-actions a:nth-child(1)','first_text'),
                mc_me_field('hero_button_2','Botón secundario','text','.svc-actions a:nth-child(2)','first_text'),
            ]),
            mc_me_group('Introducción','',[
                mc_me_field('intro_image','Imagen de introducción','image','.svc-intro-image img','attr',['attr'=>'src']),
                mc_me_field('intro_kicker','Etiqueta','text','.svc-intro-content .svc-kicker'),
                mc_me_field('intro_title','Título','text','.svc-intro-content h2'),
                mc_me_field('intro_text','Descripción','textarea','.svc-intro-content > p'),
                mc_me_field('intro_note_title','Tarjeta flotante · título','text','.svc-intro-card strong'),
                mc_me_field('intro_note_text','Tarjeta flotante · texto','textarea','.svc-intro-card p'),
            ]),
            mc_me_group('Servicios','Encabezado y tarjetas del bloque principal.',array_merge([
                mc_me_field('services_kicker','Etiqueta de sección','text','#servicios .svc-heading .svc-kicker'),
                mc_me_field('services_title','Título de sección','text','#servicios .svc-heading h2'),
                mc_me_field('services_text','Texto de sección','textarea','#servicios .svc-heading p'),
            ],$cards)),
            mc_me_group('Destacado y cierre','',[
                mc_me_field('featured_image','Imagen destacada','image','.svc-featured-image img','attr',['attr'=>'src']),
                mc_me_field('featured_title','Título destacado','text','.svc-featured-content h2'),
                mc_me_field('featured_text','Texto destacado','textarea','.svc-featured-content > p'),
                mc_me_field('final_image','Imagen CTA final','image','.svc-final-image','attr',['attr'=>'src']),
                mc_me_field('final_title','CTA · título','text','.svc-final-content h2'),
                mc_me_field('final_text','CTA · texto','textarea','.svc-final-content p'),
            ]),
            mc_me_group('Colores','',[
                mc_me_color('color_green','Verde principal','#0d5c2e',[
                    ['selector'=>'.svc-hero,.svc-final-box','property'=>'background-color','template'=>'%s'],
                    ['selector'=>'.svc-intro-card strong,.svc-card-number','property'=>'color','template'=>'%s']
                ]),
                mc_me_color('color_orange','Naranja de acento','#f26e22',[
                    ['selector'=>'.svc-btn-primary','property'=>'background-color','template'=>'%s'],
                    ['selector'=>'.svc-kicker,.svc-eyebrow i,.svc-check i','property'=>'color','template'=>'%s'],
                    ['selector'=>'.svc-intro-card','property'=>'border-left-color','template'=>'%s']
                ]),
            ]),
        ]
    ];
}

function mc_me_about_schema() {
    $values=[];
    for($i=1;$i<=5;$i++){
        $values[]=mc_me_field('value'.$i.'_title','Valor '.$i.' · título','text','.value-card:nth-child('.$i.') h4');
        $values[]=mc_me_field('value'.$i.'_text','Valor '.$i.' · texto','textarea','.value-card:nth-child('.$i.') p');
    }
    return [
        'label'=>'Nosotros','kind'=>'Página institucional Nosotros',
        'description'=>'Editor específico para hero, historia, misión, visión, valores y enfoque.',
        'groups'=>[
            mc_me_group('Hero Nosotros','',[
                mc_me_field('hero_image','Imagen de portada','image','.about-hero-image','attr',['attr'=>'src']),
                mc_me_field('hero_eyebrow','Etiqueta','text','.hero-eyebrow','last_text'),
                mc_me_field('hero_title','Título antes del destacado','text','.hero-title','first_text'),
                mc_me_field('hero_highlight','Texto destacado','text','.hero-title span'),
                mc_me_field('hero_text','Descripción','textarea','.hero-text'),
                mc_me_field('hero_badge','Insignia inferior','text','.hero-badge','last_text'),
            ]),
            mc_me_group('Historia','',[
                mc_me_field('history_bg','Fondo de historia','image','.history-background','attr',['attr'=>'src']),
                mc_me_field('history_image','Imagen de historia','image','.history-visual img','attr',['attr'=>'src']),
                mc_me_field('history_year','Año destacado','text','.history-year strong'),
                mc_me_field('history_title','Título','text','.history-content h2'),
                mc_me_field('history_text','Texto','textarea','.history-content > p'),
            ]),
            mc_me_group('Misión y visión','',[
                mc_me_field('mission_title','Misión · título','text','.purpose-card.mission h3'),
                mc_me_field('mission_text','Misión · texto','textarea','.purpose-card.mission p'),
                mc_me_field('vision_title','Visión · título','text','.purpose-card.vision h3'),
                mc_me_field('vision_text','Visión · texto','textarea','.purpose-card.vision p'),
            ]),
            mc_me_group('Valores','Encabezado y cinco valores.',array_merge([
                mc_me_field('values_bg','Imagen de fondo','image','.values-bg','attr',['attr'=>'src']),
                mc_me_field('values_title','Título','text','.values-heading h2'),
                mc_me_field('values_text','Introducción','textarea','.values-heading p'),
            ],$values)),
            mc_me_group('Enfoque y colores','',[
                mc_me_field('focus_bg','Fondo del enfoque','image','.focus-background','attr',['attr'=>'src']),
                mc_me_field('focus_image','Imagen del enfoque','image','.focus-image img','attr',['attr'=>'src']),
                mc_me_field('focus_title','Título del enfoque','text','.focus-content h2'),
                mc_me_field('focus_text','Texto del enfoque','textarea','.focus-content > p'),
                mc_me_color('color_green','Verde institucional','#0d5c2e',[
                    ['selector'=>'.stat-number,.history-year strong','property'=>'color','template'=>'%s'],
                    ['selector'=>'.purpose-card.mission','property'=>'background','template'=>'linear-gradient(145deg,#083d1f,%s)']
                ]),
                mc_me_color('color_orange','Naranja institucional','#f26e22',[
                    ['selector'=>'.hero-title span,.hero-eyebrow i','property'=>'color','template'=>'%s'],
                    ['selector'=>'.purpose-card.vision','property'=>'background','template'=>'linear-gradient(145deg,%s,#d85812)']
                ]),
            ]),
        ]
    ];
}

function mc_me_contact_schema() {
    return [
        'label'=>'Contacto','kind'=>'Página de contacto',
        'description'=>'Editor propio para hero, formulario, mapa, fotografía, CTA y colores.',
        'groups'=>[
            mc_me_group('Hero Contacto','',[
                mc_me_field('hero_image','Imagen de portada','image','.contact-hero-image','attr',['attr'=>'src']),
                mc_me_field('hero_eyebrow','Etiqueta','text','.contact-eyebrow','last_text'),
                mc_me_field('hero_title','Título antes del destacado','text','.contact-hero h1','first_text'),
                mc_me_field('hero_highlight','Texto destacado','text','.contact-hero h1 span'),
                mc_me_field('hero_text','Descripción','textarea','.contact-hero-content > p'),
                mc_me_field('hero_primary','Botón principal','text','.contact-hero-actions a:nth-child(1)','last_text'),
                mc_me_field('hero_primary_url','Enlace botón principal','url','.contact-hero-actions a:nth-child(1)','attr',['attr'=>'href']),
                mc_me_field('hero_secondary','Botón secundario','text','.contact-hero-actions a:nth-child(2)','last_text'),
                mc_me_field('hero_secondary_url','Enlace botón secundario','url','.contact-hero-actions a:nth-child(2)','attr',['attr'=>'href']),
            ]),
            mc_me_group('Información y formulario','',[
                mc_me_field('info_title','Título de información','text','.contact-grid .contact-card-premium:nth-child(1) h2'),
                mc_me_field('info_text','Texto introductorio','textarea','.contact-grid .contact-card-premium:nth-child(1) > p'),
                mc_me_field('form_title','Título del formulario','text','.contact-form-heading h2'),
                mc_me_field('submit_label','Botón del formulario','text','.contact-submit','last_text'),
            ]),
            mc_me_group('Mapa y fotografía','',[
                mc_me_field('photo_image','Fotografía de sede','image','.contact-photo img','attr',['attr'=>'src']),
                mc_me_field('photo_title','Fotografía · título','text','.contact-photo-overlay h3'),
                mc_me_field('photo_text','Fotografía · texto','textarea','.contact-photo-overlay p'),
                mc_me_field('map_url','URL del mapa embebido','url','.contact-map iframe','attr',['attr'=>'src']),
            ]),
            mc_me_group('CTA y colores','',[
                mc_me_field('cta_image','Imagen del CTA','image','.contact-cta-image','attr',['attr'=>'src']),
                mc_me_field('cta_title','CTA · título','text','.contact-cta-content h2'),
                mc_me_field('cta_text','CTA · texto','textarea','.contact-cta-content p'),
                mc_me_color('color_green','Verde principal','#0d5c2e',[
                    ['selector'=>'.contact-hero,.contact-cta','property'=>'background-color','template'=>'%s'],
                    ['selector'=>'.contact-submit','property'=>'background-color','template'=>'%s']
                ]),
                mc_me_color('color_orange','Naranja','#f26e22',[
                    ['selector'=>'.contact-eyebrow i','property'=>'color','template'=>'%s'],
                    ['selector'=>'.contact-btn-primary','property'=>'background-color','template'=>'%s']
                ]),
            ]),
        ]
    ];
}

function mc_me_credits_schema() {
    $micro=[];
    for($i=1;$i<=5;$i++){
        $micro[]=mc_me_field('micro'.$i.'_title','Tarjeta '.$i.' · título','text','#microempresa article:nth-child('.$i.') h3');
        $micro[]=mc_me_field('micro'.$i.'_text','Tarjeta '.$i.' · descripción','textarea','#microempresa article:nth-child('.$i.') p');
    }
    $consumer=[];
    for($i=1;$i<=3;$i++){
        $consumer[]=mc_me_field('consumer'.$i.'_title','Tarjeta '.$i.' · título','text','#consumo article:nth-child('.$i.') h3');
        $consumer[]=mc_me_field('consumer'.$i.'_text','Tarjeta '.$i.' · descripción','textarea','#consumo article:nth-child('.$i.') p');
    }
    return [
        'label'=>'Créditos y simulador','kind'=>'Catálogo + simulador',
        'description'=>'Editor específico del catálogo. Cambia contenido y diseño sin tocar tasas, fórmulas ni lógica financiera.',
        'groups'=>[
            mc_me_group('Hero del catálogo','',[
                mc_me_field('hero_image','Imagen de fondo','image','','css',['rules'=>[
                    ['selector'=>'.credit-page .credit-hero','property'=>'background','template'=>"linear-gradient(90deg,rgba(10,55,20,.92),rgba(10,55,20,.55)),url('%s') center/cover no-repeat"]
                ]]),
                mc_me_field('hero_badge','Etiqueta','text','.credit-hero span.inline-flex','last_text'),
                mc_me_field('hero_title','Título antes del destacado','text','.credit-hero h1','first_text'),
                mc_me_field('hero_highlight','Texto destacado','text','.credit-hero h1 span'),
                mc_me_field('hero_text','Descripción','textarea','.credit-hero h1 + p'),
            ]),
            mc_me_group('Presentación','',[
                mc_me_field('intro_badge','Etiqueta','text','.credit-intro-main > span'),
                mc_me_field('intro_title','Título','text','.credit-intro-main h2'),
                mc_me_field('intro_text','Descripción','textarea','.credit-intro-main h2 + p'),
                mc_me_field('help_title','Tarjeta ayuda · título','text','.credit-help-card h3'),
                mc_me_field('help_text','Tarjeta ayuda · texto','textarea','.credit-help-card p'),
            ]),
            mc_me_group('Microempresa','Encabezado y cinco productos.',array_merge([
                mc_me_field('micro_title','Título de sección','text','#microempresa h2'),
                mc_me_field('micro_text','Descripción','textarea','#microempresa h2 + p'),
            ],$micro)),
            mc_me_group('Consumo','Encabezado y tres productos.',array_merge([
                mc_me_field('consumer_title','Título de sección','text','#consumo h2'),
                mc_me_field('consumer_text','Descripción','textarea','#consumo h2 + p'),
            ],$consumer)),
            mc_me_group('Simulador y diseño','La lógica financiera queda protegida.',[
                mc_me_field('sim_title','Título del simulador','text','#simulador .max-w-3xl h2'),
                mc_me_field('sim_text','Descripción del simulador','textarea','#simulador .max-w-3xl h2 + p'),
                mc_me_field('sim_background','Fondo del simulador','image','','css',['rules'=>[
                    ['selector'=>'#simulador','property'=>'background','template'=>"linear-gradient(180deg,rgba(238,245,240,.80),rgba(248,250,248,.88)),url('%s') center/cover no-repeat"]
                ]]),
                mc_me_color('color_green','Verde principal','#2e9e43',[
                    ['selector'=>'.credit-page .text-brand-green,#simulador h2','property'=>'color','template'=>'%s']
                ]),
                mc_me_color('color_orange','Naranja','#f26e22',[
                    ['selector'=>'.credit-page .text-brand-orange','property'=>'color','template'=>'%s'],
                    ['selector'=>'.credit-page .bg-brand-orange','property'=>'background-color','template'=>'%s']
                ]),
            ]),
        ]
    ];
}

function mc_me_microcredit_schema() {
    $axis=[];
    for($i=1;$i<=3;$i++){
        $axis[]=mc_me_field('axis'.$i.'_title','Eje '.$i.' · título','text','main > section:nth-of-type(2) .grid > div:nth-child('.$i.') h3');
        $axis[]=mc_me_field('axis'.$i.'_text','Eje '.$i.' · texto','textarea','main > section:nth-of-type(2) .grid > div:nth-child('.$i.') p');
    }
    $timeline=[];
    for($i=1;$i<=3;$i++){
        $timeline[]=mc_me_field('timeline'.$i.'_title','Hito '.$i.' · título','text','main > section:nth-of-type(3) .space-y-8 > div:nth-child('.$i.') h3');
        $timeline[]=mc_me_field('timeline'.$i.'_text','Hito '.$i.' · texto','textarea','main > section:nth-of-type(3) .space-y-8 > div:nth-child('.$i.') p');
    }
    return [
        'label'=>'Componente de Microcrédito','kind'=>'Programa / historia',
        'description'=>'Editor adaptado a esta página: portada, proyecto piloto, tres ejes y trayectoria.',
        'groups'=>[
            mc_me_group('Portada','',[
                mc_me_field('hero_image','Imagen de portada','image','','css',['rules'=>[
                    ['selector'=>'main > section:first-of-type > div.absolute.inset-0','property'=>'background-image','template'=>"url('%s')"]
                ]]),
                mc_me_field('hero_badge','Etiqueta','text','main > section:first-of-type span'),
                mc_me_field('hero_title','Título','text','main > section:first-of-type h1'),
                mc_me_field('hero_text','Descripción','textarea','main > section:first-of-type h1 + p'),
            ]),
            mc_me_group('Proyecto piloto','',array_merge([
                mc_me_field('pilot_title','Título','text','main > section:nth-of-type(2) h2'),
                mc_me_field('pilot_text','Texto principal','textarea','main > section:nth-of-type(2) h2 + p'),
            ],$axis)),
            mc_me_group('Trayectoria','',array_merge([
                mc_me_field('timeline_title','Título de trayectoria','text','main > section:nth-of-type(3) .text-center h2'),
            ],$timeline)),
            mc_me_group('Diseño','',[
                mc_me_color('color_green','Verde','#0d5c2e',[
                    ['selector'=>'main .text-brand-green','property'=>'color','template'=>'%s'],
                    ['selector'=>'main .bg-brand-green','property'=>'background-color','template'=>'%s']
                ]),
                mc_me_color('color_orange','Naranja','#f26e22',[
                    ['selector'=>'main .text-brand-orange','property'=>'color','template'=>'%s'],
                    ['selector'=>'main .bg-brand-orange','property'=>'background-color','template'=>'%s']
                ]),
            ]),
        ]
    ];
}

function mc_me_simple_schema($label) {
    return [
        'label'=>$label,'kind'=>'Página informativa',
        'description'=>'Editor específico simplificado para el título, introducción, imagen principal y colores de esta página.',
        'groups'=>[
            mc_me_group('Contenido principal','',[
                mc_me_field('page_title','Título principal','text','main h1, #contenido-principal h1, body > section h1'),
                mc_me_field('page_subtitle','Introducción','textarea','main h1 + p, #contenido-principal h1 + p, body > section h1 + p'),
                mc_me_field('hero_image','Imagen principal','image','[data-cms-hero] img, main section:first-of-type img, body > section:first-of-type img','attr',['attr'=>'src']),
            ]),
            mc_me_group('Diseño','',[
                mc_me_color('color_green','Verde principal','#0d5c2e',[[ 'selector'=>':root','property'=>'--mc-green','template'=>'%s' ]]),
                mc_me_color('color_orange','Naranja','#f26e22',[[ 'selector'=>':root','property'=>'--mc-orange','template'=>'%s' ]]),
            ]),
        ]
    ];
}

function mc_module_editor_schema($module) {
    $module=basename((string)$module);
    $products=[
        'credito-ordinario.php'=>'Crédito Ordinario',
        'credito-diario.php'=>'Crédito Diario',
        'crediempeno.php'=>'Crediempeño',
        'credimoto.php'=>'Credimoto',
        'educacion.php'=>'Crédito Educación',
        'salud.php'=>'Crédito Salud',
        'esparcimiento.php'=>'Crédito Esparcimiento'
    ];
    if(isset($products[$module])) return mc_me_product_schema($products[$module]);
    if($module==='credito-grupal.php') return mc_me_group_credit_schema();
    if($module==='bancos-comunales.php') return mc_me_group_method_schema('Bancos Comunales');
    if($module==='grupos-solidarios.php') return mc_me_group_method_schema('Grupos Solidarios');
    if($module==='servicios.php') return mc_me_services_schema();
    if($module==='conocenos.php') return mc_me_about_schema();
    if($module==='contacto.php') return mc_me_contact_schema();
    if($module==='creditos.php') return mc_me_credits_schema();
    if($module==='microcredito.php') return mc_me_microcredit_schema();
    if($module==='index.php') return [
        'label'=>'Inicio','kind'=>'Página principal',
        'description'=>'La página principal ya tiene un editor propio para hero, bienvenida, noticias y demás contenido.',
        'redirect'=>'contenido.php','groups'=>[]
    ];
    $labels=['noticias.php'=>'Noticias','noticia.php'=>'Detalle de noticia','informacion-legal.php'=>'Información legal'];
    return mc_me_simple_schema(isset($labels[$module])?$labels[$module]:ucwords(str_replace(['-','_'],' ',pathinfo($module,PATHINFO_FILENAME))));
}

function mc_module_editor_fields($schema) {
    $out=[];
    foreach((array)($schema['groups']??[]) as $group){
        foreach((array)($group['fields']??[]) as $field){
            if(!empty($field['key'])) $out[$field['key']]=$field;
        }
    }
    return $out;
}

?>