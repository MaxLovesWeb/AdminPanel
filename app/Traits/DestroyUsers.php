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
     * @return \Illuminate\Http\Response
     */
    public function showDestroyUserForm(User $user)
    {
        $form = $this->buildDestroyUserForm($user);

        return view('users.destroy', compact('user', 'form'));
    }

    /**
     * Build user's destroy form.
     * @param  User $user
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildDestroyUserForm(User $user)
    {
        $form = \FormBuilder::create(UserForm::class, [
            'method' => 'DELETE',
            'url' => route('users.destroy', $user),
            'model' => $user
        ]);

        $form->modify('submit', 'submit', ['label' => 'Delete']);

        return $form;
    }

    /**
     * The user has been deleted.
     *
     * @return \Illuminate\Http\Response
     */
    protected function userDeleted()
    {
        if ( is_null(Auth::user()) ) {

            return redirect()->route('login');
        }
    }

}
