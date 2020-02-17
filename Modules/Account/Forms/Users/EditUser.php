<?php

namespace Modules\Account\Forms\Users;

use Kris\LaravelFormBuilder\Form;

class EditUser extends Form
{

    public function buildForm()
    {
        $this->compose(UserFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->modify('email', 'email', [
            'attr' => [
                'disabled' => true
            ]
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('update', 'submit');

    }

}
