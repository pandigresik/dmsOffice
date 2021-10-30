<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\ProductDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateProductRequest;
use App\Http\Requests\Base\UpdateProductRequest;
use App\Repositories\Base\ProductRepository;
use App\Repositories\Base\UomRepository;
use Flash;
use Response;

class ProductController extends AppBaseController
{
    /** @var ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('base.products.index');
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.products.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Product in storage.
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/products.singular')]));

        return redirect(route('base.products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('models/products.singular').' '.__('messages.not_found'));

            return redirect(route('base.products.index'));
        }

        return view('base.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('base.products.index'));
        }

        return view('base.products.edit')->with('product', $product)->with($this->getOptionItems());
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('base.products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/products.singular')]));

        return redirect(route('base.products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('base.products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/products.singular')]));

        return redirect(route('base.products.index'));
    }

    /**
     * Provide options item based on relationship model Product from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $uom = new UomRepository(app());

        return [
            'uomItems' => ['' => __('crud.option.uom_placeholder')] + $uom->pluck(),
        ];
    }
}
