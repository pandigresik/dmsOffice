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
    public function index(ProductPriceSalesDataTable $ProductPriceSalesDataTable)
    {
        return $ProductPriceSalesDataTable->render('base.product_prices_sales.index');
    }

    /**
     * Show the form for creating a new ProductPriceSales.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.product_prices_sales.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created ProductPriceSales in storage.
     *
     * @return Response
     */
    public function store(CreateProductPriceSalesRequest $request)
    {
        $input = $request->all();

        $ProductPriceSales = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ProductPriceSaless.singular')]));

        return redirect(route('Base.ProductPriceSaless.index'));
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
        $ProductPriceSales = $this->getRepositoryObj()->find($id);

        if (empty($ProductPriceSales)) {
            Flash::error(__('models/ProductPriceSaless.singular').' '.__('messages.not_found'));

            return redirect(route('Base.ProductPriceSaless.index'));
        }

        return view('base.product_prices_sales.show')->with('ProductPriceSales', $ProductPriceSales);
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
        $ProductPriceSales = $this->getRepositoryObj()->find($id);

        if (empty($ProductPriceSales)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ProductPriceSaless.singular')]));

            return redirect(route('Base.ProductPriceSaless.index'));
        }

        return view('base.product_prices_sales.edit')->with('ProductPriceSales', $ProductPriceSales)->with($this->getOptionItems());
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
        $ProductPriceSales = $this->getRepositoryObj()->find($id);

        if (empty($ProductPriceSales)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ProductPriceSaless.singular')]));

            return redirect(route('Base.ProductPriceSaless.index'));
        }

        $ProductPriceSales = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ProductPriceSaless.singular')]));

        return redirect(route('Base.ProductPriceSaless.index'));
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
        $ProductPriceSales = $this->getRepositoryObj()->find($id);

        if (empty($ProductPriceSales)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ProductPriceSaless.singular')]));

            return redirect(route('Base.ProductPriceSaless.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ProductPriceSaless.singular')]));

        return redirect(route('Base.ProductPriceSaless.index'));
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
        $ProductPriceSalesItem = ProductPriceSales::select(['dms_inv_product_id', 'price', 'dpp_price', 'branch_price', 'start_date'])->get()->keyBy('dms_inv_product_id')->toArray();

        return [
            // 'dmsInvProductItems' => ['' => __('crud.option.dmsInvProduct_placeholder')] + $dmsInvProduct->allQuery()->disableModelCaching()->whereHas('productCategoriesProduct')->get()->pluck('szName', 'iInternalId')->toArray(),
            'dmsInvProductItems' => ['' => __('crud.option.dmsInvProduct_placeholder')] + $dmsInvProduct->allQuery()->disableModelCaching()->where('dtmEndDate','>=', \Carbon\Carbon::now()->addMonth(-1))->get()->pluck('szName', 'iInternalId')->toArray(),
            'ProductPriceSalesItem' => $ProductPriceSalesItem,
        ];
    }
}
