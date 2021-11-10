<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\ProductPriceDataTable;
use App\Http\Requests\Inventory;
use App\Http\Requests\Inventory\CreateProductPriceRequest;
use App\Http\Requests\Inventory\UpdateProductPriceRequest;
use App\Repositories\Inventory\ProductPriceRepository;
use App\Repositories\Inventory\DmsInvProductRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProductPriceController extends AppBaseController
{
    /** @var  ProductPriceRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ProductPriceRepository::class;
    }

    /**
     * Display a listing of the ProductPrice.
     *
     * @param ProductPriceDataTable $productPriceDataTable
     * @return Response
     */
    public function index(ProductPriceDataTable $productPriceDataTable)
    {
        return $productPriceDataTable->render('inventory.product_prices.index');
    }

    /**
     * Show the form for creating a new ProductPrice.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.product_prices.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created ProductPrice in storage.
     *
     * @param CreateProductPriceRequest $request
     *
     * @return Response
     */
    public function store(CreateProductPriceRequest $request)
    {
        $input = $request->all();

        $productPrice = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/productPrices.singular')]));

        return redirect(route('inventory.productPrices.index'));
    }

    /**
     * Display the specified ProductPrice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productPrice = $this->getRepositoryObj()->find($id);

        if (empty($productPrice)) {
            Flash::error(__('models/productPrices.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.productPrices.index'));
        }

        return view('inventory.product_prices.show')->with('productPrice', $productPrice);
    }

    /**
     * Show the form for editing the specified ProductPrice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productPrice = $this->getRepositoryObj()->find($id);

        if (empty($productPrice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productPrices.singular')]));

            return redirect(route('inventory.productPrices.index'));
        }

        return view('inventory.product_prices.edit')->with('productPrice', $productPrice)->with($this->getOptionItems());
    }

    /**
     * Update the specified ProductPrice in storage.
     *
     * @param  int              $id
     * @param UpdateProductPriceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductPriceRequest $request)
    {
        $productPrice = $this->getRepositoryObj()->find($id);

        if (empty($productPrice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productPrices.singular')]));

            return redirect(route('inventory.productPrices.index'));
        }

        $productPrice = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/productPrices.singular')]));

        return redirect(route('inventory.productPrices.index'));
    }

    /**
     * Remove the specified ProductPrice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productPrice = $this->getRepositoryObj()->find($id);

        if (empty($productPrice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productPrices.singular')]));

            return redirect(route('inventory.productPrices.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/productPrices.singular')]));

        return redirect(route('inventory.productPrices.index'));
    }

    /**
     * Provide options item based on relationship model ProductPrice from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $dmsInvProduct = new DmsInvProductRepository(app());
        return [
            'dmsInvProductItems' => ['' => __('crud.option.dmsInvProduct_placeholder')] + $dmsInvProduct->allQuery()->whereHas('productCategoriesProduct')->get()->pluck('szName','iInternalId')->toArray()
        ];
    }
}
