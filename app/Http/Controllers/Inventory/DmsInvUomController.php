<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvUomDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateDmsInvUomRequest;
use App\Http\Requests\Inventory\UpdateDmsInvUomRequest;
use App\Repositories\Inventory\DmsInvUomRepository;
use Flash;
use Response;

class DmsInvUomController extends AppBaseController
{
    /** @var DmsInvUomRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsInvUomRepository::class;
    }

    /**
     * Display a listing of the DmsInvUom.
     *
     * @return Response
     */
    public function index(DmsInvUomDataTable $dmsInvUomDataTable)
    {
        return $dmsInvUomDataTable->render('inventory.dms_inv_uoms.index');
    }

    /**
     * Show the form for creating a new DmsInvUom.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_uoms.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvUom in storage.
     *
     * @return Response
     */
    public function store(CreateDmsInvUomRequest $request)
    {
        $input = $request->all();

        $dmsInvUom = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvUoms.singular')]));

        return redirect(route('inventory.dmsInvUoms.index'));
    }

    /**
     * Display the specified DmsInvUom.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvUom = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvUom)) {
            Flash::error(__('models/dmsInvUoms.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvUoms.index'));
        }

        return view('inventory.dms_inv_uoms.show')->with('dmsInvUom', $dmsInvUom);
    }

    /**
     * Show the form for editing the specified DmsInvUom.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvUom = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvUom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvUoms.singular')]));

            return redirect(route('inventory.dmsInvUoms.index'));
        }

        return view('inventory.dms_inv_uoms.edit')->with('dmsInvUom', $dmsInvUom)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvUom in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvUomRequest $request)
    {
        $dmsInvUom = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvUom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvUoms.singular')]));

            return redirect(route('inventory.dmsInvUoms.index'));
        }

        $dmsInvUom = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvUoms.singular')]));

        return redirect(route('inventory.dmsInvUoms.index'));
    }

    /**
     * Remove the specified DmsInvUom from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvUom = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvUom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvUoms.singular')]));

            return redirect(route('inventory.dmsInvUoms.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvUoms.singular')]));

        return redirect(route('inventory.dmsInvUoms.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvUom from storage.
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
