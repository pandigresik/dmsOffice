<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\LocationEkspedisiDataTable;
use App\Http\Requests\Inventory;
use App\Http\Requests\Inventory\CreateLocationEkspedisiRequest;
use App\Http\Requests\Inventory\UpdateLocationEkspedisiRequest;
use App\Repositories\Inventory\LocationEkspedisiRepository;
use App\Repositories\Inventory\DmsInvCarrierRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LocationEkspedisiController extends AppBaseController
{
    /** @var  LocationEkspedisiRepository */
    private $locationEkspedisiRepository;

    public function __construct(LocationEkspedisiRepository $locationEkspedisiRepo)
    {
        $this->locationEkspedisiRepository = $locationEkspedisiRepo;
    }

    /**
     * Display a listing of the LocationEkspedisi.
     *
     * @param LocationEkspedisiDataTable $locationEkspedisiDataTable
     * @return Response
     */
    public function index(LocationEkspedisiDataTable $locationEkspedisiDataTable)
    {
        return $locationEkspedisiDataTable->render('inventory.location_ekspedisis.index');
    }

    /**
     * Show the form for creating a new LocationEkspedisi.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.location_ekspedisis.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created LocationEkspedisi in storage.
     *
     * @param CreateLocationEkspedisiRequest $request
     *
     * @return Response
     */
    public function store(CreateLocationEkspedisiRequest $request)
    {
        $input = $request->all();

        $locationEkspedisi = $this->locationEkspedisiRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/locationEkspedisis.singular')]));

        return redirect(route('inventory.locationEkspedisis.index'));
    }

    /**
     * Display the specified LocationEkspedisi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $locationEkspedisi = $this->locationEkspedisiRepository->find($id);

        if (empty($locationEkspedisi)) {
            Flash::error(__('models/locationEkspedisis.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.locationEkspedisis.index'));
        }

        return view('inventory.location_ekspedisis.show')->with('locationEkspedisi', $locationEkspedisi);
    }

    /**
     * Show the form for editing the specified LocationEkspedisi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $locationEkspedisi = $this->locationEkspedisiRepository->find($id);

        if (empty($locationEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationEkspedisis.singular')]));

            return redirect(route('inventory.locationEkspedisis.index'));
        }

        return view('inventory.location_ekspedisis.edit')->with('locationEkspedisi', $locationEkspedisi)->with($this->getOptionItems());
    }

    /**
     * Update the specified LocationEkspedisi in storage.
     *
     * @param  int              $id
     * @param UpdateLocationEkspedisiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocationEkspedisiRequest $request)
    {
        $locationEkspedisi = $this->locationEkspedisiRepository->find($id);

        if (empty($locationEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationEkspedisis.singular')]));

            return redirect(route('inventory.locationEkspedisis.index'));
        }

        $locationEkspedisi = $this->locationEkspedisiRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/locationEkspedisis.singular')]));

        return redirect(route('inventory.locationEkspedisis.index'));
    }

    /**
     * Remove the specified LocationEkspedisi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $locationEkspedisi = $this->locationEkspedisiRepository->find($id);

        if (empty($locationEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationEkspedisis.singular')]));

            return redirect(route('inventory.locationEkspedisis.index'));
        }

        $this->locationEkspedisiRepository->delete($id);

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
    private function getOptionItems(){        
        $dmsInvCarrier = new DmsInvCarrierRepository(app());
        return [
            'dmsInvCarrierItems' => ['' => __('crud.option.dmsInvCarrier_placeholder')] + $dmsInvCarrier->pluck()            
        ];
    }
}
