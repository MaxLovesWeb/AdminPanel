<?php

namespace Modules\Account\Forms\Users;

use Kris\LaravelFormBuilder\Form;

class UserFields extends Form
{

    public function buildForm()
    {


        $this->add('name', 'text');

        $this->add('email', 'email');
    }


}
