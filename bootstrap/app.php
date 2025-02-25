<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

/**
 * Laravel application configuration.
 *
 * This file defines the main configuration of the application, including
 * routing, middleware, and exception handling.
 */

return Application::configure(basePath: dirname(__DIR__))

    // Routing configuration
    ->withRouting(
        web: __DIR__.'/../routes/web.php', // Web routes
        commands: __DIR__.'/../routes/console.php', // Console command routes
        health: '/up', // Health check route
    )

    // Global middleware configuration
    ->withMiddleware(function (Middleware $middleware) {
        // Custom middleware can be registered here
    })

    // Exception handling configuration
    ->withExceptions(function (Exceptions $exceptions) {
        // Exceptions can be customized here
    })

    ->create();
