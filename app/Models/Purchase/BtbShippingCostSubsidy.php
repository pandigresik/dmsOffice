<?php

namespace App\Models\Purchase;

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
class BtbShippingCostSubsidy extends Model
{
    use HasFactory;
        use SoftDeletes;

    public $table = 'btb_shipping_cost_subsidies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'doc_id',        
        'amount',
        'invoiced'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'doc_id' => 'string',        
        'amount' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];    

    public function getAmountAttribute($value){
        return localNumberFormat($value);
    }

    public function scopeAvailable($query){
        return $query->where('invoiced',0);
    }

    /**
     * Get the btb that owns the BtbShippingCostSubsidy
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function btb()
    {
        return $this->belongsTo(BtbValidate::class , 'doc_id', 'doc_id');
    }
}
