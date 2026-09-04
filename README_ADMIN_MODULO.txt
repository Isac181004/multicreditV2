MÓDULO DE ADMINISTRACIÓN MULTICREDIT - SIN SQL
================================================

ACCESO
------
1. Copie la carpeta multicreditV2 completa a su servidor/XAMPP.
2. Abra: http://localhost/multicreditV2/admin/
3. Primera vez: el sistema lo enviará a admin/setup.php.
4. Cree su usuario y contraseña.
5. Luego ingrese normalmente en admin/login.php.

CREDENCIALES
------------
Se guardan en: admin/config/admin_credentials.js
La contraseña NO se guarda en texto plano: se almacena como hash bcrypt.
El archivo está protegido por .htaccess en Apache/XAMPP.

DATOS SIN SQL
-------------
- cms/data/site.json   : textos, contacto, hero, logo y configuración pública.
- cms/data/news.json   : noticias y publicaciones.
- uploads/news/        : imágenes de noticias.
- uploads/media/       : biblioteca de imágenes.

FUNCIONES DEL PANEL
-------------------
- Dashboard.
- Crear, editar y eliminar noticias.
- Publicar/ocultar noticias.
- Subir fotografía por noticia.
- Cambiar logo, imagen principal y otros fondos.
- Editar textos principales de la página de inicio.
- Editar dirección, correo, teléfonos y WhatsApp.
- Biblioteca de imágenes.
- Cambiar usuario y contraseña.
- Vista directa del sitio público.

INTEGRACIÓN REALIZADA
---------------------
- index.php ahora muestra los textos e imágenes administrables y las últimas noticias desde JSON.
- noticias.php ahora se genera desde las noticias administradas.
- encabezado.php usa el logo configurado.
- footer.php usa logo, contacto, teléfonos, WhatsApp y textos configurados.
- contacto.php toma los datos de contacto administrables.

PERMISOS
--------
En hosting Linux, las carpetas cms/data y uploads deben tener permiso de escritura para PHP (normalmente 775).
En XAMPP para Windows normalmente funciona sin cambios.

SEGURIDAD
---------
Guardar credenciales en un archivo JS dentro del proyecto no es tan robusto como una base de datos o variables de entorno.
Para respetar el requisito sin SQL, se usa un hash bcrypt y .htaccess para bloquear acceso HTTP directo al archivo.
Si el servidor no usa Apache, configure también el servidor web para bloquear /admin/config y /cms/data.
