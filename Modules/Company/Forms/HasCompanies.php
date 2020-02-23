<?php

namespace Modules\Company\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Company\Entities\Company;

class HasCompanies extends Form
{

    public function buildForm()
    {
        $this->add('relation', 'hidden', [
            'value' => 'companies',
        ]);

        $this->add('companies', 'select', [
            'attr' => ['class' => 'form-control select2', 'style' => 'width=100%'],
            'choices' => array_pluck($this->getDefinedCompanies(), 'name', 'id'),
        ]);
    }

    protected function getDefinedCompanies()
    {
      //  dd(array_pluck(Permission::all(), 'name', 'slug'));

        return $this->getData('companies') ?? Company::all();
    }

}
