<?php

namespace Modules\Account\Forms\Users;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Forms\Permissions\HasPermissions;
use Modules\Account\Forms\Roles\HasRoles;
use Modules\Account\Forms\Users\HasUsers;

class SyncUsers extends Form
{

    public function buildForm()
    {

        //dd($this->getModel()->permissions->toArray());
        $this->compose(HasUsers::class, [
            'model' => $this->getModel(),
        ]);

        $this->add('sync', 'submit');

    }

}
