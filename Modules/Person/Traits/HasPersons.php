<?php

namespace Modules\Person\Traits;

use Modules\Company\Entities\Company;
use Modules\Person\Entities\Person;

trait HasPersons
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
     * Boot the HasCompanies trait for the model.
     *
     * @return void
     */
    public static function bootHasPersons()
    {
        static::deleting(function(self $model) {
            $model->persons()->delete();
        });

    }

    /**
     * Get all of the persons for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function persons()
    {
        return $this->morphToMany(Person::class, 'model', 'has_persons');
    }

    /**
     * Get all persons for the given model.
     * @return \Illuminate\Support\Collection
     */
    public function allPersons()
    {
        return $this->persons;
    }

    /**
     * Check if the model has a person.
     * @param string $person
     * @return bool
     */
    public function hasPerson($person)
    {
        return $this->allPersons()->contains($person);
    }

}
