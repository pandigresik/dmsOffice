<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="TransferCashBank",
 *      required={"type_account", "number", "transaction_date", "type"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="type_account",
 *          description="type_account",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="number",
 *          description="number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="transaction_date",
 *          description="transaction_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      )
 * )
 */
class TransferCashBank extends Model
{    

    use HasFactory;

    public $table = 'transfer_cash_bank';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "mysql_sejati";

    public $fillable = [
        'type_account',
        'number',
        'transaction_date',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_account' => 'string',
        'number' => 'string',
        'transaction_date' => 'date',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type_account' => 'required|string|max:10',
        'number' => 'required|string|max:15',
        'transaction_date' => 'required',
        'type' => 'required|string|max:5'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transferCashBankDetails()
    {
        return $this->hasMany(\App\Models\Accounting\TransferCashBankDetail::class, 'transfer_cash_bank_id');
    }
}
