<?php

namespace Modules\Account\Forms;

use Kris\LaravelFormBuilder\Form;

class AccountForm extends Form
{

	public const INPUTS_ARRAY = 'account';

    public function buildForm()
    {
        $this->add('first_name', 'text', ['label' => 'First Name'])
        	->add('last_name', 'text', ['label' => 'Last Name'])
        	->add('submit', 'submit');
    }

}
