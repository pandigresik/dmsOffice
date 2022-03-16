<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsPiEmployee",
 *      required={"iId", "szId", "szName", "szDescription", "szDivisionId", "szDepartmentId", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated", "szBranchId", "szGender", "dtmBirth", "dtmJoin", "dtmStop", "szIdCard", "szSupervisorId", "szPassword"},
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
 *          property="szDivisionId",
 *          description="szDivisionId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDepartmentId",
 *          description="szDepartmentId",
 *          type="string"
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
 *      ),
 *      @SWG\Property(
 *          property="szBranchId",
 *          description="szBranchId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szGender",
 *          description="szGender",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmBirth",
 *          description="dtmBirth",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="dtmJoin",
 *          description="dtmJoin",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="dtmStop",
 *          description="dtmStop",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="szIdCard",
 *          description="szIdCard",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szSupervisorId",
 *          description="szSupervisorId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szPassword",
 *          description="szPassword",
 *          type="string"
 *      )
 * )
 */
class DmsPiEmployee extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'dms_pi_employee';

    public $primaryKey = 'iInternalId';

    public $fillable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szDivisionId',
        'szDepartmentId',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated',
        'szBranchId',
        'szGender',
        'dtmBirth',
        'dtmJoin',
        'dtmStop',
        'szIdCard',
        'szSupervisorId',
        'szPassword',
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
        'szDivisionId' => 'required|string|max:50',
        'szDepartmentId' => 'required|string|max:50',
        'szUserCreatedId' => 'required|string|max:20',
        'szUserUpdatedId' => 'required|string|max:20',
        'dtmCreated' => 'required',
        'dtmLastUpdated' => 'required',
        'szBranchId' => 'required|string|max:50',
        'szGender' => 'required|string|max:50',
        'dtmBirth' => 'required',
        'dtmJoin' => 'required',
        'dtmStop' => 'required',
        'szIdCard' => 'required|string|max:50',
        'szSupervisorId' => 'required|string|max:50',
        'szPassword' => 'required|string|max:50',
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
        'szDivisionId' => 'string',
        'szDepartmentId' => 'string',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
        'szBranchId' => 'string',
        'szGender' => 'string',
        'dtmBirth' => 'datetime',
        'dtmJoin' => 'datetime',
        'dtmStop' => 'datetime',
        'szIdCard' => 'string',
        'szSupervisorId' => 'string',
        'szPassword' => 'string',
    ];
}
