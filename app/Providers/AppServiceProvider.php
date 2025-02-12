<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * Proveedor de servicios de la aplicación. Aquí se pueden registrar y configurar
 * servicios globales para la aplicación.
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Registrar servicios de la aplicación.
     *
     * Este método se usa para registrar cualquier servicio de la aplicación en
     * el contenedor de dependencias de Laravel.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Inicializar servicios de la aplicación.
     *
     * Este método se usa para configurar cualquier servicio después de que
     * todos los proveedores de servicios hayan sido registrados.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
