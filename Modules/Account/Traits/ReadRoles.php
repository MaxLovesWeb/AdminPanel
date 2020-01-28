<?php

namespace Modules\Account\Traits;

use Modules\Account\Forms\RoleForm;
use Modules\Account\Entities\Role;

trait ReadRoles
{

    /**
     * Build role show form.
     * @param  Role $role
     * @param  FormBuilder $formBuilder
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildShowRoleForm(Role $role)
    {

        $form = \FormBuilder::create(RoleForm::class, [
            //'method' => 'PUT',
            //'url' => route('users.update', $user),
            'model' => $role
        ]);

        $form->remove('submit')->disableFields();

        return $form;
    }

    /**
     * The role has been viewed.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    protected function roleViewed(Role $role)
    {
        
    }

}
