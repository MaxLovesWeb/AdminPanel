<?php

namespace Modules\Resume\Forms\Experience;

use Kris\LaravelFormBuilder\Form;

class ExperienceFields extends Form
{

    /**
     * @return mixed|void
     */
    public function buildForm()
    {
    	$this->add('title', 'text', ['label' => 'Job Title'])
            ->add('start_date', 'date', ['label' => 'Start Date'])
            ->add('end_date', 'date', ['label' => 'End Date'])
            ->add('description', 'textarea', ['label' => 'Description'])
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
