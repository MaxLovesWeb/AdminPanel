<?php

namespace Modules\Company\Traits;

use Modules\Company\Entities\Company;

trait HasCompanies
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
    public static function bootHasCompanies()
    {
        static::deleting(function(self $model) {
            $model->companies()->delete();
        });

    }

    /**
     * Get all companies for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function companies()
    {
        return $this->morphToMany(Company::class, 'model', 'has_companies');
    }

    /**
     * Get all companies for the given model.
     * @return \Illuminate\Support\Collection
     */
    public function allCompanies()
    {
        return $this->companies;
    }

    /**
     * Check if the model has a company.
     * @param string $company
     * @return bool
     */
    public function hasCompany($company)
    {
        return $this->allCompanies()->contains($company);
    }

}
