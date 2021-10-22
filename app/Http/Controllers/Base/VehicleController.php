<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\VehicleDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateVehicleRequest;
use App\Http\Requests\Base\UpdateVehicleRequest;
use App\Repositories\Base\VehicleGroupRepository;
use App\Repositories\Base\VehicleRepository;
use Flash;
use Response;

class VehicleController extends AppBaseController
{
    /** @var VehicleRepository */
    private $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepo)
    {
        $this->vehicleRepository = $vehicleRepo;
    }

    /**
     * Display a listing of the Vehicle.
     *
     * @param mixed $id
     *
     * @return Response
     */
    public function index($id, VehicleDataTable $vehicleDataTable)
    {
        return $vehicleDataTable->setIdReferences($id)->render('base.vehicles.index', ['vendorId' => $id]);
    }    

    /**
     * Show the form for creating a new Vehicle.
     *
     * @param mixed $id
     *
     * @return Response
     */
    public function create($id)
    {
        return view('base.vehicles.create')->with('VendorId', $id)->with($this->getOptionItems());
    }

    /**
     * Store a newly created Vehicle in storage.
     *
     * @param mixed $id
     *
     * @return Response
     */
    public function store($id, CreateVehicleRequest $request)
    {
        $input = $request->all();
        $input['vendor_expedition_id'] = $id;
        $vehicle = $this->vehicleRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/vehicles.singular')]));

        return redirect(route('base.vendors.vehicles.index', $id));
    }

    /**
     * Display the specified Vehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vehicle = $this->vehicleRepository->find($id);

        if (empty($vehicle)) {
            Flash::error(__('models/vehicles.singular').' '.__('messages.not_found'));

            return redirect(route('base.vehicles.index'));
        }

        return view('base.vehicles.show')->with('vehicle', $vehicle);
    }

    /**
     * Show the form for editing the specified Vehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehicle = $this->vehicleRepository->find($id);

        if (empty($vehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehicles.singular')]));

            return redirect(route('base.vehicles.index'));
        }

        return view('base.vehicles.edit')->with('vehicle', $vehicle)->with($this->getOptionItems());
    }

    /**
     * Update the specified Vehicle in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateVehicleRequest $request)
    {
        $vehicle = $this->vehicleRepository->find($id);

        if (empty($vehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehicles.singular')]));

            return redirect(route('base.vehicles.index'));
        }

        $vehicle = $this->vehicleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/vehicles.singular')]));

        return redirect(route('base.vehicles.index'));
    }

    /**
     * Remove the specified Vehicle from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehicle = $this->vehicleRepository->find($id);

        if (empty($vehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehicles.singular')]));

            return redirect(route('base.vehicles.index'));
        }

        $this->vehicleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/vehicles.singular')]));

        return redirect(route('base.vehicles.index'));
    }

    /**
     * Provide options item based on relationship model Vehicle from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $vehicleGroup = new VehicleGroupRepository(app());

        return [
            'vehicleGroupItems' => ['' => __('crud.option.vehicleGroup_placeholder')] + $vehicleGroup->pluck(),
        ];
    }

    public  function form(){

        return view('base.vehicles.create_new');
    }
}
