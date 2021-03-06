<?php

namespace Modules\Resume\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\User;
use Modules\Company\Entities\Company;
use Modules\Company\Traits\BelongsToCompany;

class Experience extends Model
{

    use BelongsToCompany;

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
        'company_id',
        'title',
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
        'title'         => 'string',
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
