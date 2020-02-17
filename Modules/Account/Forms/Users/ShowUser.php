<?php

namespace Modules\Account\Forms\Users;

use Kris\LaravelFormBuilder\Form;

class ShowUser extends Form
{

    public function buildForm()
    {

        $this->compose(UserFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->disableFields();

        //$this->add('id', 'hidden');

        /*$this->add('actions', 'buttongroup', [
            'wrapper' => [
                'class' => 'btn-toolbar justify-content-between',
                'role' => 'group'
            ],
            'splitted' => true,
            'buttons' => [
                [
                    'label' => 'Edit',
                    'wrapper' => 'btn btn-group',

                    'attr' => [
                        'class' => 'btn btn-outline-primary',
                        'role' => 'link',
                        'href' => route('users.edit', $this->getModel())
                    ],
                ],
                [
                    'label' => 'Delete',
                    'wrapper' => 'btn btn-group',

                    'attr' => [
                        'class' => 'btn btn-outline-primary',
                        'role' => 'button',
                        'href' => route('users.destroy', $this->getModel())
                    ],
                ]
            ]
        ]);*/

    }

}
