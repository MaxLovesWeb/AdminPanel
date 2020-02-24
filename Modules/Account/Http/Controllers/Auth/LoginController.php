<?php

namespace Modules\Account\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Modules\Account\Entities\User;
use Modules\Account\Events\Users\UserAuthenticated;
use Modules\Account\Forms\LoginUserForm;
use Modules\Account\Providers\AccountServiceProvider;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $form = \FormBuilder::create(LoginUserForm::class);

        return view('account::auth.login', compact('form'));
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return mixed
     */
    protected function authenticated(Request $request, User $user)
    {
        event(new UserAuthenticated($user));
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        return redirect(route('login'));
    }


    /**
     * Where to redirect users after registration.
     *
     * @return string
     */
    protected function redirectTo()
    {
        return AccountServiceProvider::HOME; //route('users.index')
    }
}
