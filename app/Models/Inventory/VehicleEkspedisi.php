<?php

namespace App\Models\Inventory;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="VehicleEkspedisi",
 *      required={"dms_inv_vehicle_id"},
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
class VehicleEkspedisi extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'vehicle_ekspedisi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'dms_inv_vehicle_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dms_inv_vehicle_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dms_inv_vehicle_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dmsInvVehicle()
    {
        return $this->belongsTo(\App\Models\Inventory\DmsInvVehicle::class, 'dms_inv_vehicle_id');
    }
}
