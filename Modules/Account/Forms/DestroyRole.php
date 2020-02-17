<?php

namespace Modules\Account\Forms;

use Kris\LaravelFormBuilder\Form;

class Destroy extends Form
{

    public function buildForm()
    {
        $this->compose(RoleFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->add('update', 'submit');

    }

}
