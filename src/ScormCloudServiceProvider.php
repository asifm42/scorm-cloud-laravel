<?php

namespace AsifM42\ScormCloudGateway;

use Illuminate\Support\ServiceProvider;

class ScormCloudServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('scormcloud', function () {
            return $this->app->make('ScormCloudGateway');
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/scormcloud.php' => config_path('scormcloud.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../config/scormcloud.php', 'scormcloud');
    }

}