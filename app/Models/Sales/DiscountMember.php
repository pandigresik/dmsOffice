<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DiscountMember",
 *      required={"discounts_id", "member_id", "tipe"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="discounts_id",
 *          description="discounts_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="member_id",
 *          description="member_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipe",
 *          description="tipe",
 *          type="string"
 *      )
 * )
 */
class DiscountMember extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'discount_members';

    public $fillable = [
        'discounts_id',
        'member_id',
        'tipe',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'discounts_id' => 'required',
        'member_id' => 'required|string|max:10',
        'tipe' => 'required|string',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'discounts_id' => 'integer',
        'member_id' => 'string',
        'tipe' => 'string',
    ];

    /**
     * Get the Discount that owns the DiscountMember.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}
