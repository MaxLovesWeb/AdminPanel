<?php

namespace Modules\Resume\Forms\Training;

use Kris\LaravelFormBuilder\Form;

class EditTraining extends Form
{

    public function buildForm()
    {
        $this->compose(TrainingFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('update', 'submit');

    }

}
