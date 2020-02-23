<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Addresses\Traits\HasAddresses;

class Contact extends Model
{
    use HasAddresses;

    const EMAIL_TYPE = 'email';
    const PHONE_TYPE = 'phone';
    const FAX_TYPE   = 'fax';
    const GITHUB_TYPE   = 'github';
    const FACEBOOK_TYPE   = 'facebook';
    const TWITTER_TYPE   = 'twitter';
    const LINKEDIN_TYPE   = 'linkedin';


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
        'type',
        'value',
        'status',
    ];

    /**
     * Typecast for protection.
     *
     * @var array
     */
    protected $casts = [

        'type'   => 'string',
        'value'   => 'string',
        'status'   => 'boolean',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * Get the model of the address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function contactable()
    {
        return $this->morphTo('contactable', 'contactable_type', 'contactable_id');
    }

    public static function getTypes()
    {
        return [
            self::EMAIL_TYPE,
            self::PHONE_TYPE,
            self::FAX_TYPE
        ];
    }

}
