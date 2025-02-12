<?php

/**
 * Configuración del sistema de colas en Laravel.
 *
 * Este archivo define las conexiones y parámetros para la gestión de colas
 * de trabajos en segundo plano. Laravel admite varios backends de colas,
 * incluyendo base de datos, Redis, Amazon SQS y más.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Conexión Predeterminada de la Cola
    |--------------------------------------------------------------------------
    |
    | Esta opción define la conexión de cola predeterminada que se utilizará.
    | Laravel proporciona múltiples opciones de backend para manejar tareas
    | en segundo plano de manera eficiente.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Conexiones de Colas Disponibles
    |--------------------------------------------------------------------------
    |
    | Se configuran las conexiones para cada backend de cola disponible.
    | Laravel permite definir múltiples conexiones y utilizar la más
    | adecuada según el entorno.
    |
    | Backends compatibles: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        // Cola síncrona: los trabajos se ejecutan inmediatamente
        'sync' => [
            'driver' => 'sync',
        ],

        // Cola basada en base de datos
        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'),
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            'queue' => env('DB_QUEUE', 'default'),
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90), // Tiempo antes de reintentar
            'after_commit' => false,
        ],

        // Cola basada en Beanstalkd (requiere instalación de Beanstalkd)
        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for' => 0,
            'after_commit' => false,
        ],

        // Cola basada en Amazon SQS
        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        // Cola basada en Redis (recomendada para alta concurrencia)
        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'),
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Configuración de Lotes de Trabajos (Job Batching)
    |--------------------------------------------------------------------------
    |
    | Aquí se define la configuración de almacenamiento para trabajos en lote.
    | Laravel permite agrupar trabajos en "batches" para su ejecución.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuración de Trabajos Fallidos
    |--------------------------------------------------------------------------
    |
    | Se definen las opciones de almacenamiento para registrar trabajos fallidos.
    | Esto permite depurar errores y reintentar trabajos sin perder información.
    |
    | Drivers soportados: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];
