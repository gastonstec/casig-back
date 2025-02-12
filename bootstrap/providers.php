<?php

/**
 * Archivo de configuración de proveedores de servicios en Laravel.
 *
 * Este archivo define los proveedores de servicios que se cargarán automáticamente
 * en la aplicación. Los proveedores de servicios son la forma en que Laravel
 * gestiona la inyección de dependencias y la configuración de paquetes externos.
 */

return [
    /**
     * Proveedor de servicios principal de la aplicación.
     * 
     * AppServiceProvider se encarga de registrar configuraciones esenciales
     * y servicios utilizados en la aplicación.
     */
    App\Providers\AppServiceProvider::class,
];
