<?php

namespace Modules\Resume\Forms\Training;

use Kris\LaravelFormBuilder\Form;
use Modules\Company\Forms\SelectCompany;

class CreateTraining extends Form
{

    public function buildForm()
    {
        $this->compose(SelectCompany::class, []);

        $this->compose(TrainingFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('create', 'submit');

    }

}
