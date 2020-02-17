<?php

namespace Modules\Account\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Account\Http\Controllers\UpdateCredentialsController;

class UpdateAuthIdentifierForm extends Form
{

    protected $formOptions = [
        'method' => 'PUT',
        'route' => 'users.identifier.update',
    ];

    public function buildForm()
    {
        $this->add('name', 'text', [
            'label' => 'Name',
            'attr' => ['required' => true],
        ]);

        $this->add('email', 'email', [
            'attr' => ['required' => true]
        ]);
        //$this->add('email', 'hidden');

        $this->add('password', 'password', [
                'value' => '',
                'attr' => ['required' => true],
            ]
        );

        $this->add('submit', 'submit');
    }

}
