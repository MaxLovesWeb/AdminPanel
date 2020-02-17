<?php

namespace Modules\Account\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Account\Entities\User;
use Modules\Account\Forms\UpdateAuthIdentifierForm;
use Modules\Account\Forms\UpdateAuthPasswordForm;
use Modules\Account\Http\Requests\Auth\UpdateAuthIdentifierFormRequest;
use Modules\Account\Http\Requests\Auth\UpdateAuthPasswordFormRequest;
use Modules\Account\Traits\HasPassword;


class CredentialsController extends Controller
{
    use HasPassword;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the credentials forms.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function showCredentialsForm(Request $request)
    {
        $identifierForm = $this->buildAuthIdentifierForm([
            'model' => $request->user(),
        ]);

        $passwordForm = $this->buildAuthPasswordForm();

        return view('account::auth.credentials', compact('identifierForm', 'passwordForm'));
    }

    /**
     * Build form for update identifiers.
     *
     * @param array $options
     * @return \Form
     */
    protected function buildAuthIdentifierForm(array $options = [])
    {
        return \FormBuilder::create(UpdateAuthIdentifierForm::class, $options);
    }

    /**
     * Build form for update auth password.
     *
     * @param array $options
     * @return \Form
     */
    protected function buildAuthPasswordForm(array $options = [])
    {
        return \FormBuilder::create(UpdateAuthPasswordForm::class, $options);
    }

    /**
     * Update Auth Identifiers.
     *
     * @param  UpdateAuthIdentifierFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAuthIdentifier(UpdateAuthIdentifierFormRequest $request)
    {
        $user = $request->user();

        $attributes = $request->only('name', 'email');

        $user->fill($attributes)->save();

        if ($user->wasChanged('email'))
        {
            $user->markEmailAsUnverified();
            $user->sendEmailVerificationNotification();
        }

        $this->identifierUpdated($request);

        return redirect()->route('users.credentials.edit');
    }

    /**
     * The user has been deleted.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    protected function identifierUpdated(Request $request)
    {
        flash(trans('update-identifier-success'))->success()->important();
    }

    /**
     * Update Auth Password.
     *
     * @param  UpdateAuthPasswordFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAuthPassword(UpdateAuthPasswordFormRequest $request)
    {

        $plain = $request->get('new_password');

        $user = $request->user();

        $user->password = $this->hashPassword($plain);

        $user->save();

        return $this->passwordUpdated($request);
    }

    /**
     * The user has been deleted.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    protected function passwordUpdated(Request $request)
    {
        flash(trans('update-password-success'))->success()->important();

        return redirect()->route('users.credentials.edit');
    }

}
