<?php

namespace Modules\Account\Forms\Permissions;

use Kris\LaravelFormBuilder\Form;

class EditPermission extends Form
{

    public function buildForm()
    {
        $this->compose(PermissionFields::class, [
            'model' => $this->getModel(),
        ]);

     /*   $this->add('permissions', 'choice', [
            'attr' => ['class' => 'form-control duallist'],
            'choices' => [
                //$this->getData('permissions')->pluck('slug', 'name')
                array_pluck($this->getData('permissions')->toArray(), 'slug', 'name')
            ],
            'selected' => function () {
                // Returns the array of short names from model relationship data
                return array_pluck($this->getModel()->permissions, 'slug');
            },
            'multiple' => true,
        ]);*/


        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('update', 'submit');

    }

}
