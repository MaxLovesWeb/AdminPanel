<?php

namespace Modules\Account\Policies;

use Modules\Account\Entities\Permission;
use Modules\Account\Entities\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
        return $user->allows('viewAny-permissions');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Permission $permission
     * @return bool
     */
    public function view(User $user, Permission $permission)
    {
        return $user->allows('view-permissions');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine if the given user can be updated by the auth user.
     *
     * @param User $user
     * @param Permission $permission
     * @return bool
     */
    public function update(User $user,  Permission $permission)
    {
        return $user->allows('update-permissions');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Permission $permission
     * @return bool
     */
    public function delete(User $user,  Permission $permission)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Permission $permission
     * @return bool
     */
    public function restore(User $user, Permission $permission)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Permission $permission
     * @return bool
     */
    public function forceDelete(User $user, Permission $permission)
    {
        return false;
    }

}
