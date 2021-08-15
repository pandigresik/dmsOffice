<?php

namespace App\Repositories\Base;

use App\Models\Base\VendorExpedition;
use App\Repositories\BaseRepository;

/**
 * Class VendorExpeditionRepository.
 *
 * @version August 10, 2021, 1:39 pm UTC
 */
class VendorExpeditionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'email',
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
        return VendorExpedition::class;
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
        $trips = $input['trips'];
        unset($input['trips']);
        $model = parent::create($input);
        $model->trips()->sync($trips);
        return $model;
    }

    /**
     * Update model record for given id.
     *
     * @param array $input
     * @param int   $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {           
        $trips = $input['trips'];
        unset($input['trips']);
        $model = parent::update($input, $id);
        $model->trips()->sync($trips);
        return $model;
    }
}
