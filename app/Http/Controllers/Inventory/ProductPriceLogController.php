<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\ProductPriceLogDataTable;
use App\Http\Requests\Inventory;
use App\Http\Requests\Inventory\CreateProductPriceLogRequest;
use App\Http\Requests\Inventory\UpdateProductPriceLogRequest;
use App\Repositories\Inventory\ProductPriceLogRepository;
use App\Repositories\Inventory\DmsInvProductRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProductPriceLogController extends AppBaseController
{
    /** @var  ProductPriceLogRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ProductPriceLogRepository::class;
    }

    /**
     * Display a listing of the ProductPriceLog.
     *
     * @param ProductPriceLogDataTable $productPriceLogDataTable
     * @return Response
     */
    public function index(ProductPriceLogDataTable $productPriceLogDataTable)
    {
        return $productPriceLogDataTable->render('inventory.product_price_logs.index');
    }

    /**
     * Provide options item based on relationship model ProductPriceLog from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $dmsInvProduct = new DmsInvProductRepository(app());
        return [
            'dmsInvProductItems' => ['' => __('crud.option.dmsInvProduct_placeholder')] + $dmsInvProduct->pluck()            
        ];
    }
}
