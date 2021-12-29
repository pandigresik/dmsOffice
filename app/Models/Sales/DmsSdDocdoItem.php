<?php

namespace App\Models\Sales;

use App\Models\Base\DmsArCustomer;
use App\Models\BaseEntity as Model;
use App\Models\Inventory\DmsInvProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @SWG\Definition(
 *      definition="DmsSdDocdoItem",
 *      required={"iId", "szDocId", "intItemNumber", "szProductId", "szOrderItemTypeId", "szTrnType", "decQty", "szUomId", "bIgnoreStockLotSn"},
 *      @SWG\Property(
 *          property="iInternalId",
 *          description="iInternalId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="iId",
 *          description="iId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDocId",
 *          description="szDocId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="intItemNumber",
 *          description="intItemNumber",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="szProductId",
 *          description="szProductId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szOrderItemTypeId",
 *          description="szOrderItemTypeId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szTrnType",
 *          description="szTrnType",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="decQty",
 *          description="decQty",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="szUomId",
 *          description="szUomId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bIgnoreStockLotSn",
 *          description="bIgnoreStockLotSn",
 *          type="boolean"
 *      )
 * )
 */
class DmsSdDocdoItem extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'dms_sd_docdoitem';

    public $fillable = [
        'iId',
        'szDocId',
        'intItemNumber',
        'szProductId',
        'szOrderItemTypeId',
        'szTrnType',
        'decQty',
        'szUomId',
        'bIgnoreStockLotSn',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szDocId' => 'required|string|max:50',
        'intItemNumber' => 'required|integer',
        'szProductId' => 'required|string|max:50',
        'szOrderItemTypeId' => 'required|string|max:50',
        'szTrnType' => 'required|string|max:50',
        'decQty' => 'required|numeric',
        'szUomId' => 'required|string|max:50',
        'bIgnoreStockLotSn' => 'required|boolean',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'iInternalId' => 'integer',
        'iId' => 'string',
        'szDocId' => 'string',
        'intItemNumber' => 'integer',
        'szProductId' => 'string',
        'szOrderItemTypeId' => 'string',
        'szTrnType' => 'string',
        'decQty' => 'decimal:2',
        'szUomId' => 'string',
        'bIgnoreStockLotSn' => 'boolean',
    ];
    private $discounts = [];
    private $customer;
    private $bkbDate;

    /**
     * Get the product that owns the DmsSdDocdoItem.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(DmsInvProduct::class, 'szProductId', 'szId');
    }

    public function docdo(): BelongsTo
    {
        return $this->belongsTo(DmsSdDocdo::class, 'szDocId', 'szDocId');
    }

    public function getDecQtyAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getDecDiscPrincipleAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getDecDiscDistributorAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    /**
     * Get the value of discounts.
     */
    public function getDiscounts()
    {
        if (!empty($this->discounts)) {
            return $this->discounts;
        }

        $this->hitungDiscounts();

        return $this->discounts;
    }

    public function getDiscountPrinciple()
    {
        return $this->getDiscounts()['principle'];
    }

    public function getDiscountDistributor()
    {
        return $this->getDiscounts()['distributor'];
    }

    /**
     * Get the value of customer.
     */
    public function getCustomer()
    {
        if (empty($this->customer)) {
            $docdo = $this->docdo()->with(['customer']);
            $this->setCustomer($docdo->customer);
        }

        return $this->customer;
    }

    /**
     * Set the value of customer.
     *
     * @param mixed $customer
     *
     * @return self
     */
    public function setCustomer($customer)
    {
        if ($customer instanceof DmsArCustomer) {
            $this->customer = $customer;
        } else {
            $this->customer = DmsArCustomer::where('szId', $customer)->first();
        }

        return $this;
    }

    private function hitungDiscounts()
    {
        /** get all discounts active */
        $discountActive = Discounts::with(['members','details'])->whereRaw("'".$this->getBkbDate()."' between start_date and end_date and state = 'A'")->get();
        $this->discounts = ['distributor' => [], 'principle' => []];
        if(!$discountActive){            
            return;
        }

        foreach($discountActive as $da){
            $this->getDetailDiscounts($da);
        }
        
        return;
    }

    private function getDetailDiscounts($discount){
        switch($discount->jenis){
            case 'kontrak':
                $this->discountKontrak($discount);
                break;
            case 'promo':
                $this->discountPromo($discount);
                break;
            case 'bundling':
                $this->discountBundling($discount);
                break;
            default:
                $this->discountCombine($discount);
        }
    }

    private function discountKontrak($discount){
        $member = $discount->members->first();
        $tipe = $member->tipe;
        $listMembers = $discount->members->keyBy('member_id');
        $listProduct = $discount->details->keyBy('main_dms_inv_product_id');        
        $indexMember = 'customer' == $tipe ? $this->getCustomer()->szId : $this->getCustomer()->szHierarchyId;
        $customerHasDiscount = isset($listMembers[$indexMember]) ? true : false;
        
        if($customerHasDiscount){
            $productDiscount = $listProduct[$this->szProductId] ?? null;
            
            if($productDiscount){
                $this->discounts['principle'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $productDiscount->principle_amount * $this->attributes['decQty']];
                $this->discounts['distributor'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $productDiscount->distributor_amount * $this->attributes['decQty']];
            }
        }
    }

    private function discountPromo($discount){
        $member = $discount->members->first();
        $tipe = $member->tipe;
        $listMembers = $discount->members->keyBy('member_id');        
        $indexMember = 'customer' == $tipe ? $this->getCustomer()->szId : $this->getCustomer()->szHierarchyId;
        $customerHasDiscount = isset($listMembers[$indexMember]) ? true : false;
        
        if($customerHasDiscount){
            $productDiscount = $this->szProductId == $discount->main_dms_inv_product_id ? true : false;
            
            if($productDiscount){
                $listProduct = $discount->details->keyBy('main_dms_inv_product_id');
                $qtyQuotaNota = $this->attributes['decQty'] > $discount->getRawOriginal('max_quota') ? $discount->getRawOriginal('max_quota') : $this->attributes['decQty'];
                //$qtyQuotaNota = $this->attributes['decQty'] ;
                foreach($discount->details as $d){
                    if($qtyQuotaNota >= $d->getRawOriginal('min_main_qty') && $qtyQuotaNota <= $d->getRawOriginal('max_main_qty')){
                        $this->discounts['principle'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $d->principle_amount * $qtyQuotaNota];
                        $this->discounts['distributor'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $d->distributor_amount * $qtyQuotaNota];
                        break;
                    }
                }
                
            }
        }
    }

    private function discountBundling($discount){
    
    }

    private function discountCombine($discount){
    
    }

    /**
     * Get the value of bkbDate
     */ 
    public function getBkbDate()
    {
        return $this->bkbDate;
    }

    /**
     * Set the value of bkbDate
     *
     * @return  self
     */ 
    public function setBkbDate($bkbDate)
    {
        $this->bkbDate = $bkbDate;

        return $this;
    }
}
