<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Account\Traits\HasPermissions;
use Modules\Account\Traits\UpdateRelations;

class Role extends Model
{
    use HasPermissions, UpdateRelations;

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
        'description',
    ];

    /**
     * Typecast for protection.
     *
     * @var array
     */
    protected $casts = [
        'slug'          => 'string',
        'name'          => 'string',
        'description'   => 'string',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * morphedByMany Pivot Table Name
     * @var string
     */
    public const PIVOT = 'has_roles';

    /**
     * morphedByMany table field name
     * @var string
     */
    public const MORPHS = 'model';

    /**
     * Get all of the accounts that are assigned this role.
     */
    public function users()
    {
        return $this->morphedByMany(User::class, self::MORPHS, self::PIVOT);
    }


    /**
     * Scope a query to only include roles of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $slug
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSlug($query, $slug)
    {
        if (is_array($slug)) {
            return $query->whereIn('slug', $slug);
        }
        return $query->whereSlug($slug);
    }


}
