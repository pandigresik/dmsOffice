<?php

namespace App\Repositories;

use App\Models\BookableAvailabilities;
use App\Repositories\BaseRepository;

/**
 * Class BookableAvailabilitiesRepository
 * @package App\Repositories
 * @version July 26, 2021, 7:57 am UTC
*/

class BookableAvailabilitiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bookable_type',
        'bookable_id',
        'range',
        'from',
        'to',
        'is_bookable',
        'priority'
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
        return BookableAvailabilities::class;
    }
}
