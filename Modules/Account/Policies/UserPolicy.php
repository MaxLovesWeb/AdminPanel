<?php

namespace Modules\Account\Policies;

use Modules\Account\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->allows('viewAny-users');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User $auth
     * @param  User $user
     * @return bool
     */
    public function view(User $auth, User $user)
    {
        return $user->allows('view-users') || $auth->getKey() === $user->getKey();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine if the given user can be updated by the auth user.
     *
     * @param User $auth
     * @param User $user
     * @return bool
     */
    public function update(User $auth, User $user)
    {
        return $user->allows('update-users') || $auth->getKey() === $user->getKey();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $auth
     * @param User $user
     * @return bool
     */
    public function delete(User $auth, User $user)
    {
        return $user->allows('update-users') || $auth->getKey() === $user->getKey();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $auth
     * @param User $user
     * @return bool
     */
    public function restore(User $auth, User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $auth
     * @param User $user
     * @return bool
     */
    public function forceDelete(User $auth, User $user)
    {
        return false;
    }

}
