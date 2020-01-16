<?php

namespace Modules\Account\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Account\Entities\Account;

trait DeleteAccounts
{

    /**
     * Build account destroy form.
     * @param  Account $account
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildDeleteAccountForm($account)
    {
        $formOptions = [
            'method' => 'DELETE',
            'url' => route('accounts.destroy', $account)
        ];

        $form = \FormBuilder::plain($formOptions);

        $form->add('email', 'email', ['value' => $account->user->email])->disableFields();

        $form->add('password', 'password')->add('submit', 'submit');

        return $form;
    }

    /**
     * Delete Account.
     *
     * @param  $account
     * @return \Illuminate\Http\Response
     */
    protected function deleteAccount($account)
    {
        return Account::destroy($account);
    }

    /**
     * Validate the delete account request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateDeleteAccount(Request $request)
    {
        $this->getDeleteAccountCredentials($request)->validate([
            'password' => 'password', //'password:web'
        ]);
    }

    /**
     * Get the needed credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getDeleteAccountCredentials(Request $request)
    {
        return $request->only('password');
    }

    /**
     * The user account has been deleted.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function accountDeleted(Request $request)
    {
        flash(trans('delete-account-success'))->success()->important();
    }


}
