<?php

namespace Modules\Company\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{


    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

       /*
        \Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            return \Auth::check() && \Hash::check($value, \Auth::user()->getAuthPassword());
        });
        */
    }
}
