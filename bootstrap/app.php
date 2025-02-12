<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

/**
 * Configuración de la aplicación Laravel.
 *
 * Este archivo define la configuración principal de la aplicación, incluyendo
 * el enrutamiento, el middleware y la gestión de excepciones.
 */

return Application::configure(basePath: dirname(__DIR__))

    // Configuración de rutas
    ->withRouting(
        web: __DIR__.'/../routes/web.php', // Rutas web
        commands: __DIR__.'/../routes/console.php', // Rutas de comandos de consola
        health: '/up', // Ruta de verificación de estado
    )

    // Configuración de middleware global
    ->withMiddleware(function (Middleware $middleware) {
        // Aquí se pueden registrar middleware personalizados
    })

    // Configuración de manejo de excepciones
    ->withExceptions(function (Exceptions $exceptions) {
        // Aquí se pueden personalizar las excepciones
    })

    ->create();
