<?php

namespace Modules\Contact\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Contact\Entities\Contact;

class ContactFields extends Form
{

    /**
     * @return mixed|void
     */
    public function buildForm()
    {
    	$this->add('type', 'select', [
                'choices' => Contact::getTypes(),
            ])
            ->add('value', 'text', ['label' => 'Value'])
            ->add('status', 'text', ['label' => 'Status']);


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
