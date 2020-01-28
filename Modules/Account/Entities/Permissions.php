<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;
use Permissions as Abilities;
use Modules\Account\Http\Resources\PermissionResource;
use Modules\Account\Http\Resources\PermissionGroupResource;
use Modules\Account\Http\Resources\AbilitiesResource;

class Permissions extends Model
{

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        
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
        'slug',
        'permissible_id',
        'permissible_type',
    ];

    /**
     * Typecast for protection.
     *
     * @var array
     */
    protected $casts = [
        'slug'          => 'string',
        'permissible_id'   => 'integer',
        'permissible_type'         => 'string',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime'
    ];

    /**
     * Get the validation rules.
     *
     * @var array
     */
    public static $rules = [
        'slug' => 'required|string',
        'permissible_id' => 'required|integer',
        'permissible_type' => 'required|string',
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @var array
     */
    public static $messages = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the owning permissible model.
     */
    public function permissible()
    {
        return $this->morphTo();
    }

    /**
     * Get the permissions by slug.
     */
    public function scopeSlug($query, $slug)
    {

       // return $query->whereIn('slug', $slug);

        if (is_array($slug)) {
            return $query->whereIn('slug', $slug);
        }

        return $query->whereSlug($slug);
    }

    /**
     * Get the defines permissions with filtrate by method.
     */
    public static function defined()
    {
        return Abilities::all();
    }

    /**
     * Get the defines permissions with filtrate by method.
     */
    public static function abilities($methods = [])
    {
        $abilities = [];

        foreach (self::defined() as $module) {
           
            foreach ($module->getPermissions() as $permission) {
                
                if (in_array( $permission->getName(), $methods))
                    array_push($abilities, $permission);
            }
        }

        return $abilities;
    }

}
