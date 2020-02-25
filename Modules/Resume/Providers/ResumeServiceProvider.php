<?php

namespace Modules\Resume\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class ResumeServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(module_path('Resume', 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(ViewServiceProvider::class);
        $this->app->register(RelationServiceProvider::class);
        $this->app->register(ValidatorServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        $this->app->register(MenuServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Resume', 'Config/config.php') => config_path('resume.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Resume', 'Config/config.php'), 'resume'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/resume');

        $sourcePath = module_path('Resume', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/resume';
        }, \Config::get('view.paths')), [$sourcePath]), 'resume');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/resume');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'resume');
        } else {
            $this->loadTranslationsFrom(module_path('Resume', 'Resources/lang'), 'resume');
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
            app(Factory::class)->load(module_path('Resume', 'Database/factories'));
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
