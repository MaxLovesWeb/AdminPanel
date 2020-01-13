<?php

namespace Modules\Account\Policies;

use App\User;
use Modules\Account\Entities\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can be updated by the auth user.
     *
     * @param  User  $authenticate
     * @param  Account  $account
     * @return bool
     */
    public function update(User $authenticate, Account $account)
    {
        return $authenticate->getKey() === $account->user->getKey();
    }
}
