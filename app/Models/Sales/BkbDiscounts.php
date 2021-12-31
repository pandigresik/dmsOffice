<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="BkbDiscounts",
 *      required={"szDocId", "szProductId", "szSalesId", "szBranchId", "decQty", "discPrinciple", "discDistributor", "sistemPrinciple", "sistemDistributor", "selisihPrinciple", "selisihDistributor"},
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
 *          property="szSalesId",
 *          description="szSalesId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szBranchId",
 *          description="szBranchId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="decQty",
 *          description="decQty",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="discPrinciple",
 *          description="discPrinciple",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="discDistributor",
 *          description="discDistributor",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="sistemPrinciple",
 *          description="sistemPrinciple",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="sistemDistributor",
 *          description="sistemDistributor",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="selisihPrinciple",
 *          description="selisihPrinciple",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="selisihDistributor",
 *          description="selisihDistributor",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class BkbDiscounts extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bkb_discounts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "mysql_sejati";

    public $fillable = [
        'szDocId',
        'szProductId',
        'szSalesId',
        'szBranchId',
        'bkbDate',
        'decQty',
        'discPrinciple',
        'discDistributor',
        'sistemPrinciple',
        'sistemDistributor',
        'selisihPrinciple',
        'selisihDistributor'
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
        'szSalesId' => 'string',
        'szBranchId' => 'string',
        'decQty' => 'decimal:2',
        'discPrinciple' => 'decimal:2',
        'discDistributor' => 'decimal:2',
        'sistemPrinciple' => 'decimal:2',
        'sistemDistributor' => 'decimal:2',
        'selisihPrinciple' => 'decimal:2',
        'selisihDistributor' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'szDocId' => 'required|string|max:50',
        'szProductId' => 'required|string|max:50',
        'szSalesId' => 'required|string|max:50',
        'szBranchId' => 'required|string|max:50',
        'decQty' => 'required|numeric',
        'discPrinciple' => 'required|numeric',
        'discDistributor' => 'required|numeric',
        'sistemPrinciple' => 'required|numeric',
        'sistemDistributor' => 'required|numeric',
        'selisihPrinciple' => 'required|numeric',
        'selisihDistributor' => 'required|numeric'
    ];

    
}
