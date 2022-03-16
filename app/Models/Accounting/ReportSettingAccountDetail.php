<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ReportSettingAccountDetail",
 *      required={"report_setting_account_id", "account_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="report_setting_account_id",
 *          description="report_setting_account_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="account_id",
 *          description="account_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class ReportSettingAccountDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'report_setting_account_detail';

    public $fillable = [
        'report_setting_account_id',
        'account_id',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'report_setting_account_id' => 'required',
        'account_id' => 'required',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'report_setting_account_id' => 'integer',
        'account_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(\App\Models\Accounting\Account::class, 'account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reportSettingAccount()
    {
        return $this->belongsTo(\App\Models\Accounting\ReportSettingAccount::class, 'report_setting_account_id');
    }
}
