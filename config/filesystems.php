<?php

/**
 * Configuración de los sistemas de archivos en Laravel.
 *
 * Este archivo define la configuración de almacenamiento de archivos,
 * permitiendo trabajar con discos locales, servidores FTP, almacenamiento en la nube (S3) y más.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Disco Predeterminado del Sistema de Archivos
    |--------------------------------------------------------------------------
    |
    | Esta opción define el disco de almacenamiento predeterminado para la aplicación.
    | Puede configurarse para utilizar almacenamiento local o en la nube según sea necesario.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Discos de Almacenamiento
    |--------------------------------------------------------------------------
    |
    | Laravel permite configurar múltiples "discos" de almacenamiento, los cuales pueden
    | utilizar distintos controladores como local, FTP, SFTP o Amazon S3.
    |
    | Controladores soportados: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        // Almacenamiento en disco local dentro del directorio "storage/app/private"
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        // Almacenamiento público accesible desde la web (storage/app/public)
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        // Almacenamiento en Amazon S3
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Enlaces Simbólicos
    |--------------------------------------------------------------------------
    |
    | Laravel permite crear enlaces simbólicos que apuntan a directorios de almacenamiento
    | para que los archivos sean accesibles públicamente mediante el comando:
    |
    | php artisan storage:link
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
