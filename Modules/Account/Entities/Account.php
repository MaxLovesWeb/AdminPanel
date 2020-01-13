<?php

namespace Modules\Account\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

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
    ];


    public static $rules = [
        'user_id' => 'required|integer|exist:users,id',
        'first_name' => 'required|string|max:150',
        'last_name' => 'nullable|string|max:150',
        'phone' => 'nullable',
        'email' => 'nullable|email',
        'gender' => 'string|nullable|string|max:150',
        'title' => 'string|nullable|string|max:150',
        'birthDate'=> 'nullable|date',
        'birthPlace'=> 'string|nullable|string|max:150',
        'faxNumber'=> 'string|nullable|string|max:150',
        'jobTitle'=> 'string|nullable|string|max:150',
        'biography'=> 'string|nullable|string|max:150',
        'nationality' => 'string|nullable|string|max:150',
    ];

    /**
     * Account belong to user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
