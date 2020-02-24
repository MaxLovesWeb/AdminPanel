<?php

namespace Modules\Account\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Account\Entities\User;
use Modules\Account\Forms\CreateUserForm;
use Modules\Account\Http\Requests\Auth\CreateUserFormRequest;

class RegisterController extends Controller
{

    use RedirectsUsers;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $options = [
            'method' => 'POST',
            'route' => 'users.register',
        ];

        $form = \FormBuilder::create(CreateUserForm::class, $options);

        return view('account::auth.register', compact('form'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  CreateUserFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(CreateUserFormRequest $request)
    {
        $user = User::create($request->validated());

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        event(new Registered($user));
    }

    /**
     * Where to redirect users after registration.
     *
     * @return string
     */
    protected function redirectTo()
    {
        return route('users.index');
    }

}
