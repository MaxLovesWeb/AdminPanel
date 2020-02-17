<?php

namespace Modules\Addresses\Forms;

use Kris\LaravelFormBuilder\Form;

class CreateAddress extends Form
{

    public function buildForm()
    {
        // add addressable input!!!!!!!

        $this->compose(AddressFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('create', 'submit');

    }

}
