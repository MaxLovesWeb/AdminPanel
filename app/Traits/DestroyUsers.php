<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Forms\DestroyUserForm;
use Kris\LaravelFormBuilder\FormBuilder;
use App\User;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Providers\RouteServiceProvider;

trait DestroyUsers
{

    use RedirectsUsers;

    /**
     * Where to redirect users after delete action.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    
    /**
     * Show the user's destroy form.
     * @param  User $user
     * @param  FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function showDestroyForm(User $user, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(DestroyUserForm::class, [
            'method' => 'DELETE',
            'url' => route('users.destroy', $user)
        ], ['data' => $user]);

        return view('users.destroy', compact('user', 'form'));
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
                        ?: redirect($this->redirectPath());
        
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
