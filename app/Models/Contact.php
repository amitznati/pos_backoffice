<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Contact
 * @package App\Models
 * @version February 21, 2017, 1:28 pm UTC
 */
class Contact extends Model
{
    use SoftDeletes;
    public $timestamps = false;

    protected $dates = ['deleted_at'];
    public function person()
    {
        return $this->morphOne('App\Models\Person','personable');
    }

    public $fillable = [
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function vendors()
    {
        return $this->belongsToMany(\App\Models\Vendor::class, 'rel_vandor_contact');
    }
}
