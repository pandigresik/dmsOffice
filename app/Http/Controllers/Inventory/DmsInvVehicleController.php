<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvVehicleDataTable;
use App\Http\Requests\Inventory;
use App\Http\Requests\Inventory\CreateDmsInvVehicleRequest;
use App\Http\Requests\Inventory\UpdateDmsInvVehicleRequest;
use App\Repositories\Inventory\DmsInvVehicleRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmsInvVehicleController extends AppBaseController
{
    /** @var  DmsInvVehicleRepository */
    private $dmsInvVehicleRepository;

    public function __construct(DmsInvVehicleRepository $dmsInvVehicleRepo)
    {
        $this->dmsInvVehicleRepository = $dmsInvVehicleRepo;
    }

    /**
     * Display a listing of the DmsInvVehicle.
     *
     * @param DmsInvVehicleDataTable $dmsInvVehicleDataTable
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
     * @param CreateDmsInvVehicleRequest $request
     *
     * @return Response
     */
    public function store(CreateDmsInvVehicleRequest $request)
    {
        $input = $request->all();

        $dmsInvVehicle = $this->dmsInvVehicleRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvVehicles.singular')]));

        return redirect(route('inventory.dmsInvVehicles.index'));
    }

    /**
     * Display the specified DmsInvVehicle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvVehicle = $this->dmsInvVehicleRepository->find($id);

        if (empty($dmsInvVehicle)) {
            Flash::error(__('models/dmsInvVehicles.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvVehicles.index'));
        }

        return view('inventory.dms_inv_vehicles.show')->with('dmsInvVehicle', $dmsInvVehicle);
    }

    /**
     * Show the form for editing the specified DmsInvVehicle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvVehicle = $this->dmsInvVehicleRepository->find($id);

        if (empty($dmsInvVehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvVehicles.singular')]));

            return redirect(route('inventory.dmsInvVehicles.index'));
        }

        return view('inventory.dms_inv_vehicles.edit')->with('dmsInvVehicle', $dmsInvVehicle)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvVehicle in storage.
     *
     * @param  int              $id
     * @param UpdateDmsInvVehicleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvVehicleRequest $request)
    {
        $dmsInvVehicle = $this->dmsInvVehicleRepository->find($id);

        if (empty($dmsInvVehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvVehicles.singular')]));

            return redirect(route('inventory.dmsInvVehicles.index'));
        }

        $dmsInvVehicle = $this->dmsInvVehicleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvVehicles.singular')]));

        return redirect(route('inventory.dmsInvVehicles.index'));
    }

    /**
     * Remove the specified DmsInvVehicle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvVehicle = $this->dmsInvVehicleRepository->find($id);

        if (empty($dmsInvVehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvVehicles.singular')]));

            return redirect(route('inventory.dmsInvVehicles.index'));
        }

        $this->dmsInvVehicleRepository->delete($id);

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
    private function getOptionItems(){        
        
        return [
                        
        ];
    }
}
