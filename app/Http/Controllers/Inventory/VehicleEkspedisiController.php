<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\VehicleEkspedisiDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateVehicleEkspedisiRequest;
use App\Http\Requests\Inventory\UpdateVehicleEkspedisiRequest;
use App\Repositories\Inventory\DmsInvVehicleRepository;
use App\Repositories\Inventory\VehicleEkspedisiRepository;
use Flash;
use Response;

class VehicleEkspedisiController extends AppBaseController
{
    /** @var VehicleEkspedisiRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = VehicleEkspedisiRepository::class;
    }

    /**
     * Display a listing of the VehicleEkspedisi.
     *
     * @return Response
     */
    public function index(VehicleEkspedisiDataTable $vehicleEkspedisiDataTable)
    {
        return $vehicleEkspedisiDataTable->render('inventory.vehicle_ekspedisis.index');
    }

    /**
     * Show the form for creating a new VehicleEkspedisi.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.vehicle_ekspedisis.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created VehicleEkspedisi in storage.
     *
     * @return Response
     */
    public function store(CreateVehicleEkspedisiRequest $request)
    {
        $input = $request->all();

        $vehicleEkspedisi = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/vehicleEkspedisis.singular')]));

        return redirect(route('inventory.vehicleEkspedisis.index'));
    }

    /**
     * Display the specified VehicleEkspedisi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vehicleEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($vehicleEkspedisi)) {
            Flash::error(__('models/vehicleEkspedisis.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.vehicleEkspedisis.index'));
        }

        return view('inventory.vehicle_ekspedisis.show')->with('vehicleEkspedisi', $vehicleEkspedisi);
    }

    /**
     * Show the form for editing the specified VehicleEkspedisi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehicleEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($vehicleEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehicleEkspedisis.singular')]));

            return redirect(route('inventory.vehicleEkspedisis.index'));
        }

        return view('inventory.vehicle_ekspedisis.edit')->with('vehicleEkspedisi', $vehicleEkspedisi)->with($this->getOptionItems());
    }

    /**
     * Update the specified VehicleEkspedisi in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateVehicleEkspedisiRequest $request)
    {
        $vehicleEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($vehicleEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehicleEkspedisis.singular')]));

            return redirect(route('inventory.vehicleEkspedisis.index'));
        }

        $vehicleEkspedisi = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/vehicleEkspedisis.singular')]));

        return redirect(route('inventory.vehicleEkspedisis.index'));
    }

    /**
     * Remove the specified VehicleEkspedisi from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehicleEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($vehicleEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehicleEkspedisis.singular')]));

            return redirect(route('inventory.vehicleEkspedisis.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/vehicleEkspedisis.singular')]));

        return redirect(route('inventory.vehicleEkspedisis.index'));
    }

    /**
     * Provide options item based on relationship model VehicleEkspedisi from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $dmsInvVehicle = new DmsInvVehicleRepository(app());

        return [
            'dmsInvVehicleItems' => ['' => __('crud.option.dmsInvVehicle_placeholder')] + $dmsInvVehicle->pluck(),
        ];
    }
}
