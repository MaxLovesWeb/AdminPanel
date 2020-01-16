<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Forms\UserForm;
use Kris\LaravelFormBuilder\FormBuilder;
use App\User;

trait UpdateUsers
{


    /**
     * Build user's destroy form.
     * @param  User $user
     * @param  FormBuilder $formBuilder
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildUpdateUserForm($user, $formBuilder)
    {

        $form = $formBuilder->create(UserForm::class, [
            'method' => 'PUT',
            'url' => route('users.update', $user),
            'model' => $user
        ]);

        return $form;
    }

    /**
     * The user has been updated.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function userUpdated(Request $request)
    {
        
    }


}
