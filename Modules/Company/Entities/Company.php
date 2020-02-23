<?php

namespace Modules\Company\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\User;
use Modules\Account\Traits\UpdateRelations;
use Modules\Addresses\Traits\HasAddresses;
use Modules\Person\Traits\HasPersons;

class Company extends Model
{
    use UpdateRelations, HasAddresses, HasPersons;

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
     * morphedByMany Pivot Table Name
     * @var string
     */
    public const PIVOT = 'has_companies';

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

}
