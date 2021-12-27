<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsSdDocdoItemPrice",
 *      required={"iId", "szDocId", "intItemNumber", "intItemDetailNumber", "szPriceId", "decPrice", "decDiscount", "bTaxable", "decAmount", "decTax", "decDpp", "szTaxId", "decTaxRate", "decDiscPrinciple", "decDiscDistributor", "decDiscInternal"},
 *      @SWG\Property(
 *          property="iInternalId",
 *          description="iInternalId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="iId",
 *          description="iId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDocId",
 *          description="szDocId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="intItemNumber",
 *          description="intItemNumber",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="intItemDetailNumber",
 *          description="intItemDetailNumber",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="szPriceId",
 *          description="szPriceId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="decPrice",
 *          description="decPrice",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="decDiscount",
 *          description="decDiscount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="bTaxable",
 *          description="bTaxable",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="decAmount",
 *          description="decAmount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="decTax",
 *          description="decTax",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="decDpp",
 *          description="decDpp",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="szTaxId",
 *          description="szTaxId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="decTaxRate",
 *          description="decTaxRate",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="decDiscPrinciple",
 *          description="decDiscPrinciple",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="decDiscDistributor",
 *          description="decDiscDistributor",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="decDiscInternal",
 *          description="decDiscInternal",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class DmsSdDocdoItemPrice extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dms_sd_docdoitemprice';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "mysql_sejati";

    public $fillable = [
        'iId',
        'szDocId',
        'intItemNumber',
        'intItemDetailNumber',
        'szPriceId',
        'decPrice',
        'decDiscount',
        'bTaxable',
        'decAmount',
        'decTax',
        'decDpp',
        'szTaxId',
        'decTaxRate',
        'decDiscPrinciple',
        'decDiscDistributor',
        'decDiscInternal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'iInternalId' => 'integer',
        'iId' => 'string',
        'szDocId' => 'string',
        'intItemNumber' => 'integer',
        'intItemDetailNumber' => 'integer',
        'szPriceId' => 'string',
        'decPrice' => 'decimal:4',
        'decDiscount' => 'decimal:4',
        'bTaxable' => 'boolean',
        'decAmount' => 'decimal:4',
        'decTax' => 'decimal:4',
        'decDpp' => 'decimal:4',
        'szTaxId' => 'string',
        'decTaxRate' => 'decimal:4',
        'decDiscPrinciple' => 'decimal:4',
        'decDiscDistributor' => 'decimal:4',
        'decDiscInternal' => 'decimal:4'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szDocId' => 'required|string|max:50',
        'intItemNumber' => 'required|integer',
        'intItemDetailNumber' => 'required|integer',
        'szPriceId' => 'required|string|max:50',
        'decPrice' => 'required|numeric',
        'decDiscount' => 'required|numeric',
        'bTaxable' => 'required|boolean',
        'decAmount' => 'required|numeric',
        'decTax' => 'required|numeric',
        'decDpp' => 'required|numeric',
        'szTaxId' => 'required|string|max:50',
        'decTaxRate' => 'required|numeric',
        'decDiscPrinciple' => 'required|numeric',
        'decDiscDistributor' => 'required|numeric',
        'decDiscInternal' => 'required|numeric'
    ];

    
}
