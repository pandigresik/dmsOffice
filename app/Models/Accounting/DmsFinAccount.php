<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsFinAccount",
 *      required={"iId", "szId", "szName", "szDescription", "bCashAccount", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated"},
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
 *          property="szId",
 *          description="szId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szName",
 *          description="szName",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDescription",
 *          description="szDescription",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bCashAccount",
 *          description="bCashAccount",
 *          type="boolean"
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
class DmsFinAccount extends Model
{
    use HasFactory;

    const CREATED_AT = 'dtmCreated';
    const UPDATED_AT = 'dtmLastUpdated';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'dms_fin_account';

    public $primaryKey = 'iInternalId';
    public $fillable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'bCashAccount',
        //'szUserCreatedId',
        // 'szUserUpdatedId',
        //'dtmCreated',
        //'dtmLastUpdated',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szId' => 'required|string|max:50',
        'szName' => 'required|string|max:50',
        'szDescription' => 'required|string|max:200',
        'bCashAccount' => 'required|boolean',
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
        'szId' => 'string',
        'szName' => 'string',
        'szDescription' => 'string',
        'bCashAccount' => 'boolean',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
    ];
}
