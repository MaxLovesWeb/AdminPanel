<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DestroyUserForm extends Form
{

    public function buildForm()
    {
        $this
        	->add('email', 'email')
        	->add('password', 'password')
        	->add('submit', 'submit', ['label' => 'Delete']);

        $this->modify('email', 'email', [
		    'default_value' => $this->getData('data')->email
		]);


    }

}
