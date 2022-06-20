<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="moneyCheckDescription",
 *      required={"transaction_date"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="transaction_date",
 *          description="transaction_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="branch_id",
 *          description="branch_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      )
 * )
 */
class MoneyCheckDescription extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'money_check_description';

    public $connection = 'mysql_sejati';

    public $fillable = [
        'transaction_date',
        'branch_id',
        'description',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'transaction_date' => 'required',
        'branch_id' => 'nullable|string|max:50',
        'description' => 'nullable|string|max:100',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaction_date' => 'date',
        'branch_id' => 'string',
        'description' => 'string',
    ];
}
