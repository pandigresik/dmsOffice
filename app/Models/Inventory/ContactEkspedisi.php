<?php

namespace App\Models\Inventory;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="ContactEkspedisi",
 *      required={"dms_inv_carrier_id", "name", "city"},
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
class ContactEkspedisi extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contact_ekspedisi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'dms_inv_carrier_id',
        'name',
        'position',
        'email',
        'phone',
        'mobile',
        'description',
        'address',
        'city'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dms_inv_carrier_id' => 'integer',
        'name' => 'string',
        'position' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'mobile' => 'string',
        'description' => 'string',
        'address' => 'string',
        'city' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dms_inv_carrier_id' => 'required|integer',
        'name' => 'required|string|max:50',
        'position' => 'nullable|string|max:50',
        'email' => 'nullable|string|max:50',
        'phone' => 'nullable|string|max:50',
        'mobile' => 'nullable|string|max:50',
        'description' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'city' => 'required|string|max:50'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dmsInvCarrier()
    {
        return $this->belongsTo(\App\Models\Inventory\DmsInvCarrier::class, 'dms_inv_carrier_id');
    }
}
