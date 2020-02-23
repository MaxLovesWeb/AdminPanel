<?php

namespace Modules\Resume\Forms\Training;

use Kris\LaravelFormBuilder\Form;

class ShowTraining extends Form
{

    public function buildForm()
    {
        $this->compose(TrainingFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->disableFields();
    }

}
