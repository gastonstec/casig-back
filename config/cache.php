<?php

use Illuminate\Support\Str;

/**
 * Configuración del sistema de caché en Laravel.
 *
 * Este archivo define los diferentes almacenes de caché que la aplicación puede usar,
 * permitiendo mejorar el rendimiento a través de mecanismos de almacenamiento rápido.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Almacén de Caché Predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción define el almacén de caché que se utilizará por defecto en la
    | aplicación. Se puede modificar a través de la variable de entorno CACHE_STORE.
    |
    */

    'default' => env('CACHE_STORE', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Almacenes de Caché Disponibles
    |--------------------------------------------------------------------------
    |
    | Se pueden definir múltiples almacenes de caché, cada uno utilizando un
    | controlador diferente. Esto permite tener distintos tipos de caché en la
    | aplicación según los requisitos del sistema.
    |
    | Controladores soportados: "array", "database", "file", "memcached",
    |                            "redis", "dynamodb", "octane", "null"
    |
    */

    'stores' => [

        // Almacén basado en arrays (no persistente)
        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        // Almacén basado en base de datos (persistente)
        'database' => [
            'driver' => 'database',
            'connection' => env('DB_CACHE_CONNECTION'),
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        ],

        // Almacén basado en archivos (persistente)
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        // Almacén basado en Memcached (requiere configuración de servidor Memcached)
        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000, // Tiempo de espera para la conexión
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        // Almacén basado en Redis (recomendado para aplicaciones de alto rendimiento)
        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
        ],

        // Almacén basado en DynamoDB (para aplicaciones en AWS)
        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        // Almacén basado en Octane (para aplicaciones con Laravel Octane)
        'octane' => [
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Prefijo para las Claves de Caché
    |--------------------------------------------------------------------------
    |
    | Se define un prefijo para evitar colisiones cuando se usan sistemas de caché
    | compartidos con otras aplicaciones en el mismo entorno.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),

];
