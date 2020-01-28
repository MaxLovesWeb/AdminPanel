<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PermissionForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('name', 'text')
        	->add('email', 'email')
        	->add('password', 'password')
        	->add('submit', 'submit');

        $this->modify('password', 'password', [
            'value' => '',
        ]);
    }

}
