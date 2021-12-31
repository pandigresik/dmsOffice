<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="BkbDiscountDetail",
 *      required={"szDocId", "szProductId", "szBranchId", "discount_id", "principle_amount", "distributor_amount"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="szDocId",
 *          description="szDocId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szProductId",
 *          description="szProductId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szBranchId",
 *          description="szBranchId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="discount_id",
 *          description="discount_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="principle_amount",
 *          description="principle_amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="distributor_amount",
 *          description="distributor_amount",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class BkbDiscountDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bkb_discount_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "mysql_sejati";

    public $fillable = [
        'szDocId',
        'szProductId',
        'szBranchId',
        'bkbDate',
        'discount_id',
        'principle_amount',
        'distributor_amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'szDocId' => 'string',
        'szProductId' => 'string',
        'szBranchId' => 'string',
        'discount_id' => 'integer',
        'principle_amount' => 'decimal:2',
        'distributor_amount' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'szDocId' => 'required|string|max:50',
        'szProductId' => 'required|string|max:50',
        'szBranchId' => 'required|string|max:50',
        'discount_id' => 'required',
        'principle_amount' => 'required|numeric',
        'distributor_amount' => 'required|numeric'
    ];

    
}
