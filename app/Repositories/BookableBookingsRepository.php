<?php

namespace App\Repositories;

use App\Models\BookableBookings;
use App\Repositories\BaseRepository;

/**
 * Class BookableBookingsRepository
 * @package App\Repositories
 * @version July 26, 2021, 7:57 am UTC
*/

class BookableBookingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bookable_type',
        'bookable_id',
        'customer_type',
        'customer_id',
        'starts_at',
        'ends_at',
        'canceled_at',
        'timezone',
        'price',
        'quantity',
        'total_paid',
        'currency',
        'formula',
        'options',
        'notes'
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
        return BookableBookings::class;
    }
}
