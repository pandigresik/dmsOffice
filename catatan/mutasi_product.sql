SELECT
A.szProductId AS COL_szProductId, B.szName AS COL_szProductNM, B.szUomId AS COL_szUomId, A.szLocationType AS COL_szLocationType, A.szLocationId AS COL_szLocationId, A.szStockTypeId AS COL_szStockTypeId, A.szReportedAsId AS COL_szReportedAsId
        , A.decQtyOnHand - (SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01') 
        AS COL_BEGINNING_BALANCE
        , (SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31') AS COL_STOCK_MUTATION
        , A.decQtyOnHand - (SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction > '2022-07-31') AS COL_ENDING_BALANCE
        , ( SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.decQtyOnHand > 0
    ) AS COL_STOCK_RECEIPT_ALL, (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.decQtyOnHand < 0
    ) AS COL_STOCK_OUT_ALL
    ,
    (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.szTrnId = 'DMSDocStockInDistribution'
    ) AS COL_STOCK_RECEIPT_DISTRIBUTION

    ,
    (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.szTrnId = 'DMSDocStockOutDistribution'
    ) AS COL_STOCK_OUT_DISTRIBUTION

    ,
    (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.szTrnId = 'DMSDocStockInSupplier'
    ) AS COL_STOCK_RECEIPT_SUPPLIER

    ,
    (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.szTrnId = 'DMSDocStockOutSupplier'
    ) AS COL_STOCK_OUT_SUPPLIER

    ,
    (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.decQtyOnHand > 0 AND A1.szTrnId NOT IN('DMSDocStockInSupplier', 'DMSDocStockOutSupplier', 'DMSDocStockInDistribution', 'DMSDocStockOutDistribution')
    ) AS COL_STOCK_RECEIPT_OTHERS

    ,
    (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.decQtyOnHand < 0 AND A1.szTrnId NOT IN('DMSDocStockInSupplier', 'DMSDocStockOutSupplier', 'DMSDocStockInDistribution', 'DMSDocStockOutDistribution')
    ) AS COL_STOCK_OUT_OTHERS

    ,
    (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.szTrnId = 'DMSDocStockOutBranch'
    ) AS COL_STOCK_OUT_BRANCH

    ,
    (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.szTrnId = 'DMSDocStockInBranch'
    ) AS COL_STOCK_IN_BRANCH

    ,
    (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.szTrnId = 'DMSDocStockMorph'
    ) AS COL_STOCK_MORPH

    ,
    (
        SELECT COALESCE(SUM(A1.decQtyOnHand), 0) FROM DMS_INV_StockHistory AS A1 WHERE A1.szProductId = A.szProductId AND A1.szLocationType = 'WAREHOUSE'
        AND A1.szLocationId = A.szLocationId AND A1.szStockTypeId = A.szStockTypeId AND A1.szReportedAsId = A.szReportedAsId AND A1.dtmTransaction >= '2022-07-01'
        AND A1.dtmTransaction <= '2022-07-31'
        AND A1.szTrnId = 'DMSDocStockCorrection'
    ) AS COL_STOCK_CORRECTION


FROM DMS_INV_StockOnHand AS A LEFT JOIN DMS_INV_Product AS B ON B.szId = A.szProductId
WHERE A.szLocationType = 'WAREHOUSE' and A.szProductId  = '74553' and A.szReportedAsId = '555'