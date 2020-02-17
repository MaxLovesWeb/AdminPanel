<?php

namespace Modules\Account\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\Relations\Relation;

use Modules\Account\Database\Seeders\DatabaseSeeder;
use Modules\Account\Entities\User;
use Modules\Account\Entities\Role;

class AccountServiceProvider extends ServiceProvider
{

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/users';


    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Account', 'Database/Migrations'));

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
        $this->app->register(MenuServiceProvider::class);


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
        $userSourcePath = module_path('Account', 'Resources/views/user');
        $roleSourcePath = module_path('Account', 'Resources/views/role');
        $permissionSourcePath = module_path('Account', 'Resources/views/permission');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/account';
        }, \Config::get('view.paths')), [$sourcePath]), 'account');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/account';
        }, \Config::get('view.paths')), [$userSourcePath]), 'user');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/account';
        }, \Config::get('view.paths')), [$roleSourcePath]), 'role');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/account';
        }, \Config::get('view.paths')), [$permissionSourcePath]), 'permission');
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
