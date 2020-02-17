<?php

namespace Modules\Addresses\Entities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
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
        'country_code',
        'street',
        'state',
        'city',
        'postcode',
        'is_primary',
        'is_billing',
        'is_shipping',
    ];

    /**
     * Typecast for protection.
     *
     * @var array
     */
    protected $casts = [
        'country_code'          => 'string',
        'street'          => 'string',
        'state'   => 'string',
        'city'   => 'string',
        'postcode'   => 'string',
        'is_primary'   => 'boolean',
        'is_billing'   => 'boolean',
        'is_shipping'   => 'boolean',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * Get the model of the address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function addressable()
    {
        return $this->morphTo('addressable', 'addressable_type', 'addressable_id');
    }

    public function getLocation()
    {
        return implode(',', [
            $this->postcode,
            $this->city,
            $this->street,
        ]);
    }
}
