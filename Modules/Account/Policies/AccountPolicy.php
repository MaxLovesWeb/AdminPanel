<?php

namespace Modules\Account\Policies;

use App\User;
use Modules\Account\Entities\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
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
     * @param  Account $account
     * @return bool
     */
    public function view(User $user, Account $account)
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
    public function update(User $authenticate, Account $account)
    {
        //return $authenticate->getKey() === $account->user->getKey();
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $authenticate
     * @param  Account  $account
     * @return bool
     */
    public function delete(User $user, Account $account)
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
    public function restore(User $user, Account $account)
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
    public function forceDelete(User $user, Account $account)
    {
        return false;
    }
    
}
