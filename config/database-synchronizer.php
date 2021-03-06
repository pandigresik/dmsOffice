<?php

return [
    'from' => 'production',
    'to' => 'staging',
    'tables' => [
        ['name' => 'dms_ap_supplier', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_ar_customer', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_ar_customercategory', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_ar_customercategorytype', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_ar_customerhierarchy', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        // ['name' => 'dms_ar_customerrouteinfo', 'filter' => 'dtmLastUpdated', 'key' => ['szId','intItemNumber'], 'references' => []],
        // ['name' => 'dms_ar_doccustomer', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_ar_paymentterm', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_ar_paymenttype', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_ar_pricesegment', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_fin_account', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_fin_subaccount', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_inv_carrier', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_inv_product', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_inv_productcategory', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_inv_productcategorytype', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_inv_uom', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_inv_vehicle', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_inv_vehicletype', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_inv_warehouse', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_sd_pricecatalog', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        // ['name' => 'dms_sd_route', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_inv_docstockinbranch', 'filter' => 'dtmLastUpdated', 'key' => 'szDocId', 'references' => []],
        ['name' => 'dms_inv_docstockindistribution', 'filter' => 'dtmLastUpdated', 'key' => 'szDocId', 'references' => []],
        ['name' => 'dms_inv_docstockindistributionitem', 'filter' => 'dtmLastUpdated', 'key' => ['szDocId','intItemNumber'], 'references' => ['table' => 'dms_inv_docstockindistribution', 'column' => 'szDocId']],
        ['name' => 'dms_inv_docstockinsupplier', 'filter' => 'dtmLastUpdated', 'key' => 'szDocId', 'references' => []],
        ['name' => 'dms_inv_docstockinsupplieritem', 'filter' => 'dtmLastUpdated', 'key' => ['szDocId','intItemNumber'], 'references' => ['table' => 'dms_inv_docstockinsupplier', 'column' => 'szDocId']],
        
        // ['name' => 'dms_inv_docstockinsupplierotm', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        // ['name' => 'dms_inv_docstockinsupplierotmitem', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => ['table' => 'dms_inv_docstockinsupplierotm', 'column' => 'szDocId']],
        ['name' => 'dms_inv_docstockmorph', 'filter' => 'dtmLastUpdated', 'key' => 'szDocId', 'references' => []],
        ['name' => 'dms_inv_docstockmorphitem', 'filter' => 'dtmLastUpdated', 'key' => ['szDocId','intItemNumber'], 'references' => ['table' => 'dms_inv_docstockmorph', 'column' => 'szDocId']],
        ['name' => 'dms_inv_docstockoutbranch', 'filter' => 'dtmLastUpdated', 'key' => 'szDocId', 'references' => []],
        ['name' => 'dms_inv_docstockoutbranchitem', 'filter' => 'dtmLastUpdated', 'key' => ['szDocId','intItemNumber'], 'references' => ['table' => 'dms_inv_docstockoutbranch', 'column' => 'szDocId']],
        ['name' => 'dms_inv_docstockoutdistribution', 'filter' => 'dtmLastUpdated', 'key' => 'szDocId', 'references' => []],
        ['name' => 'dms_inv_docstockoutdistributionitem', 'filter' => 'dtmLastUpdated', 'key' => ['szDocId','intItemNumber'], 'references' => ['table' => 'dms_inv_docstockoutdistribution', 'column' => 'szDocId']],
        // ['name' => 'dms_inv_docstockoutdistributionpr', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => ['table' => 'dms_inv_docstockoutdistribution', 'column' => 'szDocId']],
        // ['name' => 'dms_inv_docstockoutdistributionpritem', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => ['table' => 'dms_inv_docstockoutdistribution', 'column' => 'szDocId']],
        ['name' => 'dms_inv_docstockoutsupplier', 'filter' => 'dtmLastUpdated', 'key' => 'szDocId', 'references' => []],
        ['name' => 'dms_inv_docstockoutsupplieritem', 'filter' => 'dtmLastUpdated', 'key' => ['szDocId','intItemNumber'], 'references' => ['table' => 'dms_inv_docstockoutsupplier', 'column' => 'szDocId']],
        // ['name' => 'dms_pi_employeedistribution', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        // ['name' => 'dms_sd_calendarbranch', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        ['name' => 'dms_sd_docdo', 'filter' => 'dtmLastUpdated', 'key' => 'szDocId', 'references' => []],
        //['name' => 'dms_sd_docdocorrection', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        //['name' => 'dms_sd_docdocorrectionitem', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => ['table' => 'dms_sd_docdocorrection', 'column' => 'szDocId']],
        //['name' => 'dms_sd_docdoinvoice', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => ['table' => 'dms_sd_docdo', 'column' => 'szDocId']],
        ['name' => 'dms_sd_docdoitem', 'filter' => 'dtmLastUpdated', 'key' => ['szDocId','intItemNumber'], 'references' => ['table' => 'dms_sd_docdo', 'column' => 'szDocId']],
        ['name' => 'dms_sd_docdoitemprice', 'filter' => 'dtmLastUpdated', 'key' => ['szDocId','intItemNumber'], 'references' => ['table' => 'dms_sd_docdo', 'column' => 'szDocId']],
        //['name' => 'dms_sd_docdoitempromo', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => ['table' => 'dms_sd_docdo', 'column' => 'szDocId']],
        ['name' => 'dms_pi_employee', 'filter' => 'dtmLastUpdated', 'key' => 'szId', 'references' => []],
        
        ['name' => 'dms_cas_cashbalance', 'filter' => 'dtmLastUpdated', 'key' => 'iId', 'references' => []],
        ['name' => 'dms_cas_cashbalancesaldo', 'filter' => 'dtmLastUpdated', 'key' => 'iId', 'references' => []],
        ['name' => 'dms_cas_cashtempbalance', 'filter' => 'dtmLastUpdated', 'key' => 'iId', 'references' => []],
        ['name' => 'dms_cas_cashtempbalancesaldo', 'filter' => 'dtmLastUpdated', 'key' => 'iId', 'references' => []],
    ],

    'skip_tables' => [],
    'limit' => 5000,
];
