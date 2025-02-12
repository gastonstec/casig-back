<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\RoleMiddleware;

/**
 * Class Kernel
 *
 * El Kernel de la aplicación gestiona la pila de middleware de Laravel,
 * incluyendo los middleware globales y los middleware específicos de rutas.
 *
 * @package App\Http
 */
class Kernel extends HttpKernel
{
    /**
     * Definición de middleware de rutas personalizados.
     * 
     * @var array
     */
    protected $routeMiddleware = [
        /**
         * Middleware para la gestión de roles en el sistema.
         * Se encarga de verificar si un usuario tiene un rol específico antes de acceder a ciertas rutas.
         */
        'role' => \App\Http\Middleware\RoleMiddleware::class, 
    ];
}
