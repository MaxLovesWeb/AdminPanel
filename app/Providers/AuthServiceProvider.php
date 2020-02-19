<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Arr;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;
use Modules\Account\Policies\PermissionPolicy;
use Modules\Account\Policies\RolePolicy;
use Modules\Account\Policies\UserPolicy;
use Modules\Addresses\Entities\Address;
use Modules\Addresses\Policies\AddressPolicy;
use Modules\Company\Entities\Company;
use Modules\Company\Policies\CompanyPolicy;
use Nwidart\Modules\Module;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [


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
