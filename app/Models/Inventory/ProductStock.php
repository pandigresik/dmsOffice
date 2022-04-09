<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @SWG\Definition(
 *      definition="ProductStock",
 *      required={"product_id", "first_stock", "supplier_in", "mutation_in", "distribution_in", "supplier_out", "mutation_out", "distribution_out", "morphing", "last_stock", "period"},
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
 *          property="first_stock",
 *          description="first_stock",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="supplier_in",
 *          description="supplier_in",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="mutation_in",
 *          description="mutation_in",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="distribution_in",
 *          description="distribution_in",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="supplier_out",
 *          description="supplier_out",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="mutation_out",
 *          description="mutation_out",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="distribution_out",
 *          description="distribution_out",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="morphing",
 *          description="morphing",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="last_stock",
 *          description="last_stock",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="period",
 *          description="period",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="additional_info",
 *          description="additional_info",
 *          type="string"
 *      )
 * )
 */
class ProductStock extends Model
{
    use HasFactory;

    public $table = 'product_stock';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];    

    public $fillable = [
        'product_id',
        'first_stock',
        'supplier_in',
        'mutation_in',
        'distribution_in',
        'supplier_out',
        'mutation_out',
        'distribution_out',
        'morphing',
        'last_stock',
        'period',
        'additional_info'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'string',
        'first_stock' => 'integer',
        'supplier_in' => 'integer',
        'mutation_in' => 'integer',
        'distribution_in' => 'integer',
        'supplier_out' => 'integer',
        'mutation_out' => 'integer',
        'distribution_out' => 'integer',
        'morphing' => 'integer',
        'last_stock' => 'integer',
        'period' => 'string',
        'additional_info' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required|string|max:50',
        'first_stock' => 'required|integer',
        'supplier_in' => 'required|integer',
        'mutation_in' => 'required|integer',
        'distribution_in' => 'required|integer',
        'supplier_out' => 'required|integer',
        'mutation_out' => 'required|integer',
        'distribution_out' => 'required|integer',
        'morphing' => 'required|integer',
        'last_stock' => 'required|integer',
        'period' => 'required|string|max:7',
        'additional_info' => 'nullable|string'
    ];

    /**
     * Get the product that owns the ProductStock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(DmsInvProduct::class, 'product_id', 'szId');
    }

    public function isEmptyTransaction(){
        $result = true;
        if($this->MI > 0){
            $result = false;
        }
        if($this->DI > 0){
            $result = false;
        }
        if($this->SI > 0){
            $result = false;
        }
        if($this->MO > 0){
            $result = false;
        }
        if($this->DO > 0){
            $result = false;
        }
        if($this->SO > 0){
            $result = false;
        }

        return $result;
    }
}
