<?php

namespace App\Repositories\Base;

use App\Models\Base\Location;
use App\Repositories\BaseRepository;

/**
 * Class LocationRepository.
 *
 * @version November 13, 2021, 8:13 pm WIB
 */
class LocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'district',
        'city',
        'type',
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
        return Location::class;
    }

    /**
     * Create model record.
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {   
        $input['reference_type'] = Location::REFERENCE_TYPE[$input['type']];
        $model = parent::create($input);        

        return $model;
    }

    public function update($input, $id)
    {           
        $input['reference_type'] = Location::REFERENCE_TYPE[$input['type']];
        $model = parent::update($input, $id);        

        return $model;
    }
}
