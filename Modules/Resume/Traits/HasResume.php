<?php

namespace Modules\Resume\Traits;

use Modules\Resume\Entities\Resume;

trait HasResume
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
     * Define a one-to-many relationship.
     *
     * @param  string  $related
     * @param  string|null  $foreignKey
     * @param  string|null  $localKey
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    abstract public function hasMany($related, $foreignKey = null, $localKey = null);

    /**
     * Boot the HasCompanies trait for the model.
     *
     * @return void
     */
    public static function bootHasResume()
    {
        static::deleting(function(self $model) {
            $model->resumes()->delete();
        });

    }

    /**
     * Get all resume for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resume()
    {
        return $this->hasMany(Resume::class);
    }
}
