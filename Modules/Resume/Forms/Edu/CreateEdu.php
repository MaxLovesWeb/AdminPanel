<?php

namespace Modules\Resume\Forms\Edu;

use Kris\LaravelFormBuilder\Form;
use Modules\Company\Forms\SelectCompany;

class CreateEdu extends Form
{

    public function buildForm()
    {
        $this->compose(SelectCompany::class, []);

        $this->compose(EduFields::class, [
            'model' => $this->getModel(),
        ]);

        $this->remove('created_at');
        $this->remove('updated_at');

        $this->add('create', 'submit');

    }

}
