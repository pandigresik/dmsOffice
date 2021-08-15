<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="RouteTrip",
 *      required={"name", "vehicle_group_id", "origin", "destination", "price"},
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
class RouteTrip extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'route_trip';

    public $fillable = [
        'name',
        'description',
        'vehicle_group_id',
        'origin',
        'destination',
        'price',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:60|unique:route_trip',
        'description' => 'nullable|string|max:60',
        'vehicle_group_id' => 'required',
        'origin' => 'required',
        'destination' => 'required',
        'price' => 'required|numeric',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'vehicle_group_id' => 'integer',
        'origin' => 'integer',
        'destination' => 'integer',
        'price' => 'decimal:2',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destinationCity()
    {
        return $this->belongsTo(\App\Models\Base\City::class, 'destination');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function originCity()
    {
        return $this->belongsTo(\App\Models\Base\City::class, 'origin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicleGroup()
    {
        return $this->belongsTo(\App\Models\Base\VehicleGroup::class, 'vehicle_group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function vendorExpeditionTrips()
    {
        return $this->hasMany(\App\Models\Base\VendorExpeditionTrip::class, 'route_trip_id');
    }

    public function vendors()
    {
        return $this->belongsToMany(\App\Models\Base\RouteTrip::class,'route_trip','route_trip_id');
    }

    /**
     * Get the Price
     *
     * @param  string  $value
     * @return string
     */
    public function getPriceAttribute($value)
    {
        return money($value)->format();
    }
}
