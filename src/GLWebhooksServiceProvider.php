<?php

namespace DependenCI\GLWebhooks;

use Illuminate\Support\ServiceProvider;

class GLWebhooksServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/glwebhooks.php' => config_path('glwebhooks.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/glwebhooks.php', 'glwebhooks');

        $this->app->make('DependenCI\GLWebhooks\GLWebhooks');

        $this->app->bind('glwebhooks', function($app) {
            return new GLWebhooks();
        });
    }
}
