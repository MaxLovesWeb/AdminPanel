<?php

namespace Modules\Account\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Account\Entities\User;
use Modules\Account\Entities\Role;

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
            'user' => User::class,
            'role' => Role::class,
        ]);

    }
}
