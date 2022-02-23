<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\ShippingCostManual;
use App\Models\Accounting\ShippingCostManualDetail;
use App\Repositories\BaseRepository;

/**
 * Class ShippingCostManualRepository
 * @package App\Repositories\Accounting
 * @version February 22, 2022, 1:58 pm WIB
*/

class ShippingCostManualRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
        'origin_branch_id',
        'destination_branch_id',
        'carrier_id',
        'date',
        'do_references',
        'sj_references',
        'amount'
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
        return ShippingCostManual::class;
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
        $this->model->getConnection()->beginTransaction();

        try {
            $details = $input['details'];            
            $model = $this->model->newInstance($input);
            $model->number = $model->getNextNumber();
            $model->save();            
            $this->createDetail($details, $model);

            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e;
        }

        return $model;
    }

    public function update($input, $id)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $details = $input['details'];            
            $model = parent::update($input, $id);            
            
            $this->removeDetail($model);
            $this->createDetail($details, $model);

            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e;
        }

        return $model;
    }    

    private function removeDetail($model){
        ShippingCostManualDetail::where('shipping_cost_manual_id', $model->id)->forceDelete();
    }    

    private function createDetail($details, $model)
    {        
        foreach ($details as $k => $r) {            
            $model->details()->create($r);
        }
    }

    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);
        $model->details()->forceDelete();        
        return $model->forceDelete();
    }
}
