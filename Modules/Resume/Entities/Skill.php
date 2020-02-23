<?php

namespace Modules\Resume\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\User;
use Modules\Company\Traits\BelongsToCompany;


class Skill extends Model
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
        'name',
    ];

    /**
     * Typecast for protection.
     *
     * @var array
     */
    protected $casts = [
        'name'         => 'string',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * Get user that are assigned this resume.
     */
    public function resume()
    {
        return $this->belongsToMany(Resume::class, 'resume_skill');
    }

}
