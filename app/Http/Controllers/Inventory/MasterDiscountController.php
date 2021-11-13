<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\MasterDiscountDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateMasterDiscountRequest;
use App\Http\Requests\Inventory\UpdateMasterDiscountRequest;
use App\Repositories\Inventory\MasterDiscountRepository;
use App\Repositories\Inventory\ProductPriceRepository;
use Flash;
use Response;

class MasterDiscountController extends AppBaseController
{
    /** @var MasterDiscountRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = MasterDiscountRepository::class;
    }

    /**
     * Display a listing of the MasterDiscount.
     *
     * @return Response
     */
    public function index(MasterDiscountDataTable $masterDiscountDataTable)
    {
        return $masterDiscountDataTable->render('inventory.master_discounts.index');
    }

    /**
     * Show the form for creating a new MasterDiscount.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.master_discounts.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created MasterDiscount in storage.
     *
     * @return Response
     */
    public function store(CreateMasterDiscountRequest $request)
    {
        $input = $request->all();

        $masterDiscount = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/masterDiscounts.singular')]));

        return redirect(route('inventory.masterDiscounts.index'));
    }

    /**
     * Display the specified MasterDiscount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterDiscount = $this->getRepositoryObj()->find($id);

        if (empty($masterDiscount)) {
            Flash::error(__('models/masterDiscounts.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.masterDiscounts.index'));
        }

        return view('inventory.master_discounts.show')->with('masterDiscount', $masterDiscount);
    }

    /**
     * Show the form for editing the specified MasterDiscount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterDiscount = $this->getRepositoryObj()->find($id);

        if (empty($masterDiscount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/masterDiscounts.singular')]));

            return redirect(route('inventory.masterDiscounts.index'));
        }

        return view('inventory.master_discounts.edit')->with('masterDiscount', $masterDiscount)->with($this->getOptionItems());
    }

    /**
     * Update the specified MasterDiscount in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateMasterDiscountRequest $request)
    {
        $masterDiscount = $this->getRepositoryObj()->find($id);

        if (empty($masterDiscount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/masterDiscounts.singular')]));

            return redirect(route('inventory.masterDiscounts.index'));
        }

        $masterDiscount = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/masterDiscounts.singular')]));

        return redirect(route('inventory.masterDiscounts.index'));
    }

    /**
     * Remove the specified MasterDiscount from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterDiscount = $this->getRepositoryObj()->find($id);

        if (empty($masterDiscount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/masterDiscounts.singular')]));

            return redirect(route('inventory.masterDiscounts.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/masterDiscounts.singular')]));

        return redirect(route('inventory.masterDiscounts.index'));
    }

    /**
     * Provide options item based on relationship model MasterDiscount from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $productPrice = new ProductPriceRepository(app());

        return [
            'productItems' => $productPrice
                ->allQuery()->disableModelCaching()
                ->with(['dmsInvProduct' => function ($q) {
                    $q->with(['productCategories']);
                }])
                ->get()->pluck('full_identity', 'dms_inv_product_id')->toArray(),
        ];
    }
}
