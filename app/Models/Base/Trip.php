<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Trip",
 *      required={"code", "name", "origin", "origin_place", "origin_additional_price", "destination", "destination_place", "destination_additional_price", "price", "distance"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="origin",
 *          description="origin",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="origin_place",
 *          description="origin_place",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="origin_additional_price",
 *          description="origin_additional_price",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="destination",
 *          description="destination",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="destination_place",
 *          description="destination_place",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="destination_additional_price",
 *          description="destination_additional_price",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="distance",
 *          description="distance",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      )
 * )
 */
class Trip extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'trip';

    public $connection = 'mysql_sejati';

    public $fillable = [
        'code',
        'name',
        'origin',
        'origin_place',
        'origin_additional_price',
        'destination',
        'destination_place',
        'destination_additional_price',
        'price',
        'distance',
        'description',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|string|max:30',
        'name' => 'required|string|max:60',
        'origin' => 'required',
        'origin_place' => 'required|string|max:255',
        'origin_additional_price' => 'required|numeric',
        'destination' => 'required',
        'destination_place' => 'required|string|max:255',
        'destination_additional_price' => 'required|numeric',
        'price' => 'required|numeric',
        'distance' => 'required|numeric',
        'description' => 'nullable|string|max:60',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'origin' => 'integer',
        'origin_place' => 'string',
        'origin_additional_price' => 'decimal:2',
        'destination' => 'integer',
        'destination_place' => 'string',
        'destination_additional_price' => 'decimal:2',
        'price' => 'decimal:2',
        'distance' => 'decimal:2',
        'description' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destination()
    {
        return $this->belongsTo(\App\Models\Base\City::class, 'destination', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function origin()
    {
        return $this->belongsTo(\App\Models\Base\City::class, 'origin', 'id');
    }

    public function getPriceAttribute($value)
    {
        return localNumberFormat($value);
    }

    public function getDistanceAttribute($value)
    {
        return localNumberFormat($value);
    }

    public function getDestinationAdditionalPriceAttribute($value)
    {
        return localNumberFormat($value);
    }

    public function getOriginAdditionalPriceAttribute($value)
    {
        return localNumberFormat($value);
    }
}
