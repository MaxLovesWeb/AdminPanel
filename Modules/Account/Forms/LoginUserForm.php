<?php

namespace Modules\Account\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Http\Controllers\UpdateCredentialsController;

class LoginUserForm extends Form
{

    protected $formOptions = [
        'method' => 'POST',
        'route' => 'login',
    ];

    public function buildForm()
    {
        $this->add('email', 'email', [
            'attr' => ['required' => true]
        ]);

        $this->add('password', 'password', [
            'attr' => ['required' => true]
        ]);

        $this->add('remember', 'checkbox');

        $this->add('login', 'submit');
    }

}
