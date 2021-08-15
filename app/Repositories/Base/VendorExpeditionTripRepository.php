<?php

namespace App\Repositories\Base;

use App\Models\Base\VendorExpeditionTrip;
use App\Repositories\BaseRepository;

/**
 * Class VendorExpeditionTripRepository.
 *
 * @version August 10, 2021, 1:39 pm UTC
 */
class VendorExpeditionTripRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vendor_expedition_id',
        'route_trip_id',
    ];

    /**
     * Return searchable fields.
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model.
     */
    public function model()
    {
        return VendorExpeditionTrip::class;
    }
}
