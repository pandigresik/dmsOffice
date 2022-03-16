<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="TripEkspedisiPrice",
 *      required={"trip_ekspedisi_id", "start_date", "price"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="trip_ekspedisi_id",
 *          description="trip_ekspedisi_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="start_date",
 *          description="start_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="end_date",
 *          description="end_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="number",
 *          format="number"
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
 *      )
 * )
 */
class TripEkspedisiPrice extends Model
{
    use HasFactory;

    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'trip_ekspedisi_price';

    public $fillable = [
        'trip_ekspedisi_id',
        'start_date',
        'end_date',
        'price',
        'origin_additional_price',
        'destination_additional_price',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'trip_ekspedisi_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'nullable',
        'price' => 'required|numeric',
        'origin_additional_price' => 'nullable|numeric',
        'destination_additional_price' => 'nullable|numeric',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trip_ekspedisi_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'price' => 'decimal:2',
        'origin_additional_price' => 'decimal:2',
        'destination_additional_price' => 'decimal:2',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tripEkspedisi()
    {
        return $this->belongsTo(\App\Models\Inventory\TripEkspedisi::class, 'trip_ekspedisi_id');
    }

    public function getStartDateAttribute($value)
    {
        return localFormatDate($value);
    }

    public function getPriceAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getOriginAdditionalPriceAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getDestinationAdditionalPriceAttribute($value)
    {
        return localNumberFormat($value, 0);
    }
}
