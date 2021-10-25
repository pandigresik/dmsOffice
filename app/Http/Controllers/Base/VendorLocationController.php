<?php

namespace App\Http\Controllers\Base;

use Flash;
use Response;
use App\Http\Requests\Base;
use Illuminate\Http\Request;
use App\Repositories\Base\CityRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Base\RouteTripRepository;
use App\DataTables\Base\VendorLocationDataTable;
use App\Repositories\Base\VendorLocationRepository;
use App\Http\Requests\Base\CreateVendorLocationRequest;
use App\Http\Requests\Base\UpdateVendorLocationRequest;

class VendorLocationController extends AppBaseController
{
    /** @var  VendorLocationRepository */
    private $vendorLocationRepository;

    public function __construct(VendorLocationRepository $vendorLocationRepo)
    {
        $this->vendorLocationRepository = $vendorLocationRepo;
    }

    /**
     * Display a listing of the VendorContact.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {           
        $locations = $this->vendorLocationRepository->all(['vendor_id' => $request->get('vendor_id')]);
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
            ->with(['dataCard' => ['stateForm' => 'insert'],'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => 'vendorLocation['.$idForm.']'])
        ;
        
    }

    /**
     * Store a newly created VendorLocation in storage.
     *
     * @param CreateVendorLocationRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorLocationRequest $request)
    {
        $input = $request->all();

        $vendorLocation = $this->vendorLocationRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/vendorLocations.singular')]));

        return redirect(route('base.vendors.locations.index'));
    }

    /**
     * Display the specified VendorLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendorLocation = $this->vendorLocationRepository->find($id);

        if (empty($vendorLocation)) {
            Flash::error(__('models/vendorLocations.singular').' '.__('messages.not_found'));

            return redirect(route('base.vendors.locations.index'));
        }

        return view('base.vendor_locations.show')->with('vendorLocation', $vendorLocation);
    }

    /**
     * Show the form for editing the specified VendorLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendorLocation = $this->vendorLocationRepository->find($id);

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
     * @param  int              $id
     * @param UpdateVendorLocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorLocationRequest $request)
    {
        $vendorLocation = $this->vendorLocationRepository->find($id);

        if (empty($vendorLocation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorLocations.singular')]));

            return redirect(route('base.vendors.locations.index'));
        }

        $vendorLocation = $this->vendorLocationRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/vendorLocations.singular')]));

        return redirect(route('base.vendors.locations.index'));
    }

    /**
     * Remove the specified VendorLocation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendorLocation = $this->vendorLocationRepository->find($id);

        if (empty($vendorLocation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorLocations.singular')]));

            return redirect(route('base.vendors.locations.index'));
        }

        $this->vendorLocationRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/vendorLocations.singular')]));

        return redirect(route('base.vendors.locations.index'));
    }

    /**
     * Provide options item based on relationship model VendorLocation from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $routeTrip = new RouteTripRepository(app());
        $city = new CityRepository(app());
        return [
            'routeTripItems' => ['' => __('crud.option.routeTrip_placeholder')] + $routeTrip->pluck(),            
            'cityItems' => ['' => __('crud.option.city_placeholder_origin')] + $city->pluck()
        ];
        
    }

    public  function form(){

        return view('base.vendor_locations.create_new')->with($this->getOptionItems());
    }
}
