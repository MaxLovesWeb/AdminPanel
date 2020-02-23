<?php

namespace Modules\Resume\Policies;

use Modules\Account\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Company\Entities\Company;
use Modules\Resume\Entities\Education;
use Modules\Resume\Entities\Experience;
use Modules\Resume\Entities\Resume;

class ExperiencePolicy
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
        return $user->allows('viewAny-experiences');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User $user
     * @param  Experience $experience
     * @return bool
     */
    public function view(User $user, Experience $experience)
    {
        return $user->allows('view-experiences');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->allows('create-experiences');
    }

    /**
     * Determine if the given resume can be updated by the auth user.
     *
     * @param  User $user
     * @param  Experience $experience
     * @return bool
     */
    public function update(User $user, Experience $experience)
    {
        return $user->allows('update-experiences');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User $user
     * @param  Experience $experience
     * @return bool
     */
    public function delete(User $user, Experience $experience)
    {
        return $user->allows('delete-experiences');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User $user
     * @param  Experience $experience
     * @return bool
     */
    public function restore(User $user, Experience $experience)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User $user
     * @param  Experience $experience
     * @return bool
     */
    public function forceDelete(User $user, Experience $experience)
    {
        return false;
    }

}
