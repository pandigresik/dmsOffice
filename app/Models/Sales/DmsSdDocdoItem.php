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
    private $otherItem;
    private $hasDiscount = 0;
    private $selisihPrinciple = 0;
    private $additionalInfo = [];

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

    public function getBkbDateAttribute($value)
    {

        return $this->bkbDate;
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
        if (is_null($this->customer)) {
            $customer = new DmsArCustomer();
            $docdo = $this->docdo()->with(['customer']);
            if ($docdo->customer) {
                $customer = $this->setCustomer($docdo->customer);
            }
            $this->setCustomer($customer);
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
            $tmpCustomer = DmsArCustomer::where('szId', $customer)->first();
            if ($tmpCustomer) {
                $this->customer = $tmpCustomer;
            } else {
                $this->customer = new DmsArCustomer();
            }
        }

        return $this;
    }

    /**
     * Get the value of bkbDate.
     */
    public function getBkbDate()
    {
        return $this->bkbDate;
    }

    /**
     * Set the value of bkbDate.
     *
     * @param mixed $bkbDate
     *
     * @return self
     */
    public function setBkbDate($bkbDate)
    {
        $this->bkbDate = $bkbDate;

        return $this;
    }

    /**
     * Get the value of otherItem.
     */
    public function getOtherItem()
    {
        return $this->otherItem;
    }

    /**
     * Set the value of otherItem.
     *
     * @param mixed $otherItem
     *
     * @return self
     */
    public function setOtherItem($otherItem)
    {
        $this->otherItem = $otherItem;

        return $this;
    }

    private function hitungDiscounts()
    {
        /** get all discounts active */
        $discountActive = Discounts::with(['members', 'details'])->whereRaw("'".$this->getBkbDate()."' between start_date and end_date and state = 'A'")->get();
        $this->discounts = ['distributor' => [], 'principle' => []];
        if (!$discountActive) {
            return;
        }

        foreach ($discountActive as $da) {
            $this->getDetailDiscounts($da);
        }

        if(!empty($this->discounts['principle'])){
            $this->setHasDiscount(1);
        }

        if(!empty($this->discounts['distributor'])){
            $this->setHasDiscount(1);
        }
    }

    private function getDetailDiscounts($discount)
    {
        switch ($discount->jenis) {
            case 'kontrak':
                $this->discountKontrak($discount);

                break;
            case 'promo':
                $this->discountPromo($discount);

                break;
            case 'bundling':
                $this->discountBundling($discount);

                break;
            case 'combo':
                $this->discountCombo($discount);

                break;
            case 'extension':
                $this->discountExtension($discount);

                break;
            default:
                $this->discountCombine($discount);
        }
    }

    private function customerHasDiscount($discount)
    {
        $member = $discount->members->first();
        $tipe = $member->tipe;
        $listMembers = $discount->members->keyBy('member_id');
        $indexMember = 'customer' == $tipe ? $this->getCustomer()->szId : $this->getCustomer()->szHierarchyId;

        return isset($listMembers[$indexMember]) ? true : false;
    }

    private function discountKontrak($discount)
    {
        $customerHasDiscount = $this->customerHasDiscount($discount);

        if ($customerHasDiscount) {
            $listProduct = $discount->details->keyBy('main_dms_inv_product_id');
            $productDiscount = $listProduct[$this->szProductId] ?? null;

            if ($productDiscount) {
                $this->discounts['principle'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $productDiscount->principle_amount * $this->attributes['decQty']];
                $this->discounts['distributor'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $productDiscount->distributor_amount * $this->attributes['decQty']];
            }
        }
    }

    private function discountPromo($discount)
    {
        $customerHasDiscount = $this->customerHasDiscount($discount);

        if ($customerHasDiscount) {
            $listMainProduct = explode(',', $discount->main_dms_inv_product_id);
            $productDiscount = in_array($this->szProductId, $listMainProduct) ? true : false;

            if ($productDiscount) {
                $qtyQuotaNota = $this->attributes['decQty'] > $discount->getRawOriginal('max_quota') ? $discount->getRawOriginal('max_quota') : $this->attributes['decQty'];
                foreach ($discount->details as $d) {
                    if ($qtyQuotaNota >= $d->getRawOriginal('min_main_qty') && $qtyQuotaNota <= $d->getRawOriginal('max_main_qty')) {
                        $this->discounts['principle'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $d->principle_amount * $qtyQuotaNota];
                        $this->discounts['distributor'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $d->distributor_amount * $qtyQuotaNota];

                        break;
                    }
                }
            }
        }
    }

    private function discountBundling($discount)
    {
        $customerHasDiscount = $this->customerHasDiscount($discount);

        if ($customerHasDiscount) {
            $listMainProduct = explode(',', $discount->main_dms_inv_product_id);
            $productDiscount = in_array($this->szProductId, $listMainProduct) ? true : false;

            if ($productDiscount) {
                /** get other product in this nota */
                //$bundlingProduct = DmsSdDocdoItem::where(['szProductId' => $discount->bundling_dms_inv_product_id, 'szDocId' => $this->szDocId])->first();
                $listbundlingProduct = explode(',', $discount->bundling_dms_inv_product_id);
                $bundlingProduct = $this->getOtherItem()->whereIn('szProductId', $listbundlingProduct)->first();
                // $bundlingProduct = $this->getOtherItem()->where('szProductId',$discount->bundling_dms_inv_product_id)->first();
                if ($bundlingProduct) {
                    $qtyQuotaNota = $this->attributes['decQty'] > $discount->getRawOriginal('max_quota') ? $discount->getRawOriginal('max_quota') : $this->attributes['decQty'];
                    $qtyQuotaNotaBundling = $bundlingProduct->getRawOriginal('decQty');
                    $selectedPackage = [];
                    foreach ($discount->details as $d) {
                        if ($qtyQuotaNota >= $d->getRawOriginal('min_main_qty') && $qtyQuotaNotaBundling >= $d->getRawOriginal('min_bundling_qty')) {
                            $selectedPackage = $d;
                        }
                    }
                    if (!empty($selectedPackage)) {
                        $this->discounts['principle'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $selectedPackage->principle_amount * $selectedPackage->getRawOriginal('package')];
                        $this->discounts['distributor'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $selectedPackage->distributor_amount * $selectedPackage->getRawOriginal('package')];
                    }
                }
            }
        }
    }

    private function discountExtension($discount)
    {
        $customerHasDiscount = $this->customerHasDiscount($discount);

        if ($customerHasDiscount) {
            $listMainProduct = explode(',', $discount->main_dms_inv_product_id);
            $productDiscount = in_array($this->szProductId, $listMainProduct) ? true : false;

            if ($productDiscount) {
                $qtyQuotaNota = $this->attributes['decQty'] > $discount->getRawOriginal('max_quota') ? $discount->getRawOriginal('max_quota') : $this->attributes['decQty'];                
                $selectedPackage = [];
                foreach ($discount->details as $d) {
                    if ($qtyQuotaNota >= $d->getRawOriginal('min_main_qty') ) {
                        $selectedPackage = $d;
                    }
                }
                if (!empty($selectedPackage)) {
                    $this->discounts['principle'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $selectedPackage->principle_amount * $selectedPackage->getRawOriginal('package')];
                    $this->discounts['distributor'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $selectedPackage->distributor_amount * $selectedPackage->getRawOriginal('package')];
                }
            }
        }
    }

    private function discountCombine($discount)
    {
        $customerHasDiscount = $this->customerHasDiscount($discount);

        if ($customerHasDiscount) {
            $listMainProduct = explode(',', $discount->main_dms_inv_product_id);
            $productDiscount = in_array($this->szProductId, $listMainProduct) ? true : false;

            if ($productDiscount) {
                $qtyQuotaNotaBundling = 0;
                /** get other product in this nota */
                //$bundlingProduct = DmsSdDocdoItem::where(['szProductId' => $discount->bundling_dms_inv_product_id, 'szDocId' => $this->szDocId])->first();
                $listbundlingProduct = explode(',', $discount->bundling_dms_inv_product_id);
                $bundlingProduct = $this->getOtherItem()->whereIn('szProductId', $listbundlingProduct)->first();
                if ($bundlingProduct) {
                    $qtyQuotaNotaBundling = $bundlingProduct->getRawOriginal('decQty');
                }
                $qtyQuotaNota = $this->attributes['decQty'];
                $selectedPackage = [];
                foreach ($discount->details as $d) {
                    if ($qtyQuotaNota >= $d->getRawOriginal('min_main_qty') && $qtyQuotaNotaBundling >= $d->getRawOriginal('min_bundling_qty')) {
                        $selectedPackage = $d;
                    }
                }
                $totalNota = $qtyQuotaNota + $qtyQuotaNotaBundling;
                if ($totalNota > $discount->getRawOriginal('max_quota')) {
                    $totalNota = $discount->getRawOriginal('max_quota');
                }
                if (!empty($selectedPackage)) {
                    $this->discounts['principle'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $selectedPackage->principle_amount * $totalNota];
                    $this->discounts['distributor'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $selectedPackage->distributor_amount * $totalNota];
                }

                //}
            }
        }
    }

    private function discountCombo($discount)
    {
        $customerHasDiscount = $this->customerHasDiscount($discount);

        if ($customerHasDiscount) {
            $listMainProduct = explode(',', $discount->main_dms_inv_product_id);
            $productDiscount = in_array($this->szProductId, $listMainProduct) ? true : false;

            if ($productDiscount) {                
                /** get other product in this nota */
                //$bundlingProduct = DmsSdDocdoItem::where(['szProductId' => $discount->bundling_dms_inv_product_id, 'szDocId' => $this->szDocId])->first();                
                $totalNota = $this->getOtherItem()->whereIn('szProductId', $listMainProduct)->sum('decQty');
                
                if ($totalNota > $discount->getRawOriginal('max_quota')) {
                    $totalNota = $discount->getRawOriginal('max_quota');
                }
                $totalNota = $this->convertToBox($totalNota, $discount);
                $selectedPackage = [];
                foreach ($discount->details as $d) {
                    if ($totalNota >= $d->getRawOriginal('min_main_qty')) {
                        $selectedPackage = $d;
                    }
                }                
                
                if (!empty($selectedPackage)) {
                    $this->discounts['principle'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $selectedPackage->principle_amount * $totalNota];
                    $this->discounts['distributor'][] = ['name' => $discount->name, 'id' => $discount->id, 'amount' => $selectedPackage->distributor_amount * $totalNota];
                }

                //}
            }
        }
    }

    private function convertToBox($value, $discount){

        return floor($value / $discount->attributes['conversion_main_dms_inv_product_id']);
    }    

    /**
     * Get the value of hasDiscount
     */ 
    public function getHasDiscount()
    {
        return $this->hasDiscount;
    }

    /**
     * Set the value of hasDiscount
     *
     * @return  self
     */ 
    public function setHasDiscount($hasDiscount)
    {
        $this->hasDiscount = $hasDiscount;

        return $this;
    }


    public function getSelisihPrincipleAttribute($value)
    {
        return $this->selisihPrinciple;
    }

    /**
     * Get the value of selisihPrinciple
     */ 
    public function getSelisihPrinciple()
    {
        return $this->selisihPrinciple;
    }

    /**
     * Set the value of selisihPrinciple
     *
     * @return  self
     */ 
    public function addSelisihPrinciple($selisihPrinciple)
    {
        $this->selisihPrinciple += $selisihPrinciple;

        return $this;
    }

    /**
     * Set the value of selisihPrinciple
     *
     * @return  self
     */ 
    public function setSelisihPrinciple($selisihPrinciple)
    {
        $this->selisihPrinciple = $selisihPrinciple;

        return $this;
    }

    /**
     * Get the value of additionalInfo
     */ 
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * Set the value of additionalInfo
     *
     * @return  self
     */ 
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;

        return $this;
    }
}
