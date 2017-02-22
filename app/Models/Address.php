<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Models
 * @version February 22, 2017, 10:37 am UTC
 */
class Address extends Model
{
    use SoftDeletes;

    public $table = 'addresses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'street_name',
        'street_number',
        'hous_number',
        'city',
        'zip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'street_name' => 'string',
        'street_number' => 'integer',
        'hous_number' => 'integer',
        'city' => 'string',
        'zip' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function addressable()
    {
        return $this->morphTo('addressable');
    }

}
