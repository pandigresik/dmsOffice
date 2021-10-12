<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\SynchronizeInStockPickingDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateSynchronizeInStockPickingRequest;
use App\Http\Requests\Inventory\UpdateSynchronizeInStockPickingRequest;
use App\Repositories\Inventory\SynchronizeInStockPickingRepository;
use Flash;
use Response;

class SynchronizeInStockPickingController extends AppBaseController
{
    /** @var SynchronizeInStockPickingRepository */
    private $synchronizeInStockPickingRepository;

    public function __construct(SynchronizeInStockPickingRepository $synchronizeInStockPickingRepo)
    {
        $this->synchronizeInStockPickingRepository = $synchronizeInStockPickingRepo;
    }

    /**
     * Display a listing of the SynchronizeInStockPicking.
     *
     * @return Response
     */
    public function index(SynchronizeInStockPickingDataTable $synchronizeInStockPickingDataTable)
    {
        return $synchronizeInStockPickingDataTable->render('inventory.synchronize_in_stock_pickings.index');
    }

    /**
     * Show the form for creating a new SynchronizeInStockPicking.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.synchronize_in_stock_pickings.create');
    }

    /**
     * Store a newly created SynchronizeInStockPicking in storage.
     *
     * @return Response
     */
    public function store(CreateSynchronizeInStockPickingRequest $request)
    {
        $input = $request->all();

        $synchronizeInStockPicking = $this->synchronizeInStockPickingRepository->create($input);

        Flash::success('Synchronize In Stock Picking saved successfully.');

        return redirect(route('inventory.synchronizeInStockPickings.index'));
    }

    /**
     * Display the specified SynchronizeInStockPicking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $synchronizeInStockPicking = $this->synchronizeInStockPickingRepository->find($id);

        if (empty($synchronizeInStockPicking)) {
            Flash::error('Synchronize In Stock Picking not found');

            return redirect(route('inventory.synchronizeInStockPickings.index'));
        }

        return view('inventory.synchronize_in_stock_pickings.show')->with('synchronizeInStockPicking', $synchronizeInStockPicking);
    }

    /**
     * Show the form for editing the specified SynchronizeInStockPicking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $synchronizeInStockPicking = $this->synchronizeInStockPickingRepository->find($id);

        if (empty($synchronizeInStockPicking)) {
            Flash::error('Synchronize In Stock Picking not found');

            return redirect(route('inventory.synchronizeInStockPickings.index'));
        }

        return view('inventory.synchronize_in_stock_pickings.edit')->with('synchronizeInStockPicking', $synchronizeInStockPicking);
    }

    /**
     * Update the specified SynchronizeInStockPicking in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateSynchronizeInStockPickingRequest $request)
    {
        $synchronizeInStockPicking = $this->synchronizeInStockPickingRepository->find($id);

        if (empty($synchronizeInStockPicking)) {
            Flash::error('Synchronize In Stock Picking not found');

            return redirect(route('inventory.synchronizeInStockPickings.index'));
        }

        $synchronizeInStockPicking = $this->synchronizeInStockPickingRepository->update($request->all(), $id);

        Flash::success('Synchronize In Stock Picking updated successfully.');

        return redirect(route('inventory.synchronizeInStockPickings.index'));
    }

    /**
     * Remove the specified SynchronizeInStockPicking from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $synchronizeInStockPicking = $this->synchronizeInStockPickingRepository->find($id);

        if (empty($synchronizeInStockPicking)) {
            Flash::error('Synchronize In Stock Picking not found');

            return redirect(route('inventory.synchronizeInStockPickings.index'));
        }

        $this->synchronizeInStockPickingRepository->delete($id);

        Flash::success('Synchronize In Stock Picking deleted successfully.');

        return redirect(route('inventory.synchronizeInStockPickings.index'));
    }
}
