<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvCarriervehicleDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateDmsInvCarriervehicleRequest;
use App\Http\Requests\Inventory\UpdateDmsInvCarriervehicleRequest;
use App\Repositories\Inventory\DmsInvCarriervehicleRepository;
use Flash;
use Response;

class DmsInvCarriervehicleController extends AppBaseController
{
    /** @var DmsInvCarriervehicleRepository */
    private $dmsInvCarriervehicleRepository;

    public function __construct(DmsInvCarriervehicleRepository $dmsInvCarriervehicleRepo)
    {
        $this->dmsInvCarriervehicleRepository = $dmsInvCarriervehicleRepo;
    }

    /**
     * Display a listing of the DmsInvCarriervehicle.
     *
     * @return Response
     */
    public function index(DmsInvCarriervehicleDataTable $dmsInvCarriervehicleDataTable)
    {
        return $dmsInvCarriervehicleDataTable->render('inventory.dms_inv_carriervehicles.index');
    }

    /**
     * Show the form for creating a new DmsInvCarriervehicle.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_carriervehicles.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvCarriervehicle in storage.
     *
     * @return Response
     */
    public function store(CreateDmsInvCarriervehicleRequest $request)
    {
        $input = $request->all();

        $dmsInvCarriervehicle = $this->dmsInvCarriervehicleRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvCarriervehicles.singular')]));

        return redirect(route('inventory.dmsInvCarriervehicles.index'));
    }

    /**
     * Display the specified DmsInvCarriervehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvCarriervehicle = $this->dmsInvCarriervehicleRepository->find($id);

        if (empty($dmsInvCarriervehicle)) {
            Flash::error(__('models/dmsInvCarriervehicles.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvCarriervehicles.index'));
        }

        return view('inventory.dms_inv_carriervehicles.show')->with('dmsInvCarriervehicle', $dmsInvCarriervehicle);
    }

    /**
     * Show the form for editing the specified DmsInvCarriervehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvCarriervehicle = $this->dmsInvCarriervehicleRepository->find($id);

        if (empty($dmsInvCarriervehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvCarriervehicles.singular')]));

            return redirect(route('inventory.dmsInvCarriervehicles.index'));
        }

        return view('inventory.dms_inv_carriervehicles.edit')->with('dmsInvCarriervehicle', $dmsInvCarriervehicle)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvCarriervehicle in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvCarriervehicleRequest $request)
    {
        $dmsInvCarriervehicle = $this->dmsInvCarriervehicleRepository->find($id);

        if (empty($dmsInvCarriervehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvCarriervehicles.singular')]));

            return redirect(route('inventory.dmsInvCarriervehicles.index'));
        }

        $dmsInvCarriervehicle = $this->dmsInvCarriervehicleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvCarriervehicles.singular')]));

        return redirect(route('inventory.dmsInvCarriervehicles.index'));
    }

    /**
     * Remove the specified DmsInvCarriervehicle from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvCarriervehicle = $this->dmsInvCarriervehicleRepository->find($id);

        if (empty($dmsInvCarriervehicle)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvCarriervehicles.singular')]));

            return redirect(route('inventory.dmsInvCarriervehicles.index'));
        }

        $this->dmsInvCarriervehicleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvCarriervehicles.singular')]));

        return redirect(route('inventory.dmsInvCarriervehicles.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvCarriervehicle from storage.
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
