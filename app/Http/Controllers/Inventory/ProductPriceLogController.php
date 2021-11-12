<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\ProductPriceLogDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Inventory\DmsInvProductRepository;
use App\Repositories\Inventory\ProductPriceLogRepository;
use Illuminate\Http\Request;
use Response;

class ProductPriceLogController extends AppBaseController
{
    /** @var ProductPriceLogRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ProductPriceLogRepository::class;
    }

    /**
     * Display a listing of the ProductPriceLog.
     *
     * @return Response
     */
    public function index(ProductPriceLogDataTable $productPriceLogDataTable, Request $request)
    {
        $dmsInvProduct = $request->route('dmsInvProduct');

        return $productPriceLogDataTable->setDefaultFilter(['dms_inv_product_id' => $dmsInvProduct])->render('inventory.product_price_logs.index');
    }

    /**
     * Provide options item based on relationship model ProductPriceLog from storage.
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
