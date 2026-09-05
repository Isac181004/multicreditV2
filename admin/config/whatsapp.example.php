<?php
return [
    // Token permanente o de larga duración de Meta WhatsApp Cloud API.
    // NUNCA subas el archivo whatsapp.php real a GitHub.
    'token' => 'PEGA_AQUI_TU_TOKEN',

    // Phone Number ID del número remitente de WhatsApp Business Cloud API.
    // No es el número de teléfono visible: es el ID numérico que muestra Meta.
    'phone_number_id' => 'PEGA_AQUI_TU_PHONE_NUMBER_ID',

    // Nombre exacto de la plantilla AUTHENTICATION aprobada en WhatsApp Manager.
    'template_name' => 'multicredit_recovery_code',

    // Debe coincidir exactamente con el idioma aprobado en Meta.
    // Si Meta muestra es_ES o es_MX, cambia este valor por ese código.
    'template_lang' => 'es',

    // Usamos la misma versión que muestra actualmente el panel de prueba de Meta.
    'graph_version' => 'v25.0',

    // Para plantilla AUTHENTICATION con botón OTP "Copiar código".
    // El sistema enviará el OTP tanto al BODY como al botón dinámico.
    'template_mode' => 'authentication_copy_code',
];
