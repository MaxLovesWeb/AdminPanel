<?php

namespace Modules\Account\Forms;

use Kris\LaravelFormBuilder\Form;

class AccountForm extends Form
{

	public const INPUTS_ARRAY = 'account';

    public function buildForm()
    {
        $this->add(self::INPUTS_ARRAY.'[first_name]', 'text', ['label' => 'First Name'])
        	->add(self::INPUTS_ARRAY.'[last_name]', 'text', ['label' => 'Last Name'])
        	->add('submit', 'submit');
    }

}
