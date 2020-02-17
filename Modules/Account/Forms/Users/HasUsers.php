<?php

namespace Modules\Account\Forms\Users;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;

class HasUsers extends Form
{

    public function buildForm()
    {
        $this->add('relation', 'hidden', [
            'value' => 'roles',
        ]);

        $this->add('ids', 'choice', [
            'attr' => ['class' => 'form-control duallist'],
            'choices' => array_pluck($this->getDefinedUsers(), 'email', 'id'),
            'selected' => array_pluck($this->getModelUsers(), 'id'),
            'multiple' => true,
        ]);
    }

    protected function getModelUsers()
    {
        return $this->getModel()->users;
    }

    protected function getDefinedUsers()
    {
      //  dd(array_pluck(Permission::all(), 'name', 'slug'));

        return $this->getData('users') ?? User::all();
    }

}
