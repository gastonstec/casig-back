<?php

/**
 * Archivo de configuración de la aplicación en Laravel.
 *
 * Este archivo gestiona los valores esenciales que determinan el comportamiento de la aplicación,
 * incluyendo su entorno, URL base, zona horaria, localización y claves de encriptación.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Nombre de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Nombre de la aplicación que se mostrará en notificaciones y otros elementos de UI.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Entorno de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Define el entorno en el que la aplicación se ejecuta. Se recomienda gestionarlo
    | mediante el archivo ".env" para facilitar la configuración.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Modo de Depuración de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Si está habilitado, Laravel mostrará mensajes detallados de error. En producción,
    | se recomienda deshabilitarlo para evitar exponer información sensible.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Define la URL base de la aplicación, utilizada en comandos de Artisan y generación de enlaces.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Zona Horaria de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Determina la zona horaria utilizada en toda la aplicación. Se recomienda establecerla
    | acorde a la región donde opera la mayoría de los usuarios.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Configuración de Localización
    |--------------------------------------------------------------------------
    |
    | Define el idioma por defecto de la aplicación y su idioma de respaldo.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Clave de Encriptación
    |--------------------------------------------------------------------------
    |
    | Esta clave es utilizada por los servicios de encriptación de Laravel y debe ser una cadena
    | aleatoria de 32 caracteres. Se recomienda gestionarla a través de variables de entorno.
    |
    */

    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Modo de Mantenimiento
    |--------------------------------------------------------------------------
    |
    | Configura el modo de mantenimiento de la aplicación. Laravel permite controlarlo
    | a través de diferentes drivers como "file" o "cache".
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
