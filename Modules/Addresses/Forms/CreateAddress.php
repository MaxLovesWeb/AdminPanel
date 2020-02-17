<?php

namespace Modules\Addresses\Forms;

use Kris\LaravelFormBuilder\Form;

class CreateAddress extends Form
{

    public function buildForm()
    {

        $this->compose(AddressFields::class);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('create', 'submit');

    }

}
