<?php

namespace Modules\Account\Traits;

use Illuminate\Http\Request;
use Modules\Account\Forms\RoleForm;
use Modules\Account\Entities\Role;

trait UpdateRoles
{

    /**
     * Build user's destroy form.
     * @param  Role $role
     * @param  FormBuilder $formBuilder
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildUpdateRoleForm(Role $role)
    {

        $form = \FormBuilder::create(RoleForm::class, [
            'method' => 'PUT',
            'url' => route('roles.update', $role),
            'model' => $role
        ]);

        return $form;
    }

    /**
     * Get the needed credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getUpdateRoleCredentials(Request $request)
    {
        return $request->only($request->all());
    }

    /**
     * Validate the create account request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateUpdateRole(Request $request)
    {
        return $request->validate(Role::$rules);
    }

    /**
     * Update role.
     *
     * @param  Role $role
     * @param  array  $validated
     * @return bool
     */
    protected function updateRole(Role $role, array $validated)
    {
        return $role->fill($validated)->save();
    }

    /**
     * The role has been updated.
     *
     * @param  Role $role
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function roleUpdated(Role $role, Request $request)
    {
        flash(trans('update-role-success'))->success()->important();
    }

}
