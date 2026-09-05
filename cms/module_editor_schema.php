<?php

function mc_me_field($key, $label, $type, $selector = '', $action = 'text', $extra = []) {
    return array_merge([
        'key' => $key,
        'label' => $label,
        'type' => $type,
        'selector' => $selector,
        'action' => $action,
        'attr' => '',
        'property' => '',
        'default' => '',
        'placeholder' => '',
        'help' => '',
        'rules' => [],
    ], $extra);
}

function mc_me_group($title, $description, $fields) {
    return ['title'=>$title, 'description'=>$description, 'fields'=>$fields];
}

function mc_me_common_product_schema($label) {
    return [
        'label' => $label,
        'kind' => 'Ficha de producto crediticio',
        'description' => 'Editor construido para la estructura real de esta ficha: portada, introducción, público objetivo, usos, características, requisitos, proceso, preguntas frecuentes y llamada final.',
        'groups' => [
            mc_me_group('Portada del crédito', 'Edita lo que el cliente ve primero.', [
                mc_me_field('hero_image','Imagen de portada','image','main > section:first-of-type','css','',),
                mc_me_field('hero_badge','Categoría / etiqueta','text','main > section:first-of-type span.inline-flex','last_text'),
                mc_me_field('hero_title','Nombre del crédito','text','main > section:first-of-type h1','text'),
                mc_me_field('hero_subtitle','Frase principal','textarea','main > section:first-of-type h1 + p','text'),
            ]),
            mc_me_group('Presentación y asesor', 'Contenido comercial inmediatamente después de la portada.', [
                mc_me_field('intro_eyebrow','Etiqueta de presentación','text','main > section:nth-of-type(2) .lg\\:col-span-2 > span','text'),
                mc_me_field('intro_title','Título de presentación','text','main > section:nth-of-type(2) .lg\\:col-span-2 > h2','text'),
                mc_me_field('intro_text','Descripción principal','textarea','main > section:nth-of-type(2) .lg\\:col-span-2 > h2 + p','text'),
                mc_me_field('advisor_title','Título de tarjeta del asesor','text','main > section:nth-of-type(2) .rounded-3xl h3','text'),
                mc_me_field('advisor_text','Texto de tarjeta del asesor','textarea','main > section:nth-of-type(2) .rounded-3xl h3 + p','text'),
                mc_me_field('advisor_button','Texto botón WhatsApp','text','main > section:nth-of-type(2) .rounded-3xl a:nth-of-type(1)','last_text'),
                mc_me_field('advisor_url','Enlace WhatsApp','url','main > section:nth-of-type(2) .rounded-3xl a:nth-of-type(1)','attr',['attr'=>'href']),
            ]),
            mc_me_group('Para quién y para qué', 'Las dos tarjetas principales de orientación.', [
                mc_me_field('audience_title','Título: para quién','text','main > section:nth-of-type(3) .grid > div:nth-child(1) h2','text'),
                mc_me_field('audience_1','Para quién · punto 1','text','main > section:nth-of-type(3) .grid > div:nth-child(1) li:nth-child(1) span','text'),
                mc_me_field('audience_2','Para quién · punto 2','text','main > section:nth-of-type(3) .grid > div:nth-child(1) li:nth-child(2) span','text'),
                mc_me_field('audience_3','Para quién · punto 3','text','main > section:nth-of-type(3) .grid > div:nth-child(1) li:nth-child(3) span','text'),
                mc_me_field('audience_4','Para quién · punto 4','text','main > section:nth-of-type(3) .grid > div:nth-child(1) li:nth-child(4) span','text'),
                mc_me_field('use_title','Título: en qué utilizarlo','text','main > section:nth-of-type(3) .grid > div:nth-child(2) h2','text'),
                mc_me_field('use_1','Uso · punto 1','text','main > section:nth-of-type(3) .grid > div:nth-child(2) li:nth-child(1) span','text'),
                mc_me_field('use_2','Uso · punto 2','text','main > section:nth-of-type(3) .grid > div:nth-child(2) li:nth-child(2) span','text'),
                mc_me_field('use_3','Uso · punto 3','text','main > section:nth-of-type(3) .grid > div:nth-child(2) li:nth-child(3) span','text'),
                mc_me_field('use_4','Uso · punto 4','text','main > section:nth-of-type(3) .grid > div:nth-child(2) li:nth-child(4) span','text'),
            ]),
            mc_me_group('Características del producto', 'Edita las cuatro tarjetas de información comercial.', [
                mc_me_field('features_title','Título de características','text','main > section:nth-of-type(4) .text-center h2','text'),
                mc_me_field('feature_1_title','Tarjeta 1 · título','text','main > section:nth-of-type(4) .grid > div:nth-child(1) h3','text'),
                mc_me_field('feature_1_text','Tarjeta 1 · detalle','textarea','main > section:nth-of-type(4) .grid > div:nth-child(1) p','text'),
                mc_me_field('feature_2_title','Tarjeta 2 · título','text','main > section:nth-of-type(4) .grid > div:nth-child(2) h3','text'),
                mc_me_field('feature_2_text','Tarjeta 2 · detalle','textarea','main > section:nth-of-type(4) .grid > div:nth-child(2) p','text'),
                mc_me_field('feature_3_title','Tarjeta 3 · título','text','main > section:nth-of-type(4) .grid > div:nth-child(3) h3','text'),
                mc_me_field('feature_3_text','Tarjeta 3 · detalle','textarea','main > section:nth-of-type(4) .grid > div:nth-child(3) p','text'),
                mc_me_field('feature_4_title','Tarjeta 4 · título','text','main > section:nth-of-type(4) .grid > div:nth-child(4) h3','text'),
                mc_me_field('feature_4_text','Tarjeta 4 · detalle','textarea','main > section:nth-of-type(4) .grid > div:nth-child(4) p','text'),
            ]),
            mc_me_group('Requisitos y proceso', 'Cambia documentación referencial y los pasos del flujo.', [
                mc_me_field('requirements_title','Título de requisitos','text','main > section:nth-of-type(5) .text-center h2','text'),
                mc_me_field('requirement_1','Requisito 1','text','main > section:nth-of-type(5) .mt-9 .grid > div:nth-child(1) span','text'),
                mc_me_field('requirement_2','Requisito 2','text','main > section:nth-of-type(5) .mt-9 .grid > div:nth-child(2) span','text'),
                mc_me_field('requirement_3','Requisito 3','text','main > section:nth-of-type(5) .mt-9 .grid > div:nth-child(3) span','text'),
                mc_me_field('requirement_4','Requisito 4','text','main > section:nth-of-type(5) .mt-9 .grid > div:nth-child(4) span','text'),
                mc_me_field('process_title','Título del proceso','text','main > section:nth-of-type(6) .text-center h2','text'),
                mc_me_field('process_1_title','Paso 1 · título','text','main > section:nth-of-type(6) .grid > div:nth-child(1) h3','text'),
                mc_me_field('process_1_text','Paso 1 · texto','text','main > section:nth-of-type(6) .grid > div:nth-child(1) p','text'),
                mc_me_field('process_2_title','Paso 2 · título','text','main > section:nth-of-type(6) .grid > div:nth-child(2) h3','text'),
                mc_me_field('process_2_text','Paso 2 · texto','text','main > section:nth-of-type(6) .grid > div:nth-child(2) p','text'),
                mc_me_field('process_3_title','Paso 3 · título','text','main > section:nth-of-type(6) .grid > div:nth-child(3) h3','text'),
                mc_me_field('process_3_text','Paso 3 · texto','text','main > section:nth-of-type(6) .grid > div:nth-child(3) p','text'),
                mc_me_field('process_4_title','Paso 4 · título','text','main > section:nth-of-type(6) .grid > div:nth-child(4) h3','text'),
                mc_me_field('process_4_text','Paso 4 · texto','text','main > section:nth-of-type(6) .grid > div:nth-child(4) p','text'),
            ]),
            mc_me_group('Preguntas frecuentes', 'Edita las preguntas que aparecen al final de la ficha.', [
                mc_me_field('faq_title','Título de preguntas frecuentes','text','main > section:nth-of-type(7) .text-center h2','text'),
                mc_me_field('faq_1_q','Pregunta 1','text','main > section:nth-of-type(7) details:nth-child(1) summary span','text'),
                mc_me_field('faq_1_a','Respuesta 1','textarea','main > section:nth-of-type(7) details:nth-child(1) p','text'),
                mc_me_field('faq_2_q','Pregunta 2','text','main > section:nth-of-type(7) details:nth-child(2) summary span','text'),
                mc_me_field('faq_2_a','Respuesta 2','textarea','main > section:nth-of-type(7) details:nth-child(2) p','text'),
                mc_me_field('faq_3_q','Pregunta 3','text','main > section:nth-of-type(7) details:nth-child(3) summary span','text'),
                mc_me_field('faq_3_a','Respuesta 3','textarea','main > section:nth-of-type(7) details:nth-child(3) p','text'),
            ]),
            mc_me_group('Diseño del módulo', 'Colores e imágenes solo para esta ficha.', [
                mc_me_field('color_green','Verde principal','color','','css',['default'=>'#176b2b','rules'=>[
                    ['selector'=>':root','property'=>'--mc-green','template'=>'%s'],
                    ['selector'=>'main > section:first-of-type','property'=>'background-color','template'=>'%s'],
                ]]),
                mc_me_field('color_green_dark','Verde oscuro','color','','css',['default'=>'#0b4d26','rules'=>[
                    ['selector'=>':root','property'=>'--mc-green-dark','template'=>'%s'],
                ]]),
                mc_me_field('color_orange','Naranja / acento','color','','css',['default'=>'#e85b10','rules'=>[
                    ['selector'=>':root','property'=>'--mc-orange','template'=>'%s'],
                    ['selector'=>'main .text-brand-orange','property'=>'color','template'=>'%s'],
                    ['selector'=>'main .bg-brand-orange','property'=>'background-color','template'=>'%s'],
                ]]),
            ]),
        ],
    ];
}

function mc_me_group_credit_schema() {
    return [
        'label'=>'Crédito Grupal',
        'kind'=>'Crédito con modalidades',
        'description'=>'Editor específico para Crédito Grupal, incluyendo Bancos Comunales y Grupos Solidarios.',
        'groups'=>[
            mc_me_group('Portada', '', [
                mc_me_field('hero_title','Título','text','main > section:first-of-type h1','text'),
                mc_me_field('hero_subtitle','Subtítulo','textarea','main > section:first-of-type h1 + p','text'),
                mc_me_field('hero_badge','Categoría','text','main > section:first-of-type span.inline-flex','text'),
            ]),
            mc_me_group('Modalidades', 'Edita las dos alternativas que se muestran al cliente.', [
                mc_me_field('modes_title','Título de modalidades','text','main > section:nth-of-type(2) .text-center h2','text'),
                mc_me_field('modes_text','Introducción','textarea','main > section:nth-of-type(2) .text-center h2 + p','text'),
                mc_me_field('bank_title','Bancos Comunales · título','text','main > section:nth-of-type(2) .grid > a:nth-child(1) h3','text'),
                mc_me_field('bank_text','Bancos Comunales · descripción','textarea','main > section:nth-of-type(2) .grid > a:nth-child(1) p','text'),
                mc_me_field('bank_url','Bancos Comunales · enlace','url','main > section:nth-of-type(2) .grid > a:nth-child(1)','attr',['attr'=>'href']),
                mc_me_field('solid_title','Grupos Solidarios · título','text','main > section:nth-of-type(2) .grid > a:nth-child(2) h3','text'),
                mc_me_field('solid_text','Grupos Solidarios · descripción','textarea','main > section:nth-of-type(2) .grid > a:nth-child(2) p','text'),
                mc_me_field('solid_url','Grupos Solidarios · enlace','url','main > section:nth-of-type(2) .grid > a:nth-child(2)','attr',['attr'=>'href']),
            ]),
            mc_me_group('Presentación', '', [
                mc_me_field('intro_title','Título','text','main > section:nth-of-type(3) .lg\\:col-span-2 h2','text'),
                mc_me_field('intro_text','Descripción','textarea','main > section:nth-of-type(3) .lg\\:col-span-2 h2 + p','text'),
                mc_me_field('advisor_title','Tarjeta asesor · título','text','main > section:nth-of-type(3) .rounded-3xl h3','text'),
                mc_me_field('advisor_text','Tarjeta asesor · texto','textarea','main > section:nth-of-type(3) .rounded-3xl h3 + p','text'),
            ]),
            mc_me_group('Diseño', '', [
                mc_me_field('color_green','Verde principal','color','','css',['default'=>'#176b2b','rules'=>[
                    ['selector'=>'main > section:first-of-type','property'=>'background','template'=>'linear-gradient(135deg,%s,#2e9e43)'],
                    ['selector'=>'main .text-brand-green','property'=>'color','template'=>'%s'],
                ]]),
                mc_me_field('color_orange','Color de acento','color','','css',['default'=>'#f26e22','rules'=>[
                    ['selector'=>'main .text-brand-orange','property'=>'color','template'=>'%s'],
                    ['selector'=>'main .bg-brand-orange','property'=>'background-color','template'=>'%s'],
                ]]),
            ]),
        ],
    ];
}

function mc_me_group_method_schema($label) {
    return [
        'label'=>$label,
        'kind'=>'Metodología grupal',
        'description'=>'Editor adaptado a la página de metodología: portada, presentación, proceso, beneficios y CTA.',
        'groups'=>[
            mc_me_group('Portada', '', [
                mc_me_field('hero_badge','Etiqueta','text','main > section:first-of-type span.inline-flex','text'),
                mc_me_field('hero_title','Título','text','main > section:first-of-type h1','text'),
                mc_me_field('hero_subtitle','Subtítulo','textarea','main > section:first-of-type h1 + p','text'),
            ]),
            mc_me_group('Presentación y asesor', '', [
                mc_me_field('intro_title','Título principal','text','main > section:nth-of-type(2) .lg\\:col-span-2 h2','text'),
                mc_me_field('intro_text','Descripción','textarea','main > section:nth-of-type(2) .lg\\:col-span-2 h2 + p','text'),
                mc_me_field('advisor_title','Tarjeta asesor · título','text','main > section:nth-of-type(2) .rounded-3xl h3','text'),
                mc_me_field('advisor_text','Tarjeta asesor · texto','textarea','main > section:nth-of-type(2) .rounded-3xl h3 + p','text'),
                mc_me_field('advisor_url','Tarjeta asesor · WhatsApp','url','main > section:nth-of-type(2) .rounded-3xl a','attr',['attr'=>'href']),
            ]),
            mc_me_group('Cómo funciona', '', [
                mc_me_field('process_title','Título de proceso','text','main > section:nth-of-type(3) .text-center h2','text'),
                mc_me_field('step1_title','Paso 1 · título','text','main > section:nth-of-type(3) .grid > div:nth-child(1) h3','text'),
                mc_me_field('step1_text','Paso 1 · detalle','textarea','main > section:nth-of-type(3) .grid > div:nth-child(1) p','text'),
                mc_me_field('step2_title','Paso 2 · título','text','main > section:nth-of-type(3) .grid > div:nth-child(2) h3','text'),
                mc_me_field('step2_text','Paso 2 · detalle','textarea','main > section:nth-of-type(3) .grid > div:nth-child(2) p','text'),
                mc_me_field('step3_title','Paso 3 · título','text','main > section:nth-of-type(3) .grid > div:nth-child(3) h3','text'),
                mc_me_field('step3_text','Paso 3 · detalle','textarea','main > section:nth-of-type(3) .grid > div:nth-child(3) p','text'),
                mc_me_field('step4_title','Paso 4 · título','text','main > section:nth-of-type(3) .grid > div:nth-child(4) h3','text'),
                mc_me_field('step4_text','Paso 4 · detalle','textarea','main > section:nth-of-type(3) .grid > div:nth-child(4) p','text'),
            ]),
            mc_me_group('Beneficios', '', [
                mc_me_field('benefit1_title','Beneficio 1 · título','text','main > section:nth-of-type(4) .grid > div:nth-child(1) h3','text'),
                mc_me_field('benefit1_text','Beneficio 1 · texto','textarea','main > section:nth-of-type(4) .grid > div:nth-child(1) p','text'),
                mc_me_field('benefit2_title','Beneficio 2 · título','text','main > section:nth-of-type(4) .grid > div:nth-child(2) h3','text'),
                mc_me_field('benefit2_text','Beneficio 2 · texto','textarea','main > section:nth-of-type(4) .grid > div:nth-child(2) p','text'),
                mc_me_field('benefit3_title','Beneficio 3 · título','text','main > section:nth-of-type(4) .grid > div:nth-child(3) h3','text'),
                mc_me_field('benefit3_text','Beneficio 3 · texto','textarea','main > section:nth-of-type(4) .grid > div:nth-child(3) p','text'),
            ]),
            mc_me_group('Llamada final y diseño', '', [
                mc_me_field('cta_title','CTA · título','text','main > section:last-of-type h2','text'),
                mc_me_field('cta_text','CTA · texto','textarea','main > section:last-of-type h2 + p','text'),
                mc_me_field('cta_url','CTA · WhatsApp','url','main > section:last-of-type a','attr',['attr'=>'href']),
                mc_me_field('color_green','Verde principal','color','','css',['default'=>'#176b2b','rules'=>[
                    ['selector'=>'main > section:first-of-type','property'=>'background','template'=>'linear-gradient(135deg,%s,#2e9e43)'],
                    ['selector'=>'main .text-brand-green','property'=>'color','template'=>'%s'],
                ]]),
                mc_me_field('color_orange','Naranja','color','','css',['default'=>'#f26e22','rules'=>[
                    ['selector'=>'main .text-brand-orange','property'=>'color','template'=>'%s'],
                    ['selector'=>'main .bg-brand-orange','property'=>'background-color','template'=>'%s'],
                ]]),
            ]),
        ],
    ];
}

function mc_me_services_schema() {
    return [
        'label'=>'Servicios',
        'kind'=>'Página institucional de servicios',
        'description'=>'Editor propio para la composición de Servicios: hero con dos imágenes, introducción, tarjetas de servicios, bloque destacado y CTA.',
        'groups'=>[
            mc_me_group('Hero de Servicios', '', [
                mc_me_field('hero_image','Imagen de fondo','image','.svc-hero-image','attr',['attr'=>'src']),
                mc_me_field('hero_card_image','Imagen de tarjeta del hero','image','.svc-hero-card-image img','attr',['attr'=>'src']),
                mc_me_field('hero_eyebrow','Etiqueta','text','.svc-eyebrow','last_text'),
                mc_me_field('hero_title','Título antes del destacado','text','.svc-hero-title','first_text'),
                mc_me_field('hero_highlight','Texto destacado','text','.svc-hero-title span','text'),
                mc_me_field('hero_text','Descripción','textarea','.svc-hero-text','text'),
                mc_me_field('hero_button_1','Botón principal','text','.svc-actions a:nth-child(1)','first_text'),
                mc_me_field('hero_button_2','Botón secundario','text','.svc-actions a:nth-child(2)','first_text'),
            ]),
            mc_me_group('Introducción', '', [
                mc_me_field('intro_image','Imagen de introducción','image','.svc-intro-image img','attr',['attr'=>'src']),
                mc_me_field('intro_kicker','Etiqueta','text','.svc-intro-content .svc-kicker','text'),
                mc_me_field('intro_title','Título','text','.svc-intro-content h2','text'),
                mc_me_field('intro_text','Descripción','textarea','.svc-intro-content > p','text'),
                mc_me_field('intro_note_title','Tarjeta flotante · título','text','.svc-intro-card strong','text'),
                mc_me_field('intro_note_text','Tarjeta flotante · texto','textarea','.svc-intro-card p','text'),
                mc_me_field('intro_check_1','Punto 1','text','.svc-check-list .svc-check:nth-child(1)','last_text'),
                mc_me_field('intro_check_2','Punto 2','text','.svc-check-list .svc-check:nth-child(2)','last_text'),
                mc_me_field('intro_check_3','Punto 3','text','.svc-check-list .svc-check:nth-child(3)','last_text'),
                mc_me_field('intro_check_4','Punto 4','text','.svc-check-list .svc-check:nth-child(4)','last_text'),
            ]),
            mc_me_group('Tarjetas de servicios', 'Edita el encabezado y las tarjetas del bloque principal.', [
                mc_me_field('services_kicker','Etiqueta de sección','text','#servicios .svc-heading .svc-kicker','text'),
                mc_me_field('services_title','Título de sección','text','#servicios .svc-heading h2','text'),
                mc_me_field('services_text','Texto de sección','textarea','#servicios .svc-heading p','text'),
                mc_me_field('service1_title','Servicio 1 · título','text','#servicios .svc-card:nth-child(1) h3','text'),
                mc_me_field('service1_text','Servicio 1 · descripción','textarea','#servicios .svc-card:nth-child(1) p','text'),
                mc_me_field('service2_title','Servicio 2 · título','text','#servicios .svc-card:nth-child(2) h3','text'),
                mc_me_field('service2_text','Servicio 2 · descripción','textarea','#servicios .svc-card:nth-child(2) p','text'),
                mc_me_field('service3_title','Servicio 3 · título','text','#servicios .svc-card:nth-child(3) h3','text'),
                mc_me_field('service3_text','Servicio 3 · descripción','textarea','#servicios .svc-card:nth-child(3) p','text'),
                mc_me_field('service4_title','Servicio 4 · título','text','#servicios .svc-card:nth-child(4) h3','text'),
                mc_me_field('service4_text','Servicio 4 · descripción','textarea','#servicios .svc-card:nth-child(4) p','text'),
            ]),
            mc_me_group('Bloque destacado y cierre', '', [
                mc_me_field('featured_image','Imagen destacada','image','.svc-featured-image img','attr',['attr'=>'src']),
                mc_me_field('featured_title','Título destacado','text','.svc-featured-content h2','text'),
                mc_me_field('featured_text','Texto destacado','textarea','.svc-featured-content > p','text'),
                mc_me_field('final_image','Imagen CTA final','image','.svc-final-image','attr',['attr'=>'src']),
                mc_me_field('final_title','CTA · título','text','.svc-final-content h2','text'),
                mc_me_field('final_text','CTA · texto','textarea','.svc-final-content p','text'),
            ]),
            mc_me_group('Colores de Servicios', '', [
                mc_me_field('color_green','Verde principal','color','','css',['default'=>'#0d5c2e','rules'=>[
                    ['selector'=>'.svc-hero,.svc-final-box','property'=>'background-color','template'=>'%s'],
                    ['selector'=>'.svc-intro-card strong,.svc-card-number,.svc-featured-content .svc-kicker','property'=>'color','template'=>'%s'],
                ]]),
                mc_me_field('color_orange','Naranja de acento','color','','css',['default'=>'#f26e22','rules'=>[
                    ['selector'=>'.svc-btn-primary','property'=>'background-color','template'=>'%s'],
                    ['selector'=>'.svc-kicker,.svc-eyebrow i,.svc-check i','property'=>'color','template'=>'%s'],
                    ['selector'=>'.svc-intro-card','property'=>'border-left-color','template'=>'%s'],
                ]]),
            ]),
        ],
    ];
}

function mc_me_about_schema() {
    return [
        'label'=>'Nosotros',
        'kind'=>'Página institucional Nosotros',
        'description'=>'Editor específico para historia, misión, visión, valores y enfoque institucional.',
        'groups'=>[
            mc_me_group('Hero Nosotros', '', [
                mc_me_field('hero_image','Imagen de portada','image','.about-hero-image','attr',['attr'=>'src']),
                mc_me_field('hero_eyebrow','Etiqueta','text','.hero-eyebrow','last_text'),
                mc_me_field('hero_title','Título antes del destacado','text','.hero-title','first_text'),
                mc_me_field('hero_highlight','Texto destacado','text','.hero-title span','text'),
                mc_me_field('hero_text','Descripción','textarea','.hero-text','text'),
                mc_me_field('hero_badge','Insignia inferior','text','.hero-badge','last_text'),
            ]),
            mc_me_group('Historia', '', [
                mc_me_field('history_bg','Imagen de fondo de historia','image','.history-background','attr',['attr'=>'src']),
                mc_me_field('history_image','Imagen principal de historia','image','.history-visual img','attr',['attr'=>'src']),
                mc_me_field('history_year','Año destacado','text','.history-year strong','text'),
                mc_me_field('history_title','Título de historia','text','.history-content h2','text'),
                mc_me_field('history_text','Texto de historia','textarea','.history-content > p','text'),
            ]),
            mc_me_group('Misión y visión', '', [
                mc_me_field('mission_title','Misión · título','text','.purpose-card.mission h3','text'),
                mc_me_field('mission_text','Misión · texto','textarea','.purpose-card.mission p','text'),
                mc_me_field('vision_title','Visión · título','text','.purpose-card.vision h3','text'),
                mc_me_field('vision_text','Visión · texto','textarea','.purpose-card.vision p','text'),
            ]),
            mc_me_group('Valores institucionales', '', [
                mc_me_field('values_bg','Imagen de fondo','image','.values-bg','attr',['attr'=>'src']),
                mc_me_field('values_title','Título','text','.values-heading h2','text'),
                mc_me_field('values_text','Introducción','textarea','.values-heading p','text'),
                mc_me_field('value1_title','Valor 1 · título','text','.value-card:nth-child(1) h4','text'),
                mc_me_field('value1_text','Valor 1 · texto','textarea','.value-card:nth-child(1) p','text'),
                mc_me_field('value2_title','Valor 2 · título','text','.value-card:nth-child(2) h4','text'),
                mc_me_field('value2_text','Valor 2 · texto','textarea','.value-card:nth-child(2) p','text'),
                mc_me_field('value3_title','Valor 3 · título','text','.value-card:nth-child(3) h4','text'),
                mc_me_field('value3_text','Valor 3 · texto','textarea','.value-card:nth-child(3) p','text'),
                mc_me_field('value4_title','Valor 4 · título','text','.value-card:nth-child(4) h4','text'),
                mc_me_field('value4_text','Valor 4 · texto','textarea','.value-card:nth-child(4) p','text'),
                mc_me_field('value5_title','Valor 5 · título','text','.value-card:nth-child(5) h4','text'),
                mc_me_field('value5_text','Valor 5 · texto','textarea','.value-card:nth-child(5) p','text'),
            ]),
            mc_me_group('Enfoque y diseño', '', [
                mc_me_field('focus_bg','Fondo del enfoque','image','.focus-background','attr',['attr'=>'src']),
                mc_me_field('focus_image','Imagen del enfoque','image','.focus-image img','attr',['attr'=>'src']),
                mc_me_field('focus_title','Título del enfoque','text','.focus-content h2','text'),
                mc_me_field('focus_text','Texto del enfoque','textarea','.focus-content > p','text'),
                mc_me_field('color_green','Verde institucional','color','','css',['default'=>'#0d5c2e','rules'=>[
                    ['selector'=>'.stat-number,.history-year strong,.focus-item i','property'=>'color','template'=>'%s'],
                    ['selector'=>'.purpose-card.mission','property'=>'background','template'=>'linear-gradient(145deg,#083d1f,%s)'],
                ]]),
                mc_me_field('color_orange','Naranja institucional','color','','css',['default'=>'#f26e22','rules'=>[
                    ['selector'=>'.hero-title span,.hero-eyebrow i,.focus-item i','property'=>'color','template'=>'%s'],
                    ['selector'=>'.purpose-card.vision','property'=>'background','template'=>'linear-gradient(145deg,%s,#d85812)'],
                ]]),
            ]),
        ],
    ];
}

function mc_me_contact_schema() {
    return [
        'label'=>'Contacto',
        'kind'=>'Página de contacto',
        'description'=>'Editor propio para hero, datos visuales, formulario, mapa, fotografía de sede y CTA final.',
        'groups'=>[
            mc_me_group('Hero Contacto', '', [
                mc_me_field('hero_image','Imagen de portada','image','.contact-hero-image','attr',['attr'=>'src']),
                mc_me_field('hero_eyebrow','Etiqueta','text','.contact-eyebrow','last_text'),
                mc_me_field('hero_title','Título antes del destacado','text','.contact-hero h1','first_text'),
                mc_me_field('hero_highlight','Texto destacado','text','.contact-hero h1 span','text'),
                mc_me_field('hero_text','Descripción','textarea','.contact-hero-content > p','text'),
                mc_me_field('hero_primary','Botón principal','text','.contact-hero-actions a:nth-child(1)','last_text'),
                mc_me_field('hero_primary_url','Enlace botón principal','url','.contact-hero-actions a:nth-child(1)','attr',['attr'=>'href']),
                mc_me_field('hero_secondary','Botón secundario','text','.contact-hero-actions a:nth-child(2)','last_text'),
                mc_me_field('hero_secondary_url','Enlace botón secundario','url','.contact-hero-actions a:nth-child(2)','attr',['attr'=>'href']),
            ]),
            mc_me_group('Bloque de contacto', '', [
                mc_me_field('info_title','Título de información','text','.contact-grid .contact-card-premium:nth-child(1) h2','text'),
                mc_me_field('info_text','Texto introductorio','textarea','.contact-grid .contact-card-premium:nth-child(1) > p','text'),
                mc_me_field('form_title','Título del formulario','text','.contact-form-heading h2','text'),
                mc_me_field('form_text','Texto del formulario','textarea','.contact-form-heading + p','text'),
                mc_me_field('submit_label','Botón del formulario','text','.contact-submit','last_text'),
            ]),
            mc_me_group('Mapa y fotografía', '', [
                mc_me_field('photo_image','Fotografía de sede','image','.contact-photo img','attr',['attr'=>'src']),
                mc_me_field('photo_title','Fotografía · título','text','.contact-photo-overlay h3','text'),
                mc_me_field('photo_text','Fotografía · texto','textarea','.contact-photo-overlay p','text'),
                mc_me_field('map_url','URL del mapa embebido','url','.contact-map iframe','attr',['attr'=>'src']),
            ]),
            mc_me_group('CTA final y colores', '', [
                mc_me_field('cta_image','Imagen del CTA','image','.contact-cta-image','attr',['attr'=>'src']),
                mc_me_field('cta_title','CTA · título','text','.contact-cta-content h2','text'),
                mc_me_field('cta_text','CTA · texto','textarea','.contact-cta-content p','text'),
                mc_me_field('color_green','Verde principal','color','','css',['default'=>'#0d5c2e','rules'=>[
                    ['selector'=>'.contact-hero,.contact-cta','property'=>'background-color','template'=>'%s'],
                    ['selector'=>'.contact-main-icon,.contact-info-icon','property'=>'color','template'=>'%s'],
                    ['selector'=>'.contact-submit','property'=>'background-color','template'=>'%s'],
                ]]),
                mc_me_field('color_orange','Naranja','color','','css',['default'=>'#f26e22','rules'=>[
                    ['selector'=>'.contact-eyebrow i,.contact-form-heading .contact-main-icon','property'=>'color','template'=>'%s'],
                    ['selector'=>'.contact-btn-primary','property'=>'background-color','template'=>'%s'],
                ]]),
            ]),
        ],
    ];
}

function mc_me_credits_catalog_schema() {
    return [
        'label'=>'Créditos y simulador',
        'kind'=>'Catálogo de créditos + simulador',
        'description'=>'Editor específico del catálogo. Permite cambiar textos, tarjetas, imágenes y colores sin tocar las fórmulas del simulador.',
        'groups'=>[
            mc_me_group('Hero del catálogo', '', [
                mc_me_field('hero_image','Imagen de fondo','image','.credit-page .credit-hero','css'),
                mc_me_field('hero_badge','Etiqueta','text','.credit-hero span.inline-flex','last_text'),
                mc_me_field('hero_title','Título antes del destacado','text','.credit-hero h1','first_text'),
                mc_me_field('hero_highlight','Texto destacado','text','.credit-hero h1 span','text'),
                mc_me_field('hero_text','Descripción','textarea','.credit-hero h1 + p','text'),
            ]),
            mc_me_group('Presentación', '', [
                mc_me_field('intro_badge','Etiqueta','text','.credit-intro-main > span','text'),
                mc_me_field('intro_title','Título','text','.credit-intro-main h2','text'),
                mc_me_field('intro_text','Descripción','textarea','.credit-intro-main h2 + p','text'),
                mc_me_field('help_title','Tarjeta ayuda · título','text','.credit-help-card h3','text'),
                mc_me_field('help_text','Tarjeta ayuda · texto','textarea','.credit-help-card p','text'),
            ]),
            mc_me_group('Créditos Microempresa', '', [
                mc_me_field('micro_title','Título de sección','text','#microempresa h2','text'),
                mc_me_field('micro_text','Descripción de sección','textarea','#microempresa h2 + p','text'),
                mc_me_field('micro1_title','Tarjeta 1 · título','text','#microempresa article:nth-child(1) h3','text'),
                mc_me_field('micro1_text','Tarjeta 1 · descripción','textarea','#microempresa article:nth-child(1) p','text'),
                mc_me_field('micro2_title','Tarjeta 2 · título','text','#microempresa article:nth-child(2) h3','text'),
                mc_me_field('micro2_text','Tarjeta 2 · descripción','textarea','#microempresa article:nth-child(2) p','text'),
                mc_me_field('micro3_title','Tarjeta 3 · título','text','#microempresa article:nth-child(3) h3','text'),
                mc_me_field('micro3_text','Tarjeta 3 · descripción','textarea','#microempresa article:nth-child(3) p','text'),
                mc_me_field('micro4_title','Tarjeta 4 · título','text','#microempresa article:nth-child(4) h3','text'),
                mc_me_field('micro4_text','Tarjeta 4 · descripción','textarea','#microempresa article:nth-child(4) p','text'),
                mc_me_field('micro5_title','Tarjeta 5 · título','text','#microempresa article:nth-child(5) h3','text'),
                mc_me_field('micro5_text','Tarjeta 5 · descripción','textarea','#microempresa article:nth-child(5) p','text'),
            ]),
            mc_me_group('Créditos Consumo', '', [
                mc_me_field('consumer_title','Título de sección','text','#consumo h2','text'),
                mc_me_field('consumer_text','Descripción','textarea','#consumo h2 + p','text'),
                mc_me_field('consumer1_title','Tarjeta 1 · título','text','#consumo article:nth-child(1) h3','text'),
                mc_me_field('consumer1_text','Tarjeta 1 · descripción','textarea','#consumo article:nth-child(1) p','text'),
                mc_me_field('consumer2_title','Tarjeta 2 · título','text','#consumo article:nth-child(2) h3','text'),
                mc_me_field('consumer2_text','Tarjeta 2 · descripción','textarea','#consumo article:nth-child(2) p','text'),
                mc_me_field('consumer3_title','Tarjeta 3 · título','text','#consumo article:nth-child(3) h3','text'),
                mc_me_field('consumer3_text','Tarjeta 3 · descripción','textarea','#consumo article:nth-child(3) p','text'),
            ]),
            mc_me_group('Simulador: presentación y diseño', 'No modifica tasas, cálculos ni lógica financiera.', [
                mc_me_field('sim_title','Título del simulador','text','#simulador .max-w-3xl h2','text'),
                mc_me_field('sim_text','Descripción del simulador','textarea','#simulador .max-w-3xl h2 + p','text'),
                mc_me_field('sim_background','Imagen de fondo del simulador','image','#simulador','css'),
                mc_me_field('color_green','Verde principal','color','','css',['default'=>'#2e9e43','rules'=>[
                    ['selector'=>':root','property'=>'--mc-green','template'=>'%s'],
                    ['selector'=>'.credit-page .text-brand-green,#simulador h2','property'=>'color','template'=>'%s'],
                ]]),
                mc_me_field('color_orange','Naranja','color','','css',['default'=>'#f26e22','rules'=>[
                    ['selector'=>'.credit-page .text-brand-orange','property'=>'color','template'=>'%s'],
                    ['selector'=>'.credit-page .bg-brand-orange','property'=>'background-color','template'=>'%s'],
                ]]),
            ]),
        ],
    ];
}

function mc_me_microcredit_schema() {
    return [
        'label'=>'Componente de Microcrédito',
        'kind'=>'Historia / programa social',
        'description'=>'Editor adaptado a Microcrédito: portada, proyecto piloto, tres ejes y trayectoria.',
        'groups'=>[
            mc_me_group('Portada', '', [
                mc_me_field('hero_image','Imagen de portada','image','main > section:first-of-type','css'),
                mc_me_field('hero_badge','Etiqueta','text','main > section:first-of-type span','text'),
                mc_me_field('hero_title','Título','text','main > section:first-of-type h1','text'),
                mc_me_field('hero_text','Descripción','textarea','main > section:first-of-type h1 + p','text'),
            ]),
            mc_me_group('Proyecto piloto', '', [
                mc_me_field('pilot_title','Título','text','main > section:nth-of-type(2) h2','text'),
                mc_me_field('pilot_text','Texto principal','textarea','main > section:nth-of-type(2) h2 + p','text'),
                mc_me_field('axis1_title','Eje 1 · título','text','main > section:nth-of-type(2) .grid > div:nth-child(1) h3','text'),
                mc_me_field('axis1_text','Eje 1 · texto','textarea','main > section:nth-of-type(2) .grid > div:nth-child(1) p','text'),
                mc_me_field('axis2_title','Eje 2 · título','text','main > section:nth-of-type(2) .grid > div:nth-child(2) h3','text'),
                mc_me_field('axis2_text','Eje 2 · texto','textarea','main > section:nth-of-type(2) .grid > div:nth-child(2) p','text'),
                mc_me_field('axis3_title','Eje 3 · título','text','main > section:nth-of-type(2) .grid > div:nth-child(3) h3','text'),
                mc_me_field('axis3_text','Eje 3 · texto','textarea','main > section:nth-of-type(2) .grid > div:nth-child(3) p','text'),
            ]),
            mc_me_group('Trayectoria', '', [
                mc_me_field('timeline_title','Título de trayectoria','text','main > section:nth-of-type(3) .text-center h2','text'),
                mc_me_field('timeline1_title','Hito 1 · título','text','main > section:nth-of-type(3) .space-y-8 > div:nth-child(1) h3','text'),
                mc_me_field('timeline1_text','Hito 1 · texto','textarea','main > section:nth-of-type(3) .space-y-8 > div:nth-child(1) p','text'),
                mc_me_field('timeline2_title','Hito 2 · título','text','main > section:nth-of-type(3) .space-y-8 > div:nth-child(2) h3','text'),
                mc_me_field('timeline2_text','Hito 2 · texto','textarea','main > section:nth-of-type(3) .space-y-8 > div:nth-child(2) p','text'),
                mc_me_field('timeline3_title','Hito 3 · título','text','main > section:nth-of-type(3) .space-y-8 > div:nth-child(3) h3','text'),
                mc_me_field('timeline3_text','Hito 3 · texto','textarea','main > section:nth-of-type(3) .space-y-8 > div:nth-child(3) p','text'),
            ]),
            mc_me_group('Diseño', '', [
                mc_me_field('color_green','Verde','color','','css',['default'=>'#0d5c2e','rules'=>[
                    ['selector'=>'main .text-brand-green','property'=>'color','template'=>'%s'],
                    ['selector'=>'main .bg-brand-green','property'=>'background-color','template'=>'%s'],
                ]]),
                mc_me_field('color_orange','Naranja','color','','css',['default'=>'#f26e22','rules'=>[
                    ['selector'=>'main .text-brand-orange','property'=>'color','template'=>'%s'],
                    ['selector'=>'main .bg-brand-orange','property'=>'background-color','template'=>'%s'],
                ]]),
            ]),
        ],
    ];
}

function mc_me_simple_schema($label) {
    return [
        'label'=>$label,
        'kind'=>'Página informativa',
        'description'=>'Editor simplificado para los elementos principales detectados en esta página.',
        'groups'=>[
            mc_me_group('Contenido principal', '', [
                mc_me_field('page_title','Título principal','text','main h1, #contenido-principal h1, body > section h1','text'),
                mc_me_field('page_subtitle','Introducción','textarea','main h1 + p, #contenido-principal h1 + p, body > section h1 + p','text'),
                mc_me_field('hero_image','Imagen principal','image','[data-cms-hero] img, main section:first-of-type img, body > section:first-of-type img','attr',['attr'=>'src']),
            ]),
            mc_me_group('Diseño', '', [
                mc_me_field('color_green','Verde principal','color','','css',['default'=>'#0d5c2e','rules'=>[
                    ['selector'=>':root','property'=>'--mc-green','template'=>'%s'],
                ]]),
                mc_me_field('color_orange','Naranja','color','','css',['default'=>'#f26e22','rules'=>[
                    ['selector'=>':root','property'=>'--mc-orange','template'=>'%s'],
                ]]),
            ]),
        ],
    ];
}

function mc_module_editor_schema($module) {
    $module = basename((string)$module);

    $products = [
        'credito-ordinario.php'=>'Crédito Ordinario',
        'credito-diario.php'=>'Crédito Diario',
        'crediempeno.php'=>'Crediempeño',
        'credimoto.php'=>'Credimoto',
        'educacion.php'=>'Crédito Educación',
        'salud.php'=>'Crédito Salud',
        'esparcimiento.php'=>'Crédito Esparcimiento',
    ];
    if (isset($products[$module])) return mc_me_common_product_schema($products[$module]);

    if ($module === 'credito-grupal.php') return mc_me_group_credit_schema();
    if ($module === 'bancos-comunales.php') return mc_me_group_method_schema('Bancos Comunales');
    if ($module === 'grupos-solidarios.php') return mc_me_group_method_schema('Grupos Solidarios');
    if ($module === 'servicios.php') return mc_me_services_schema();
    if ($module === 'conocenos.php') return mc_me_about_schema();
    if ($module === 'contacto.php') return mc_me_contact_schema();
    if ($module === 'creditos.php') return mc_me_credits_catalog_schema();
    if ($module === 'microcredito.php') return mc_me_microcredit_schema();
    if ($module === 'index.php') {
        return [
            'label'=>'Inicio',
            'kind'=>'Página principal',
            'description'=>'La página principal tiene un editor dedicado para hero, bienvenida, noticias y contenido general.',
            'redirect'=>'contenido.php',
            'groups'=>[],
        ];
    }

    $labels = [
        'noticias.php'=>'Noticias',
        'noticia.php'=>'Detalle de noticia',
        'informacion-legal.php'=>'Información legal',
    ];
    return mc_me_simple_schema($labels[$module] ?? ucwords(str_replace(['-','_'], ' ', pathinfo($module, PATHINFO_FILENAME))));
}

function mc_module_editor_fields($schema) {
    $out = [];
    foreach ((array)($schema['groups'] ?? []) as $group) {
        foreach ((array)($group['fields'] ?? []) as $field) {
            if (!empty($field['key'])) $out[$field['key']] = $field;
        }
    }
    return $out;
}

?>