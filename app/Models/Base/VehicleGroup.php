<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="VehicleGroup",
 *      required={"name", "capacity", "uom"},
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
 *      )
 * )
 */
class VehicleGroup extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'vehicle_group';

    public $fillable = [
        'name',
        'capacity',
        'uom',
        'description',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:50',
        'capacity' => 'required|integer',
        'uom' => 'required|string|max:30',
        'description' => 'nullable|string|max:100',
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
        'capacity' => 'integer',
        'uom' => 'string',
        'description' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function routeTrips()
    {
        return $this->hasMany(\App\Models\Base\RouteTrip::class, 'vehicle_group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles()
    {
        return $this->hasMany(\App\Models\Base\Vehicle::class, 'vehicle_group_id');
    }
}
