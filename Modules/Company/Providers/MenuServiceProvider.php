<?php

namespace Modules\Company\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuServiceProvider extends ServiceProvider
{


    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            /*$event->menu->add([
                'header' => 'Companies',
                'can' => 'viewAny-companies',
            ]);*/
            $event->menu->add([
                'text' => 'Companies',
                'url' => route('companies.index'),
                'can' => 'viewAny-companies'
            ]);
        });
    }


}
