<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'contact_ekspedisi';
    public $fillable = [
        'dms_inv_carrier_id',
        'name',
        'position',
        'email',
        'phone',
        'mobile',
        'description',
        'address',
        'city',
    ];

    /**
     * Validation rules.
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
        'city' => 'required|string|max:50',
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
        'name' => 'string',
        'position' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'mobile' => 'string',
        'description' => 'string',
        'address' => 'string',
        'city' => 'string',
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
