<?php

namespace Modules\Resume\Forms\Edu;

use Kris\LaravelFormBuilder\Form;

class EditEdu extends Form
{

    public function buildForm()
    {
        $this->compose(EduFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('update', 'submit');

    }

}
