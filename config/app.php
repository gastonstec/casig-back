<?php

/**
 * Laravel application configuration file.
 *
 * This file manages the essential values that determine the application's behavior,
 * including its environment, base URL, timezone, localization, and encryption keys.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | The name of the application that will be displayed in notifications
    | and other UI elements.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | Defines the environment in which the application runs. It is recommended
    | to manage this through the ".env" file for easier configuration.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | If enabled, Laravel will display detailed error messages. In production,
    | it is recommended to disable it to prevent exposing sensitive information.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | Defines the base URL of the application, used in Artisan commands and link generation.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Determines the timezone used throughout the application. It is recommended
    | to set it according to the region where most users operate.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Localization Configuration
    |--------------------------------------------------------------------------
    |
    | Defines the default language of the application and its fallback language.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by Laravel's encryption services and must be a random
    | 32-character string. It is recommended to manage it through environment variables.
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
    | Maintenance Mode
    |--------------------------------------------------------------------------
    |
    | Configures the application's maintenance mode. Laravel allows managing it
    | through different drivers such as "file" or "cache".
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
