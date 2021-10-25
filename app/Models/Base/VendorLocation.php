<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="VendorLocation",
 *      required={"city", "state", "additional_cost", "route_trip_id"},
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
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      )
 * )
 */
class VendorLocation extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'vendor_location';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $appends = ['state_form'];
    protected $dates = ['deleted_at'];



    public $fillable = [
        'address',
        'city',
        'state',
        'additional_cost',
        'route_trip_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'additional_cost' => 'float',
        'route_trip_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'address' => 'nullable|string|max:255',
        'city' => 'required|string|max:50',
        'state' => 'required|string|max:50',
        'additional_cost' => 'required|numeric',
        'route_trip_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function routeTrip()
    {
        return $this->belongsTo(\App\Models\Base\RouteTrip::class, 'route_trip_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vendor()
    {
        return $this->belongsTo(\App\Models\Base\Vendor::class, 'vendor_id');
    }

    /**
     * Determine if the user is an administrator.
     *
     * @return bool
     */
    public function getStateFormAttribute()
    {
        return $this->attributes['id'] ? 'update' : 'insert';
    }
}
