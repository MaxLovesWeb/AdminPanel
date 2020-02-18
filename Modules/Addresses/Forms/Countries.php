<?php

namespace Modules\Addresses\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\Role;

class Countries extends Form
{

    public function buildForm()
    {
        $this->add('country_code', 'select', [
            'attr' => ['class' => 'form-control select2', 'style' => 'width:100%'],
            'choices' => $this->getChoices(),
            'selected' => $this->getSelected(),
            'empty_value' => '<>'
        ]);
    }

    protected function getSelected()
    {
        if ($this->getModel()){
            return $this->getModel()->country_code;
        }

        return '';
    }

    protected function getChoices()
    {
        $countries = $this->getData('countries') ?? countries();

        return array_pluck(
            $countries, 'name', 'iso_3166_1_alpha2'
        );
    }

}
