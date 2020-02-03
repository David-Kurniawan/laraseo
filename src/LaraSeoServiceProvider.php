<?php

namespace VidLab\LaraSeo;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use VidLab\LaraSeo\Contracts;
use VidLab\LaraSeo\LaraOpenGraph;
use VidLab\LaraSeo\LaraTwitterCard;

class LaraSeoServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'vidlab');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'vidlab');
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
        $this->mergeConfigFrom(__DIR__.'/../config/laraseo.php', 'laraseo');

        // Register the service the package provides.
        $this->app->singleton('laraseo', function ($app) {
            return new LaraSeo();
        });

        $this->app->singleton('laraopengraph', function ($app) {
            return new LaraOpenGraph();
        });

        $this->app->singleton('laratwittercard', function ($app) {
            return new LaraTwitterCard();
        });

        $this->app->bind(Contracts\SeoFriendly::class, 'laraseo');
        $this->app->bind(Contracts\OpenGraphContract::class, 'laraopengraph');
        $this->app->bind(Contracts\TwitterCardContract::class, 'laratwittercard');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Contracts\SeoFriendly::class,
            Contracts\OpenGraphContract::class,
            Contracts\TwitterCardContract::class,
            'laraseo',
            'laraopengraph',
            'laratwittercard'
        ];
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
            __DIR__.'/../config/laraseo.php' => config_path('laraseo.php'),
        ], 'laraseo.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/vidlab'),
        ], 'laraseo.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/vidlab'),
        ], 'laraseo.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/vidlab'),
        ], 'laraseo.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
