<?php

namespace Modules\Person\Policies;

use Modules\Account\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Company\Entities\Company;
use Modules\Person\Entities\Person;

class PersonPolicy
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
        return $user->allows('viewAny-persons');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User $user
     * @param  Person $person
     * @return bool
     */
    public function view(User $user, Person $person)
    {
        return $user->allows('view-persons');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->allows('create-persons');
    }

    /**
     * Determine if the given user can be updated by the auth user.
     *
     * @param  User $user
     * @param  Person $person
     * @return bool
     */
    public function update(User $user, Person $person)
    {
        return $user->allows('update-persons');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User $user
     * @param  Person $person
     * @return bool
     */
    public function delete(User $user, Person $person)
    {
        return $user->allows('delete-persons');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User $user
     * @param  Person $person
     * @return bool
     */
    public function restore(User $user, Person $person)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User $user
     * @param  Person $person
     * @return bool
     */
    public function forceDelete(User $user, Person $person)
    {
        return false;
    }

}
