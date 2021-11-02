<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\LocationEkspedisiDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateLocationEkspedisiRequest;
use App\Http\Requests\Inventory\UpdateLocationEkspedisiRequest;
use App\Repositories\Inventory\DmsInvCarrierRepository;
use App\Repositories\Inventory\LocationEkspedisiRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class LocationEkspedisiController extends AppBaseController
{
    /** @var LocationEkspedisiRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = LocationEkspedisiRepository::class;
    }

    /**
     * Display a listing of the LocationEkspedisi.
     *
     * @param LocationEkspedisiDataTable $locationEkspedisiDataTable
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $locations = $this->getRepositoryObj()->all(['dms_inv_carrier_id' => $request->get('dms_inv_carrier_id')]);
        $buttonView = view('inventory.dms_inv_carriers.partials.location_button', ['json' => [], 'url' => route('inventory.locationEkspedisis.create')])->render();

        return view('inventory.location_ekspedisis.index')->with(['locations' => $locations, 'buttonView' => $buttonView]);
    }

    /**
     * Show the form for creating a new LocationEkspedisi.
     *
     * @return Response
     */
    public function create()
    {
        $idForm = \Carbon\Carbon::now()->timestamp;

        return view('inventory.location_ekspedisis.create')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => 'locationEkspedisis['.$idForm.']'])
        ;
    }

    /**
     * Store a newly created LocationEkspedisi in storage.
     *
     * @return Response
     */
    public function store(CreateLocationEkspedisiRequest $request)
    {
        $input = $request->all();

        $locationEkspedisi = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/locationEkspedisis.singular')]));

        return redirect(route('inventory.locationEkspedisis.index'));
    }

    /**
     * Display the specified LocationEkspedisi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $locationEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($locationEkspedisi)) {
            Flash::error(__('models/locationEkspedisis.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.locationEkspedisis.index'));
        }

        return view('inventory.location_ekspedisis.show')->with('locationEkspedisi', $locationEkspedisi);
    }

    /**
     * Show the form for editing the specified LocationEkspedisi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $locationEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($locationEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationEkspedisis.singular')]));

            return redirect(route('inventory.locationEkspedisis.index'));
        }

        $idForm = $id;
        $locationEkspedisi->stateForm = 'update';
        $obj = new \stdClass();
        $obj->locationEkspedisi = [$id => $locationEkspedisi];

        return view('inventory.location_ekspedisis.edit')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'update', 'id' => $id], 'locationEkspedisi' => $obj, 'id' => $id, 'stateForm' => 'update', 'idForm' => $idForm, 'prefixName' => 'locationEkspedisi['.$idForm.']'])
        ;
    }

    /**
     * Update the specified LocationEkspedisi in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateLocationEkspedisiRequest $request)
    {
        $locationEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($locationEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationEkspedisis.singular')]));

            return redirect(route('inventory.locationEkspedisis.index'));
        }

        $locationEkspedisi = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/locationEkspedisis.singular')]));

        return redirect(route('inventory.locationEkspedisis.index'));
    }

    /**
     * Remove the specified LocationEkspedisi from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $locationEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($locationEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationEkspedisis.singular')]));

            return redirect(route('inventory.locationEkspedisis.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/locationEkspedisis.singular')]));

        return redirect(route('inventory.locationEkspedisis.index'));
    }

    /**
     * Provide options item based on relationship model LocationEkspedisi from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        // $dmsInvCarrier = new DmsInvCarrierRepository(app());
        return [
            //     'dmsInvCarrierItems' => ['' => __('crud.option.dmsInvCarrier_placeholder')] + $dmsInvCarrier->pluck()
        ];
    }
}
