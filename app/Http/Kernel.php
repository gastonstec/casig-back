<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\RoleMiddleware;

/**
 * Class Kernel
 *
 * The application Kernel manages Laravel's middleware stack,
 * including global middleware and route-specific middleware.
 *
 * @package App\Http
 */
class Kernel extends HttpKernel
{
    /**
     * Definition of custom route middleware.
     * 
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'role' => \Spatie\Permission\Middleware\RoleMiddleware::class, // ✅ Asegúrate de que esté
        'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
    ];
    
}
