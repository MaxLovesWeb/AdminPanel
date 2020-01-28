<?php

namespace App\Traits;

use App\User;
use Illuminate\Http\Request;
use App\Forms\UserForm;

trait CreateUsers
{
    /**
     * Build user's create form.
     * 
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildCreateAccountForm()
    {
       $form = \FormBuilder::create(UserForm::class, [
            'method' => 'POST',
            'url' => route('users.store')
        ]);

        return $form;
    }

    /**
     * Create User.
     *
     * @param  array  $validated
     * @return \Illuminate\Http\Response
     */
    protected function createUser(array $validated)
    {
        return User::create($validated);
    }

    /**
     * Validate the create user request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateCreateUser(array $attributes)
    {
        $validator = Validator::make($attributes, User::$rules);

        return $validator->validate();
    }

    /**
     * Get the needed credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCreateUserCredentials(Request $request)
    {
        return $request->only(UserForm::INPUTS_ARRAY);
    }

    /**
     * The user has been created.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    protected function userCreated(User $user)
    {
        flash(trans('create-user-success'))->success()->important();
    }


}
