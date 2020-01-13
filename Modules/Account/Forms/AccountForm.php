<?php

namespace Modules\Account\Forms;

use Kris\LaravelFormBuilder\Form;

class AccountForm extends Form
{

    public function buildForm()
    {
        $this->add('first_name', 'text')
        	->add('email', 'email')
        	->add('submit', 'submit');
    }

}
