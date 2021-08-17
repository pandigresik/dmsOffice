<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\WarehouseDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateWarehouseRequest;
use App\Http\Requests\Inventory\UpdateWarehouseRequest;
use App\Repositories\Base\CompanyRepository;
use App\Repositories\Inventory\WarehouseRepository;
use Flash;
use Response;

class WarehouseController extends AppBaseController
{
    /** @var WarehouseRepository */
    private $warehouseRepository;

    public function __construct(WarehouseRepository $warehouseRepo)
    {
        $this->warehouseRepository = $warehouseRepo;
    }

    /**
     * Display a listing of the Warehouse.
     *
     * @return Response
     */
    public function index(WarehouseDataTable $warehouseDataTable)
    {
        return $warehouseDataTable->render('inventory.warehouses.index');
    }

    /**
     * Show the form for creating a new Warehouse.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.warehouses.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Warehouse in storage.
     *
     * @return Response
     */
    public function store(CreateWarehouseRequest $request)
    {
        $input = $request->all();

        $warehouse = $this->warehouseRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/warehouses.singular')]));

        return redirect(route('inventory.warehouses.index'));
    }

    /**
     * Display the specified Warehouse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $warehouse = $this->warehouseRepository->find($id);

        if (empty($warehouse)) {
            Flash::error(__('models/warehouses.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.warehouses.index'));
        }

        return view('inventory.warehouses.show')->with('warehouse', $warehouse);
    }

    /**
     * Show the form for editing the specified Warehouse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $warehouse = $this->warehouseRepository->find($id);

        if (empty($warehouse)) {
            Flash::error(__('messages.not_found', ['model' => __('models/warehouses.singular')]));

            return redirect(route('inventory.warehouses.index'));
        }

        return view('inventory.warehouses.edit')->with('warehouse', $warehouse)->with($this->getOptionItems());
    }

    /**
     * Update the specified Warehouse in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateWarehouseRequest $request)
    {
        $warehouse = $this->warehouseRepository->find($id);

        if (empty($warehouse)) {
            Flash::error(__('messages.not_found', ['model' => __('models/warehouses.singular')]));

            return redirect(route('inventory.warehouses.index'));
        }

        $warehouse = $this->warehouseRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/warehouses.singular')]));

        return redirect(route('inventory.warehouses.index'));
    }

    /**
     * Remove the specified Warehouse from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $warehouse = $this->warehouseRepository->find($id);

        if (empty($warehouse)) {
            Flash::error(__('messages.not_found', ['model' => __('models/warehouses.singular')]));

            return redirect(route('inventory.warehouses.index'));
        }

        $this->warehouseRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/warehouses.singular')]));

        return redirect(route('inventory.warehouses.index'));
    }

    /**
     * Provide options item based on relationship model Warehouse from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $company = new CompanyRepository(app());

        return [
            'companyItems' => ['' => __('crud.option.company_placeholder')] + $company->pluck(),
        ];
    }
}
