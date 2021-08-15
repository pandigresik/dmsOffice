<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\VehicleGroupDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateVehicleGroupRequest;
use App\Http\Requests\Base\UpdateVehicleGroupRequest;
use App\Repositories\Base\VehicleGroupRepository;
use Flash;
use Response;

class VehicleGroupController extends AppBaseController
{
    /** @var VehicleGroupRepository */
    private $vehicleGroupRepository;

    public function __construct(VehicleGroupRepository $vehicleGroupRepo)
    {
        $this->vehicleGroupRepository = $vehicleGroupRepo;
    }

    /**
     * Display a listing of the VehicleGroup.
     *
     * @return Response
     */
    public function index(VehicleGroupDataTable $vehicleGroupDataTable)
    {
        return $vehicleGroupDataTable->render('base.vehicle_groups.index');
    }

    /**
     * Show the form for creating a new VehicleGroup.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.vehicle_groups.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created VehicleGroup in storage.
     *
     * @return Response
     */
    public function store(CreateVehicleGroupRequest $request)
    {
        $input = $request->all();

        $vehicleGroup = $this->vehicleGroupRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/vehicleGroups.singular')]));

        return redirect(route('base.vehicleGroups.index'));
    }

    /**
     * Display the specified VehicleGroup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vehicleGroup = $this->vehicleGroupRepository->find($id);

        if (empty($vehicleGroup)) {
            Flash::error(__('models/vehicleGroups.singular').' '.__('messages.not_found'));

            return redirect(route('base.vehicleGroups.index'));
        }

        return view('base.vehicle_groups.show')->with('vehicleGroup', $vehicleGroup);
    }

    /**
     * Show the form for editing the specified VehicleGroup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehicleGroup = $this->vehicleGroupRepository->find($id);

        if (empty($vehicleGroup)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehicleGroups.singular')]));

            return redirect(route('base.vehicleGroups.index'));
        }

        return view('base.vehicle_groups.edit')->with('vehicleGroup', $vehicleGroup)->with($this->getOptionItems());
    }

    /**
     * Update the specified VehicleGroup in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateVehicleGroupRequest $request)
    {
        $vehicleGroup = $this->vehicleGroupRepository->find($id);

        if (empty($vehicleGroup)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehicleGroups.singular')]));

            return redirect(route('base.vehicleGroups.index'));
        }

        $vehicleGroup = $this->vehicleGroupRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/vehicleGroups.singular')]));

        return redirect(route('base.vehicleGroups.index'));
    }

    /**
     * Remove the specified VehicleGroup from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehicleGroup = $this->vehicleGroupRepository->find($id);

        if (empty($vehicleGroup)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehicleGroups.singular')]));

            return redirect(route('base.vehicleGroups.index'));
        }

        $this->vehicleGroupRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/vehicleGroups.singular')]));

        return redirect(route('base.vehicleGroups.index'));
    }

    /**
     * Provide options item based on relationship model VehicleGroup from storage.
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
