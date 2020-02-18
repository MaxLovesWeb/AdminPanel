<?php

namespace Modules\Addresses\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\Role;

class Countries extends Form
{

    public function buildForm()
    {

        $this->add('country', 'select', [
            'attr' => ['class' => 'form-control select2', 'style' => 'width:100%'],
            'choices' => $this->getChoices(),
            'selected' => $this->getSelected(),
            'empty_value' => '<>'
        ]);
    }

    protected function getSelected()
    {
        if ($this->getModel()){
            return [];
        }

        return array_pluck(
            country($this->getModel()->country_code), 'name', 'emoji'
        );
    }

    protected function getChoices()
    {
        return array_pluck(
            $this->getData('countries') ?? countries(), 'name', 'emoji'
        );
    }

}
