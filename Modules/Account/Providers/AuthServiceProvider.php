<?php

namespace Modules\Account\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Arr;
use Modules\Account\Entities\Account;
use Modules\Account\Policies\AccountPolicy;
use Modules\Account\Repositories\PermissionsRepository;
use Joshbrw\LaravelPermissions\Permission;
use Permissions;
use Illuminate\Contracts\Auth\Access\Authorizable;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //Account::class => AccountPolicy::class,
    ];

    /**
     * Permissions group for the module.
     *
     * @var array
     */
    private $permissionsGroup = 'account';

    /**
     * Permissions mappings for the module.
     *
     * @var array
     */
    private $permissions =  [
        'viewAny' => 'account.viewAny',
        'view'    => 'account.view',
        'create' => 'account.create',
        'update' => 'account.update',
        'delete' => 'account.delete',
    ];

    protected $permission;

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineAbilities();

        //dd(Gate::abilities());
    }

    protected function defineAbilities()
    {
        $permissions = [];

        foreach ($this->permissions as $method => $ability) {

            $permission = new Permission($ability, $method, trans($ability));
           
            Gate::define($ability, function (User $user, string $permission) {
                if (method_exists($user, 'account')) {
                    return null;// $user->account->hasPermission($permission->getKey());
                }
            });

            array_push($permissions, $permission);
        }

        return Permissions::register($this->permissionsGroup, $permissions);
    }

   

}
