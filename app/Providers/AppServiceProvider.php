<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * Application service provider. Here, global services for the application 
 * can be registered and configured.
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * This method is used to register any application service 
     * in Laravel's dependency container.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Initialize application services.
     *
     * This method is used to configure any service after all 
     * service providers have been registered.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
