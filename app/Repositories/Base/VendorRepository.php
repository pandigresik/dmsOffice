<?php

namespace App\Repositories\Base;

use App\Models\Base\Vendor;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class VendorRepository.
 *
 * @version August 10, 2021, 1:39 pm UTC
 */
class VendorRepository extends BaseRepository
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
        return Vendor::class;
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
        DB::beginTransaction();

        try {
            $vendorContact = $input['vendorContact'] ?? [];
            $vendorLocation = $input['vendorLocation'] ?? [];
            $model = parent::create($input);
            if (!empty($vendorContact)) {
                $model->vendorContacts()->createMany($vendorContact);
            }
            if (!empty($vendorLocation)) {
                $model->vendorLocations()->createMany($vendorLocation);
            }
            DB::commit();

            return $model;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);

            return $e;
        }
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
        DB::beginTransaction();

        try {
            $vendorContact = $input['vendorContact'] ?? [];
            $vendorLocation = $input['vendorLocation'] ?? [];
            $model = parent::update($input, $id);
            if (!empty($vendorContact)) {
                foreach ($vendorContact as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->vendorContacts()->create($vc);

                            break;
                        case 'update':
                            $obj = \App\Models\Base\VendorContact::find($key);
                            $obj->fill($vc)->save();

                            break;
                        case 'delete':
                            \App\Models\Base\VendorContact::whereId($key)->delete();

                            break;
                    }
                }
            }
            if (!empty($vendorLocation)) {
                foreach ($vendorLocation as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->vendorLocations()->create($vc);

                            break;
                        case 'update':
                            $obj = \App\Models\Base\VendorLocation::find($key);
                            $obj->fill($vc)->save();

                            break;
                        case 'delete':
                            \App\Models\Base\VendorLocation::whereId($key)->delete();

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

        // $trips = $input['trips'];
        // unset($input['trips']);
        // $model = parent::update($input, $id);
        // $model->trips()->sync($trips);
    }
}
