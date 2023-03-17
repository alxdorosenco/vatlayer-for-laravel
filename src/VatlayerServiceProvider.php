<?php

namespace AlxDorosenco\VatlayerForLaravel;

use AlxDorosenco\VatlayerForLaravel\Factory\VatlayerFactory;
use Illuminate\Support\ServiceProvider;

class VatlayerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/vatlayer.php', 'vatlayer');

        $this->app->bind('vatlayer-factory', function($app) {
            return new VatlayerFactory();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/vatlayer.php' => config_path('vatlayer.php')
            ], 'config');
        }
    }
}
