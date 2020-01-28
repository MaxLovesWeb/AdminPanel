<?php

namespace Modules\Account\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Account\Entities\Role;

trait DeleteRoles
{

    /**
     * Build role destroy form.
     * @param  Role $role
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildDeleteRoleForm(Role $role)
    {
        $formOptions = [
            'method' => 'DELETE',
            'url' => route('roles.destroy', $role),
            'model' => $role
        ];

        $form = \FormBuilder::plain($formOptions);

        $form->add('name', 'text')->disableFields();

        return $form;
    }

    /**
     * Delete Role.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    protected function deleteRole($role)
    {
        return Role::destroy($role);
    }

    /**
     * Validate the delete role request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateDeleteRole(Request $request)
    {
        return $request->validate();
    }

    /**
     * Get the needed credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getDeleteRoleCredentials(Request $request)
    {
        return $request->all();
    }

    /**
     * The role has been deleted.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function roleDeleted(Request $request)
    {
        flash(trans('delete-role-success'))->success()->important();
    }


}
