<?php

namespace Modules\Company\Forms;

use Kris\LaravelFormBuilder\Form;

class EditCompany extends Form
{

    public function buildForm()
    {
        $this->compose(CompanyFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('update', 'submit');

    }

}
