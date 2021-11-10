<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="TripEkspedisi",
 *      required={"dms_inv_carrier_id", "trip_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="dms_inv_carrier_id",
 *          description="dms_inv_carrier_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="trip_id",
 *          description="trip_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class TripEkspedisi extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'trip_ekspedisi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = NULL;
    const UPDATED_BY = NULL;

    protected $dates = ['deleted_at'];

    

    public $fillable = [
        'dms_inv_carrier_id',
        'trip_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dms_inv_carrier_id' => 'integer',
        'trip_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dms_inv_carrier_id' => 'required|integer',
        'trip_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dmsInvCarrier()
    {
        return $this->belongsTo(\App\Models\Inventory\DmsInvCarrier::class, 'dms_inv_carrier_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function trip()
    {
        return $this->belongsTo(\App\Models\Base\Trip::class, 'trip_id');
    }
}
