<?php

namespace Modules\Account\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Account\Http\ViewComposers\MustVerifyIdentifier;
use Modules\Account\Http\ViewComposers\PermissionsComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::composer('*', PermissionsComposer::class);
        View::composer('template::layouts.page', MustVerifyIdentifier::class);
    }
}
