<?php

namespace Modules\Person\Forms;

use Kris\LaravelFormBuilder\Form;

class PersonFields extends Form
{

    /**
     * @return mixed|void
     */
    public function buildForm()
    {
    	$this->add('first_name', 'text', ['label' => 'First Name'])
            ->add('last_name', 'text', ['label' => 'Last Name'])

            ->add('created_at', 'datetime-local', ['label' => 'Created'])
            ->add('updated_at', 'datetime-local', ['label' => 'Updated']);
    		//->add('submit', 'submit');

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
