<?php

namespace Modules\Person\Forms;

use Kris\LaravelFormBuilder\Form;

class ShowPerson extends Form
{

    public function buildForm()
    {
        $this->compose(PersonFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->disableFields();
    }

}
