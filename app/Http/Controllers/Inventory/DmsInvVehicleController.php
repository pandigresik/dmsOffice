<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvVehicleDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateDmsInvVehicleRequest;
use App\Http\Requests\Inventory\UpdateDmsInvVehicleRequest;
use App\Repositories\Inventory\DmsInvVehicleRepository;
use Flash;
use Response;

class DmsInvVehicleController extends AppBaseController
{
    /** @var DmsInvVehicleRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsInvVehicleRepository::class;
    }

    /**
     * Display a listing of the DmsInvVehicle.
     *
     * @return Response
     */
    public function index(DmsInvVehicleDataTable $dmsInvVehicleDataTable)
    {
        return $dmsInvVehicleDataTable->render('inventory.dms_inv_vehicles.index');
    }

    /**
     * Show the form for creating a new DmsInvVehicle.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_vehicles.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvVehicle in storage.
     *
     * @return Response
     */
    public function store(CreateDmsInvVehicleRequest $request)
    {
        $input = $request->all();

        $dmsInvVehicle = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvVehicles.singular')]));

        return redirect(route('inventory.dmsInvVehicles.index'));
    }

    /**
     * Display the specified DmsInvVehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvVehicle = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvVehicle)) {
            Flash::error(__('models/dmsInvVehicles.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvVehicles.index'));
        }

        return view('inventory.dms_inv_vehicles.show')->with('dmsInvVehicle', $dmsInvVehicle);
    }

    /**
     * Show the form for editing the specified DmsInvVehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvVehicle = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvVehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvVehicles.singular')]));

            return redirect(route('inventory.dmsInvVehicles.index'));
        }

        return view('inventory.dms_inv_vehicles.edit')->with('dmsInvVehicle', $dmsInvVehicle)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvVehicle in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvVehicleRequest $request)
    {
        $dmsInvVehicle = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvVehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvVehicles.singular')]));

            return redirect(route('inventory.dmsInvVehicles.index'));
        }

        $dmsInvVehicle = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvVehicles.singular')]));

        return redirect(route('inventory.dmsInvVehicles.index'));
    }

    /**
     * Remove the specified DmsInvVehicle from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvVehicle = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvVehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvVehicles.singular')]));

            return redirect(route('inventory.dmsInvVehicles.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvVehicles.singular')]));

        return redirect(route('inventory.dmsInvVehicles.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvVehicle from storage.
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
