<?php

namespace Modules\Resume\Forms\Edu;

use Kris\LaravelFormBuilder\Form;

class ShowEdu extends Form
{

    public function buildForm()
    {
        $this->compose(EduFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->disableFields();
    }

}
