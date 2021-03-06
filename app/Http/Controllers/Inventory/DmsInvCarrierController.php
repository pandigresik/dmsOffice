<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvCarrierDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateDmsInvCarrierRequest;
use App\Http\Requests\Inventory\UpdateDmsInvCarrierRequest;
use App\Repositories\Inventory\DmsInvCarrierRepository;
use Flash;
use Response;

class DmsInvCarrierController extends AppBaseController
{
    /** @var DmsInvCarrierRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsInvCarrierRepository::class;
    }

    /**
     * Display a listing of the DmsInvCarrier.
     *
     * @return Response
     */
    public function index(DmsInvCarrierDataTable $dmsInvCarrierDataTable)
    {
        return $dmsInvCarrierDataTable->render('inventory.dms_inv_carriers.index');
    }

    /**
     * Show the form for creating a new DmsInvCarrier.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_carriers.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvCarrier in storage.
     *
     * @return Response
     */
    public function store(CreateDmsInvCarrierRequest $request)
    {
        $input = $request->all();

        $dmsInvCarrier = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvCarriers.singular')]));

        return redirect(route('inventory.dmsInvCarriers.index'));
    }

    /**
     * Display the specified DmsInvCarrier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvCarrier = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvCarrier)) {
            Flash::error(__('models/dmsInvCarriers.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvCarriers.index'));
        }

        return view('inventory.dms_inv_carriers.show')->with('dmsInvCarrier', $dmsInvCarrier);
    }

    /**
     * Show the form for editing the specified DmsInvCarrier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvCarrier = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvCarrier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvCarriers.singular')]));

            return redirect(route('inventory.dmsInvCarriers.index'));
        }
        $jsonDefaultSearching = ['dms_inv_carrier_id' => $id];
        $dataTabs = [
            'contact' => ['text' => 'Contact Person', 'json' => $jsonDefaultSearching, 'url' => route('inventory.contactEkspedisis.index', ['dms_inv_carrier_id' => $id]), 'defaultContent' => '', 'class' => ''],
            'vehicle' => ['text' => 'Kendaraan', 'json' => $jsonDefaultSearching, 'url' => route('inventory.vehicleEkspedisis.index', ['dms_inv_carrier_id' => $id]), 'defaultContent' => '', 'class' => ''],
            'trip' => ['text' => 'Trip', 'json' => $jsonDefaultSearching, 'url' => route('inventory.tripEkspedisis.index', ['dms_inv_carrier_id' => $id]), 'defaultContent' => '', 'class' => ''],
        ];

        return view('inventory.dms_inv_carriers.edit')->with('dataTabs', $dataTabs)->with('dmsInvCarrier', $dmsInvCarrier)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvCarrier in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvCarrierRequest $request)
    {
        $dmsInvCarrier = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvCarrier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvCarriers.singular')]));

            return redirect(route('inventory.dmsInvCarriers.index'));
        }

        $dmsInvCarrier = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvCarriers.singular')]));

        return redirect(route('inventory.dmsInvCarriers.index'));
    }

    /**
     * Remove the specified DmsInvCarrier from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvCarrier = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvCarrier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvCarriers.singular')]));

            return redirect(route('inventory.dmsInvCarriers.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvCarriers.singular')]));

        return redirect(route('inventory.dmsInvCarriers.index'));
    }

    /**
     * Provide options item inventoryd on relationship model DmsInvCarrier from storage.
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
