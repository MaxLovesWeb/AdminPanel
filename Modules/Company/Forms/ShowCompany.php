<?php

namespace Modules\Company\Forms;

use Kris\LaravelFormBuilder\Form;

class ShowCompany extends Form
{

    public function buildForm()
    {
        $this->compose(CompanyFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->disableFields();
    }

}
