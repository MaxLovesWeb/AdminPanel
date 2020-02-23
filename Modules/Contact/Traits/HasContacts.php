<?php

namespace Modules\Contact\Traits;

use Modules\Company\Entities\Company;
use Modules\Contact\Entities\Contact;

trait HasContacts
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
     * Boot the HasContacts trait for the model.
     *
     * @return void
     */
    public static function bootHasContacts()
    {
        static::deleting(function(self $model) {
            $model->contacts()->delete();
        });
    }

    /**
     * Get contacts for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     */
    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

}
