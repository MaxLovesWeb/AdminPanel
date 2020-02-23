<?php

namespace Modules\Person\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Company\Entities\Company;
use Modules\Person\Entities\Person;

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
            'person' => Person::class,
        ]);

    }
}
