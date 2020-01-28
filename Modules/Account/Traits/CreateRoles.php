<?php

namespace Modules\Account\Traits;

use Illuminate\Http\Request;
use Modules\Account\Forms\RoleForm;
use Modules\Account\Entities\Role;

trait CreateRoles
{
    /**
     * Build user's destroy form.
     * @param  FormBuilder $formBuilder
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildCreateRoleForm()
    {

       $form = \FormBuilder::create(RoleForm::class, [
            'method' => 'POST',
            'url' => route('roles.store')
        ]);

        return $form;
    }

    /**
     * Create One account for user.
     *
     * @param  array  $validated
     * @return \Illuminate\Http\Response
     */
    protected function createRole(array $validated = [])
    {
        $role = new Role($validated);

        $role->save();
        
        return $role;
    }

    /**
     * Validate the create role request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateCreateRole(Request $request)
    {
        $validated = $request->validate(Role::$rules);

        return $validated;
    }

    /**
     * Get the needed credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCreateRoleCredentials(Request $request)
    {
        return $request->only($request->all());
    }

    /**
     * The role has been created.
     *
     * @param  Role $role
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    protected function roleCreated(Role $role, Request $request)
    {
        flash(trans('create-role-success'))->success()->important();
    }


}
