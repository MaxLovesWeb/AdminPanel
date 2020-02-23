<?php

namespace Modules\Person\Forms;

use Kris\LaravelFormBuilder\Form;

class EditPerson extends Form
{

    public function buildForm()
    {
        $this->compose(PersonFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('update', 'submit');

    }

}
