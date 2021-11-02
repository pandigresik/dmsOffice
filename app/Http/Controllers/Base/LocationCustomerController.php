<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\LocationCustomerDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateLocationCustomerRequest;
use App\Http\Requests\Base\UpdateLocationCustomerRequest;
use App\Repositories\Base\DmsArCustomerRepository;
use App\Repositories\Base\LocationCustomerRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class LocationCustomerController extends AppBaseController
{
    /** @var LocationCustomerRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = LocationCustomerRepository::class;
    }

    /**
     * Display a listing of the LocationCustomer.
     *
     * @param LocationCustomerDataTable $locationCustomerDataTable
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $locations = $this->getRepositoryObj()->all(['dms_ar_customer_id' => $request->get('dms_ar_customer_id')]);
        $buttonView = view('base.dms_ar_customers.partials.location_button', ['json' => [], 'url' => route('base.locationCustomers.create')])->render();

        return view('base.location_customers.index')->with(['locations' => $locations, 'buttonView' => $buttonView]);
    }

    /**
     * Show the form for creating a new LocationCustomer.
     *
     * @return Response
     */
    public function create()
    {
        $idForm = \Carbon\Carbon::now()->timestamp;

        return view('base.location_customers.create')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => 'locationCustomers['.$idForm.']'])
        ;
    }

    /**
     * Store a newly created LocationCustomer in storage.
     *
     * @return Response
     */
    public function store(CreateLocationCustomerRequest $request)
    {
        $input = $request->all();

        $locationCustomer = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/locationCustomers.singular')]));

        return redirect(route('base.locationCustomers.index'));
    }

    /**
     * Display the specified LocationCustomer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $locationCustomer = $this->getRepositoryObj()->find($id);

        if (empty($locationCustomer)) {
            Flash::error(__('models/locationCustomers.singular').' '.__('messages.not_found'));

            return redirect(route('base.locationCustomers.index'));
        }

        return view('base.location_customers.show')->with('locationCustomer', $locationCustomer);
    }

    /**
     * Show the form for editing the specified LocationCustomer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $locationCustomer = $this->getRepositoryObj()->find($id);

        if (empty($locationCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationCustomers.singular')]));

            return redirect(route('base.locationCustomers.index'));
        }
        $idForm = $id;
        $locationCustomer->stateForm = 'update';
        $obj = new \stdClass();
        $obj->locationCustomer = [$id => $locationCustomer];

        return view('base.location_customers.edit')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'update', 'id' => $id], 'locationCustomer' => $obj, 'id' => $id, 'stateForm' => 'update', 'idForm' => $idForm, 'prefixName' => 'locationCustomer['.$idForm.']'])
        ;
    }

    /**
     * Update the specified LocationCustomer in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateLocationCustomerRequest $request)
    {
        $locationCustomer = $this->getRepositoryObj()->find($id);

        if (empty($locationCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationCustomers.singular')]));

            return redirect(route('base.locationCustomers.index'));
        }

        $locationCustomer = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/locationCustomers.singular')]));

        return redirect(route('base.locationCustomers.index'));
    }

    /**
     * Remove the specified LocationCustomer from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $locationCustomer = $this->getRepositoryObj()->find($id);

        if (empty($locationCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationCustomers.singular')]));

            return redirect(route('base.locationCustomers.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/locationCustomers.singular')]));

        return redirect(route('base.locationCustomers.index'));
    }

    /**
     * Provide options item based on relationship model LocationCustomer from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        //$dmsArCustomer = new DmsArCustomerRepository(app());
        return [
            //'dmsArCustomerItems' => ['' => __('crud.option.dmsArCustomer_placeholder')] + $dmsArCustomer->pluck()
        ];
    }
}
