<?php

namespace App\Repositories;

use App\Models\group;
use InfyOm\Generator\Common\BaseRepository;

class groupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'department_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return group::class;
    }
}
