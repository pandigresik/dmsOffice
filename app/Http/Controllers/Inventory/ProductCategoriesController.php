<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\ProductCategoriesDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateProductCategoriesRequest;
use App\Http\Requests\Inventory\UpdateProductCategoriesRequest;
use App\Repositories\Inventory\ProductCategoriesRepository;
use Flash;
use Response;

class ProductCategoriesController extends AppBaseController
{
    /** @var ProductCategoriesRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ProductCategoriesRepository::class;
    }

    /**
     * Display a listing of the ProductCategories.
     *
     * @return Response
     */
    public function index(ProductCategoriesDataTable $productCategoriesDataTable)
    {
        return $productCategoriesDataTable->render('inventory.product_categories.index');
    }

    /**
     * Show the form for creating a new ProductCategories.
     *
     * @return Response
     */
    public function create()
    {
        $dataTabs = [
            'product' => ['text' => 'Product', 'json' => [], 'url' => route('inventory.productCategoriesProducts.index'), 'defaultContent' => '', 'class' => ''],
        ];

        return view('inventory.product_categories.create')->with('dataTabs', $dataTabs)->with($this->getOptionItems());
    }

    /**
     * Store a newly created ProductCategories in storage.
     *
     * @return Response
     */
    public function store(CreateProductCategoriesRequest $request)
    {
        $input = $request->all();

        $productCategories = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/productCategories.singular')]));

        return redirect(route('inventory.productCategories.index'));
    }

    /**
     * Display the specified ProductCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productCategories = $this->getRepositoryObj()->find($id);

        if (empty($productCategories)) {
            Flash::error(__('models/productCategories.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.productCategories.index'));
        }

        return view('inventory.product_categories.show')->with('productCategories', $productCategories);
    }

    /**
     * Show the form for editing the specified ProductCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productCategories = $this->getRepositoryObj()->find($id);

        if (empty($productCategories)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productCategories.singular')]));

            return redirect(route('inventory.productCategories.index'));
        }
        $jsonDefaultSearching = ['product_categories_id' => $id];
        $dataTabs = [
            'product' => ['text' => 'Produk', 'json' => $jsonDefaultSearching, 'url' => route('inventory.productCategoriesProducts.index', ['product_categories_id' => $id]), 'defaultContent' => '', 'class' => ''],
        ];

        return view('inventory.product_categories.edit')->with('dataTabs', $dataTabs)->with('productCategories', $productCategories)->with($this->getOptionItems());
    }

    /**
     * Update the specified ProductCategories in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateProductCategoriesRequest $request)
    {
        $productCategories = $this->getRepositoryObj()->find($id);

        if (empty($productCategories)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productCategories.singular')]));

            return redirect(route('inventory.productCategories.index'));
        }

        $productCategories = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/productCategories.singular')]));

        return redirect(route('inventory.productCategories.index'));
    }

    /**
     * Remove the specified ProductCategories from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productCategories = $this->getRepositoryObj()->find($id);

        if (empty($productCategories)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productCategories.singular')]));

            return redirect(route('inventory.productCategories.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/productCategories.singular')]));

        return redirect(route('inventory.productCategories.index'));
    }

    /**
     * Provide options item based on relationship model ProductCategories from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        return [
        ];
    }
}
