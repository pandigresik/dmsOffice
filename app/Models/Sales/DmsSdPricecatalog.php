<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsSdPricecatalog",
 *      required={"iId", "szId", "szName", "szDescription", "szCombinationId", "szCompanyId", "dtmValidFrom", "dtmValidTo", "intPriority", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated"},
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
 *          property="szCombinationId",
 *          description="szCombinationId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szCompanyId",
 *          description="szCompanyId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmValidFrom",
 *          description="dtmValidFrom",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="dtmValidTo",
 *          description="dtmValidTo",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="intPriority",
 *          description="intPriority",
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
class DmsSdPricecatalog extends Model
{
    use HasFactory;

    const CREATED_AT = 'dtmCreated';
    const UPDATED_AT = 'dtmLastUpdated';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'dms_sd_pricecatalog';

    public $primaryKey = 'iInternalId';
    public $fillable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szCombinationId',
        'szCompanyId',
        'dtmValidFrom',
        'dtmValidTo',
        'intPriority',
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
        'szCombinationId' => 'required|string|max:100',
        'szCompanyId' => 'required|string|max:50',
        'dtmValidFrom' => 'required',
        'dtmValidTo' => 'required',
        'intPriority' => 'required|integer',
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
        'szCombinationId' => 'string',
        'szCompanyId' => 'string',
        'dtmValidFrom' => 'datetime',
        'dtmValidTo' => 'datetime',
        'intPriority' => 'integer',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
    ];
}
