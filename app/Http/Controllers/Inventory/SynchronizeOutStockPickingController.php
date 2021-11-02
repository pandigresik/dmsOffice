<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\SynchronizeOutStockPickingDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateSynchronizeOutStockPickingRequest;
use App\Http\Requests\Inventory\UpdateSynchronizeOutStockPickingRequest;
use App\Repositories\Inventory\SynchronizeOutStockPickingRepository;
use Flash;
use Response;

class SynchronizeOutStockPickingController extends AppBaseController
{
    /** @var SynchronizeOutStockPickingRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = SynchronizeOutStockPickingRepository::class;
    }

    /**
     * Display a listing of the SynchronizeOutStockPicking.
     *
     * @return Response
     */
    public function index(SynchronizeOutStockPickingDataTable $synchronizeOutStockPickingDataTable)
    {
        return $synchronizeOutStockPickingDataTable->render('inventory.synchronize_out_stock_pickings.index');
    }

    /**
     * Show the form for creating a new SynchronizeOutStockPicking.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.synchronize_out_stock_pickings.create');
    }

    /**
     * Store a newly created SynchronizeOutStockPicking in storage.
     *
     * @return Response
     */
    public function store(CreateSynchronizeOutStockPickingRequest $request)
    {
        $input = $request->all();

        $synchronizeOutStockPicking = $this->getRepositoryObj()->create($input);

        Flash::success('Synchronize In Stock Picking saved successfully.');

        return redirect(route('inventory.synchronizeOutStockPickings.index'));
    }

    /**
     * Display the specified SynchronizeOutStockPicking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $synchronizeOutStockPicking = $this->getRepositoryObj()->find($id);

        if (empty($synchronizeOutStockPicking)) {
            Flash::error('Synchronize In Stock Picking not found');

            return redirect(route('inventory.synchronizeOutStockPickings.index'));
        }

        return view('inventory.synchronize_out_stock_pickings.show')->with('synchronizeOutStockPicking', $synchronizeOutStockPicking);
    }

    /**
     * Show the form for editing the specified SynchronizeOutStockPicking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $synchronizeOutStockPicking = $this->getRepositoryObj()->find($id);

        if (empty($synchronizeOutStockPicking)) {
            Flash::error('Synchronize In Stock Picking not found');

            return redirect(route('inventory.synchronizeOutStockPickings.index'));
        }

        return view('inventory.synchronize_out_stock_pickings.edit')->with('synchronizeOutStockPicking', $synchronizeOutStockPicking);
    }

    /**
     * Update the specified SynchronizeOutStockPicking in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateSynchronizeOutStockPickingRequest $request)
    {
        $synchronizeOutStockPicking = $this->getRepositoryObj()->find($id);

        if (empty($synchronizeOutStockPicking)) {
            Flash::error('Synchronize In Stock Picking not found');

            return redirect(route('inventory.synchronizeOutStockPickings.index'));
        }

        $synchronizeOutStockPicking = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success('Synchronize In Stock Picking updated successfully.');

        return redirect(route('inventory.synchronizeOutStockPickings.index'));
    }

    /**
     * Remove the specified SynchronizeOutStockPicking from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $synchronizeOutStockPicking = $this->getRepositoryObj()->find($id);

        if (empty($synchronizeOutStockPicking)) {
            Flash::error('Synchronize In Stock Picking not found');

            return redirect(route('inventory.synchronizeOutStockPickings.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success('Synchronize In Stock Picking deleted successfully.');

        return redirect(route('inventory.synchronizeOutStockPickings.index'));
    }
}
