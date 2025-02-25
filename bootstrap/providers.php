<?php

/**
 * Laravel service provider configuration file.
 *
 * This file defines the service providers that will be automatically loaded
 * in the application. Service providers are how Laravel manages 
 * dependency injection and external package configuration.
 */

return [
    /**
     * Main application service provider.
     * 
     * AppServiceProvider is responsible for registering essential configurations
     * and services used in the application.
     */
    App\Providers\AppServiceProvider::class,
];
