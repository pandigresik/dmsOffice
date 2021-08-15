<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Vehicle",
 *      required={"number_registration", "number_identity", "vehicle_group_id", "vendor_expedition_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      )
 * )
 */
class Vehicle extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'vehicle';

    public $fillable = [
        'number_registration',
        'number_identity',
        'vehicle_group_id',
        'vendor_expedition_id',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'number_registration' => 'required|string|max:15',
        'number_identity' => 'required|string|max:30',
        'vehicle_group_id' => 'required',
        // 'vendor_expedition_id' => 'required'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number_registration' => 'string',
        'number_identity' => 'string',
        'vehicle_group_id' => 'integer',
        'vendor_expedition_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicleGroup()
    {
        return $this->belongsTo(\App\Models\Base\VehicleGroup::class, 'vehicle_group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendorExpedition()
    {
        return $this->belongsTo(\App\Models\Base\VendorExpedition::class, 'vendor_expedition_id');
    }
}
