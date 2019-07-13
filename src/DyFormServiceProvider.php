<?php

namespace Peterzaccha\DyForm;

use Illuminate\Support\ServiceProvider;

class DyFormServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/dy-form.php' => config_path('dy-form.php'),
        ], 'config');
        $this->publishes([
            __DIR__.'/../database/migrations/' => base_path('/database/migrations')
        ], 'migrations');
        $this->publishes([
            __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/dyform'),
        ], 'views');
    //    $this->loadRoutesFrom(__DIR__.'/routes.php');
     //   $this->loadMigrationsFrom(__DIR__ . '/../database/migrations/');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('dy',function (){
            return new DyForm();
        });
    }

    public function provides()
    {
        return ['dy'];
    }
}