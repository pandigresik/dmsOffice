<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\TripEkspedisiDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateTripEkspedisiRequest;
use App\Http\Requests\Inventory\UpdateTripEkspedisiRequest;
use App\Models\Inventory\TripEkspedisiPrice;
use App\Repositories\Base\TripRepository;
use App\Repositories\Inventory\TripEkspedisiRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class TripEkspedisiController extends AppBaseController
{
    /** @var TripEkspedisiRepository */
    protected $repository;
    private $defaultCarrier;

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
        $trips = $this->getRepositoryObj()->with(['trip', 'lastPrice'])
            ->allQuery()->where(['dms_inv_carrier_id' => $request->get('dms_inv_carrier_id')])->get()->map(function ($q) {
                if($q->lastPrice){
                    $q->trip->price = $q->lastPrice->getRawOriginal('price');
                    $q->trip->price_log_id = $q->lastPrice->id;
                    $q->trip->origin_additional_price = $q->lastPrice->getRawOriginal('origin_additional_price');
                    $q->trip->destination_additional_price = $q->lastPrice->getRawOriginal('destination_additional_price');
                    $q->trip->start_date = $q->lastPrice->start_date;
                }
                
                return $q->trip;
            });
        $buttonView = view('inventory.dms_inv_carriers.partials.trip_button', ['json' => ['dms_inv_carrier_id' => $request->get('dms_inv_carrier_id')], 'url' => route('inventory.tripEkspedisis.create')])->render();

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
        $this->setDefaultCarrier(request('dms_inv_carrier_id'));

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
     * Show the form for editing the specified trip ekspedisi price
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tripEkspedisiPrice = TripEkspedisiPrice::with(['tripEkspedisi'])->find($id);
        $idForm = $tripEkspedisiPrice->trip_ekspedisi_id;
        if (empty($tripEkspedisiPrice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tripEkspedisis.singular')]));

            return redirect(route('inventory.tripEkspedisis.index'));
        }

        
        return view('inventory.trip_ekspedisis.edit')->with(['tripEkspedisiPrice' =>  $tripEkspedisiPrice, 'idForm' => $idForm]);
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
     * Get the value of defaultCarrier.
     */
    public function getDefaultCarrier()
    {
        return $this->defaultCarrier;
    }

    /**
     * Set the value of defaultCarrier.
     *
     * @param mixed $defaultCarrier
     *
     * @return self
     */
    public function setDefaultCarrier($defaultCarrier)
    {
        $this->defaultCarrier = $defaultCarrier;

        return $this;
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
        $carrierId = $this->getDefaultCarrier();

        return [
            'tripItems' => $trip->allQuery()
                ->disableModelCaching()
                ->whereDoesntHave('tripEkspedisis', function ($q) use ($carrierId) {
                    $q->where(['dms_inv_carrier_id' => $carrierId]);
                })
                ->with(['productCategories'])->get()->pluck('simple_identity', 'id')->toArray(),
        ];
    }
}
