<?php

namespace App\Models\Purchase;

use App\Models\BaseEntity as Model;

class ListBtbValidate extends Model
{
    public $table = 'list_btb_validate';
    public $isCachable = false;

    public function getFullIdentityAttribute($value)
    {
        return implode(' | ', ['BTB::'.$this->no_btb, 'CO::'.$this->co_reference, 'Product::'.$this->product_name]);
    }

    public function canValidate()
    {
        $sql = <<<SQL
        select
            `dsd`.`szDocId` AS `no_btb`,
            `dsd`.`szRefDocId` AS `sj_pabrik`,
            `dsd`.`szRef1` AS `co_reference`,
            `dsd`.`szRef2` AS `sj_ekspedisi`,
            `dsd`.`szBranchId` AS `szBranchId`,
            `dsb`.`szName` AS `szName`,
            `dsd`.`szDocStatus` AS `szDocStatus`,
            `divi`.`szName` AS `product_name`,
            `dsdi`.`decQty` AS `decQty`,
            `dsdi`.`szProductId` AS `product_id`,
            `dsdi`.`szUomId` AS `uom_id`,
            `dsdi`.`iId` AS `reference_id`
        from
            ((((`dmsoffice_sejati`.`dms_inv_docstockinsupplier` `dsd`
        join `dmsoffice_sejati`.`dms_inv_docstockinsupplieritem` `dsdi` on
            ((`dsdi`.`szDocId` = `dsd`.`szDocId`)))
        join `dmsoffice_sejati`.`dms_inv_product` `divi` on
            ((`divi`.`szId` = `dsdi`.`szProductId`)))
        join `dmsoffice_sejati`.`dms_sm_branch` `dsb` on
            ((`dsb`.`szId` = `dsd`.`szBranchId`)))
        left join `dmsoffice_sejati`.`btb_validate` `bv` on
            (((`bv`.`doc_id` = `dsd`.`szDocId`)
                and (`bv`.`product_id` = `dsdi`.`szProductId`)
                    and (`bv`.`deleted_at` is null))))
        where
            ((`dsd`.`szDocStatus` = 'Applied')
                and (`bv`.`product_id` is null))
SQL;

        return $this->fromQuery($sql);
    }
}
