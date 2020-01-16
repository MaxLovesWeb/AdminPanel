<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Forms\UserForm;
use Kris\LaravelFormBuilder\FormBuilder;
use App\User;

trait ShowUsers
{
    

    /**
     * Build user's show form.
     * @param  User $user
     * @param  FormBuilder $formBuilder
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildShowUserForm($user, $formBuilder)
    {

        $form = $formBuilder->create(UserForm::class, [
            //'method' => 'PUT',
            //'url' => route('users.update', $user),
            'model' => $user
        ]);

        $form->remove('submit')->remove('password');

        $form->disableFields();

        return $form;
    }

    /**
     * The user has been viewed.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function userViewed(Request $request)
    {
        
    }

}
