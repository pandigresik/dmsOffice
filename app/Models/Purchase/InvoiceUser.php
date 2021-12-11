<?php

namespace App\Models\Purchase;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="InvoiceUser",
 *      required={"invoice_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="invoice_id",
 *          description="invoice_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class InvoiceUser extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'invoice_user';

    public $fillable = [
        'invoice_id',
        'state',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'invoice_id' => 'required',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'invoice_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo(\App\Models\Purchase\Invoice::class, 'invoice_id');
    }
}
