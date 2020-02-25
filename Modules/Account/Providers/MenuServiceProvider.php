<?php

namespace Modules\Account\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuServiceProvider extends ServiceProvider
{


    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->add([
                'header' => 'User Management',
                'can' => 'viewAny-users',
            ]);
            $event->menu->add([
                'text' => 'users',
                'url' => route('users.index'),
                'can' => 'viewAny-users'
            ]);
            $event->menu->add([
                'text' => 'roles',
                'url' => route('roles.index'),
                'can' => 'viewAny-roles'
            ]);
            $event->menu->add([
                'text' => 'permissions',
                'url' => route('permissions.index'),
                'can' => 'viewAny-permissions'
            ]);
        });
    }


}
