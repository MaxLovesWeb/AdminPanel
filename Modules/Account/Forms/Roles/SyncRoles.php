<?php

namespace Modules\Account\Forms\Roles;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Forms\Permissions\HasPermissions;
use Modules\Account\Forms\Roles\HasRoles;

class SyncRoles extends Form
{

    public function buildForm()
    {

        //dd($this->getModel()->permissions->toArray());
        $this->compose(HasRoles::class, [
            'model' => $this->getModel(),
        ]);

        $this->add('sync', 'submit');

    }

}
