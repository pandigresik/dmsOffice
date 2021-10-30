<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\LocationCustomerDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateLocationCustomerRequest;
use App\Http\Requests\Base\UpdateLocationCustomerRequest;
use App\Repositories\Base\LocationCustomerRepository;
use App\Repositories\Base\DmsArCustomerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LocationCustomerController extends AppBaseController
{
    /** @var  LocationCustomerRepository */
    private $locationCustomerRepository;

    public function __construct(LocationCustomerRepository $locationCustomerRepo)
    {
        $this->locationCustomerRepository = $locationCustomerRepo;
    }

    /**
     * Display a listing of the LocationCustomer.
     *
     * @param LocationCustomerDataTable $locationCustomerDataTable
     * @return Response
     */
    public function index(LocationCustomerDataTable $locationCustomerDataTable)
    {
        return $locationCustomerDataTable->render('base.location_customers.index');
    }

    /**
     * Show the form for creating a new LocationCustomer.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.location_customers.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created LocationCustomer in storage.
     *
     * @param CreateLocationCustomerRequest $request
     *
     * @return Response
     */
    public function store(CreateLocationCustomerRequest $request)
    {
        $input = $request->all();

        $locationCustomer = $this->locationCustomerRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/locationCustomers.singular')]));

        return redirect(route('base.locationCustomers.index'));
    }

    /**
     * Display the specified LocationCustomer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $locationCustomer = $this->locationCustomerRepository->find($id);

        if (empty($locationCustomer)) {
            Flash::error(__('models/locationCustomers.singular').' '.__('messages.not_found'));

            return redirect(route('base.locationCustomers.index'));
        }

        return view('base.location_customers.show')->with('locationCustomer', $locationCustomer);
    }

    /**
     * Show the form for editing the specified LocationCustomer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $locationCustomer = $this->locationCustomerRepository->find($id);

        if (empty($locationCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationCustomers.singular')]));

            return redirect(route('base.locationCustomers.index'));
        }

        return view('base.location_customers.edit')->with('locationCustomer', $locationCustomer)->with($this->getOptionItems());
    }

    /**
     * Update the specified LocationCustomer in storage.
     *
     * @param  int              $id
     * @param UpdateLocationCustomerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocationCustomerRequest $request)
    {
        $locationCustomer = $this->locationCustomerRepository->find($id);

        if (empty($locationCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationCustomers.singular')]));

            return redirect(route('base.locationCustomers.index'));
        }

        $locationCustomer = $this->locationCustomerRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/locationCustomers.singular')]));

        return redirect(route('base.locationCustomers.index'));
    }

    /**
     * Remove the specified LocationCustomer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $locationCustomer = $this->locationCustomerRepository->find($id);

        if (empty($locationCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/locationCustomers.singular')]));

            return redirect(route('base.locationCustomers.index'));
        }

        $this->locationCustomerRepository->delete($id);

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
    private function getOptionItems(){        
        $dmsArCustomer = new DmsArCustomerRepository(app());
        return [
            'dmsArCustomerItems' => ['' => __('crud.option.dmsArCustomer_placeholder')] + $dmsArCustomer->pluck()            
        ];
    }
}
