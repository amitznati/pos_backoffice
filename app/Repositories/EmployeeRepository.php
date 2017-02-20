<?php

namespace App\Repositories;

use App\Models\Employee;
use InfyOm\Generator\Common\BaseRepository;


class EmployeeRepository extends BaseRepository
{

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Employee::class;
    }
}
