<?php

namespace App\Http\Controllers\Base;

use Flash;
use Response;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Base\RouteTripRepository;
use App\DataTables\Base\VendorDataTable;
use App\Repositories\Base\VendorRepository;
use App\Http\Requests\Base\CreateVendorRequest;
use App\Http\Requests\Base\UpdateVendorRequest;

class VendorController extends AppBaseController
{
    /** @var VendorRepository */
    private $VendorRepository;

    public function __construct(VendorRepository $VendorRepo)
    {
        $this->VendorRepository = $VendorRepo;
    }

    /**
     * Display a listing of the Vendor.
     *
     * @return Response
     */
    public function index(VendorDataTable $VendorDataTable)
    {
        return $VendorDataTable->render('base.vendors.index');
    }

    /**
     * Show the form for creating a new Vendor.
     *
     * @return Response
     */
    public function create()
    {
        $dataTabs = [
            'contact' => ['text' => 'Contact Person', 'url' => route('demo'), 'class' => ''],
            'location' => ['text' => 'Tujuan Pengiriman', 'url' => 'tes.php', 'class' => ''],
            'vehicle' => ['text' => 'Kendaraan', 'url' => 'tes.php', 'class' => ''],
            'trip' => ['text' => 'Trip', 'url' => 'tes.php', 'class' => ''],
            'description' => ['text' => 'Keterangan', 'url' => 'tes.php', 'class' => '', 'defaultContent' => 'Isi dengan keterangan'],
        ];
        return view('base.vendors.create')
            ->with('dataTabs',$dataTabs)
            ->with($this->getOptionItems());
    }

    /**
     * Store a newly created Vendor in storage.
     *
     * @return Response
     */
    public function store(CreateVendorRequest $request)
    {
        $input = $request->all();        
        $Vendor = $this->VendorRepository->create($input);
        
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
        $Vendor = $this->VendorRepository->find($id);

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
        $Vendor = $this->VendorRepository->find($id);

        if (empty($Vendor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendors.singular')]));

            return redirect(route('base.vendors.index'));
        }

        return view('base.vendors.edit')->with('Vendor', $Vendor)->with($this->getOptionItems());
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
        $Vendor = $this->VendorRepository->find($id);

        if (empty($Vendor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendors.singular')]));

            return redirect(route('base.vendors.index'));
        }
        
        $Vendor = $this->VendorRepository->update($request->all(), $id);        

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
        $Vendor = $this->VendorRepository->find($id);

        if (empty($Vendor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendors.singular')]));

            return redirect(route('base.vendors.index'));
        }

        $this->VendorRepository->delete($id);

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
        return [
            'trips' => $this->listTrip()->groupBy('vehicleGroup.name')
        ];
    }

    private function listTrip()
    {
        $app = app();
        $trips = new RouteTripRepository($app);

        return $trips->with(['vehicleGroup'])->all();
    }
}
