<?php

namespace Modules\Account\Entities;

use EloquentFilter\Filterable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Account\Filters\UserFilter;
use Modules\Account\Traits\HasPermissions;
use Modules\Account\Traits\HasRoles;
use Modules\Account\Traits\UpdateRelations;
use Modules\Addresses\Traits\HasAddresses;
use Modules\Company\Traits\HasCompanies;
use Modules\Person\Entities\Person;
use Modules\Person\Traits\HasOnePerson;
use Modules\Resume\Traits\HasResume;

class User extends Authenticatable implements MustVerifyEmail
{

    use Notifiable;

    use HasPermissions, HasRoles, HasAddresses, HasCompanies;

    use HasOnePerson, HasResume;

    use UpdateRelations, Filterable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'title', 'last_name', 'first_name',
        'phone', 'biography',
        'birthDate'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'name' => 'string',
        'title' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'phone' => 'string',
        'birthDate'=> 'date',
        'biography'=> 'string',
        'nationality' => 'string',

        'email_verified_at' => 'datetime'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'birthDate'
    ];


    /**
     * Get the validation rules.
     *
     * @var array
     */
    public static $rules = [

        'name' => [
            'required_with:password', 'string', 'unique:users'
        ],
        'email' => ['required_with:password', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required_with:name,email', 'string', 'min:8', 'confirmed'],
        'first_name' => ['nullable', 'string', 'max:255'],
        'last_name' => ['nullable', 'string', 'max:255'],
        'title' => ['nullable', 'string', 'max:255'],
        'phone' => ['nullable', 'string', 'max:255'],
        'birthDate' => ['nullable', 'date'],
        'biography' => ['nullable', 'string', 'max:255'],
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @var array
     */
    public static $messages = [];

    /**
     * Provide Eloquent Filter
     * @return string
     */
    public function modelFilter()
    {
        return $this->provideFilter(UserFilter::class);
    }

    /**
     * Mark the given user's email as unverified.
     *
     * @return bool
     */
    public function markEmailAsUnverified()
    {
        return $this->forceFill([
            'email_verified_at' => NULL,
        ])->save();
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }

    public function allows($permission)
    {
        return $this->hasPermission($permission) || $this->hasRolePermission($permission);
    }

    public function denies($permission)
    {
        return ! $this->allows($permission);
    }



}
