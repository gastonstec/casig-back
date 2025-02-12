<?php

/**
 * Configuración de autenticación de la aplicación en Laravel.
 *
 * Este archivo gestiona los controladores de autenticación y proveedores de usuarios,
 * permitiendo la configuración de diferentes estrategias de seguridad.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Configuración Predeterminada de Autenticación
    |--------------------------------------------------------------------------
    |
    | Aquí se define el sistema de autenticación por defecto para la aplicación.
    | Se pueden cambiar estos valores según los requisitos del proyecto.
    |
    */

    'defaults' => [
        'guard' => 'web', // Especifica el guard predeterminado (sesión para usuarios web)
        'passwords' => 'users', // Especifica la configuración de restablecimiento de contraseñas
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuración de Guards de Autenticación
    |--------------------------------------------------------------------------
    |
    | Laravel permite múltiples "guards" de autenticación, que definen cómo se autentican
    | los usuarios dentro de la aplicación (por sesión, token, etc.).
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session', // Utiliza sesiones para autenticar usuarios
            'provider' => 'users', // Indica qué proveedor de usuarios se utilizará
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuración de Proveedores de Usuarios
    |--------------------------------------------------------------------------
    |
    | Los proveedores de usuarios definen cómo se recuperan los datos de los usuarios
    | desde la base de datos o cualquier otro servicio externo.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent', // Utiliza Eloquent para recuperar los usuarios
            'model' => App\Models\User::class, // Define el modelo de usuario que se usará
        ],
    ],

];
