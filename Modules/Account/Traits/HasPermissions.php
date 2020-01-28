<?php

namespace Modules\Account\Traits;

use Modules\Account\Entities\Permissions;

trait HasPermissions
{

    /**
     * morphMany permissions.
     * 
     * @return morphMany
     */
    public function permissions()
    {
        return $this->morphMany(Permissions::class, 'permissible');
    }

    /**
     * Get all permissions for the given model.
     * @return array
     */
    public function allPermissions()
    {
        return $this->permissions;
    }

    /**
     * Check if the model has a permission.
     * @param string|array $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->findPermission($permission)->count();
    }

    /**
     * Check if the model has a permission.
     * @param string|array $permission
     * @return bool
     */
    public function findPermission($permission)
    {
       
        return $this->permissions()->slug($permission);
    }

    /**
     * Add a permission to model.
     * @param string|array $permission
     * @return Permissions
     */
    public function addPermission($slug)
    {
        return $this->permissions()->create(
            compact('slug')
        );
    }

    /**
     * Remove permission from model.
     * @param string|array|null $permission
     * @return bool
     */
    public function removePermission($permission)
    {
        return $this->findPermission($permission)->delete();
    }

    /**
     * Remove all permissions from model.
     * @return bool
     */
    public function removeAllPermissions()
    {
        return $this->permissions()->delete();
    }

    /**
     * Sync with detaching all permissions for the model.
     * @return array
     */
    public function syncPermissions($permissions = [])
    {
        if ($this->removeAllPermissions())

            return $this->addPermission($permissions);
    }

}
