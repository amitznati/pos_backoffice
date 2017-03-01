<?php

namespace App\Models;

use Eloquent as Model;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Employee
 * @package App\Models
 * @version February 20, 2017, 2:54 pm UTC
 */
class Employee extends Model
{
    use SoftDeletes;
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this

    public $timestamps = false;
    public $table = 'employees';

    protected $dates = ['deleted_at'];

    public function person()
    {
        return $this->morphOne('App\Models\Person','personable');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dailyAttendances()
    {
        return $this->hasMany(\App\Models\DailyAttendance::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function permissions()
    {
        return $this->belongsToMany(\App\Models\Permission::class, 'employee_has_permissions');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'employee_has_roles');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function employeeSaleries()
    {
        return $this->hasMany(\App\Models\EmployeeSalery::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function zReports()
    {
        return $this->hasMany(\App\Models\ZReport::class);
    }
    
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    
    ];
}
