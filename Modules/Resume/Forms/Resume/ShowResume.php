<?php

namespace Modules\Resume\Forms\Resume;

use Kris\LaravelFormBuilder\Form;

class ShowResume extends Form
{

    public function buildForm()
    {
        $this->compose(ResumeFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->disableFields();
    }

}
