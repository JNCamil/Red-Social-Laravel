<?php 
/*
* Para generar la autenticación en laravel usamos el comando en consola:

composer require laravel/ui
php artisan ui:auth
npm install
npm run dev


php artisan breeze:install
npm install
npm run dev
---------------------------------------------------------------------------
Ejecutar la Construcción de Vite:
Asegúrate de haber ejecutado el proceso de construcción de Vite. Puedes hacerlo con el siguiente comando:

bash
Copiar código
npm run build

Este comando debería generar el archivo manifest.json necesario en el directorio public/build.
----------------------------------------------------------------------------
MODELOS -> USAMOS EL ORM -> ELOQUENCE
Laravel crea el modelo de user, y viene con campos como name, email, password
campos ocultos en los array como password o remmember token para recordar inicio de sesión

Más documentación en modelos de este proyecto, el primero era Image.
----------------------------------------------------------------------------
AUTH LARAVEL
Laravel ya cuenta con una autenticación de usuarios, básico con métodos y vistas necesarias para el login y registro de usuarios
Para hacerlo ejecutamos el comando: php artisan make:auth
Generará un controlador, métodos, vistas, rutas necesarias, 
me generará en route web.php Auth::route que son rutas especiales y generará un controlador
----------------------------------------------------------------------------
VITE
Para importar estilos propios con esta directiva, se carga esto en app de layout:
   <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
Esto lo que hace es ejecutar los import de app.scss
// Fonts
@import url('https://fonts.bunny.net/css?family=Nunito');

// Variables
@import 'variables';

// Bootstrap
@import 'bootstrap/scss/bootstrap';

// Importa tu CSS adicional
@import '../css/style';  

Si quiero estilos propios tengo que meter la última línea y ejecutar 
npm run dev -> para comprobar cambios y 
npm run build -> para ponerlos ya

*/


?>