<?php

namespace Modules\Resume\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\User;
use Modules\Taggable\Traits\HasTags;

class Resume extends Model
{

    use HasTags;

    protected $table = 'resume';

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
        'title',
        'letter',
        'status',
        'optional'
    ];

    /**
     * Typecast for protection.
     *
     * @var array
     */
    protected $casts = [
        'title'         => 'string',
        'letter'        => 'text',
        'status'        => 'text',
        'optional'      => 'json',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * Get user that are assigned this resume.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'resume_skill');
    }

    public function getPersonAttribute()
    {
        return $this->user->person;
    }

    public function getFirstNameAttribute()
    {
        return ucfirst($this->person->first_name);
    }

    public function getLastNameAttribute()
    {
        return ucfirst($this->person->last_name);
    }

    public function getNameAttribute()
    {
        return $this->last_name.' '.$this->first_name;
    }


}
