<?php

namespace Modules\Account\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Http\Controllers\UpdateCredentialsController;

class UpdateAuthPasswordForm extends Form
{

    protected $formOptions = [
        'method' => 'PUT',
        'route' => 'users.password.update',
    ];

    public function buildForm()
    {
        $this->add('current_password', 'password', [
                'value' => '',
                'attr' => ['required' => true],
            ]
        );

        $this->add('new_password', 'repeated', [
            'type' => 'password',
            'first_options' => [
                'label' => 'New Password',
                'value' => '',
                'attr' => ['required' => true],
            ],
            'second_options' => [
                'label' => 'Confirm New Password',
                'attr' => ['required' => true]
            ],
        ]);

        $this->add('submit', 'submit');
    }

}
