<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Forms\UserForm;
use Kris\LaravelFormBuilder\FormBuilder;
use App\User;

trait DestroyUsers
{
    
    /**
     * Show the user's destroy form.
     * @param  User $user
     * @param  FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function showDestroyForm(User $user, FormBuilder $formBuilder)
    {
        $form = $this->buildDestroyForm($user, $formBuilder);

        return view('users.destroy', compact('user', 'form'));
    }

    /**
     * Build user's destroy form.
     * @param  $user
     * @param  $formBuilder
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildDestroyForm($user, $formBuilder)
    {
        $form = $formBuilder->create(UserForm::class, [
            'method' => 'DELETE',
            'url' => route('users.destroy', $user),
            'model' => $user
        ]);

        $form->modify('submit', 'submit', ['label' => 'Delete']);

        return $form;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|in:'.$user->email, 
            'password' => 'password', //'password:web'
        ]);

        $user->delete();

        return $this->deleted($request)
                        ?: redirect(RouteServiceProvider::HOME)
                            ->with('success', trans('delete-user-success'));
    }

    /**
     * The user has been deleted.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function deleted(Request $request)
    {
        if ( is_null(Auth::user()) ) {

            return redirect()->route('login');
        }
    }

}
