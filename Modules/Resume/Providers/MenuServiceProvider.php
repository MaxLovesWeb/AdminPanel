<?php

namespace Modules\Resume\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuServiceProvider extends ServiceProvider
{


    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->add([
                'header' => 'Resume Management',
                'can' => 'viewAny-resume',
            ]);
            $event->menu->add([
                'text' => 'Search',
                'url' => route('resume.index'),
                'can' => 'viewAny-resume'
            ]);
            $event->menu->add([
                'text' => 'Create New',
                'url' => route('resume.index'),
                'can' => 'viewAny-resume'
            ]);

        });
    }


}
