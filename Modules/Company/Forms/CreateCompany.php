<?php

namespace Modules\Company\Forms;

use Kris\LaravelFormBuilder\Form;

class CreateCompany extends Form
{

    public function buildForm()
    {
        $this->compose(CompanyFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->modify('slug', 'text', [
            'attr' => [
                'disabled' => false
            ]
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('create', 'submit');

    }

}
