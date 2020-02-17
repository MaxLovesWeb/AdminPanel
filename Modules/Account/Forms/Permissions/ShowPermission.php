<?php

namespace Modules\Account\Forms\Permissions;

use Kris\LaravelFormBuilder\Form;

class ShowPermission extends Form
{

    public function buildForm()
    {
        $this->compose(PermissionFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->disableFields();
    }

}
