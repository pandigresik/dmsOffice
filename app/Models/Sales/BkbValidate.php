<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="BkbValidate",
 *      required={"doc_id", "dms_ar_customer_id", "dms_pi_employee_id", "disc_principle_sales", "disc_distributor_sales", "disc_principle_dms", "disc_distributor_dms", "invoiced"},
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
 *          property="dms_ar_customer_id",
 *          description="dms_ar_customer_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dms_pi_employee_id",
 *          description="dms_pi_employee_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="disc_principle_sales",
 *          description="disc_principle_sales",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="disc_distributor_sales",
 *          description="disc_distributor_sales",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="disc_principle_dms",
 *          description="disc_principle_dms",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="disc_distributor_dms",
 *          description="disc_distributor_dms",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="invoiced",
 *          description="invoiced",
 *          type="boolean"
 *      )
 * )
 */
class BkbValidate extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bkb_validate';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "mysql_sejati";

    public $fillable = [
        'doc_id',
        'dms_ar_customer_id',
        'dms_pi_employee_id',
        'disc_principle_sales',
        'disc_distributor_sales',
        'disc_principle_dms',
        'disc_distributor_dms',
        'invoiced'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'doc_id' => 'string',
        'dms_ar_customer_id' => 'string',
        'dms_pi_employee_id' => 'string',
        'disc_principle_sales' => 'decimal:2',
        'disc_distributor_sales' => 'decimal:2',
        'disc_principle_dms' => 'decimal:2',
        'disc_distributor_dms' => 'decimal:2',
        'invoiced' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'doc_id' => 'required|string|max:50',
        'dms_ar_customer_id' => 'required|string|max:50',
        'dms_pi_employee_id' => 'required|string|max:50',
        'disc_principle_sales' => 'required|numeric',
        'disc_distributor_sales' => 'required|numeric',
        'disc_principle_dms' => 'required|numeric',
        'disc_distributor_dms' => 'required|numeric',
        'invoiced' => 'required|boolean'
    ];

    
}
