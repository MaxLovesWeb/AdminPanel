<?php

namespace Modules\Account\Traits;

use Modules\Account\Entities\Account;
use Modules\Account\Entities\Permissions;

trait HasAccount
{

    public static function bootHasAccount()
    {
        //static::created(function ($model)
        //{
        //    $model->account()->create();    
        //});

        static::deleting(function ($model)
        {
            $model->account()->delete();    
        });
    }

    /**
     * User has one account
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function account()
    {
        return $this->hasOne(Account::class);
    }

    /**
     * Update Account
     *
     * @return object
     */
    public function updateAccount($attributes = [])
    {
        return $this->account()->update($attributes);
    }

    /**
     * Add a permission to model.
     * @param string|array $permission
     * @return Permissions
     */
    public function addAccountPermission($permission)
    {
        if( ! $this->hasAccountPermission($permission))
            return $this->account->addPermission($permission);
    }

    /**
     * Check if the model has a permission.
     * @param string|array $permission
     * @return bool
     */
    public function hasAccountPermission($permission)
    {
        return $this->account->findPermission($permission)->count();
    }

    /**
     * Get all roles to model.
     * @param string|array $role
     * @return Permissions
     */
    public function getAllAccountRole($role)
    {
        return $this->account->findRole($role)->get();
    }

    /**
     * Get a role to model.
     * @param string|array $role
     * @return Permissions
     */
    public function getAccountRoles()
    {
        return $this->account->allRoles();
    }

    /**
     * Add a role to model.
     * @param string|array $role
     * @return array
     */
    public function addAccountRole($role)
    {
        return $this->account->addRole($role);
    }

    /**
     * Check if the model has a role.
     * @param string|array $role
     * @return bool
     */
    public function hasAccountRole($role)
    {
        return $this->account->findRole($role)->count();
    }

}