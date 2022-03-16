<?php

namespace App\Models\Finance;

use App\Models\Accounting\JournalAccount;
use App\Models\Base\DmsSmBranch;
use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="AccountMove",
 *      required={"number", "date", "reference"},
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
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="reference",
 *          description="reference",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="narration",
 *          description="narration",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      )
 * )
 */
class AccountMove extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const POSTED = 'posted';

    public $table = 'account_move';

    public $fillable = [
        'number',
        'date',
        'reference',
        'narration',
        'branch_id',
        'state',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required',
        'reference' => 'required|string|max:80',
        'narration' => 'nullable|string',
        'state' => 'nullable|string|max:15',
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
        'date' => 'date',
        'reference' => 'string',
        'narration' => 'string',
        'branch_id' => 'string',
        'state' => 'string',
    ];

    public function getDateAttribute($value)
    {
        return localFormatDate($value);
    }

    public function getNextNumber()
    {
        $pattern = 'AM/'.date('Ym').'/';
        $columnReference = 'number';
        $sequenceLength = 5;
        $nextId = $this->where($columnReference, 'like', $pattern.'%')->max($columnReference);
        $nextId = !$nextId ? 1 : intval(substr($nextId, strlen($nextId) - $sequenceLength)) + 1;
        $newId = [$pattern, str_pad($nextId, $sequenceLength, '0', STR_PAD_LEFT)];

        return implode('', $newId);
    }

    /**
     * Get all of the lines for the AccountMove.
     */
    public function lines(): HasMany
    {
        return $this->hasMany(AccountMoveLine::class);
    }

    /**
     * Get the depo that owns the AccountMove.
     */
    public function dmsSmBranch(): BelongsTo
    {
        return $this->belongsTo(DmsSmBranch::class, 'branch_id', 'szId');
    }

    public function depo(): BelongsTo
    {
        return $this->belongsTo(DmsSmBranch::class, 'branch_id', 'szId');
    }

    /**
     * Get all of the journals for the AccountMove.
     */
    public function journals(): HasMany
    {
        return $this->hasMany(JournalAccount::class, 'reference', 'number');
    }
}
