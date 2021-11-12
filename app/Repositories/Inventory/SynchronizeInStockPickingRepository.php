<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\SynchronizeInStockPicking;
use App\Repositories\BaseRepository;

/**
 * Class SynchronizeInStockPickingRepository.
 *
 * @version October 3, 2021, 1:40 pm UTC
 */
class SynchronizeInStockPickingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Tgl_BTB',
        'No_BTB',
        'ID_Vendor',
        'Nama_Vendor',
        'Nama_PT',
        'No_CO',
        'No_DN',
        'Tgl_sjp',
        'Depo',
        'Nama_Produk',
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
        return SynchronizeInStockPicking::class;
    }
}
