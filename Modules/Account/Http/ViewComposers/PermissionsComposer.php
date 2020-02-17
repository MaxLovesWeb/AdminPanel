<?php

namespace Modules\Account\Http\ViewComposers;

use Illuminate\View\View;

class PermissionsComposer
{
    /**
     * The abilities.
     */
    protected $abilities;

    /**
     * Create a new composer.
     *
     */
    public function __construct()
    {
        //$this->abilities = $abilities;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        //dd($this->abilities->all());
        //$view->with('abilities', $this->abilities->all());
    }
}
