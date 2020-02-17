<?php

namespace Modules\Account\Forms\Permissions;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Forms\Permissions\HasPermissions;

class SyncPermissions extends Form
{

    public function buildForm()
    {

        //dd($this->getModel()->permissions->toArray());
        $this->compose(HasPermissions::class, [
            'model' => $this->getModel(),
        ]);

        $this->add('sync', 'submit');

    }

}
