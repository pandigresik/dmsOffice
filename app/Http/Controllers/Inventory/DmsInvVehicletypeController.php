<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvVehicletypeDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateDmsInvVehicletypeRequest;
use App\Http\Requests\Inventory\UpdateDmsInvVehicletypeRequest;
use App\Repositories\Inventory\DmsInvVehicletypeRepository;
use Flash;
use Response;

class DmsInvVehicletypeController extends AppBaseController
{
    /** @var DmsInvVehicletypeRepository */
    private $dmsInvVehicletypeRepository;

    public function __construct(DmsInvVehicletypeRepository $dmsInvVehicletypeRepo)
    {
        $this->dmsInvVehicletypeRepository = $dmsInvVehicletypeRepo;
    }

    /**
     * Display a listing of the DmsInvVehicletype.
     *
     * @return Response
     */
    public function index(DmsInvVehicletypeDataTable $dmsInvVehicletypeDataTable)
    {
        return $dmsInvVehicletypeDataTable->render('inventory.dms_inv_vehicletypes.index');
    }

    /**
     * Show the form for creating a new DmsInvVehicletype.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_vehicletypes.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvVehicletype in storage.
     *
     * @return Response
     */
    public function store(CreateDmsInvVehicletypeRequest $request)
    {
        $input = $request->all();

        $dmsInvVehicletype = $this->dmsInvVehicletypeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvVehicletypes.singular')]));

        return redirect(route('inventory.dmsInvVehicletypes.index'));
    }

    /**
     * Display the specified DmsInvVehicletype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvVehicletype = $this->dmsInvVehicletypeRepository->find($id);

        if (empty($dmsInvVehicletype)) {
            Flash::error(__('models/dmsInvVehicletypes.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvVehicletypes.index'));
        }

        return view('inventory.dms_inv_vehicletypes.show')->with('dmsInvVehicletype', $dmsInvVehicletype);
    }

    /**
     * Show the form for editing the specified DmsInvVehicletype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvVehicletype = $this->dmsInvVehicletypeRepository->find($id);

        if (empty($dmsInvVehicletype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvVehicletypes.singular')]));

            return redirect(route('inventory.dmsInvVehicletypes.index'));
        }

        return view('inventory.dms_inv_vehicletypes.edit')->with('dmsInvVehicletype', $dmsInvVehicletype)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvVehicletype in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvVehicletypeRequest $request)
    {
        $dmsInvVehicletype = $this->dmsInvVehicletypeRepository->find($id);

        if (empty($dmsInvVehicletype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvVehicletypes.singular')]));

            return redirect(route('inventory.dmsInvVehicletypes.index'));
        }

        $dmsInvVehicletype = $this->dmsInvVehicletypeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvVehicletypes.singular')]));

        return redirect(route('inventory.dmsInvVehicletypes.index'));
    }

    /**
     * Remove the specified DmsInvVehicletype from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvVehicletype = $this->dmsInvVehicletypeRepository->find($id);

        if (empty($dmsInvVehicletype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvVehicletypes.singular')]));

            return redirect(route('inventory.dmsInvVehicletypes.index'));
        }

        $this->dmsInvVehicletypeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvVehicletypes.singular')]));

        return redirect(route('inventory.dmsInvVehicletypes.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvVehicletype from storage.
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
