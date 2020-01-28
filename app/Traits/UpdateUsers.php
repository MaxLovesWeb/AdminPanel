<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Forms\UserForm;
use App\User;

trait UpdateUsers
{


    /**
     * Build user's destroy form.
     * @param  User $user
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildUpdateUserForm(User $user)
    {
        $form = \FormBuilder::create(UserForm::class, [
            'method' => 'PUT',
            'url' => route('users.update', $user),
            'model' => $user
        ]);

        return $form;
    }

    /**
     * The user has been updated.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    protected function userUpdated(User $user)
    {
        
    }


}
