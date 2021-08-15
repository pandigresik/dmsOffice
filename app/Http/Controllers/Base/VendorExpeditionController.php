<?php

namespace App\Http\Controllers\Base;

use Flash;
use Response;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Base\RouteTripRepository;
use App\DataTables\Base\VendorExpeditionDataTable;
use App\Repositories\Base\VendorExpeditionRepository;
use App\Http\Requests\Base\CreateVendorExpeditionRequest;
use App\Http\Requests\Base\UpdateVendorExpeditionRequest;

class VendorExpeditionController extends AppBaseController
{
    /** @var VendorExpeditionRepository */
    private $vendorExpeditionRepository;

    public function __construct(VendorExpeditionRepository $vendorExpeditionRepo)
    {
        $this->vendorExpeditionRepository = $vendorExpeditionRepo;
    }

    /**
     * Display a listing of the VendorExpedition.
     *
     * @return Response
     */
    public function index(VendorExpeditionDataTable $vendorExpeditionDataTable)
    {
        return $vendorExpeditionDataTable->render('base.vendor_expeditions.index');
    }

    /**
     * Show the form for creating a new VendorExpedition.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.vendor_expeditions.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created VendorExpedition in storage.
     *
     * @return Response
     */
    public function store(CreateVendorExpeditionRequest $request)
    {
        $input = $request->all();        
        $vendorExpedition = $this->vendorExpeditionRepository->create($input);
        
        Flash::success(__('messages.saved', ['model' => __('models/vendorExpeditions.singular')]));

        return redirect(route('base.vendorExpeditions.index'));
    }

    /**
     * Display the specified VendorExpedition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendorExpedition = $this->vendorExpeditionRepository->find($id);

        if (empty($vendorExpedition)) {
            Flash::error(__('models/vendorExpeditions.singular').' '.__('messages.not_found'));

            return redirect(route('base.vendorExpeditions.index'));
        }

        return view('base.vendor_expeditions.show')->with('vendorExpedition', $vendorExpedition)->with($this->getOptionItems());
    }

    /**
     * Show the form for editing the specified VendorExpedition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendorExpedition = $this->vendorExpeditionRepository->find($id);

        if (empty($vendorExpedition)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorExpeditions.singular')]));

            return redirect(route('base.vendorExpeditions.index'));
        }

        return view('base.vendor_expeditions.edit')->with('vendorExpedition', $vendorExpedition)->with($this->getOptionItems());
    }

    /**
     * Update the specified VendorExpedition in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateVendorExpeditionRequest $request)
    {
        $vendorExpedition = $this->vendorExpeditionRepository->find($id);

        if (empty($vendorExpedition)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorExpeditions.singular')]));

            return redirect(route('base.vendorExpeditions.index'));
        }
        
        $vendorExpedition = $this->vendorExpeditionRepository->update($request->all(), $id);        

        Flash::success(__('messages.updated', ['model' => __('models/vendorExpeditions.singular')]));

        return redirect(route('base.vendorExpeditions.index'));
    }

    /**
     * Remove the specified VendorExpedition from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendorExpedition = $this->vendorExpeditionRepository->find($id);

        if (empty($vendorExpedition)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorExpeditions.singular')]));

            return redirect(route('base.vendorExpeditions.index'));
        }

        $this->vendorExpeditionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/vendorExpeditions.singular')]));

        return redirect(route('base.vendorExpeditions.index'));
    }

    /**
     * Provide options item based on relationship model VendorExpedition from storage.
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
