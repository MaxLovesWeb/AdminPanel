<?php

namespace Modules\Person\Forms;

use Kris\LaravelFormBuilder\Form;

class CreatePerson extends Form
{

    public function buildForm()
    {
        $this->compose(PersonFields::class, [

        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('create', 'submit');

    }

}
