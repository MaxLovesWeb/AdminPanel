<?php

namespace Modules\Account\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\User;
use Modules\Account\Policies\PermissionPolicy;
use Modules\Account\Policies\UserPolicy;
use Modules\Account\Entities\Role;
use Modules\Account\Policies\RolePolicy;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->gateBefore();
        //$this->registerGates();
    }

    // ?
    protected function registerGates()
    {
        foreach ($this->policies as $model => $policy) {

            $policy_methods = get_class_methods($policy);

            foreach ($policy_methods as $method_name) {

                Gate::define($method_name.'-'.strtolower(class_basename($model)), UserPolicy::class.'@'.$method_name);

            }
        }
    }

    protected function gateBefore()
    {
        Gate::before(function () {

            return request()->user() && request()->user()->isSuperAdmin();
        });
    }


}
