<?php

namespace Modules\Account\Traits;

use Illuminate\Http\Request;
use Modules\Account\Forms\AccountForm;
use Modules\Account\Entities\Account;

trait UpdateAccounts
{

    /**
     * Build user's destroy form.
     * @param  Account $account
     * @param  FormBuilder $formBuilder
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildUpdateAccountForm($account)
    {

        $form = \FormBuilder::create(AccountForm::class, [
            'method' => 'PUT',
            'url' => route('accounts.update', $account),
            'model' => $account
        ]);

        return $form;
    }

    /**
     * Get the needed credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getUpdateAccountCredentials(Request $request)
    {
        return $request->only(AccountForm::INPUTS_ARRAY);
    }

    /**
     * Validate the create account request.
     *
     * @param  array $attributes
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateUpdateAccount(array $attributes)
    {
        $validator = Validator::make($attributes, Account::$rules);

        return $validator->validate();
    }

    /**
     * Update account.
     *
     * @param  Account $account
     * @param  array  $validated
     * @return bool
     */
    protected function updateAccount(Account $account, array $validated)
    {
        return $account->fill($validated)->save();
    }

    /**
     * The user account has been updated.
     *
     * @param  Account $account
     * @return \Illuminate\Http\Response
     */
    protected function accountUpdated(Account $account)
    {
        flash(trans('update-account-success'))->success()->important();
    }

}
