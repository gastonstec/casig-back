<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

/**
 * Configuración del sistema de logging en Laravel.
 *
 * Este archivo define la configuración de logs para la aplicación, utilizando
 * la librería Monolog para manejar múltiples canales de logging y niveles de severidad.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Canal de Log Predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción define el canal de log predeterminado que se utilizará
    | para escribir los registros de la aplicación. El valor debe coincidir
    | con uno de los canales configurados en la lista "channels" de abajo.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Canal de Log para Deprecaciones
    |--------------------------------------------------------------------------
    |
    | Esta opción controla el canal donde se registrarán advertencias
    | relacionadas con características obsoletas de PHP y librerías.
    | Esto ayuda a preparar la aplicación para futuras actualizaciones.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => env('LOG_DEPRECATIONS_TRACE', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuración de Canales de Log
    |--------------------------------------------------------------------------
    |
    | Aquí puedes definir múltiples canales de logging para tu aplicación.
    | Laravel utiliza Monolog, permitiendo configurar diferentes handlers
    | y formatos de logs según las necesidades del sistema.
    |
    | Drivers disponibles: "single", "daily", "slack", "syslog",
    |                      "errorlog", "monolog", "custom", "stack"
    |
    */

    'channels' => [

        // Canal de log apilado que agrupa otros canales
        'stack' => [
            'driver' => 'stack',
            'channels' => explode(',', env('LOG_STACK', 'single')),
            'ignore_exceptions' => false,
        ],

        // Canal que almacena logs en un solo archivo
        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        // Canal de logs diarios (genera un nuevo archivo por día)
        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => env('LOG_DAILY_DAYS', 14),
            'replace_placeholders' => true,
        ],

        // Canal para enviar logs a Slack a través de un Webhook
        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => env('LOG_SLACK_USERNAME', 'Laravel Log'),
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'),
            'level' => env('LOG_LEVEL', 'critical'),
            'replace_placeholders' => true,
        ],

        // Canal para enviar logs a Papertrail
        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],

        // Canal que escribe logs en la salida de error estándar (stderr)
        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],

        // Canal que envía logs al sistema de logging de syslog
        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER),
            'replace_placeholders' => true,
        ],

        // Canal que utiliza el sistema de logs de error de PHP
        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        // Canal de log que descarta cualquier mensaje de log (silencia los logs)
        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        // Canal de log de emergencia utilizado si ningún otro canal está disponible
        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],

    ],

];
