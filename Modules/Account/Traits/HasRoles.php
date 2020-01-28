<?php

namespace Modules\Account\Traits;

use Modules\Account\Entities\Role;

trait HasRoles
{

    /**
     * Get all of the roles for the model.
     */
    public function roles()
    {
        return $this->morphToMany(Role::class, 'model', 'has_roles');
    }

    /**
     * Get all roles for the given model.
     * @return array
     */
    public function allRoles()
    {
        return $this->roles;
    }

    /**
     * Check if the model has a role ophpf roles.
     * @param string|array $role
     * @return int
     */
    public function hasRole($role)
    {
        return $this->findRole($role)->count();
    }

    /**
     * Check if the model has a role.
     * @param string|array $permission
     * @return array
     */
    public function findRole($role)
    {
        return $this->roles()->slug($role);
    }

    /**
     * Add a role to model.
     * @param string|array $role
     * @return array
     */
    public function addRole($role)
    {
        return $this->roles()->attach($role);
    }

    /**
     * Remove roles from model.
     * @param string|array|null $perolermission
     * @return bool
     */
    public function removeRole($role)
    {
        return $this->findRole($role)->detach();
    }

    /**
     * Remove all roles from model.
     * @return bool
     */
    public function removeAllRoles()
    {
        return $this->roles()->detach();
    }

    /**
     * Sync with detaching all roles for the model.
     * @return array
     */
    public function syncRoles($roles = [])
    {
        return $this->roles()->sync($roles);
    }
    
}
