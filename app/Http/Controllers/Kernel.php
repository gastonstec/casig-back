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
        /**
         * Middleware for role management in the system.
         * It verifies whether a user has a specific role before accessing certain routes.
         */
        'role' => \App\Http\Middleware\RoleMiddleware::class, 
    ];
}
