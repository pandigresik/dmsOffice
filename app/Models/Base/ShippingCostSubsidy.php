<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ShippingCostSubsidy",
 *      required={"product_id", "amount"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="product_id",
 *          description="product_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="origin_plant_id",
 *          description="origin_plant_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class ShippingCostSubsidy extends Model
{
    use HasFactory;
        use SoftDeletes;

    public $table = 'shipping_cost_subsidies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_id',
        'origin_plant_id',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'string',
        'origin_plant_id' => 'string',
        'amount' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required|string|max:20',
        'origin_plant_id' => 'nullable|string|max:10',
        'amount' => 'required|numeric'
    ];

    public function product(){
        return $this->belongsTo(\App\Models\Inventory\DmsInvProduct::class, 'product_id','szId');
    }

    public function origin(){
        return $this->belongsTo(\App\Models\Base\DmsApSupplier::class, 'origin_plant_id','szId');
    }

    public function getAmountAttribute($value){
        return localNumberFormat($value);
    }
}
