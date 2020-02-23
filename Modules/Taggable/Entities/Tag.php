<?php

namespace Modules\Taggable\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Resume\Entities\Resume;

class Tag extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
        'parent_id'
    ];

    /**
     * Typecast for protection.
     *
     * @var array
     */
    protected $casts = [
        'slug'          => 'string',
        'name'          => 'string',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * Get all of the accounts that are assigned this role.
     */
    public function resumes()
    {
        return $this->morphedByMany(Resume::class, 'taggable');
    }
}
