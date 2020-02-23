<?php

namespace Modules\Company\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Company\Entities\Company;

class SelectCompany extends Form
{

    public function buildForm()
    {

        $this->add('company', 'choice', [
            'attr' => [
                'class' => 'form-control select2Tags',
                'width' => '100%',
            ],
            'multiple' => false,
            'choices' => array_pluck($this->getDefinedCompanies(), 'name', 'id'),
            'empty_value' => 'choice a company OR input a name'
        ]);
    }

    protected function getDefinedCompanies()
    {
        return $this->getData('companies') ?? Company::all();
    }

}
