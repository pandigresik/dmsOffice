<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvProductDataTable;
use App\Http\Requests\Inventory;
use App\Http\Requests\Inventory\CreateDmsInvProductRequest;
use App\Http\Requests\Inventory\UpdateDmsInvProductRequest;
use App\Repositories\Inventory\DmsInvProductRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmsInvProductController extends AppBaseController
{
    /** @var  DmsInvProductRepository */
    private $dmsInvProductRepository;

    public function __construct(DmsInvProductRepository $dmsInvProductRepo)
    {
        $this->dmsInvProductRepository = $dmsInvProductRepo;
    }

    /**
     * Display a listing of the DmsInvProduct.
     *
     * @param DmsInvProductDataTable $dmsInvProductDataTable
     * @return Response
     */
    public function index(DmsInvProductDataTable $dmsInvProductDataTable)
    {
        return $dmsInvProductDataTable->render('inventory.dms_inv_products.index');
    }

    /**
     * Show the form for creating a new DmsInvProduct.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_products.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvProduct in storage.
     *
     * @param CreateDmsInvProductRequest $request
     *
     * @return Response
     */
    public function store(CreateDmsInvProductRequest $request)
    {
        $input = $request->all();

        $dmsInvProduct = $this->dmsInvProductRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvProducts.singular')]));

        return redirect(route('inventory.dmsInvProducts.index'));
    }

    /**
     * Display the specified DmsInvProduct.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvProduct = $this->dmsInvProductRepository->find($id);

        if (empty($dmsInvProduct)) {
            Flash::error(__('models/dmsInvProducts.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvProducts.index'));
        }

        return view('inventory.dms_inv_products.show')->with('dmsInvProduct', $dmsInvProduct);
    }

    /**
     * Show the form for editing the specified DmsInvProduct.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvProduct = $this->dmsInvProductRepository->find($id);

        if (empty($dmsInvProduct)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProducts.singular')]));

            return redirect(route('inventory.dmsInvProducts.index'));
        }

        return view('inventory.dms_inv_products.edit')->with('dmsInvProduct', $dmsInvProduct)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvProduct in storage.
     *
     * @param  int              $id
     * @param UpdateDmsInvProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvProductRequest $request)
    {
        $dmsInvProduct = $this->dmsInvProductRepository->find($id);

        if (empty($dmsInvProduct)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProducts.singular')]));

            return redirect(route('inventory.dmsInvProducts.index'));
        }

        $dmsInvProduct = $this->dmsInvProductRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvProducts.singular')]));

        return redirect(route('inventory.dmsInvProducts.index'));
    }

    /**
     * Remove the specified DmsInvProduct from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvProduct = $this->dmsInvProductRepository->find($id);

        if (empty($dmsInvProduct)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProducts.singular')]));

            return redirect(route('inventory.dmsInvProducts.index'));
        }

        $this->dmsInvProductRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvProducts.singular')]));

        return redirect(route('inventory.dmsInvProducts.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvProduct from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        
        return [
                        
        ];
    }
}
