<?php

namespace Modules\Person\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Company\Entities\Company;

class HasPersons extends Form
{

    public function buildForm()
    {
        $this->add('ids', 'choice', [
            'attr' => ['class' => 'form-control'],
            'choices' => array_pluck($this->getModelPersons(), 'last_name', 'id'),
        ]);
    }

    protected function getModelPersons()
    {
        return $this->getModel()->persons;
    }

}
