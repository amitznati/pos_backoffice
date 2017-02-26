<?php

namespace App\Repositories;

use App\Models\SaleryType;
use InfyOm\Generator\Common\BaseRepository;

class SaleryTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SaleryType::class;
    }
}
