<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvProduct;
use App\Repositories\BaseRepository;

/**
 * Class DmsInvProductRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsInvProductRepository extends BaseRepository
{
    protected $lookupColumnSelect = ['id' => 'szId', 'text' => 'szName'];
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szTrackingType',
        'szUomId',
        'bUseComposite',
        'bKit',
        'szQtyFormat',
        'szProductType',
        'szNickName',
        'dtmStartDate',
        'dtmEndDate',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated',
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
        return DmsInvProduct::class;
    }

    public function paginate($perPage, $currentPage = 1, $columns = ['*'], $search = [])
    {
        $query = $this->allQuery();
        if (!empty($search)) {
            $query->search($search['keyword'], $search['column']);
        }
        $dataPaging = $query->simplePaginate($perPage, $columns, 'page', $currentPage);
        $dataPaging->getCollection()->map(function($item){
            return ['id' => $item['id'], 'text' => $item['text'] = $item['text'].' ( '.$item['id'].' )'];
        })->toArray();
        return $dataPaging;
    }
}
