<?php

namespace Modules\Resume\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\User;
use Modules\Company\Traits\BelongsToCompany;


class Education extends Model
{

    use BelongsToCompany;

    protected $table = 'educations';
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'end_date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'title',
        'course',
        'description',
        'start_date',
        'end_date'
    ];

    /**
     * Typecast for protection.
     *
     * @var array
     */
    protected $casts = [
        'status'         => 'string',
        'description'        => 'text',
        'start_date'        => 'datetime',
        'end_date'      => 'datetime',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * Get user that are assigned this resume.
     */
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

}
