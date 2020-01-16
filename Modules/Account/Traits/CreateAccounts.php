<?php

namespace Modules\Account\Traits;

use App\User;
use Illuminate\Http\Request;
use Modules\Account\Forms\AccountForm;
use Modules\Account\Entities\Account;

trait CreateAccounts
{
    /**
     * Build user's destroy form.
     * @param  FormBuilder $formBuilder
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildCreateAccountForm()
    {

       $form = \FormBuilder::create(AccountForm::class, [
            'method' => 'POST',
            'url' => route('accounts.store')
        ]);

        return $form;
    }

    /**
     * Create One account for user.
     *
     * @param  User $user
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    protected function createAccount(User $user, array $attributes = [])
    {
        return $user->account()->create($attributes);
    }

    /**
     * Validate the create account request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateCreateAccount(Request $request)
    {
        $this->getCreateAccountCredentials($request)->validate(Account::$rules);
    }

    /**
     * Get the needed credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCreateAccountCredentials(Request $request)
    {
        return $request->only(AccountForm::INPUTS_ARRAY);
    }

    /**
     * The user has been created.
     *
     * @param  Account $account
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    protected function accountCreated(Account $account, Request $request)
    {
        flash(trans('create-account-success'))->success()->important();
    }


}
