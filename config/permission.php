<?php

/**
 * Configuración del paquete Spatie Laravel Permission.
 *
 * Este archivo contiene las configuraciones principales para manejar roles
 * y permisos en la aplicación. Utiliza la biblioteca de Spatie para facilitar
 * la gestión de autorizaciones.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Modelos de Permisos y Roles
    |--------------------------------------------------------------------------
    |
    | Se definen los modelos que el paquete usará para manejar permisos y roles.
    | Estos modelos deben implementar las interfaces adecuadas de Spatie.
    |
    */

    'models' => [
        'permission' => Spatie\Permission\Models\Permission::class,
        'role' => Spatie\Permission\Models\Role::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Nombres de Tablas
    |--------------------------------------------------------------------------
    |
    | Se definen los nombres de las tablas utilizadas para almacenar roles,
    | permisos y sus relaciones con los usuarios u otros modelos.
    |
    */

    'table_names' => [
        'roles' => 'roles',
        'permissions' => 'permissions',
        'model_has_permissions' => 'model_has_permissions',
        'model_has_roles' => 'model_has_roles',
        'role_has_permissions' => 'role_has_permissions',
    ],

    /*
    |--------------------------------------------------------------------------
    | Nombres de Columnas
    |--------------------------------------------------------------------------
    |
    | Configuración de los nombres de columnas utilizados en las tablas de
    | relación. Se pueden personalizar según las necesidades del proyecto.
    |
    */

    'column_names' => [
        'role_pivot_key' => null, // Default: 'role_id'
        'permission_pivot_key' => null, // Default: 'permission_id'
        'model_morph_key' => 'model_id',
        'team_foreign_key' => 'team_id',
    ],

    /*
    |--------------------------------------------------------------------------
    | Registro del Método de Verificación de Permisos
    |--------------------------------------------------------------------------
    |
    | Si se establece en `true`, se registrará un método en el Gate de Laravel
    | para comprobar los permisos automáticamente.
    |
    */

    'register_permission_check_method' => true,

    /*
    |--------------------------------------------------------------------------
    | Escucha de Eventos en Laravel Octane
    |--------------------------------------------------------------------------
    |
    | Si se activa, Laravel escuchará eventos de finalización en Octane
    | para restablecer permisos en cada solicitud o tarea completada.
    |
    */

    'register_octane_reset_listener' => false,

    /*
    |--------------------------------------------------------------------------
    | Implementación de Equipos
    |--------------------------------------------------------------------------
    |
    | Si se activa, se utilizará la clave foránea de `team_id` en las tablas
    | de permisos y roles, permitiendo la segmentación por equipos.
    |
    */

    'teams' => false,

    /*
    |--------------------------------------------------------------------------
    | Integración con Passport
    |--------------------------------------------------------------------------
    |
    | Si se habilita, los permisos se validarán utilizando las credenciales
    | de cliente de Laravel Passport.
    |
    */

    'use_passport_client_credentials' => false,

    /*
    |--------------------------------------------------------------------------
    | Configuración de Mensajes en Excepciones
    |--------------------------------------------------------------------------
    |
    | Si se habilitan, los mensajes de excepciones incluirán el permiso o
    | rol requerido, lo que puede ser un riesgo de seguridad en algunos casos.
    |
    */

    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,

    /*
    |--------------------------------------------------------------------------
    | Permisos con Wildcards
    |--------------------------------------------------------------------------
    |
    | Si se activa, se permitirá el uso de comodines (`*`) en los permisos.
    | Útil para definir permisos más flexibles.
    |
    */

    'enable_wildcard_permission' => false,

    /*
    |--------------------------------------------------------------------------
    | Configuración de Caché
    |--------------------------------------------------------------------------
    |
    | Para mejorar el rendimiento, los permisos y roles se almacenan en caché
    | durante un período definido. Se puede especificar un driver de caché
    | personalizado si es necesario.
    |
    */

    'cache' => [
        'expiration_time' => \DateInterval::createFromDateString('24 hours'),
        'key' => 'spatie.permission.cache',
        'store' => 'default',
    ],
];
