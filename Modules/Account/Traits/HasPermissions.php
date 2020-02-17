<?php

namespace Modules\Account\Traits;

use Modules\Account\Entities\Permission;

trait HasPermissions
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $permissions;

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
     * Boot the HasPermissions trait for the model.
     *
     * @return void
     */
    public static function bootHasPermissions() {

        static::deleting(function(self $model) {

            $model->permissions()->delete();

        });

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function permissions()
    {
        return $this->morphToMany(
            Permission::class, Permission::MORPHS, Permission::PIVOT
        );
    }

    /**
     * Get all permissions for the given model.
     * @return \Illuminate\Support\Collection
     */
    public function allPermissions()
    {
        return $this->permissions;
    }

    /**
     * Check if the model has a permission.
     * @param string $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->allPermissions()->contains($permission);
    }

    /**
     * Sync with detaching all permissions for the model
     * @param string|array|null $permissions
     * @param bool $detaching
     * @return array
     */
    public function syncPermissions($permissions, $detaching = true)
    {
        return $this->permissions()->sync($permissions, $detaching);
    }

}
