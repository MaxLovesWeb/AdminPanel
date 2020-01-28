<?php

namespace Modules\Account\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Account\Http\Resources\PermissionGroupResource;
use Joshbrw\LaravelPermissions\Contracts\PermissionManager;

class PermissionsComposer
{
    /**
     * The abilities.
     */
    protected $abilities;

    /**
     * Create a new composer.
     *
     * @return void
     */
    public function __construct(PermissionManager $abilities)
    {
        $this->abilities = $abilities;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('abilities', $this->abilities->all());
    }
}