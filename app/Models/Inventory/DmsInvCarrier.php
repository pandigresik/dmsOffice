<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @SWG\Definition(
 *      definition="DmsInvCarrier",
 *      required={"iId", "szId", "szName", "szDescription", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated"},
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
class DmsInvCarrier extends Model
{
    use HasFactory;

    const CREATED_AT = 'dtmCreated';
    const UPDATED_AT = 'dtmLastUpdated';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'dms_inv_carrier';

    public $primaryKey = 'iInternalId';
    public $fillable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
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
        // 'iId' => 'required|string|max:50',
        'szId' => 'required|string|max:50',
        'szName' => 'required|string|max:50',
        // 'szDescription' => 'required|string|max:200',
        // 'szUserCreatedId' => 'required|string|max:20',
        // 'szUserUpdatedId' => 'required|string|max:20',
        // 'dtmCreated' => 'required',
        // 'dtmLastUpdated' => 'required',
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
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
    ];

    /**
     * Get all of the contactEkspedisis for the DmsInvCarrier.
     */
    public function contactEkspedisis(): HasMany
    {
        return $this->hasMany(ContactEkspedisi::class, 'dms_inv_carrier_id', 'iInternalId');
    }

    /**
     * Get all of the locationEkspedisis for the DmsInvCarrier.
     */
    public function locationEkspedisis(): HasMany
    {
        return $this->hasMany(LocationEkspedisi::class, 'dms_inv_carrier_id', 'iInternalId');
    }

    public function vehicleEkspedisis(): HasMany
    {
        return $this->hasMany(VehicleEkspedisi::class, 'dms_inv_carrier_id', 'iInternalId');
    }

    public function tripEkspedisis(): HasMany
    {
        return $this->hasMany(TripEkspedisi::class, 'dms_inv_carrier_id', 'iInternalId');
    }
}
