<?php

namespace Modules\Person\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\Company\Entities\Company;
use Modules\Company\Policies\CompanyPolicy;
use Modules\Person\Entities\Person;
use Modules\Person\Policies\PersonPolicy;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Person::class => PersonPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }


}
