<?php

namespace Modules\Person\Forms;

use Kris\LaravelFormBuilder\Form;

class UpdateOrCreatePerson extends Form
{

    public function buildForm()
    {
        if ($this->getModel()->person->getKey()){
            $this->compose(ShowPerson::class, [
                'model' => $this->getModel()->person,
            ]);
        }else{
            $this->compose(CreatePerson::class, [
                'model' => $this->getModel(),
            ]);
        }
    }

}
