<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Discounts",
 *      required={"jenis", "name", "start_date", "end_date", "split", "main_dms_inv_product_id", "main_quota", "max_quota", "state"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="jenis",
 *          description="jenis",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
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
 *          property="split",
 *          description="split",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="main_dms_inv_product_id",
 *          description="main_dms_inv_product_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="main_quota",
 *          description="main_quota",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="bundling_dms_inv_product_id",
 *          description="bundling_dms_inv_product_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bundling_quota",
 *          description="bundling_quota",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="max_quota",
 *          description="max_quota",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      )
 * )
 */
class Discounts extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'discounts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const OPTION_ITEM_JENIS = ['promo','bundling','combine','kontrak'];
    const OPTION_ITEM_SEGMENT = ['customer_segment','customer'];
    protected $dates = ['deleted_at'];

    

    public $fillable = [
        'jenis',
        'name',
        'start_date',
        'end_date',
        'split',
        'main_dms_inv_product_id',
        'main_quota',
        'bundling_dms_inv_product_id',
        'bundling_quota',
        'max_quota',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis' => 'string',
        'name' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'split' => 'boolean',
        'main_dms_inv_product_id' => 'string',
        'main_quota' => 'integer',
        'bundling_dms_inv_product_id' => 'string',
        'bundling_quota' => 'integer',
        'max_quota' => 'integer',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'jenis' => 'required|string',
        'name' => 'required|string|max:100',
        'start_date' => 'required',
        'end_date' => 'required',
        'split' => 'required|boolean',
        'main_dms_inv_product_id' => 'required|string|max:10',
        'main_quota' => 'required|integer',
        'bundling_dms_inv_product_id' => 'nullable|string|max:10',
        'bundling_quota' => 'nullable|integer',
        'max_quota' => 'required|integer',
        'state' => 'required|string|max:2'
    ];

    
}
