<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can be updated by the auth user.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function update(User $authenticate, User $user)
    {
        return $authenticate->getKey() === $user->getKey();
    }

    /**
     * Determine if the given user can delete by the auth user.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function delete(User $authenticate, User $user)
    {
        return $authenticate->getKey() === $user->getKey();
    }
    
}
