<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Account\Traits\UpdateRelations;

class Permission extends Model
{
    use UpdateRelations;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'slug';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

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
        'module',
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
        'module'        => 'string',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * morphedByMany Pivot Table Name
     * @var string
     */
    public const PIVOT = 'has_permissions';

    /**
     * morphedByMany table field name
     * @var string
     */
    public const MORPHS = 'permissible';

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Find by slug
     *
     * @param Builder $query
     * @param string $slug
     * @return Builder
     */
    public function scopeSlug(Builder $query, string $slug)
    {
        return $query->where('slug', 'like', '%'.$slug.'%');
    }

    /**
     * Get all of the user that are assigned this permission.
     *
     */
    public function users()
    {
        return $this->morphedByMany(
            User::class, self::MORPHS, self::PIVOT);
    }

    /**
     * Get all of the roles that are assigned this permission.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function roles()
    {
        return $this->morphedByMany(
            Role::class, self::MORPHS, self::PIVOT);
    }



}
