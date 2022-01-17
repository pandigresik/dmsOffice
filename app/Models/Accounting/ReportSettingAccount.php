<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ReportSettingAccount",
 *      required={"group", "group_type"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="group",
 *          description="group",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="group_type",
 *          description="group_type",
 *          type="string"
 *      )
 * )
 */
class ReportSettingAccount extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const GROUP_TYPE = [
        'LR' => 'Laba Rugi',
        'LRC' => 'Laba Rugi PT',
        'NRC' => 'Neraca'        
    ];

    public $table = 'report_setting_account';

    public $fillable = [
        'code',
        'group',
        'group_type',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|string|max:10',
        'group' => 'required|string|max:50',
        'group_type' => 'required|string|max:20',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'group' => 'string',
        'group_type' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany(\App\Models\Accounting\ReportSettingAccountDetail::class, 'report_setting_account_id');
    }
}
