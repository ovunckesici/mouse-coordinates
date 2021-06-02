<?php

namespace Doranetyazillim\MouseCoordinates;

use Illuminate\Support\ServiceProvider;

class MouseCoordinatesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('mouse-coordinates.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'mouse-coordinates');

        $this->app->singleton('mouse-coordinates', function ($app) {
            return new MouseCoordinates($app->config['mouse-coordinates']);
        });
    }
}
