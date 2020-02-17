<?php

namespace Modules\Account\Forms\Permissions;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Entities\Permission;

class HasPermissions extends Form
{

    public function buildForm()
    {
        $this->add('type', 'hidden', [
            'value' => 'permissions',
        ]);

        $this->add('relation', 'choice', [
            'attr' => ['class' => 'form-control duallist'],
            'choices' => array_pluck($this->getDefinedPermissions(), 'name', 'slug'),
            'selected' => array_pluck($this->getModelPermissions(), 'slug'),
            'multiple' => true,
        ]);
    }

    protected function getModelPermissions()
    {
        return $this->getModel()->permissions;
    }

    protected function getDefinedPermissions()
    {
      //  dd(array_pluck(Permission::all(), 'name', 'slug'));

        return $this->getData('permissions') ?? Permission::all();
    }

}
