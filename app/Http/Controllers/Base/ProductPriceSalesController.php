<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\ProductPriceSalesDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateProductPriceSalesRequest;
use App\Http\Requests\Base\UpdateProductPriceSalesRequest;
use App\Models\Base\ProductPriceSales;
use App\Repositories\Inventory\DmsInvProductRepository;
use App\Repositories\Base\ProductPriceSalesRepository;
use Flash;
use Response;

class ProductPriceSalesController extends AppBaseController
{
    /** @var ProductPriceSalesRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ProductPriceSalesRepository::class;
    }

    /**
     * Display a listing of the ProductPriceSales.
     *
     * @return Response
     */
    public function index(ProductPriceSalesDataTable $productPriceSalesDataTable)
    {
        return $productPriceSalesDataTable->render('base.product_price_sales.index');
    }

    /**
     * Show the form for creating a new ProductPriceSales.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.product_price_sales.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created ProductPriceSales in storage.
     *
     * @return Response
     */
    public function store(CreateProductPriceSalesRequest $request)
    {
        $input = $request->all();

        $productPriceSales = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ProductPriceSaless.singular')]));

        return redirect(route('base.productPriceSales.index'));
    }

    /**
     * Display the specified ProductPriceSales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productPriceSales = $this->getRepositoryObj()->find($id);

        if (empty($productPriceSales)) {
            Flash::error(__('models/ProductPriceSaless.singular').' '.__('messages.not_found'));

            return redirect(route('base.productPriceSales.index'));
        }

        return view('base.product_price_sales.show')->with('productPriceSales', $productPriceSales);
    }

    /**
     * Show the form for editing the specified ProductPriceSales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productPriceSales = $this->getRepositoryObj()->find($id);

        if (empty($productPriceSales)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ProductPriceSaless.singular')]));

            return redirect(route('base.productPriceSales.index'));
        }

        return view('base.product_price_sales.edit')->with('ProductPriceSales', $productPriceSales)->with($this->getOptionItems());
    }

    /**
     * Update the specified ProductPriceSales in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateProductPriceSalesRequest $request)
    {
        $productPriceSales = $this->getRepositoryObj()->find($id);

        if (empty($productPriceSales)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ProductPriceSaless.singular')]));

            return redirect(route('base.productPriceSales.index'));
        }

        $productPriceSales = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ProductPriceSaless.singular')]));

        return redirect(route('base.productPriceSales.index'));
    }

    /**
     * Remove the specified ProductPriceSales from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productPriceSales = $this->getRepositoryObj()->find($id);

        if (empty($productPriceSales)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ProductPriceSaless.singular')]));

            return redirect(route('base.productPriceSales.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ProductPriceSaless.singular')]));

        return redirect(route('base.productPriceSales.index'));
    }

    /**
     * Provide options item based on relationship model ProductPriceSales from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $dmsInvProduct = new DmsInvProductRepository(app());
        $productPriceItem = ProductPriceSales::select(['dms_inv_product_id', 'price', 'start_date'])->get()->keyBy('dms_inv_product_id')->toArray();

        return [            
            'dmsInvProductItems' => ['' => __('crud.option.dmsInvProduct_placeholder')] + $dmsInvProduct->allQuery()->disableModelCaching()->where('dtmEndDate','>=', \Carbon\Carbon::now()->addMonth(-1))->get()->pluck('szName', 'szId')->toArray(),
            'productPriceItem' => $productPriceItem,
        ];
    }
}
