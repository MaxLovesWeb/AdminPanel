<?php

namespace Modules\Addresses\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class AddressesServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Addresses', 'Database/Migrations'));

        \Blade::include('addresses::gmaps.map', 'gmap');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(AuthServiceProvider::class);

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(ViewServiceProvider::class);
        $this->app->register(RelationServiceProvider::class);
        $this->app->register(ValidatorServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Addresses', 'Config/config.php') => config_path('addresses.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Addresses', 'Config/config.php'), 'addresses'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/addresses');

        $sourcePath = module_path('Addresses', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/addresses';
        }, \Config::get('view.paths')), [$sourcePath]), 'addresses');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/addresses');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'addresses');
        } else {
            $this->loadTranslationsFrom(module_path('Addresses', 'Resources/lang'), 'addresses');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Addresses', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
