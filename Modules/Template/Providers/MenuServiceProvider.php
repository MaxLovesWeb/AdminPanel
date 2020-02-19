<?php

namespace Modules\Template\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuServiceProvider extends ServiceProvider
{


    public function boot(Dispatcher $events)
    {
            $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
                $event->menu->add(['header' => 'management']);
                $event->menu->add([
                    'text' => 'users',
                    'url' => route('users.index'),
                    //'can' => 'viewAny.users'
                ]);
                $event->menu->add([
                    'text' => 'roles',
                    'url' => route('roles.index'),
                    //'can' => 'viewAny.roles'
                ]);
                $event->menu->add([
                    'text' => 'permissions',
                    'url' => route('permissions.index'),
                    //'can' => 'viewAny.permissions'
                ]);
                $event->menu->add([
                    'text' => 'addresses',
                    'url' => route('addresses.index'),
                    //'can' => 'viewAny.addresses'
                ]);
                $event->menu->add([
                    'text' => 'companies',
                    'url' => route('companies.index'),
                    //'can' => 'viewAny.companies'
                ]);
            });
    }


}
