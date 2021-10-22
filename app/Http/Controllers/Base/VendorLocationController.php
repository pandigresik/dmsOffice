<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\VendorLocationDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateVendorLocationRequest;
use App\Http\Requests\Base\UpdateVendorLocationRequest;
use App\Repositories\Base\VendorLocationRepository;
use App\Repositories\Base\RouteTripRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VendorLocationController extends AppBaseController
{
    /** @var  VendorLocationRepository */
    private $vendorLocationRepository;

    public function __construct(VendorLocationRepository $vendorLocationRepo)
    {
        $this->vendorLocationRepository = $vendorLocationRepo;
    }

    /**
     * Display a listing of the VendorLocation.
     *
     * @param VendorLocationDataTable $vendorLocationDataTable
     * @return Response
     */
    public function index(VendorLocationDataTable $vendorLocationDataTable)
    {
        return $vendorLocationDataTable->render('base.vendor_locations.index');
    }

    /**
     * Show the form for creating a new VendorLocation.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.vendor_locations.create')->with($this->getOptionItems());
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

        return view('base.vendor_locations.edit')->with('vendorLocation', $vendorLocation)->with($this->getOptionItems());
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
        return [
            'routeTripItems' => ['' => __('crud.option.routeTrip_placeholder')] + $routeTrip->pluck()            
        ];
    }

    public  function form(){

        return view('base.vendor_locations.create_new')->with($this->getOptionItems());
    }
}
