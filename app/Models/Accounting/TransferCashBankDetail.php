<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="TransferCashBankDetail",
 *      required={"transfer_cash_bank_id", "no_reference", "account", "description", "amount"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="transfer_cash_bank_id",
 *          description="transfer_cash_bank_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="no_reference",
 *          description="no_reference",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="account",
 *          description="account",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pic",
 *          description="pic",
 *          type="string"
 *      )
 * )
 */
class TransferCashBankDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'transfer_cash_bank_detail';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "mysql_sejati";

    public $fillable = [
        'transfer_cash_bank_id',
        'no_reference',
        'account',
        'description',
        'amount',
        'pic'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transfer_cash_bank_id' => 'integer',
        'no_reference' => 'string',
        'account' => 'string',
        'description' => 'string',
        'amount' => 'integer',
        'pic' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'transfer_cash_bank_id' => 'required',
        'no_reference' => 'required|string|max:30',
        'account' => 'required|string|max:15',
        'description' => 'required|string|max:50',
        'amount' => 'required|integer',
        'pic' => 'nullable|string|max:25'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transferCashBank()
    {
        return $this->belongsTo(\App\Models\Accounting\TransferCashBank::class, 'transfer_cash_bank_id');
    }
}
