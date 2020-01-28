<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ViewServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('bootstrap4.tabs', 'tabs');

        Blade::component('bootstrap4.card', 'card');
        Blade::component('bootstrap4.form', 'form');
        Blade::component('bootstrap4.datatable', 'datatable');

        Blade::include('bootstrap4.datatable', 'datatable');

    }
}
