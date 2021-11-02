<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsInvVehicle",
 *      required={"iId", "szId", "szName", "szDescription", "szBranchId", "szPoliceNo", "szChassisNo", "szMachineNo", "decWeight", "decVolume", "szVehicleTypeId", "dtmVehicleLicense", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated"},
 *      @SWG\Property(
 *          property="iInternalId",
 *          description="iInternalId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="iId",
 *          description="iId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szId",
 *          description="szId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szName",
 *          description="szName",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDescription",
 *          description="szDescription",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szUserCreatedId",
 *          description="szUserCreatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szUserUpdatedId",
 *          description="szUserUpdatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmCreated",
 *          description="dtmCreated",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="dtmLastUpdated",
 *          description="dtmLastUpdated",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class DmsInvVehicle extends Model
{
    use HasFactory;

    const CREATED_AT = 'dtmCreated';
    const UPDATED_AT = 'dtmLastUpdated';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'dms_inv_vehicle';

    public $primaryKey = 'iInternalId';
    public $fillable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szBranchId',
        'szPoliceNo',
        'szChassisNo',
        'szMachineNo',
        'decWeight',
        'decVolume',
        'szVehicleTypeId',
        'dtmVehicleLicense',
        //'szUserCreatedId',
        // 'szUserUpdatedId',
        //'dtmCreated',
        //'dtmLastUpdated',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szId' => 'required|string|max:50',
        'szName' => 'required|string|max:50',
        'szDescription' => 'required|string|max:200',
        'szBranchId' => 'required|string|max:50',
        'szPoliceNo' => 'required|string|max:50',
        'szChassisNo' => 'required|string|max:50',
        'szMachineNo' => 'required|string|max:50',
        'decWeight' => 'required|numeric',
        'decVolume' => 'required|numeric',
        'szVehicleTypeId' => 'required|string|max:50',
        'dtmVehicleLicense' => 'required',
        'szUserCreatedId' => 'required|string|max:20',
        'szUserUpdatedId' => 'required|string|max:20',
        'dtmCreated' => 'required',
        'dtmLastUpdated' => 'required',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'iInternalId' => 'integer',
        'iId' => 'string',
        'szId' => 'string',
        'szName' => 'string',
        'szDescription' => 'string',
        'szBranchId' => 'string',
        'szPoliceNo' => 'string',
        'szChassisNo' => 'string',
        'szMachineNo' => 'string',
        'decWeight' => 'decimal:4',
        'decVolume' => 'decimal:4',
        'szVehicleTypeId' => 'string',
        'dtmVehicleLicense' => 'datetime',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
    ];

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['decVolume'] = $this->decVolume;
        $toArray['decWeight'] = $this->decWeight;
        $toArray['dtmVehicleLicense'] = $this->dtmVehicleLicense;

        return $toArray;
    }

    public function getDecWeightAttribute($value)
    {
        return localNumberFormat($value);
    }

    public function getDecVolumeAttribute($value)
    {
        return localNumberFormat($value);
    }

    public function getDtmVehicleLicenseAttribute($value)
    {
        return localFormatDate($value);
    }
}
