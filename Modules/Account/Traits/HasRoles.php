<?php

namespace Modules\Account\Traits;

use Modules\Account\Entities\Role;

trait HasRoles
{

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $roles;

    /**
     * Register a deleted model event with the dispatcher.
     *
     * @param \Closure|string $callback
     *
     * @return void
     */
    abstract public static function deleting($callback);

    /**
     * Define a polymorphic many-to-many relationship.
     *
     * @param  string  $related
     * @param  string  $name
     * @param  string|null  $table
     * @param  string|null  $foreignPivotKey
     * @param  string|null  $relatedPivotKey
     * @param  string|null  $parentKey
     * @param  string|null  $relatedKey
     * @param  bool  $inverse
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    abstract public function morphToMany($related, $name, $table = null, $foreignPivotKey = null,
                                         $relatedPivotKey = null, $parentKey = null,
                                         $relatedKey = null, $inverse = false);


    /**
     * Boot the HasRoles trait for the model.
     *
     * @return void
     */
    public static function bootHasRoles()
    {
        static::deleting(function(self $model) {
            $model->roles()->delete();
        });

    }

    /**
     * Get all of the roles for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function roles()
    {
        return $this->morphToMany(Role::class, 'model', 'has_roles');
    }

    /**
     * Get all roles for the given model.
     * \Illuminate\Support\Collection
     */
    public function allRoles()
    {
        return $this->roles;
    }

    /**
     * Check if the model has a role.
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->allRoles()->contains($role);
    }

    /**
     * Sync with detaching all roles for the model
     * @param string|array|null $roles
     * @param bool $detaching
     * @return array
     */
    public function syncRoles($roles, $detaching = true)
    {
        return $this->roles()->sync($roles, $detaching);
    }

}
