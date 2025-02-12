<?php

/**
 * Configuración de servicios de terceros en Laravel.
 *
 * Este archivo almacena las credenciales para servicios de terceros como Mailgun,
 * Postmark, AWS, Slack y otros. Permite centralizar la configuración de estas
 * integraciones para que los paquetes y la aplicación puedan acceder fácilmente
 * a ellas mediante variables de entorno.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Servicio de Postmark
    |--------------------------------------------------------------------------
    |
    | Postmark es un servicio de envío de correos electrónicos transaccionales.
    | Aquí se almacena el token de autenticación necesario para hacer uso
    | de la API de Postmark.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Servicio de Amazon SES
    |--------------------------------------------------------------------------
    |
    | Amazon Simple Email Service (SES) permite enviar correos electrónicos
    | a gran escala con alta fiabilidad. Se requiere la clave de acceso
    | y la región en la que se encuentra configurado el servicio.
    |
    */

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Servicio Resend
    |--------------------------------------------------------------------------
    |
    | Resend es una alternativa para el envío de correos electrónicos.
    | Aquí se almacena la clave API utilizada para autenticar las peticiones.
    |
    */

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Integración con Slack
    |--------------------------------------------------------------------------
    |
    | Esta configuración permite enviar notificaciones a un canal de Slack
    | utilizando un bot autenticado. Se requiere el token OAuth del bot
    | y el nombre del canal predeterminado para recibir las notificaciones.
    |
    */

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Autenticación con Google
    |--------------------------------------------------------------------------
    |
    | Configuración para el inicio de sesión con Google mediante OAuth.
    | Se requieren el ID del cliente, la clave secreta y la URL de redirección.
    |
    */

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'), // ID del cliente de Google
        'client_secret' => env('GOOGLE_CLIENT_SECRET'), // Clave secreta del cliente
        'redirect' => env('GOOGLE_REDIRECT_URI'), // URL de redirección tras autenticación
    ],

];
