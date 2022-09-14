<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\ProductPriceSalesLogDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Inventory\DmsInvProductRepository;
use App\Repositories\Base\ProductPriceSalesLogRepository;
use Illuminate\Http\Request;
use Response;

class ProductPriceSalesLogController extends AppBaseController
{
    /** @var ProductPriceSalesLogRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ProductPriceSalesLogRepository::class;
    }

    /**
     * Display a listing of the ProductPriceSalesLog.
     *
     * @return Response
     */
    public function index(ProductPriceSalesLogDataTable $productPriceSalesLogDataTable, Request $request)
    {
        $dmsInvProduct = $request->route('dmsInvProduct');        

        return $productPriceSalesLogDataTable->setDefaultFilter(['dms_inv_product_id' => $dmsInvProduct])->render('base.product_price_sales_logs.index');
    }

    /**
     * Provide options item based on relationship model ProductPriceSalesLog from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $dmsInvProduct = new DmsInvProductRepository(app());

        return [
            'dmsInvProductItems' => ['' => __('crud.option.dmsInvProduct_placeholder')] + $dmsInvProduct->pluck(),
        ];
    }
}
