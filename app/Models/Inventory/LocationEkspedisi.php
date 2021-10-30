<?php

namespace App\Models\Inventory;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="LocationEkspedisi",
 *      required={"dms_inv_carrier_id", "city", "state", "additional_cost"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="dms_inv_vehicle_id",
 *          description="dms_inv_vehicle_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class LocationEkspedisi extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'location_ekspedisi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'dms_inv_carrier_id',
        'address',
        'city',
        'state',
        'additional_cost'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dms_inv_carrier_id' => 'integer',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'additional_cost' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dms_inv_carrier_id' => 'required|integer',
        'address' => 'nullable|string|max:255',
        'city' => 'required|string|max:50',
        'state' => 'required|string|max:50',
        'additional_cost' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dmsInvCarrier()
    {
        return $this->belongsTo(\App\Models\Inventory\DmsInvCarrier::class, 'dms_inv_carrier_id');
    }
}
