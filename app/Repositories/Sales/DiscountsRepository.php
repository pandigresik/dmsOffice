<?php

namespace App\Repositories\Sales;

use App\Models\Sales\DiscountDetail;
use App\Models\Sales\DiscountMember;
use App\Models\Sales\Discounts;
use App\Repositories\BaseRepository;

/**
 * Class DiscountsRepository.
 *
 * @version December 23, 2021, 10:46 am WIB
 */
class DiscountsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis',
        'name',
        'start_date',
        'end_date',
        'split',
        'main_dms_inv_product_id',
        'main_quota',
        'bundling_dms_inv_product_id',
        'bundling_quota',
        'max_quota',
        'state',
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
        return Discounts::class;
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
            $discountDetails = $input['discount_details'];
            $discountMembers = $input['discount_members'];
            $period = explode('__', $input['period']);
            $input['start_date'] = $period[0];
            $input['end_date'] = $period[1];
            $input['split'] = $input['split'] ?? 0;
            $input['state'] = $input['state'] ?? 'A';
            
            $model = $this->model->newInstance($input);
            $model->save();

            $this->createMember($discountMembers, $model);
            $defaultValue = $this->getDefaultValue($model->jenis);
            $this->createDetail($discountDetails, $model, $defaultValue);

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
            $discountDetails = $input['discount_details'];
            $discountMembers = $input['discount_members'];
            $period = explode('__', $input['period']);
            $input['start_date'] = $period[0];
            $input['end_date'] = $period[1];
            $input['split'] = $input['split'] ?? 0;
            $input['state'] = $input['state'] ?? 'A';            
            $model = parent::update($input, $id);            
            $this->removeMember($model);
            $this->createMember($discountMembers, $model);
            $defaultValue = $this->getDefaultValue($model->jenis);
            $this->removeDetail($model);
            $this->createDetail($discountDetails, $model, $defaultValue);

            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e;
        }

        return $model;
    }

    private function removeMember($model){
        DiscountMember::where('discounts_id', $model->id)->forceDelete();
    }

    private function removeDetail($model){
        DiscountDetail::where('discounts_id', $model->id)->forceDelete();
    }

    private function createMember($discountMembers, $model)
    {
        $tipeDiscountMember = $discountMembers['tipe'];
        foreach ($discountMembers['member_id'] as $member) {
            $model->members()->create(['member_id' => $member, 'tipe' => $tipeDiscountMember]);
        }
    }

    private function createDetail($discountDetails, $model, $defaultValue)
    {        
        foreach ($discountDetails['main_dms_inv_product_id'] as $k => $r) {
            $insertData = [
                'main_dms_inv_product_id' => $r,
                'min_main_qty' => $discountDetails['min_main_qty'][$k] ?? $defaultValue['min_main_qty'],        
                'max_main_qty'=> $discountDetails['max_main_qty'][$k] ?? $defaultValue['max_main_qty'],
                'bundling_dms_inv_product_id'=> $discountDetails['bundling_dms_inv_product_id'][$k] ?? $defaultValue['bundling_dms_inv_product_id'],
                'min_bundling_qty'=> $discountDetails['min_bundling_qty'][$k] ?? $defaultValue['min_bundling_qty'],
                'max_bundling_qty'=> $discountDetails['max_bundling_qty'][$k] ?? $defaultValue['max_bundling_qty'],
                'principle_amount'=> $discountDetails['principle_amount'][$k] ?? $defaultValue['principle_amount'],
                'distributor_amount'=> $discountDetails['distributor_amount'][$k] ?? $defaultValue['distributor_amount'],
                'package'=> $discountDetails['package'][$k] ?? $defaultValue['package'],
            ];
            $model->details()->create($insertData);
        }
    }

    private function getDefaultValue($jenis){
        $tmp = [            
            'min_main_qty' => 1,
            'max_main_qty' => 99999,
            'bundling_dms_inv_product_id' => NULL,
            'min_bundling_qty' => NULL,
            'max_bundling_qty' => NULL,        
            'distributor_amount' => 0,
            'package' => NULL
        ];        

        return $tmp;
    }
}
