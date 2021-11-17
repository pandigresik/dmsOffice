<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Trip",
 *      required={"code", "name", "origin_additional_price", "destination_additional_price", "price", "distance", "quantity", "origin_location_id", "destination_location_id"},
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
 *          property="origin_additional_price",
 *          description="origin_additional_price",
 *          type="number",
 *          format="number"
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
 *      ),
 *      @SWG\Property(
 *          property="product_categories_id",
 *          description="product_categories_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="origin_location_id",
 *          description="origin_location_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="destination_location_id",
 *          description="destination_location_id",
 *          type="integer",
 *          format="int32"
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

    public $fillable = [
        'code',
        'name',
        'origin_additional_price',
        'destination_additional_price',
        'price',
        'distance',
        'description',
        'product_categories_id',
        'quantity',
        'origin_location_id',
        'destination_location_id',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|string|max:30',
        'name' => 'required|string|max:60',
        'origin_additional_price' => 'required|numeric',
        'destination_additional_price' => 'required|numeric',
        'price' => 'required|numeric',
        'distance' => 'required|numeric',
        'description' => 'nullable|string|max:60',
        'product_categories_id' => 'nullable',
        'quantity' => 'required|integer',
        'origin_location_id' => 'required',
        'destination_location_id' => 'required',
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
        'origin_additional_price' => 'decimal:2',
        'destination_additional_price' => 'decimal:2',
        'price' => 'decimal:2',
        'distance' => 'decimal:2',
        'description' => 'string',
        'product_categories_id' => 'integer',
        'quantity' => 'integer',
        'origin_location_id' => 'integer',
        'destination_location_id' => 'integer',
    ];

    /**
     * Get the origin that owns the Trip.
     *
     * @return \Illuminate\DatabaLocationloquent\Reations\BelongsTo
     */
    public function origin(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'origin_location_id');
    }

    /**
     * Get the origin that owns the Trip.
     *
     * @return \Illuminate\DatabaLocationloquent\Reations\BelongsTo
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'destination_location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategories()
    {
        return $this->belongsTo(\App\Models\Inventory\ProductCategories::class, 'product_categories_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tripEkspedisis()
    {
        return $this->hasMany(\App\Models\Inventory\TripEkspedisi::class, 'trip_id');
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

    public function getFullIdentityAttribute($value)
    {
        return implode(' | ', ['Code::'.$this->attributes['code'], 'Nama::'.$this->attributes['name'], 'Harga::'.$this->attributes['price'], 'Jarak::'.$this->attributes['distance'],'Jumlah::'.$this->attributes['quantity'], 'Jenis::'.$this->productCategories->name]);
    }
}
