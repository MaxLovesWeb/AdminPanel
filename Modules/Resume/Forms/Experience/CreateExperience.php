<?php

namespace Modules\Resume\Forms\Experience;

use Kris\LaravelFormBuilder\Form;
use Modules\Company\Forms\SelectCompany;

class CreateExperience extends Form
{

    public function buildForm()
    {

        $this->compose(SelectCompany::class, []);

        $this->compose(ExperienceFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('create', 'submit');

    }

}
