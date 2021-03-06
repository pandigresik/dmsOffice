<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'location_ekspedisi';
    public $fillable = [
        'dms_inv_carrier_id',
        'address',
        'city',
        'state',
        'additional_cost',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'dms_inv_carrier_id' => 'required|integer',
        'address' => 'nullable|string|max:255',
        'city' => 'required|string|max:50',
        'state' => 'required|string|max:50',
        'additional_cost' => 'required|numeric',
    ];
    protected $appends = ['state_form'];

    protected $dates = ['deleted_at'];

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
        'additional_cost' => 'float',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dmsInvCarrier()
    {
        return $this->belongsTo(\App\Models\Inventory\DmsInvCarrier::class, 'dms_inv_carrier_id');
    }

    /**
     * Determine state form.
     *
     * @return bool
     */
    public function getStateFormAttribute()
    {
        return $this->attributes['id'] ? 'update' : 'insert';
    }
}
