<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvWarehouseDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateDmsInvWarehouseRequest;
use App\Http\Requests\Inventory\UpdateDmsInvWarehouseRequest;
use App\Repositories\Inventory\DmsInvWarehouseRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class DmsInvWarehouseController extends AppBaseController
{
    /** @var DmsInvWarehouseRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsInvWarehouseRepository::class;
    }

    /**
     * Display a listing of the DmsInvWarehouse.
     *
     * @return Response
     */
    public function index(DmsInvWarehouseDataTable $dmsInvWarehouseDataTable, Request $request)
    {
        $branchId = $request->route('dmsSmBranch');

        return $dmsInvWarehouseDataTable->setDefaultFilter(['szBranchId' => $branchId])->render('inventory.dms_inv_warehouses.index');
    }

    /**
     * Show the form for creating a new DmsInvWarehouse.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_warehouses.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvWarehouse in storage.
     *
     * @return Response
     */
    public function store(CreateDmsInvWarehouseRequest $request)
    {
        $input = $request->all();

        $dmsInvWarehouse = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvWarehouses.singular')]));

        return redirect(route('inventory.dmsInvWarehouses.index'));
    }

    /**
     * Display the specified DmsInvWarehouse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvWarehouse = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvWarehouse)) {
            Flash::error(__('models/dmsInvWarehouses.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvWarehouses.index'));
        }

        return view('inventory.dms_inv_warehouses.show')->with('dmsInvWarehouse', $dmsInvWarehouse);
    }

    /**
     * Show the form for editing the specified DmsInvWarehouse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvWarehouse = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvWarehouse)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvWarehouses.singular')]));

            return redirect(route('inventory.dmsInvWarehouses.index'));
        }

        return view('inventory.dms_inv_warehouses.edit')->with('dmsInvWarehouse', $dmsInvWarehouse)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvWarehouse in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvWarehouseRequest $request)
    {
        $dmsInvWarehouse = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvWarehouse)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvWarehouses.singular')]));

            return redirect(route('inventory.dmsInvWarehouses.index'));
        }

        $dmsInvWarehouse = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvWarehouses.singular')]));

        return redirect(route('inventory.dmsInvWarehouses.index'));
    }

    /**
     * Remove the specified DmsInvWarehouse from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvWarehouse = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvWarehouse)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvWarehouses.singular')]));

            return redirect(route('inventory.dmsInvWarehouses.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvWarehouses.singular')]));

        return redirect(route('inventory.dmsInvWarehouses.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvWarehouse from storage.
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
