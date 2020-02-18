<?php

namespace Modules\Company\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Company\Entities\Company;

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
            'company' => Company::class,
        ]);

    }
}
