<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="DmsCasCashbalancesaldo",
 *      required={"iId", "szBranchId", "szAccountId", "szSubAccountId", "decDebit", "decCredit", "decAmount", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated"},
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
 *          property="szBranchId",
 *          description="szBranchId",
 *          type="string"
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
class DmsCasCashbalancesaldo extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'dms_cas_cashbalancesaldo';

    public $fillable = [
        'iId',
        'szBranchId',
        'szAccountId',
        'szSubAccountId',
        'decDebit',
        'decCredit',
        'decAmount',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szBranchId' => 'required|string|max:50',
        'szAccountId' => 'required|string|max:50',
        'szSubAccountId' => 'required|string|max:50',
        'decDebit' => 'required|numeric',
        'decCredit' => 'required|numeric',
        'decAmount' => 'required|numeric',
        'szUserCreatedId' => 'required|string|max:20',
        'szUserUpdatedId' => 'required|string|max:20',
        'dtmCreated' => 'required',
        'dtmLastUpdated' => 'required',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'iInternalId' => 'integer',
        'iId' => 'string',
        'szBranchId' => 'string',
        'szAccountId' => 'string',
        'szSubAccountId' => 'string',
        'decDebit' => 'decimal:4',
        'decCredit' => 'decimal:4',
        'decAmount' => 'decimal:4',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
    ];
}
