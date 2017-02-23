<?php

namespace App\Repositories;

use App\Models\Vendor;
use InfyOm\Generator\Common\BaseRepository;

class VendorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vendor::class;
    }
}
