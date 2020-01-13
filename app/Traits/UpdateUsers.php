<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Forms\UserForm;
use Kris\LaravelFormBuilder\FormBuilder;
use App\User;

trait UpdateUsers
{

    /**
     * Show the user's update form.
     * @param  User $user
     * @param  FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, FormBuilder $formBuilder)
    {
        $form = $this->buildUpdateForm($user, $formBuilder);

        return view('users.edit', compact('user', 'form'));
    }

    /**
     * Build user's destroy form.
     * @param  User $user
     * @param  FormBuilder $formBuilder
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildUpdateForm($user, $formBuilder)
    {

        $form = $formBuilder->create(UserForm::class, [
            'method' => 'PUT',
            'url' => route('users.update', $user),
            'model' => $user
        ]);

        return $form;
    }

    /**
     * Update the specified resource in storage.
     *  
     * @param User $user
     * @param Request $request
     * @return Response
     */
    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name,'.$user->id, 
            'email' => 'required|unique:users,email,'.$user->id, 
            'password' => 'password', //'password:web'
        ]);

        $user->update($request->only('name', 'email'));

        return $this->updated($request)
                        ?: redirect(RouteServiceProvider::HOME);
    }

    /**
     * The user has been updated.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function updated(Request $request)
    {
        return back()->with('success', trans('update-user-success'));
    }


}
