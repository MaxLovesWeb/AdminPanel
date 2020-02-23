<?php

namespace Modules\Resume\Forms\Experience;

use Kris\LaravelFormBuilder\Form;

class EditExperience extends Form
{

    public function buildForm()
    {
        $this->compose(ExperienceFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('update', 'submit');

    }

}
