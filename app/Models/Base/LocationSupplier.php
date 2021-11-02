<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="LocationSupplier",
 *      required={"dms_ap_supplier_id", "city", "state", "additional_cost"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="dms_ap_supplier_id",
 *          description="dms_ap_supplier_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="position",
 *          description="position",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone",
 *          description="phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mobile",
 *          description="mobile",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="city",
 *          description="city",
 *          type="string"
 *      )
 * )
 */
class LocationSupplier extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'location_supplier';
    public $fillable = [
        'dms_ap_supplier_id',
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
        'dms_ap_supplier_id' => 'required|integer',
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
        'dms_ap_supplier_id' => 'integer',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'additional_cost' => 'float',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dmsApSupplier()
    {
        return $this->belongsTo(\App\Models\Base\DmsApSupplier::class, 'dms_ap_supplier_id');
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
