<?php

namespace Modules\Account\Traits;

use Modules\Account\Forms\AccountForm;
use Modules\Account\Entities\Account;

trait ReadAccounts
{

    /**
     * Build account show form.
     * @param  Account $account
     * @param  FormBuilder $formBuilder
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildShowAccountForm($account)
    {

        $form = \FormBuilder::create(AccountForm::class, [
            //'method' => 'PUT',
            //'url' => route('users.update', $user),
            'model' => $account
        ]);

        $form->remove('submit')->disableFields();

        return $form;
    }

    /**
     * The account has been viewed.
     *
     * @param  Account $account
     * @return \Illuminate\Http\Response
     */
    protected function accountViewed(Account $account)
    {
        
    }

}
