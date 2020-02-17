<?php

namespace Modules\Addresses\Traits;

use Modules\Addresses\Entities\Address;

trait HasAddresses
{

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $addresses;

    /**
     * Register a deleted model event with the dispatcher.
     *
     * @param \Closure|string $callback
     *
     * @return void
     */
    abstract public static function deleting($callback);

    /**
     * Define a polymorphic one-to-many relationship.
     *
     * @param  string  $related
     * @param  string  $name
     * @param  string|null  $type
     * @param  string|null  $id
     * @param  string|null  $localKey
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    abstract public function morphMany($related, $name, $type = null, $id = null, $localKey = null);

    /**
     * Boot the HasRoles trait for the model.
     *
     * @return void
     */
    public static function bootHasAddresses()
    {
        static::deleting(function(self $model) {
            $model->addresses()->delete();
        });
    }

    /**
     * Get all of the roles for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * Get all addresses for the given model.
     * \Illuminate\Support\Collection
     */
    public function allAddresses()
    {
        return $this->addresses;
    }

}
