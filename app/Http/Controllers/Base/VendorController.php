<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\VendorDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateVendorRequest;
use App\Http\Requests\Base\UpdateVendorRequest;
use App\Repositories\Base\CityRepository;
use App\Repositories\Base\RouteTripRepository;
use App\Repositories\Base\VendorRepository;
use Flash;
use Response;

class VendorController extends AppBaseController
{
    /** @var vendorRepository */
    private $vendorRepository;

    public function __construct(VendorRepository $vendorRepo)
    {
        $this->vendorRepository = $vendorRepo;
    }

    /**
     * Display a listing of the Vendor.
     *
     * @return Response
     */
    public function index(VendorDataTable $vendorDataTable)
    {
        return $vendorDataTable->render('base.vendors.index');
    }

    /**
     * Show the form for creating a new Vendor.
     *
     * @return Response
     */
    public function create()
    {
        $defaultContactView = view('base.vendors.partials.contact_blank', ['json' => [], 'url' => route('base.vendorsContacts.create')])->render();
        $defaultDestinationView = view('base.vendors.partials.destination_blank', ['json' => [], 'url' => route('base.vendorsLocations.create')])->render();
        $defaultVehicleView = view('base.vendors.partials.vehicle_blank', ['json' => [], 'url' => route('base.vendorsVehicles.create')])->render();
        $defaultTripView = view('base.vendors.partials.trip_blank', ['json' => [], 'url' => route('base.vendorsVehicles.create')])->render();
        $dataTabs = [
            'contact' => ['text' => 'Contact Person', 'json' => [], 'url' => '', 'defaultContent' => $defaultContactView, 'class' => ''],
            'destination' => ['text' => 'Tujuan Pengiriman', 'json' => [], 'url' => '', 'defaultContent' => $defaultDestinationView, 'class' => ''],
            'vehicle' => ['text' => 'Kendaraan', 'json' => [], 'url' => '', 'defaultContent' => $defaultVehicleView, 'class' => ''],
            'trip' => ['text' => 'Trip', 'json' => [], 'url' => '', 'defaultContent' => $defaultTripView, 'class' => ''],
            'description' => ['text' => 'Keterangan', 'json' => [], 'url' => 'tes.php', 'class' => '', 'defaultContent' => 'Isi dengan keterangan'],
        ];

        return view('base.vendors.create')
            ->with('dataTabs', $dataTabs)
            ->with($this->getOptionItems())
        ;
    }

    /**
     * Store a newly created Vendor in storage.
     *
     * @return Response
     */
    public function store(CreateVendorRequest $request)
    {
        $input = $request->all();
        $vendor = $this->vendorRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/vendors.singular')]));

        return redirect(route('base.vendors.index'));
    }

    /**
     * Display the specified Vendor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $Vendor = $this->vendorRepository->find($id);

        if (empty($Vendor)) {
            Flash::error(__('models/vendors.singular').' '.__('messages.not_found'));

            return redirect(route('base.vendors.index'));
        }

        return view('base.vendors.show')->with('Vendor', $Vendor)->with($this->getOptionItems());
    }

    /**
     * Show the form for editing the specified Vendor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendor = $this->vendorRepository->find($id);

        if (empty($vendor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendors.singular')]));

            return redirect(route('base.vendors.index'));
        }
        $jsonDefaultSearching = ['vendor_id' => $id];        
        $dataTabs = [
            'contact' => ['text' => 'Contact Person', 'json' => $jsonDefaultSearching, 'url' => route('base.vendorsContacts.index', ['vendor_id' => $id]), 'defaultContent' => '', 'class' => ''],
            'destination' => ['text' => 'Tujuan Pengiriman', 'json' => $jsonDefaultSearching, 'url' => '', 'defaultContent' => '', 'class' => ''],
            'vehicle' => ['text' => 'Kendaraan', 'json' => $jsonDefaultSearching, 'url' => '', 'defaultContent' => '', 'class' => ''],
            'trip' => ['text' => 'Trip', 'json' => $jsonDefaultSearching, 'url' => '', 'defaultContent' => '', 'class' => ''],
            'description' => ['text' => 'Keterangan', 'json' => $jsonDefaultSearching, 'url' => 'tes.php', 'class' => '', 'defaultContent' => 'Isi dengan keterangan'],
        ];
        
        return view('base.vendors.edit')
            ->with('dataTabs', $dataTabs)
            ->with('vendor', $vendor)
            ->with($this->getOptionItems());
    }

    /**
     * Update the specified Vendor in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateVendorRequest $request)
    {
        $Vendor = $this->vendorRepository->find($id);

        if (empty($Vendor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendors.singular')]));

            return redirect(route('base.vendors.index'));
        }

        $Vendor = $this->vendorRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/vendors.singular')]));

        return redirect(route('base.vendors.index'));
    }

    /**
     * Remove the specified Vendor from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $Vendor = $this->vendorRepository->find($id);

        if (empty($Vendor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendors.singular')]));

            return redirect(route('base.vendors.index'));
        }

        $this->vendorRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/vendors.singular')]));

        return redirect(route('base.vendors.index'));
    }

    /**
     * Provide options item based on relationship model Vendor from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $city = new CityRepository(app());

        return [
            'cityItems' => ['' => __('crud.option.city_placeholder_origin')] + $city->pluck(),
        ];
    }

    // private function listTrip()
    // {
    //     $app = app();
    //     $trips = new RouteTripRepository($app);

    //     return $trips->with(['vehicleGroup'])->all();
    // }
}
