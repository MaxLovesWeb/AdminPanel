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

        $this->add('ids', 'choice', [
            'attr' => ['class' => 'form-control duallist'],
            'choices' => array_pluck($this->getDefinedCompanies(), 'name', 'id'),
            'selected' => array_pluck($this->getModelCompanies(), 'id'),
            'multiple' => true,
        ]);
    }

    protected function getModelCompanies()
    {
        return $this->getModel()->companies;
    }

    protected function getDefinedCompanies()
    {
      //  dd(array_pluck(Permission::all(), 'name', 'slug'));

        return $this->getData('companies') ?? Company::all();
    }

}
