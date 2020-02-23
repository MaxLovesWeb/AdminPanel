<?php

namespace Modules\Resume\Forms\Resume;

use Kris\LaravelFormBuilder\Form;

class CreateResume extends Form
{

    public function buildForm()
    {
        $this->compose(ResumeFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('create', 'submit');

    }

}
