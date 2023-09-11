select sum(x.amount) as amount, x.szBranchId from (
-- stock akhir periode bulan sebelumnya
select 'SA' as jenis,
		branch_id as szBranchId,
        period as szDocId,
        product_id as szProductId,
		'2022-07-01' as dtmDoc,
		last_stock as decQty,
		cogs as amount
from product_stock where period = '2022-06'	-- and product_id not in ('74560G','74559G')	
union all
select  'MI' as jenis,
		did.szBranchId,
		did.szDocId,
        didi.szProductId,
        did.dtmDoc,        
        didi.decQty,
        didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockinbranch did 
join dms_inv_docstockinbranchitem didi on didi.szDocId = did.szDocId  -- and didi.szProductId not in ('74560G','74559G')
where did.dtmDoc BETWEEN '2022-07-01' and '2022-07-31' -- and did.szBranchId = '555'
union all 
select  'DI' as jenis,
		did.szBranchId,
		did.szDocId,
didi.szProductId,
did.dtmDoc,        
        didi.decQty,
        didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockindistribution did 
join dms_inv_docstockindistributionitem didi on didi.szDocId = did.szDocId -- and didi.szProductId not in ('74560G','74559G') 
where did.dtmDoc BETWEEN '2022-07-01' and '2022-07-31' -- and did.szBranchId = '555'
union all 
select  'SI' as jenis,
		did.szBranchId,
		did.szDocId,
didi.szProductId,
did.dtmDoc,        
        didi.decQty,
        didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockinsupplier did 
join dms_inv_docstockinsupplieritem didi on didi.szDocId = did.szDocId  -- and didi.szProductId not in ('74560G','74559G')
where did.dtmDoc BETWEEN '2022-07-01' and '2022-07-31' -- and did.szBranchId = '555'

union all
select  'MO' as jenis,
		did.szBranchId,
		did.szDocId,
didi.szProductId,
did.dtmDoc,        
        didi.decQty,
        -1 * didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockoutbranch did 
join dms_inv_docstockoutbranchitem didi on didi.szDocId = did.szDocId  -- and didi.szProductId not in ('74560G','74559G')
where did.dtmDoc BETWEEN '2022-07-01' and '2022-07-31' -- and did.szBranchId = '555'
union all 
select  'DO' as jenis,
		did.szBranchId,
		did.szDocId,
didi.szProductId,
did.dtmDoc,        
        didi.decQty,
        -1 * didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockoutdistribution did 
join dms_inv_docstockoutdistributionitem didi on didi.szDocId = did.szDocId  -- and didi.szProductId not in ('74560G','74559G')
where did.dtmDoc BETWEEN '2022-07-01' and '2022-07-31' -- and did.szBranchId = '555'
union all 
select  'SO' as jenis,
		did.szBranchId,
		did.szDocId,
didi.szProductId,
did.dtmDoc,        
        didi.decQty,
        -1 * didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockoutsupplier did 
join dms_inv_docstockoutsupplieritem didi on didi.szDocId = did.szDocId -- and didi.szProductId not in ('74560G','74559G') 
where did.dtmDoc BETWEEN '2022-07-01' and '2022-07-31' -- and did.szBranchId = '555'
union all 
select  'MORP_OUT' as jenis,
		did.szBranchId,
		did.szDocId,
        didi.szProductId,
        did.dtmDoc,        
        didi.decQty,
        -1 * didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockmorph did 
join dms_inv_docstockmorphitem didi on didi.szDocId = did.szDocId -- and didi.szProductId not in ('74560G','74559G') 
where did.dtmDoc BETWEEN '2022-07-01' and '2022-07-31' -- and did.szBranchId = '555'
union all 
select  'MORP_IN' as jenis,
		did.szBranchId,
		did.szDocId,
        didi.szProductIdTo as szProductId,
        did.dtmDoc,        
        didi.decQtyTo,
        didi.decQtyTo * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductIdTo and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockmorph did 
join dms_inv_docstockmorphitem didi on didi.szDocId = did.szDocId -- and didi.szProductId not in ('74560G','74559G') 
where did.dtmDoc BETWEEN '2022-07-01' and '2022-07-31' -- and did.szBranchId = '555'
union all 
select  'CORRECTION' as jenis,
		did.szBranchId,
		did.szDocId,
        didi.szProductId,
        did.dtmDoc,        
        didi.decQty,
        didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockcorrection did 
join dms_inv_docstockcorrectionitem didi on didi.szDocId = did.szDocId -- and didi.szProductId not in ('74560G','74559G') 
where did.dtmDoc BETWEEN '2022-07-01' and '2022-07-31'
union all 
select  'INTERNAL_TRF' as jenis,
		did.szBranchId,
		did.szDocId,
        didi.szProductId,
        did.dtmDoc,        
        didi.decQty,
        didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstocktrfbetweenwarehouse did 
join dms_inv_docstocktrfbetweenwarehouseitem didi on didi.szDocId = did.szDocId -- and didi.szProductId not in ('74560G','74559G') 
where did.dtmDoc BETWEEN '2022-07-01' and '2022-07-31'


)x group by szBranchId