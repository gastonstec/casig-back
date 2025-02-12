<?php

use Illuminate\Support\Str;

/**
 * Configuración de sesiones en Laravel.
 *
 * Este archivo permite definir la configuración de las sesiones dentro de la aplicación.
 * Laravel ofrece múltiples drivers de sesión como base de datos, archivos, cookies,
 * caché y más, permitiendo adaptar el almacenamiento de sesiones según las necesidades.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Driver de sesión predeterminado
    |--------------------------------------------------------------------------
    |
    | Define el almacenamiento de sesión a utilizar en la aplicación.
    | Laravel soporta varios tipos de almacenamiento de sesión:
    | 
    | Opciones disponibles: "file", "cookie", "database", "apc",
    |                       "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Duración de la sesión
    |--------------------------------------------------------------------------
    |
    | Número de minutos que una sesión puede permanecer activa antes de expirar.
    | Si se desea que expire cuando el usuario cierre el navegador, se debe activar
    | la opción `expire_on_close`.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Cifrado de la sesión
    |--------------------------------------------------------------------------
    |
    | Determina si los datos de la sesión deben almacenarse encriptados antes de
    | ser guardados en el almacenamiento seleccionado. Esto proporciona mayor
    | seguridad para la información almacenada en sesiones.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Ubicación de almacenamiento de archivos de sesión
    |--------------------------------------------------------------------------
    |
    | Solo aplicable cuando el `driver` de sesión es "file".
    | Especifica el directorio donde se almacenarán los archivos de sesión.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Configuración para almacenamiento en base de datos
    |--------------------------------------------------------------------------
    |
    | Si se utiliza el `driver` "database" o "redis", se deben especificar la conexión
    | y la tabla donde se guardarán las sesiones.
    |
    */

    'connection' => env('SESSION_CONNECTION'),
    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Almacén de caché para sesiones
    |--------------------------------------------------------------------------
    |
    | Si se usa un `driver` de caché como "apc", "memcached" o "redis", este
    | parámetro define qué caché se debe utilizar para almacenar las sesiones.
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Probabilidad de limpiar sesiones caducadas
    |--------------------------------------------------------------------------
    |
    | Algunos almacenamientos de sesión requieren limpieza manual de datos caducados.
    | Esta opción define la probabilidad de que la limpieza se ejecute en una solicitud.
    | El valor [2, 100] significa que hay un 2% de probabilidad de que se ejecute.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nombre de la cookie de sesión
    |--------------------------------------------------------------------------
    |
    | Define el nombre de la cookie de sesión que Laravel generará y enviará al cliente.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Configuración de cookies
    |--------------------------------------------------------------------------
    |
    | Define las reglas y restricciones para las cookies de sesión, incluyendo el
    | dominio, la seguridad HTTPS y la política SameSite.
    |
    */

    'path' => env('SESSION_PATH', '/'),
    'domain' => env('SESSION_DOMAIN'),
    'secure' => env('SESSION_SECURE_COOKIE'),
    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Política Same-Site de la cookie de sesión
    |--------------------------------------------------------------------------
    |
    | Controla cómo las cookies de sesión son manejadas en peticiones cruzadas
    | entre sitios web. Se recomienda mantenerlo en "lax" para evitar problemas
    | con autenticaciones y seguridad CSRF.
    |
    | Opciones: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Cookies de sesión particionadas
    |--------------------------------------------------------------------------
    |
    | Si se activa esta opción, las cookies estarán restringidas al sitio principal
    | en un contexto de múltiples sitios. Esto solo funciona si la cookie es
    | "secure" y Same-Site está en "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
