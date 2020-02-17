<?php

namespace Modules\Account\Forms\Roles;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\Role;

class HasRoles extends Form
{

    public function buildForm()
    {

        $this->add('relation', 'hidden', [
            'value' => 'roles',
        ]);

        $this->add('ids', 'choice', [
            'attr' => ['class' => 'form-control duallist'],
            'choices' => array_pluck($this->getDefinedRoles(), 'name', 'id'),
            'selected' => array_pluck($this->getModelRoles(), 'id'),
            'multiple' => true,
        ]);
    }

    protected function getModelRoles()
    {
        return $this->getModel()->roles;
    }

    protected function getDefinedRoles()
    {
      //  dd(array_pluck(Permission::all(), 'name', 'slug'));

        return $this->getData('roles') ?? Role::all();
    }

}
