<?php

namespace Modules\Resume\Policies;

use Modules\Account\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Company\Entities\Company;
use Modules\Resume\Entities\Resume;

class ResumePolicy
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
        return $user->allows('viewAny-resume');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User $user
     * @param  Resume $resume
     * @return bool
     */
    public function view(User $user, Resume $resume)
    {
        return $user->allows('view-resume');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->allows('create-resume');
    }

    /**
     * Determine if the given resume can be updated by the auth user.
     *
     * @param  User $user
     * @param  Resume $resume
     * @return bool
     */
    public function update(User $user, Resume $resume)
    {
        return $user->allows('update-resume');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User $user
     * @param  Resume $resume
     * @return bool
     */
    public function delete(User $user, Resume $resume)
    {
        return $user->allows('delete-resume');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User $user
     * @param  Resume $resume
     * @return bool
     */
    public function restore(User $user, Resume $resume)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User $user
     * @param  Resume $resume
     * @return bool
     */
    public function forceDelete(User $user, Resume $resume)
    {
        return false;
    }

}
