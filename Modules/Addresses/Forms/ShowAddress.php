<?php

namespace Modules\Addresses\Forms;

use Kris\LaravelFormBuilder\Form;

class ShowAddress extends Form
{

    public function buildForm()
    {
        $this->compose(Countries::class, [
            'model' => $this->getModel(),
        ]);

        $this->compose(AddressFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->disableFields();
    }

}
