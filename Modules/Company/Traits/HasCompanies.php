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
     * Boot the HasRoles trait for the model.
     *
     * @return void
     */
    public static function bootHasRCompanies()
    {
        static::deleting(function(self $model) {
            $model->companies()->delete();
        });

    }

    /**
     * Get all of the roles for the model.
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

    /**
     * Sync with detaching all companies for the model
     * @param string|array|null $companies
     * @param bool $detaching
     * @return array
     */
    public function syncCompanies($companies, $detaching = true)
    {
        return $this->companies()->sync($companies, $detaching);
    }

}
