<?php

namespace Modules\Resume\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Company\Entities\Company;
use Modules\Resume\Entities\Resume;

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
            'resume' => Resume::class,
        ]);

    }
}
