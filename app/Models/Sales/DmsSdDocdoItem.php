<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsSdDocdoItem",
 *      required={"iId", "szDocId", "intItemNumber", "szProductId", "szOrderItemTypeId", "szTrnType", "decQty", "szUomId", "bIgnoreStockLotSn"},
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
 *          property="szProductId",
 *          description="szProductId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szOrderItemTypeId",
 *          description="szOrderItemTypeId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szTrnType",
 *          description="szTrnType",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="decQty",
 *          description="decQty",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="szUomId",
 *          description="szUomId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bIgnoreStockLotSn",
 *          description="bIgnoreStockLotSn",
 *          type="boolean"
 *      )
 * )
 */
class DmsSdDocdoItem extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dms_sd_docdoitem';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "mysql_sejati";

    public $fillable = [
        'iId',
        'szDocId',
        'intItemNumber',
        'szProductId',
        'szOrderItemTypeId',
        'szTrnType',
        'decQty',
        'szUomId',
        'bIgnoreStockLotSn'
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
        'szProductId' => 'string',
        'szOrderItemTypeId' => 'string',
        'szTrnType' => 'string',
        'decQty' => 'decimal:2',
        'szUomId' => 'string',
        'bIgnoreStockLotSn' => 'boolean'
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
        'szProductId' => 'required|string|max:50',
        'szOrderItemTypeId' => 'required|string|max:50',
        'szTrnType' => 'required|string|max:50',
        'decQty' => 'required|numeric',
        'szUomId' => 'required|string|max:50',
        'bIgnoreStockLotSn' => 'required|boolean'
    ];

    
}
