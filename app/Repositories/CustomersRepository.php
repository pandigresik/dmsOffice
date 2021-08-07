<?php

namespace App\Repositories;

use App\Models\Customers;
use App\Repositories\BaseRepository;

/**
 * Class CustomersRepository
 * @package App\Repositories
 * @version July 30, 2021, 6:50 am UTC
*/

class CustomersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'hp_number',
        'address',
        'city',
        'country'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Customers::class;
    }
}
