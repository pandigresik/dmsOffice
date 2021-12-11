<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\ProductCategoriesProductDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory;
use App\Http\Requests\Inventory\CreateProductCategoriesProductRequest;
use App\Http\Requests\Inventory\UpdateProductCategoriesProductRequest;
use App\Repositories\Inventory\DmsInvProductRepository;
use App\Repositories\Inventory\ProductCategoriesProductRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class ProductCategoriesProductController extends AppBaseController
{
    /** @var ProductCategoriesProductRepository */
    protected $repository;
    private $prefixName = 'productCategoriesProducts';

    public function __construct()
    {
        $this->repository = ProductCategoriesProductRepository::class;
    }

    /**
     * Display a listing of the ProductCategoriesProduct.
     *
     * @param ProductCategoriesProductDataTable $productCategoriesProductDataTable
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $products = [];
        if ($request->get('product_categories_id')) {
            $products = $this->getRepositoryObj()->with(['product'])->all(['product_categories_id' => $request->get('product_categories_id')])->map(function ($q) {
                $q->product['stateForm'] = 'update';

                return $q->product;
            });
        }

        $buttonView = view('inventory.product_categories.partials.product_button', ['json' => [], 'url' => route('inventory.productCategoriesProducts.create')])->render();

        return view('inventory.product_categories_products.index')->with(['products' => $products, 'buttonView' => $buttonView]);
    }

    /**
     * Show the form for creating a new ProductCategoriesProduct.
     *
     * @return Response
     */
    public function create()
    {
        $idForm = \Carbon\Carbon::now()->timestamp;

        return view('inventory.product_categories_products.create')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => $this->prefixName.'['.$idForm.']'])
        ;
    }

    /**
     * Store a newly created ProductCategoriesProduct in storage.
     *
     * @return Response
     */
    public function store(CreateProductCategoriesProductRequest $request)
    {
        $input = $request->all();

        $productCategoriesProduct = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/productCategoriesProducts.singular')]));

        return redirect(route('inventory.productCategoriesProducts.index'));
    }

    /**
     * Display the specified ProductCategoriesProduct.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productCategoriesProduct = $this->getRepositoryObj()->find($id);

        if (empty($productCategoriesProduct)) {
            Flash::error(__('models/productCategoriesProducts.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.productCategoriesProducts.index'));
        }

        return view('inventory.product_categories_products.show')->with('productCategoriesProduct', $productCategoriesProduct);
    }

    /**
     * Show the form for editing the specified ProductCategoriesProduct.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productCategoriesProduct = $this->getRepositoryObj()->find($id);

        if (empty($productCategoriesProduct)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productCategoriesProducts.singular')]));

            return redirect(route('inventory.productCategoriesProducts.index'));
        }

        $idForm = $id;
        $productCategoriesProduct->stateForm = 'update';
        $obj = new \stdClass();
        $obj->productCategoriesProduct = [$id => $productCategoriesProduct];

        return view('inventory.product_categories_products.edit')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'update', 'id' => $id], 'productCategoriesProduct' => $obj, 'id' => $id, 'stateForm' => 'update', 'idForm' => $idForm, 'prefixName' => $this->prefixName.'['.$idForm.']'])
        ;
        //return view('inventory.product_categories_products.edit')->with('productCategoriesProduct', $productCategoriesProduct)->with($this->getOptionItems());
    }

    /**
     * Update the specified ProductCategoriesProduct in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateProductCategoriesProductRequest $request)
    {
        $productCategoriesProduct = $this->getRepositoryObj()->find($id);

        if (empty($productCategoriesProduct)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productCategoriesProducts.singular')]));

            return redirect(route('inventory.productCategoriesProducts.index'));
        }

        $productCategoriesProduct = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/productCategoriesProducts.singular')]));

        return redirect(route('inventory.productCategoriesProducts.index'));
    }

    /**
     * Remove the specified ProductCategoriesProduct from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productCategoriesProduct = $this->getRepositoryObj()->find($id);

        if (empty($productCategoriesProduct)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productCategoriesProducts.singular')]));

            return redirect(route('inventory.productCategoriesProducts.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/productCategoriesProducts.singular')]));

        return redirect(route('inventory.productCategoriesProducts.index'));
    }

    /**
     * Provide options item based on relationship model ProductCategoriesProduct from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $dmsInvProduct = new DmsInvProductRepository(app());

        return [
            'productItems' => ['' => __('crud.option.dmsInvProduct_placeholder')] + $dmsInvProduct->allQuery()
                ->disableModelCaching()
                ->whereNotIn('iInternalId', function ($q) {
                    $q->select(['product_id'])->from('product_categories_product');
                })->get()->pluck('full_identity', 'iInternalId')->toArray(),
        ];
    }
}
