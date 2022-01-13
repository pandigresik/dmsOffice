<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsCasCashbalance",
 *      required={"iId", "szObjectId", "szDocId", "dtmDoc", "szAccountId", "szSubAccountId", "decDebit", "decCredit", "decAmount", "bVoucher", "szVoucherNo", "szBranchId", "szDescription", "intItemNumber", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated"},
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
 *          property="szObjectId",
 *          description="szObjectId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDocId",
 *          description="szDocId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmDoc",
 *          description="dtmDoc",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="szAccountId",
 *          description="szAccountId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szSubAccountId",
 *          description="szSubAccountId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="decDebit",
 *          description="decDebit",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="decCredit",
 *          description="decCredit",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="decAmount",
 *          description="decAmount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="bVoucher",
 *          description="bVoucher",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="szVoucherNo",
 *          description="szVoucherNo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szBranchId",
 *          description="szBranchId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDescription",
 *          description="szDescription",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="intItemNumber",
 *          description="intItemNumber",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="szUserCreatedId",
 *          description="szUserCreatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szUserUpdatedId",
 *          description="szUserUpdatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmCreated",
 *          description="dtmCreated",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="dtmLastUpdated",
 *          description="dtmLastUpdated",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class DmsCasCashbalance extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dms_cas_cashbalance';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    

    public $fillable = [
        'iId',
        'szObjectId',
        'szDocId',
        'dtmDoc',
        'szAccountId',
        'szSubAccountId',
        'decDebit',
        'decCredit',
        'decAmount',
        'bVoucher',
        'szVoucherNo',
        'szBranchId',
        'szDescription',
        'intItemNumber',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'iInternalId' => 'integer',
        'iId' => 'string',
        'szObjectId' => 'string',
        'szDocId' => 'string',
        'dtmDoc' => 'datetime',
        'szAccountId' => 'string',
        'szSubAccountId' => 'string',
        'decDebit' => 'decimal:4',
        'decCredit' => 'decimal:4',
        'decAmount' => 'decimal:4',
        'bVoucher' => 'boolean',
        'szVoucherNo' => 'string',
        'szBranchId' => 'string',
        'szDescription' => 'string',
        'intItemNumber' => 'integer',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szObjectId' => 'required|string|max:20',
        'szDocId' => 'required|string|max:50',
        'dtmDoc' => 'required',
        'szAccountId' => 'required|string|max:50',
        'szSubAccountId' => 'required|string|max:50',
        'decDebit' => 'required|numeric',
        'decCredit' => 'required|numeric',
        'decAmount' => 'required|numeric',
        'bVoucher' => 'required|boolean',
        'szVoucherNo' => 'required|string|max:50',
        'szBranchId' => 'required|string|max:50',
        'szDescription' => 'required|string|max:2000',
        'intItemNumber' => 'required|integer',
        'szUserCreatedId' => 'required|string|max:20',
        'szUserUpdatedId' => 'required|string|max:20',
        'dtmCreated' => 'required',
        'dtmLastUpdated' => 'required'
    ];

    
}
