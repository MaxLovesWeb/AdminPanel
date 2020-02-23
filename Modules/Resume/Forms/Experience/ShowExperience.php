<?php

namespace Modules\Resume\Forms\Experience;

use Kris\LaravelFormBuilder\Form;

class ShowExperience extends Form
{

    public function buildForm()
    {
        $this->compose(ExperienceFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->disableFields();
    }

}
