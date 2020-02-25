<?php

namespace Modules\Addresses\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuServiceProvider extends ServiceProvider
{


    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->add([
                'header' => 'Contact Management',
                'can' => 'viewAny-addresses',
            ]);
            $event->menu->add([
                'text' => 'Addresses',
                'url' => route('addresses.index'),
                'can' => 'viewAny-addresses'
            ]);

        });
    }


}
