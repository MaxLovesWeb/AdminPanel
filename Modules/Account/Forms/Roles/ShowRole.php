<?php

namespace Modules\Account\Forms\Roles;

use Kris\LaravelFormBuilder\Form;

class ShowRole extends Form
{

    public function buildForm()
    {
        $this->compose(RoleFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->disableFields();
    }

}
