<?php

namespace App\Repositories\Base;

use App\Models\Base\ContactCustomer;
use App\Models\Base\DmsArCustomer;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class DmsArCustomerRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsArCustomerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szHierarchyId',
        'szHierarchyFull',
        'szIDCard',
        'bHasDifferentCollectAddress',
        'szCode',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated',
        'szMCOId',
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
        return DmsArCustomer::class;
    }

    public function update($input, $id)
    {
        DB::beginTransaction();

        try {
            $contactCustomers = $input['contactCustomers'] ?? [];
            $locationCustomers = $input['locationCustomers'] ?? [];
            //$model = parent::update($input, $id);
            $model = $this->model->find($id);
            if (!empty($contactCustomers)) {
                foreach ($contactCustomers as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->contactCustomers()->create($vc);

                            break;
                        case 'update':
                            $obj = DmsArCustomer::find($key);
                            $obj->fill($vc)->save();

                            break;
                        case 'delete':
                            ContactCustomer::whereId($key)->delete();

                            break;
                    }
                }
            }
            if (!empty($locationCustomers)) {
                foreach ($locationCustomers as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->locationCustomers()->create($vc);

                            break;
                        case 'update':
                            $obj = DmsArCustomer::find($key);
                            $obj->fill($vc)->save();

                            break;
                        case 'delete':
                            ContactCustomer::whereId($key)->delete();

                            break;
                    }
                }
            }
            DB::commit();

            return $model;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);

            return $e;
        }
    }
}
