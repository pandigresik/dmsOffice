<?php

namespace App\Repositories\Base;

use App\Models\Base\ContactSupplier;
use App\Models\Base\DmsApSupplier;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class DmsApSupplierRepository
 * @package App\Repositories\Base
 * @version October 29, 2021, 6:54 am UTC
*/

class DmsApSupplierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated'
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
        return DmsApSupplier::class;
    }

    public function update($input, $id)
    {
        DB::beginTransaction();

        try {
            $contactSuppliers = $input['contactSuppliers'] ?? [];
            $locationSuppliers = $input['locationSuppliers'] ?? [];
            $model = parent::update($input, $id);
            if (!empty($contactSuppliers)) {                
                foreach ($contactSuppliers as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->contactSuppliers()->create($vc);

                            break;
                        case 'update':
                            $obj = DmsApSupplier::find($key);
                            $obj->fill($vc)->save();

                            break;
                        case 'delete':
                            ContactSupplier::whereId($key)->delete();

                            break;
                    }
                }
            }
            if (!empty($locationSuppliers)) {
                foreach ($locationSuppliers as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->locationSuppliers()->create($vc);

                            break;
                        case 'update':
                            $obj = DmsApSupplier::find($key);
                            $obj->fill($vc)->save();

                            break;
                        case 'delete':
                            ContactSupplier::whereId($key)->delete();

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
