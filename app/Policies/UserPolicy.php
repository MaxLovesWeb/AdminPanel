<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\odel::App\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return true;
    }

    /**
     * Determine if the given user can be updated by the auth user.
     *
     * @param  \App\User  $authenticate
     * @param  \App\User  $user
     * @return bool
     */
    public function update(User $authenticate, User $user)
    {
        return $authenticate->getKey() === $user->getKey(); // password update can only for your self
    }

    /**
     * Determine if the given user can delete by the auth user.
     *
     * @param  \App\User  $authenticate
     * @param  \App\User  $user
     * @return bool
     */
    public function delete(User $authenticate, User $user)
    {
        return $authenticate->getKey() === $user->getKey();
    }
    
}
