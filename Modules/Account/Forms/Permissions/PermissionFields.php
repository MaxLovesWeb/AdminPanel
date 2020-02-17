<?php

namespace Modules\Account\Forms\Permissions;

use Kris\LaravelFormBuilder\Form;

class PermissionFields extends Form
{

    /**
     * @return mixed|void
     */
    public function buildForm()
    {
    	$this->add('slug', 'text', ['label' => 'Slug'])
            ->add('name', 'text', ['label' => 'Name'])
            ->add('module', 'text', ['label' => 'Module'])
            ->add('created_at', 'datetime-local', ['label' => 'Created'])
            ->add('updated_at', 'datetime-local', ['label' => 'Updated'])
            ->add('description', 'textarea', ['label' => 'Description']);
    		//->add('submit', 'submit');

        $this->modify('slug', 'text', [
            'attr' => [
                'disabled' => true
            ]
        ]);

        $this->modify('module', 'text', [
            'attr' => [
                'disabled' => true
            ]
        ]);

        $this->modify('created_at', 'datetime-local', [
            'attr' => [
                'disabled' => true
            ]
        ]);

        $this->modify('updated_at', 'datetime-local', [
            'attr' => [
                'disabled' => true
            ]
        ]);
    }

}
