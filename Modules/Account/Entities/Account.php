<?php

namespace Modules\Account\Entities;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Modules\Account\Traits\HasPermissions;
use Modules\Account\Traits\HasRoles;

class Account extends Model
{

    use BelongsToUser, HasPermissions, HasRoles;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

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
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'gender',
        'title',
        'birthDate',
        'birthPlace',
        'faxNumber',
        'jobTitle',
        'biography',
        'nationality',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'gender' => 'string',
        'title' => 'string',
        'birthDate'=> 'datetime',
        'birthPlace'=> 'string',
        'faxNumber'=> 'string',
        'jobTitle'=> 'string',
        'biography'=> 'string',
        'nationality' => 'string',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * Get the validation rules.
     *
     * @var array
     */
    public static $rules = [
        //'user_id' => 'required|integer|exist:users,id',
        'first_name' => 'nullable|string|max:150',
        'last_name' => 'nullable|string|max:150',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'gender' => 'string|nullable|max:150',
        'title' => 'string|nullable|max:150',
        'birthDate'=> 'nullable|date',
        'birthPlace'=> 'string|nullable|max:150',
        'faxNumber'=> 'string|nullable|max:150',
        'jobTitle'=> 'string|nullable|max:150',
        'biography'=> 'string|nullable|max:150',
        'nationality' => 'string|nullable|max:150',
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @var array
     */
    public static $messages = [];


}
