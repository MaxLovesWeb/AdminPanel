<?php

namespace Modules\Contact\Forms;

use Kris\LaravelFormBuilder\Form;

class CreateContact extends Form
{

    public function buildForm()
    {

        $this->compose(ContactFields::class);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('create', 'submit');
    }

}
