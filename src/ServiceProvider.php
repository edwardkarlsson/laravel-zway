<?php

namespace ZWay;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/zway.php', 'zway'
        );
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/zway.php' => config_path('zway.php'),
        ]);
    }
}
