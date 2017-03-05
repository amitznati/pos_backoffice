<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DisplayInfo
 * @package App\Models
 * @version March 5, 2017, 9:41 pm UTC
 */
class DisplayInfo extends Model
{
    use SoftDeletes;

    public $table = 'display_info';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'menu_id',
        'displayable_id',
        'displayable_type',
        'display_name',
        'index_row',
        'index_column',
        'number_of_rows',
        'number_of_columns'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'menu_id' => 'integer',
        'displayable_id' => 'integer',
        'displayable_type' => 'string',
        'display_name' => 'string',
        'index_row' => 'integer',
        'index_column' => 'integer',
        'number_of_rows' => 'integer',
        'number_of_columns' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class);
    }

    public function displayable()
    {
        return $this->morphTo('displayable');
    }
}