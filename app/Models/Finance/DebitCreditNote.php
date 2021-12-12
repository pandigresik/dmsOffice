<?php

namespace App\Models\Finance;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const PARTNER_TYPE = ['supplier' => 'supplier', 'ekspedisi' => 'ekspedisi', 'customer' => 'customer', 'other' => 'lainnya'];

    public $table = 'debit_credit_note';

    public $fillable = [
        'type',
        'partner_type',
        'partner_id',
        'issue_date',
        'amount',
        'reference',
        'invoice_id',
        'description',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required|string',
        'partner_type' => 'required|string',
        'partner_id' => 'required|string|max:30',
        'issue_date' => 'required',
        'reference' => 'nullable|string|max:30',
        'invoice_id' => 'required',
        'description' => 'nullable|string',
    ];

    protected $dates = ['deleted_at'];

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
        'description' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo(\App\Models\Purchase\Invoice::class, 'invoice_id');
    }

    /**
     * $type = CN or DN.
     *
     * @param mixed $type
     */
    public function getNextNumber($type)
    {
        $pattern = $type.'/'.date('Ym').'/';
        $columnReference = 'number';
        $sequenceLength = 5;
        $nextId = $this->where($columnReference, 'like', $pattern.'%')->max($columnReference);
        $nextId = !$nextId ? 1 : intval(substr($nextId, strlen($nextId) - $sequenceLength)) + 1;
        $newId = [$pattern, str_pad($nextId, $sequenceLength, '0', STR_PAD_LEFT)];

        return implode('', $newId);
    }

    public function getIssueDateAttribute($value)
    {
        return localFormatDate($value);
    }

    public function getAmountAttribute($value)
    {
        $pengali = 'CN' == $this->attributes['type'] ? 1 : -1;

        return localNumberFormat($pengali * $value);
    }

    public function getRawAmountAttribute($value)
    {
        $pengali = 'CN' == $this->attributes['type'] ? 1 : -1;

        return $pengali * $this->attributes['amount'];
    }    
}
