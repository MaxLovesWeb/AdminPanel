<?php

namespace Modules\Person\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\User;
use Modules\Addresses\Traits\HasAddresses;
use Modules\Company\Traits\HasCompanies;
use Modules\Contact\Traits\HasContacts;
use Modules\Person\Traits\HasPersons as HasFriends;

class Person extends Model
{
    use HasAddresses, HasCompanies, HasFriends, HasContacts;

    protected $table = 'persons';

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
        'first_name',
        'last_name',
    ];

    /**
     * Typecast for protection.
     *
     * @var array
     */
    protected $casts = [
        'first_name'  => 'string',
        'last_name'   => 'string',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all friends for the given user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function friends()
    {
        return $this->persons();
    }




}
