<?php

namespace Modules\Account\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Account\Database\Seeders\DatabaseSeeder;
use Modules\Account\Http\Resources\AbilitiesResource;

class AccountServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(module_path('Account', 'Database/Migrations')); 
        $this->registerResources();
       
    }

    /**
     * Boot wrapping Http Resources
     * 
     * @return void
     */
    protected function registerResources()
    {
        AbilitiesResource::withoutWrapping();
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
        

        $this->loadSeedsFrom();
    }

    /**
     * Loads a seeds.
     *
     * @return void
     */
    private function loadSeedsFrom()
    {
        
        $this->app['seed.handler']->register(
            DatabaseSeeder::class
        );
        
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Account', 'Config/config.php') => config_path('account.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Account', 'Config/config.php'), 'account'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/account');

        $sourcePath = module_path('Account', 'Resources/views');
        $accountSourcePath = module_path('Account', 'Resources/views/account');
        $roleSourcePath = module_path('Account', 'Resources/views/role');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/account';
        }, \Config::get('view.paths')), [$accountSourcePath]), 'account');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/account';
        }, \Config::get('view.paths')), [$roleSourcePath]), 'role');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/account');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'account');
        } else {
            $this->loadTranslationsFrom(module_path('Account', 'Resources/lang'), 'account');
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
            app(Factory::class)->load(module_path('Account', 'Database/factories'));
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
