<?php

namespace App\Models\Finance;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DebitCreditNote",
 *      required={"number", "type", "partner_type", "partner_id", "issue_date", "invoice_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="number",
 *          description="number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="partner_type",
 *          description="partner_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="partner_id",
 *          description="partner_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="issue_date",
 *          description="issue_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="reference",
 *          description="reference",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="invoice_id",
 *          description="invoice_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      )
 * )
 */
class DebitCreditNote extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'debit_credit_note';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "mysql_sejati";

    public $fillable = [
        'number',
        'type',
        'partner_type',
        'partner_id',
        'issue_date',
        'reference',
        'invoice_id',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number' => 'string',
        'type' => 'string',
        'partner_type' => 'string',
        'partner_id' => 'string',
        'issue_date' => 'date',
        'reference' => 'string',
        'invoice_id' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number' => 'required|string|max:30',
        'type' => 'required|string',
        'partner_type' => 'required|string',
        'partner_id' => 'required|string|max:30',
        'issue_date' => 'required',
        'reference' => 'nullable|string|max:30',
        'invoice_id' => 'required',
        'description' => 'nullable|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function invoice()
    {
        return $this->belongsTo(\App\Models\Finance\Invoice::class, 'invoice_id');
    }
}
