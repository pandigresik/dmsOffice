<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\TripEkspedisiDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateTripEkspedisiRequest;
use App\Http\Requests\Inventory\UpdateTripEkspedisiRequest;
use App\Repositories\Base\TripRepository;
use App\Repositories\Inventory\TripEkspedisiRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class TripEkspedisiController extends AppBaseController
{
    /** @var TripEkspedisiRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = TripEkspedisiRepository::class;
    }

    /**
     * Display a listing of the TripEkspedisi.
     *
     * @param TripEkspedisiDataTable $tripEkspedisiDataTable
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $trips = $this->getRepositoryObj()->with(['trip'])
            ->all(['dms_inv_carrier_id' => $request->get('dms_inv_carrier_id')])->map(function ($q) {
                return $q->trip;
            });
        $buttonView = view('inventory.dms_inv_carriers.partials.trip_button', ['json' => [], 'url' => route('inventory.tripEkspedisis.create')])->render();

        return view('inventory.trip_ekspedisis.index')->with(['trips' => $trips, 'buttonView' => $buttonView]);
    }

    /**
     * Show the form for creating a new TripEkspedisi.
     *
     * @return Response
     */
    public function create()
    {
        $idForm = \Carbon\Carbon::now()->timestamp;

        return view('inventory.trip_ekspedisis.create')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => 'tripEkspedisis['.$idForm.']'])
        ;
    }

    /**
     * Store a newly created TripEkspedisi in storage.
     *
     * @return Response
     */
    public function store(CreateTripEkspedisiRequest $request)
    {
        $input = $request->all();

        $tripEkspedisi = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tripEkspedisis.singular')]));

        return redirect(route('inventory.tripEkspedisis.index'));
    }

    /**
     * Display the specified TripEkspedisi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tripEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($tripEkspedisi)) {
            Flash::error(__('models/tripEkspedisis.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.tripEkspedisis.index'));
        }

        return view('inventory.trip_ekspedisis.show')->with('tripEkspedisi', $tripEkspedisi);
    }

    /**
     * Show the form for editing the specified TripEkspedisi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tripEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($tripEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tripEkspedisis.singular')]));

            return redirect(route('inventory.tripEkspedisis.index'));
        }

        return view('inventory.trip_ekspedisis.edit')->with('tripEkspedisi', $tripEkspedisi)->with($this->getOptionItems());
    }

    /**
     * Update the specified TripEkspedisi in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateTripEkspedisiRequest $request)
    {
        $tripEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($tripEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tripEkspedisis.singular')]));

            return redirect(route('inventory.tripEkspedisis.index'));
        }

        $tripEkspedisi = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tripEkspedisis.singular')]));

        return redirect(route('inventory.tripEkspedisis.index'));
    }

    /**
     * Remove the specified TripEkspedisi from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tripEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($tripEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tripEkspedisis.singular')]));

            return redirect(route('inventory.tripEkspedisis.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tripEkspedisis.singular')]));

        return redirect(route('inventory.tripEkspedisis.index'));
    }

    /**
     * Provide options item based on relationship model TripEkspedisi from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $trip = new TripRepository(app());

        return [
            'tripItems' => ['' => __('crud.option.trip_placeholder')] + $trip->allQuery()->with(['productCategories'])->get()->pluck('full_identity', 'id')->toArray(),
        ];
    }
}
