<?php

namespace Modules\Resume\Forms\Resume;

use Kris\LaravelFormBuilder\Form;

class ResumeFields extends Form
{

    /**
     * @return mixed|void
     */
    public function buildForm()
    {
    	$this->add('title', 'text', ['label' => 'Job Title'])
            ->add('letter', 'textarea', ['label' => 'Cover Letter'])
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
