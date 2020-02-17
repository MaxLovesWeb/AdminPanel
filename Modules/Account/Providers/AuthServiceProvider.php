<?php

namespace Modules\Account\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
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
        $this->defineAbilities();

        //dd(Gate::abilities(), PermissionGroupResource::collection(Permissions::all()));
    }

    protected function defineAbilities()
    {

        //Permission::all();
        /**
         * Gate::define($ability, function (User $user, string $ability) {
        return $user->hasPermission($ability);
        });
         */
    }



}
