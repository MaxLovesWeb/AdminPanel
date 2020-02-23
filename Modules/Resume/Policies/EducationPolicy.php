<?php

namespace Modules\Resume\Policies;

use Modules\Account\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Company\Entities\Company;
use Modules\Resume\Entities\Education;
use Modules\Resume\Entities\Resume;

class EducationPolicy
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
        return $user->allows('viewAny-educations');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User $user
     * @param  Education $education
     * @return bool
     */
    public function view(User $user, Education $education)
    {
        return $user->allows('view-educations');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->allows('create-educations');
    }

    /**
     * Determine if the given resume can be updated by the auth user.
     *
     * @param  User $user
     * @param  Education $education
     * @return bool
     */
    public function update(User $user, Education $education)
    {
        return $user->allows('update-educations');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User $user
     * @param  Education $education
     * @return bool
     */
    public function delete(User $user, Education $education)
    {
        return $user->allows('delete-educations');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User $user
     * @param  Education $education
     * @return bool
     */
    public function restore(User $user, Education $education)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User $user
     * @param  Education $education
     * @return bool
     */
    public function forceDelete(User $user, Education $education)
    {
        return false;
    }

}
