<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\ContactEkspedisi;
use App\Models\Inventory\DmsInvCarrier;
use App\Models\Inventory\LocationEkspedisi;
use App\Models\Inventory\TripEkspedisi;
use App\Models\Inventory\TripEkspedisiPrice;
use App\Models\Inventory\VehicleEkspedisi;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class DmsInvCarrierRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsInvCarrierRepository extends BaseRepository
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
        return DmsInvCarrier::class;
    }

    public function update($input, $id)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $contactEkspedisis = $input['contactEkspedisis'] ?? [];
            $locationEkspedisis = $input['locationEkspedisis'] ?? [];
            $vehicleEkspedisis = $input['vehicleEkspedisis'] ?? [];
            $tripEkspedisis = $input['tripEkspedisis'] ?? [];
            //$model = parent::update($input, $id);
            $model = $this->model->find($id);
            if (!empty($contactEkspedisis)) {
                foreach ($contactEkspedisis as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->contactEkspedisis()->create($vc);

                            break;
                        case 'update':
                            $obj = DmsInvCarrier::find($key);
                            $obj->fill($vc)->save();

                            break;
                        case 'delete':
                            ContactEkspedisi ::whereId($key)->forceDelete();

                            break;
                    }
                }
            }
            if (!empty($locationEkspedisis)) {
                foreach ($locationEkspedisis as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->locationEkspedisis()->create($vc);

                            break;
                        case 'update':
                            $obj = LocationEkspedisi::find($key);
                            $obj->fill($vc)->save();

                            break;
                        case 'delete':
                            LocationEkspedisi::whereId($key)->forceDelete();

                            break;
                    }
                }
            }

            if (!empty($vehicleEkspedisis)) {
                foreach ($vehicleEkspedisis as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->vehicleEkspedisis()->create($vc);

                            break;
                        case 'delete':
                            VehicleEkspedisi::where(['dms_inv_vehicle_id' => $key, 'dms_inv_carrier_id' => $id])->forceDelete();

                            break;
                    }
                }
            }

            if (!empty($tripEkspedisis)) {
                foreach ($tripEkspedisis as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $this->createEkspedisi($vc, $id);

                            break;
                        case 'update':
                            $this->updatePrice($vc, $key);

                            break;
                        case 'delete':
                            $tripEkspedisi = TripEkspedisi::where(['trip_id' => $key, 'dms_inv_carrier_id' => $id])->first();
                            $tripEkspedisi->price()->forceDelete();
                            $tripEkspedisi->forceDelete();

                            break;
                    }
                }
            }
            $this->model->getConnection()->commit();

            return $model;
        } catch (\Exception $e) {
            $this->model->getConnection()->rollBack();
            \Log::error($e);

            return $e;
        }
    }

    private function createEkspedisi($data, $id)
    {
        $trip = TripEkspedisi::create([
            'dms_inv_carrier_id' => $id,
            'trip_id' => $data['trip_id'],
        ]);
        unset($data['trip_id']);
        $trip->price()->create($data);
    }

    private function updatePrice($data, $tripEkspedisiId)
    {
        $lastPrice = TripEkspedisiPrice::where('trip_ekspedisi_id', $tripEkspedisiId)->latest()->first();
        $lastPrice->end_date = \Carbon\Carbon::createFromFormat('Y-m-d', $data['start_date'])->subDay();
        $lastPrice->save();
        $data['trip_ekspedisi_id'] = $tripEkspedisiId;
        TripEkspedisiPrice::create($data);
    }
}
