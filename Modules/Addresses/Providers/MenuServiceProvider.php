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
                /*$event->menu->add(['header' => 'management']);
                $event->menu->add([
                    'text' => 'users',
                    'url' => route('users.index'),
                    //'can' => 'user-viewAny'
                ]);*/
            });
    }


}
