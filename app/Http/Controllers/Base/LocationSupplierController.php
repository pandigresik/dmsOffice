<?php

namespace App\Http\Controllers\Base;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Repositories\Base\CityRepository;
use App\Http\Controllers\AppBaseController;
use App\DataTables\Base\LocationSupplierDataTable;
use App\Repositories\Base\DmsApSupplierRepository;
use App\Repositories\Base\LocationSupplierRepository;
use App\Http\Requests\Base\CreateLocationSupplierRequest;
use App\Http\Requests\Base\UpdateLocationSupplierRequest;

class LocationSupplierController extends AppBaseController
{
    /** @var LocationSupplierRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = LocationSupplierRepository::class;
    }

    /**
     * Display a listing of the LocationSupplier.
     *
     * @return Response
     */
    
    public function index(Request $request)
    {
        $locations = $this->getRepositoryObj()->all(['dms_ap_supplier_id' => $request->get('dms_ap_supplier_id')]);
        $buttonView = view('base.dms_ap_suppliers.partials.location_button', ['json' => [], 'url' => route('base.locationSuppliers.create')])->render();

        return view('base.location_suppliers.index')->with(['locations' => $locations, 'buttonView' => $buttonView]);
    }    

    /**
     * Show the form for creating a new LocationSupplier.
     *
     * @return Response
     */
    public function create()
    {
         $idForm = \Carbon\Carbon::now()->timestamp;

        return view('base.location_suppliers.create')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => 'locationSupplier['.$idForm.']'])
        ;        
    }

    /**
     * Store a newly created LocationSupplier in storage.
     *
     * @return Response
     */
    public function store(CreateLocationSupplierRequest $request)
    {
        $input = $request->all();

        $locationSupplier = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/locationSuppliers.singular')]));

        return redirect(route('base.locationSuppliers.index'));
    }

    /**
     * Display the specified LocationSupplier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $locationSupplier = $this->getRepositoryObj()->find($id);

        if (empty($locationSupplier)) {
            Flash::error(__('models/locationSuppliers.singular').' '.__('messages.not_found'));

            return redirect(route('base.locationSuppliers.index'));
        }

        return view('base.location_suppliers.show')->with('locationSupplier', $locationSupplier);
    }

    /**
     * Show the form for editing the specified LocationSupplier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $locationSupplier = $this->getRepositoryObj()->find($id);

        if (empty($locationSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationSuppliers.singular')]));

            return redirect(route('base.locationSuppliers.index'));
        }
        $idForm = $id;
        $locationSupplier->stateForm = 'update';
        $obj = new \stdClass();
        $obj->locationSupplier = [$id => $locationSupplier];

        return view('base.location_suppliers.edit')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'update', 'id' => $id], 'locationSupplier' => $obj, 'id' => $id, 'stateForm' => 'update', 'idForm' => $idForm, 'prefixName' => 'locationSupplier['.$idForm.']'])
        ;
    }

    /**
     * Update the specified LocationSupplier in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateLocationSupplierRequest $request)
    {
        $locationSupplier = $this->getRepositoryObj()->find($id);

        if (empty($locationSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationSuppliers.singular')]));

            return redirect(route('base.locationSuppliers.index'));
        }

        $locationSupplier = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/locationSuppliers.singular')]));

        return redirect(route('base.locationSuppliers.index'));
    }

    /**
     * Remove the specified LocationSupplier from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $locationSupplier = $this->getRepositoryObj()->find($id);

        if (empty($locationSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationSuppliers.singular')]));

            return redirect(route('base.locationSuppliers.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/locationSuppliers.singular')]));

        return redirect(route('base.locationSuppliers.index'));
    }

    /**
     * Provide options item based on relationship model LocationSupplier from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $city = new CityRepository(app());

        return [
            'cityItems' => ['' => __('crud.option.city_placeholder')] + $city->pluck([], null, null, 'name', 'name'),
        ];
    }
}
