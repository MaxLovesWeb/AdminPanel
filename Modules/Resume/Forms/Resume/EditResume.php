<?php

namespace Modules\Resume\Forms\Resume;

use Kris\LaravelFormBuilder\Form;

class EditResume extends Form
{

    public function buildForm()
    {
        $this->compose(ResumeFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('update', 'submit');

    }

}
