<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvCarrierdriver;
use App\Repositories\BaseRepository;

/**
 * Class DmsInvCarrierdriverRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsInvCarrierdriverRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'intItemNumber',
        'szDriverName',
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
        return DmsInvCarrierdriver::class;
    }
}
