<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Forms\UserForm;
use App\User;

trait ReadUsers
{
    

    /**
     * Build user's show form.
     * @param  User $user
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function buildShowUserForm(User $user)
    {
        $form = \FormBuilder::create(UserForm::class, [
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
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    protected function userViewed(User $user)
    {
        
    }

}
