<?php

namespace ZWay;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/zway.php', 'zway'
        );
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
    //            UserSumsUpdateCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/zway.php' => config_path('zway.php'),
        ]);
    }
}
