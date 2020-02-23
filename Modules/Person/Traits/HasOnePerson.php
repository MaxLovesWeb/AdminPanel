<?php

namespace Modules\Person\Traits;

use Modules\Company\Entities\Company;
use Modules\Person\Entities\Person;

trait HasOnePerson
{
    /**
     * Register a deleted model event with the dispatcher.
     *
     * @param \Closure|string $callback
     *
     * @return void
     */
    abstract public static function deleting($callback);

    /**
     * Define a one-to-one relationship.
     *
     * @param  string  $related
     * @param  string|null  $foreignKey
     * @param  string|null  $localKey
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    abstract public function hasOne($related, $foreignKey = null, $localKey = null);


    /**
     * Boot the HasCompanies trait for the model.
     *
     * @return void
     */
    public static function bootHasPerson()
    {
        static::deleting(function(self $model) {
            $model->person()->delete();
        });

        static::created(function(self $model) {
            $model->person()->create([
                'last_name' => $model->name
            ]);
        });

    }

    /**
     * Get person for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function person()
    {
        return $this->hasOne(Person::class)->withDefault();
    }
}
