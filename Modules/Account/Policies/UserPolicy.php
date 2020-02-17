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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User $user
     * @param  User $account
     * @return bool
     */
    public function view(User $user, User $account)
    {
        return true;
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
     * @param  User  $authenticate
     * @param  Account  $account
     * @return bool
     */
    public function update(User $authenticate, User $account)
    {
        //return $authenticate->getKey() === $account->user->getKey();
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $authenticate
     * @param  User  $account
     * @return bool
     */
    public function delete(User $user, User $account)
    {
        //return $authenticate->getKey() === $account->user->getKey();
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $authenticate
     * @param  Account  $account
     * @return bool
     */
    public function restore(User $user, User $account)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $authenticate
     * @param  Account  $account
     * @return bool
     */
    public function forceDelete(User $user, User $account)
    {
        return false;
    }

}
