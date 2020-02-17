<?php

namespace Modules\Addresses\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Addresses\Entities\Address;

class RelationServiceProvider extends ServiceProvider
{


    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

        Relation::morphMap([
            'address' => Address::class,
        ]);

    }
}
