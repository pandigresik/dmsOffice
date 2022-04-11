<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\ProductStock;
use App\Repositories\BaseRepository;

/**
 * Class ProductStockRepository
 * @package App\Repositories\Inventory
 * @version April 5, 2022, 9:33 pm WIB
*/

class ProductStockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'first_stock',
        'supplier_in',
        'mutation_in',
        'distribution_in',
        'supplier_out',
        'mutation_out',
        'distribution_out',
        'morphing',
        'last_stock',
        'period',
        'additional_info'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductStock::class;
    }

    public function generate($data){
        $period = $data['period'];
        $branch = $data['branch_id'];
        // $monthObject
$sql = <<<SQL
        select  dip.szId,
                x.szBranchId,                
                sum(case when x.jenis = 'MI' then x.qty else 0 end) as 'MI',
                sum(case when x.jenis = 'MO' then x.qty else 0 end) as 'MO',
                sum(case when x.jenis = 'DI' then x.qty else 0 end) as 'DI',
                sum(case when x.jenis = 'DO' then x.qty else 0 end) as 'DO',
                sum(case when x.jenis = 'SI' then x.qty else 0 end) as 'SI',
                sum(case when x.jenis = 'SO' then x.qty else 0 end) as 'SO'	
        from (
        select 	did.szBranchId, 
                didi.szProductId, 
                sum(didi.decQty) as qty,
                'MI' as jenis
        from dms_inv_docstockinbranch did 
        join dms_inv_docstockinbranchitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
        where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '{$branch}'
        GROUP  by did.szBranchId ,didi.szProductId 
        union all
        select 	did.szBranchId, 
                didi.szProductId, 
                sum(didi.decQty) as qty,
                'MO' as jenis
        from dms_inv_docstockoutbranch did 
        join dms_inv_docstockoutbranchitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
        where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '{$branch}'
        GROUP  by did.szBranchId ,didi.szProductId 
        union all
        select 	did.szBranchId, 
                didi.szProductId, 
                sum(didi.decQty) as qty,
                'DI' as jenis
        from dms_inv_docstockindistribution did 
        join dms_inv_docstockindistributionitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
        where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '{$branch}'
        GROUP  by did.szBranchId ,didi.szProductId 
        union all
        select 	did.szBranchId, 
                didi.szProductId, 
                sum(didi.decQty) as qty,
                'DO' as jenis
        from dms_inv_docstockoutdistribution did 
        join dms_inv_docstockoutdistributionitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
        where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '{$branch}'
        GROUP  by did.szBranchId ,didi.szProductId 
        union all
        select 	did.szBranchId, 
                didi.szProductId, 
                sum(didi.decQty) as qty,
                'SO' as jenis
        from dms_sd_docdo did 
        join dms_sd_docdoitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
        where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '{$branch}' and did.szDocStatus = 'Applied' 
        GROUP  by did.szBranchId ,didi.szProductId 
        union all
        select 	did.szBranchId, 
                didi.szProductId, 
                sum(didi.decQty) as qty,
                'SI' as jenis
        from dms_inv_docstockinsupplier did 
        join dms_inv_docstockinsupplieritem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
        where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '{$branch}' and did.szDocStatus = 'Applied' 
        GROUP  by did.szBranchId ,didi.szProductId 
        )x 
        right join dms_inv_product dip on dip.szId = x.szProductId
        where dip.dtmEndDate > now()
        GROUP  by x.szBranchId ,dip.szId 
SQL;
        return $this->model->fromQuery($sql);
    }
}
