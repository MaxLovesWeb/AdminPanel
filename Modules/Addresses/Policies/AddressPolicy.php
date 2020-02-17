<?php

namespace Modules\Addresses\Policies;

use Modules\Account\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Addresses\Entities\Address;

class AddressPolicy
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
     * @param  Address $address
     * @return bool
     */
    public function view(User $user, Address $address)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User $user
     * @return bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine if the given user can be updated by the auth user.
     *
     * @param  User $user
     * @param  Address $address
     * @return bool
     */
    public function update(User $user, Address $address)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User $user
     * @param  Address $address
     * @return bool
     */
    public function delete(User $user, Address $address)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User $user
     * @param  Address $address
     * @return bool
     */
    public function restore(User $user, Address $address)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User $user
     * @param  Address $address
     * @return bool
     */
    public function forceDelete(User $user, Address $address)
    {
        return false;
    }

}
