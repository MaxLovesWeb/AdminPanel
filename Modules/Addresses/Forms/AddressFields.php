<?php

namespace Modules\Addresses\Forms;

use Kris\LaravelFormBuilder\Form;

class AddressFields extends Form
{

    /**
     * @return mixed|void
     */
    public function buildForm()
    {
    	$this->add('street', 'text', ['label' => 'Street'])
            ->add('state', 'text', ['label' => 'State'])
            ->add('city', 'text', ['label' => 'City'])
            ->add('postcode', 'text', ['label' => 'Postcode'])
            ->add('created_at', 'datetime-local', ['label' => 'Created'])
            ->add('updated_at', 'datetime-local', ['label' => 'Updated'])
            ->add('is_primary', 'checkbox', ['label' => 'Primary'])
            ->add('is_billing', 'checkbox', ['label' => 'Billing'])
            ->add('is_shipping', 'checkbox', ['label' => 'Shipping']);


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
