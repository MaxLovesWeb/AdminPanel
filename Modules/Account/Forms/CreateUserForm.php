<?php

namespace Modules\Account\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Http\Controllers\UpdateCredentialsController;

class CreateUserForm extends Form
{

    protected $formOptions = [
        'method' => 'POST',
    ];

    public function buildForm()
    {
        $this->add('name', 'text', [
            'attr' => ['required' => true]
        ]);

        $this->add('email', 'email', [
            'attr' => ['required' => true]
        ]);

        $this->add('password', 'repeated', [
            'type' => 'password',
        ]);

        $this->add('submit', 'submit');
    }

}
