<?php

/**
 * Configuración de correo en Laravel.
 *
 * Este archivo define los ajustes utilizados para el envío de correos electrónicos.
 * Laravel soporta múltiples servicios de correo como SMTP, Sendmail, Mailgun, SES,
 * Postmark, entre otros.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Mailer Predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción controla el servicio de correo que se usará para enviar 
    | los emails de la aplicación, a menos que se especifique otro en 
    | el momento del envío. Se puede configurar dentro del array "mailers".
    |
    | Valores soportados: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |                     "postmark", "resend", "log", "array",
    |                     "failover", "roundrobin"
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Configuración de los Mailers
    |--------------------------------------------------------------------------
    |
    | Aquí se pueden configurar los distintos mailers que la aplicación usará.
    | Laravel permite definir múltiples configuraciones para utilizar distintos
    | métodos de envío según se requiera.
    |
    */

    'mailers' => [

        // Configuración para SMTP (protocolo estándar de correo)
        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        // Configuración para Amazon SES
        'ses' => [
            'transport' => 'ses',
        ],

        // Configuración para Postmark
        'postmark' => [
            'transport' => 'postmark',
            // Opcionalmente se puede definir un stream de mensajes
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        // Configuración para Resend (servicio de reenvío de correos)
        'resend' => [
            'transport' => 'resend',
        ],

        // Configuración para Sendmail (correo en servidores Unix)
        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        // Registro de correos en logs (para pruebas)
        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        // Almacenar correos en un array (sin enviarlos)
        'array' => [
            'transport' => 'array',
        ],

        // Estrategia de failover: intenta SMTP, luego Log si falla
        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        // Estrategia de balanceo Round Robin (SES y Postmark)
        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Dirección Global "From"
    |--------------------------------------------------------------------------
    |
    | Se puede definir un remitente global para todos los correos enviados
    | desde la aplicación. Aquí se especifica el nombre y dirección de correo
    | que se usará como "De:" en los emails.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

];
