<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="MasterDiscountProduct",
 *      required={"dms_inv_product_id", "master_discount_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="dms_inv_product_id",
 *          description="dms_inv_product_id",
 *          type="int16"
 *      ),
 *      @SWG\Property(
 *          property="master_discount_id",
 *          description="master_discount_id",
 *          type="int32"
 *      )
 * )
 */
class MasterDiscountProduct extends Model
{    

    use HasFactory;

    public $table = 'master_discount';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];    

    public $fillable = [
        'dms_inv_product_id',
        'master_discount_id'        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'dms_inv_product_id' => 'integer',
        'master_discount_id' => 'integer'        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];    
}
