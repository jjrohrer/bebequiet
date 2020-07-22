<?php

namespace jjrohrer\BeBeQuiet;

use Illuminate\Support\ServiceProvider;

class BeBeQuietServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'jjrohrer');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'jjrohrer');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bebequiet.php', 'bebequiet');

        // Register the service the package provides.
        $this->app->singleton('bebequiet', function ($app) {
            return new BeBeQuiet;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bebequiet'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/bebequiet.php' => config_path('bebequiet.php'),
        ], 'bebequiet.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/jjrohrer'),
        ], 'bebequiet.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/jjrohrer'),
        ], 'bebequiet.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/jjrohrer'),
        ], 'bebequiet.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
