<?php

namespace App\Models\Purchase;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="BtbValidate",
 *      required={"doc_id", "product_id", "uom_id", "ref_doc", "qty", "qty_retur", "qty_reject", "invoiced"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="doc_id",
 *          description="doc_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="product_id",
 *          description="product_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="uom_id",
 *          description="uom_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ref_doc",
 *          description="ref_doc",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="qty",
 *          description="qty",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="qty_retur",
 *          description="qty_retur",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="qty_reject",
 *          description="qty_reject",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="invoiced",
 *          description="invoiced",
 *          type="boolean"
 *      )
 * )
 */
class BtbValidate extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'btb_validate';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];    

    public $fillable = [
        'doc_id',
        'co_reference',
        'reference_id',
        'product_id',
        'product_name',
        'uom_id',
        'ref_doc',
        'qty',
        'qty_retur',
        'qty_reject'        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'doc_id' => 'string',
        'product_id' => 'string',
        'uom_id' => 'string',
        'ref_doc' => 'string',
        'qty' => 'integer',
        'qty_retur' => 'integer',
        'qty_reject' => 'integer',
        'invoiced' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'doc_id' => 'required|string|max:50',
        'co_reference' => 'required|string|max:50',
        'reference_id' => 'required|string|max:50',
        'product_name' => 'required|string|max:70',
        'product_id' => 'required|string|max:50',
        'uom_id' => 'required|string|max:50',
        'ref_doc' => 'required|string|max:50',
        'qty' => 'required|integer',
        'qty_retur' => 'required|integer',
        'qty_reject' => 'required|integer',        
    ];

    public function getQtyAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getQtyReturAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getQtyRejectAttribute($value)
    {
        return localNumberFormat($value, 0);
    }
    
}
