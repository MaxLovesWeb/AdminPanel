<?php

namespace Modules\Addresses\Forms;

use Kris\LaravelFormBuilder\Form;

class EditAddress extends Form
{

    public function buildForm()
    {
        $this->compose(Countries::class, [
            'model' => $this->getModel(),
        ]);

        $this->compose(AddressFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('update', 'submit');

    }

}
