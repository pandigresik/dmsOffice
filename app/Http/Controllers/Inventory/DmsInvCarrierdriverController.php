<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvCarrierdriverDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateDmsInvCarrierdriverRequest;
use App\Http\Requests\Inventory\UpdateDmsInvCarrierdriverRequest;
use App\Repositories\Inventory\DmsInvCarrierdriverRepository;
use Flash;
use Response;

class DmsInvCarrierdriverController extends AppBaseController
{
    /** @var DmsInvCarrierdriverRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsInvCarrierdriverRepository::class;
    }

    /**
     * Display a listing of the DmsInvCarrierdriver.
     *
     * @return Response
     */
    public function index(DmsInvCarrierdriverDataTable $dmsInvCarrierdriverDataTable)
    {
        return $dmsInvCarrierdriverDataTable->render('inventory.dms_inv_carrierdrivers.index');
    }

    /**
     * Show the form for creating a new DmsInvCarrierdriver.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_carrierdrivers.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvCarrierdriver in storage.
     *
     * @return Response
     */
    public function store(CreateDmsInvCarrierdriverRequest $request)
    {
        $input = $request->all();

        $dmsInvCarrierdriver = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvCarrierdrivers.singular')]));

        return redirect(route('inventory.dmsInvCarrierdrivers.index'));
    }

    /**
     * Display the specified DmsInvCarrierdriver.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvCarrierdriver = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvCarrierdriver)) {
            Flash::error(__('models/dmsInvCarrierdrivers.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvCarrierdrivers.index'));
        }

        return view('inventory.dms_inv_carrierdrivers.show')->with('dmsInvCarrierdriver', $dmsInvCarrierdriver);
    }

    /**
     * Show the form for editing the specified DmsInvCarrierdriver.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvCarrierdriver = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvCarrierdriver)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvCarrierdrivers.singular')]));

            return redirect(route('inventory.dmsInvCarrierdrivers.index'));
        }

        return view('inventory.dms_inv_carrierdrivers.edit')->with('dmsInvCarrierdriver', $dmsInvCarrierdriver)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvCarrierdriver in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvCarrierdriverRequest $request)
    {
        $dmsInvCarrierdriver = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvCarrierdriver)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvCarrierdrivers.singular')]));

            return redirect(route('inventory.dmsInvCarrierdrivers.index'));
        }

        $dmsInvCarrierdriver = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvCarrierdrivers.singular')]));

        return redirect(route('inventory.dmsInvCarrierdrivers.index'));
    }

    /**
     * Remove the specified DmsInvCarrierdriver from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvCarrierdriver = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvCarrierdriver)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvCarrierdrivers.singular')]));

            return redirect(route('inventory.dmsInvCarrierdrivers.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvCarrierdrivers.singular')]));

        return redirect(route('inventory.dmsInvCarrierdrivers.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvCarrierdriver from storage.
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
