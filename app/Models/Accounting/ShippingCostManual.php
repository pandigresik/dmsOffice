<?php

namespace App\Models\Accounting;

use App\Models\Base\DmsSmBranch;
use App\Models\BaseEntity as Model;
use App\Models\Inventory\DmsInvCarrier;
use App\Models\Purchase\Invoice;
use App\Models\Purchase\InvoiceLine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ShippingCostManual",
 *      required={"number", "origin_branch_id", "destination_branch_id", "carrier_id", "date", "do_references", "sj_references", "amount"},
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
 *          property="origin_branch_id",
 *          description="origin_branch_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="destination_branch_id",
 *          description="destination_branch_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="carrier_id",
 *          description="carrier_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="do_references",
 *          description="do_references",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sj_references",
 *          description="sj_references",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class ShippingCostManual extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'shipping_cost_manual';

    public $fillable = [
        'number',
        'origin_branch_id',
        'destination_branch_id',
        'carrier_id',
        'date',
        'do_references',
        'sj_references',
        'co_references',
        'invoiced_expedition',
        'amount',
        'driver',
        'vehicle_number',
        'customer_name'
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'origin_branch_id' => 'required|string|max:50',
        'destination_branch_id' => 'required|string|max:50',
        'carrier_id' => 'required|string|max:50',
        'date' => 'required',
        'do_references' => 'required|string|max:20',
        'sj_references' => 'required|string|max:20',
        'amount' => 'required|numeric',
        'details' => 'required',
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
        'origin_branch_id' => 'string',
        'destination_branch_id' => 'string',
        'carrier_id' => 'string',
        'date' => 'date',
        'do_references' => 'string',
        'sj_references' => 'string',
        'amount' => 'decimal:2',
    ];

    public function scopeCanInvoicedExpedition($query)
    {
        return $query->where('invoiced_expedition',0);
    }

    public function scopeCanInvoicedEkspedisi($query, $ekspedisiId, $listDoc = [])
    {
        if (empty($listDoc)) {
            return $query->canInvoicedExpedition()->whereCarrierId($ekspedisiId);
        }

        return $query->canInvoicedExpedition()->whereCarrierId($ekspedisiId)->whereNotIn('number', $listDoc);
    }

    public function invoiceEkspedisi(): HasOneThrough
    {        
        return $this->hasOneThrough(Invoice::class, InvoiceLine::class, 'doc_id', 'id', 'do_references','invoice_id');
    }

    public function getNextNumber()
    {
        $pattern = 'OAM/'.date('Ym').'/';
        $columnReference = 'number';
        $sequenceLength = 5;
        $nextId = $this->where($columnReference, 'like', $pattern.'%')->max($columnReference);
        $nextId = !$nextId ? 1 : intval(substr($nextId, strlen($nextId) - $sequenceLength)) + 1;
        $newId = [$pattern, str_pad($nextId, $sequenceLength, '0', STR_PAD_LEFT)];

        return implode('', $newId);
    }

    public function getDateAttribute($value)
    {
        return localFormatDate($value);
    }

    public function getAmountAttribute($value)
    {
        return intval($value);
    }

    public function getPriceAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany(\App\Models\Accounting\ShippingCostManualDetail::class, 'shipping_cost_manual_id');
    }

    /**
     * Get the ekspedisi that owns the ShippingCostManual.
     */
    public function ekspedisi(): BelongsTo
    {
        return $this->belongsTo(DmsInvCarrier::class, 'carrier_id', 'szId');
    }

    public function originBranch(): BelongsTo
    {
        return $this->belongsTo(DmsSmBranch::class, 'origin_branch_id', 'szId');
    }

    public function destinationBranch(): BelongsTo
    {
        return $this->belongsTo(DmsSmBranch::class, 'destination_branch_id', 'szId');
    }
}
