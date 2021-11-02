<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateVendorLocationRequest;
use App\Http\Requests\Base\UpdateVendorLocationRequest;
use App\Repositories\Base\CityRepository;
use App\Repositories\Base\RouteTripRepository;
use App\Repositories\Base\VendorLocationRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class VendorLocationController extends AppBaseController
{
    /** @var VendorLocationRepository */
    protected $repository;

    public function __construct()
    {
    }

    /**
     * Display a listing of the VendorContact.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $locations = $this->getRepositoryObj()->all(['vendor_id' => $request->get('vendor_id')]);
        $buttonView = view('base.vendors.partials.location_button', ['json' => [], 'url' => route('base.vendorsLocations.create')])->render();

        return view('base.vendor_locations.index')->with(['locations' => $locations, 'buttonView' => $buttonView]);
    }

    /**
     * Show the form for creating a new VendorLocation.
     *
     * @return Response
     */
    public function create()
    {
        $idForm = \Carbon\Carbon::now()->timestamp;

        return view('base.vendor_locations.create')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => 'vendorLocation['.$idForm.']'])
        ;
    }

    /**
     * Store a newly created VendorLocation in storage.
     *
     * @return Response
     */
    public function store(CreateVendorLocationRequest $request)
    {
        $input = $request->all();

        $vendorLocation = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/vendorLocations.singular')]));

        return redirect(route('base.vendors.locations.index'));
    }

    /**
     * Display the specified VendorLocation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendorLocation = $this->getRepositoryObj()->find($id);

        if (empty($vendorLocation)) {
            Flash::error(__('models/vendorLocations.singular').' '.__('messages.not_found'));

            return redirect(route('base.vendors.locations.index'));
        }

        return view('base.vendor_locations.show')->with('vendorLocation', $vendorLocation);
    }

    /**
     * Show the form for editing the specified VendorLocation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendorLocation = $this->getRepositoryObj()->find($id);

        if (empty($vendorLocation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorLocations.singular')]));

            return redirect(route('base.vendors.locations.index'));
        }

        $idForm = $id;
        $vendorLocation->stateForm = 'update';
        $obj = new \stdClass();
        $obj->vendorLocation = [$id => $vendorLocation];

        return view('base.vendor_locations.edit')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'update', 'id' => $id], 'vendorLocation' => $obj, 'id' => $id, 'stateForm' => 'update', 'idForm' => $idForm, 'prefixName' => 'vendorLocation['.$idForm.']'])
        ;
    }

    /**
     * Update the specified VendorLocation in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateVendorLocationRequest $request)
    {
        $vendorLocation = $this->getRepositoryObj()->find($id);

        if (empty($vendorLocation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorLocations.singular')]));

            return redirect(route('base.vendors.locations.index'));
        }

        $vendorLocation = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/vendorLocations.singular')]));

        return redirect(route('base.vendors.locations.index'));
    }

    /**
     * Remove the specified VendorLocation from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendorLocation = $this->getRepositoryObj()->find($id);

        if (empty($vendorLocation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorLocations.singular')]));

            return redirect(route('base.vendors.locations.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/vendorLocations.singular')]));

        return redirect(route('base.vendors.locations.index'));
    }

    public function form()
    {
        return view('base.vendor_locations.create_new')->with($this->getOptionItems());
    }

    /**
     * Provide options item based on relationship model VendorLocation from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $routeTrip = new RouteTripRepository(app());
        $city = new CityRepository(app());

        return [
            'routeTripItems' => ['' => __('crud.option.routeTrip_placeholder')] + $routeTrip->pluck(),
            'cityItems' => ['' => __('crud.option.city_placeholder_origin')] + $city->pluck(),
        ];
    }
}
