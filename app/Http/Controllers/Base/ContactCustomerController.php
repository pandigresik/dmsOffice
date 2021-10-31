<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\ContactCustomerDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateContactCustomerRequest;
use App\Http\Requests\Base\UpdateContactCustomerRequest;
use App\Repositories\Base\ContactCustomerRepository;
use App\Repositories\Base\DmsArCustomerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class ContactCustomerController extends AppBaseController
{
    /** @var  ContactCustomerRepository */
    private $contactCustomerRepository;

    public function __construct(ContactCustomerRepository $contactCustomerRepo)
    {
        $this->contactCustomerRepository = $contactCustomerRepo;
    }

    /**
     * Display a listing of the ContactCustomer.
     *
     * @param ContactCustomerDataTable $contactCustomerDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        $contacts = $this->contactCustomerRepository->all(['dms_ar_customer_id' => $request->get('dms_ar_customer_id')]);
        $buttonView = view('base.dms_ar_customers.partials.contact_button', ['json' => [], 'url' => route('base.contactCustomers.create')])->render();

        return view('base.contact_customers.index')->with(['contacts' => $contacts, 'buttonView' => $buttonView]);        
    }

    /**
     * Show the form for creating a new ContactCustomer.
     *
     * @return Response
     */
    public function create()
    {
        $idForm = \Carbon\Carbon::now()->timestamp;

        return view('base.contact_customers.create')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => 'contactCustomer['.$idForm.']'])
        ;        
    }

    /**
     * Store a newly created ContactCustomer in storage.
     *
     * @param CreateContactCustomerRequest $request
     *
     * @return Response
     */
    public function store(CreateContactCustomerRequest $request)
    {
        $input = $request->all();

        $contactCustomer = $this->contactCustomerRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/contactCustomers.singular')]));

        return redirect(route('base.contactCustomers.index'));
    }

    /**
     * Display the specified ContactCustomer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactCustomer = $this->contactCustomerRepository->find($id);

        if (empty($contactCustomer)) {
            Flash::error(__('models/contactCustomers.singular').' '.__('messages.not_found'));

            return redirect(route('base.contactCustomers.index'));
        }

        return view('base.contact_customers.show')->with('contactCustomer', $contactCustomer);
    }

    /**
     * Show the form for editing the specified ContactCustomer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactCustomer = $this->contactCustomerRepository->find($id);

        if (empty($contactCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactCustomers.singular')]));

            return redirect(route('base.contactCustomers.index'));
        }

        return view('base.contact_customers.edit')->with('contactCustomer', $contactCustomer)->with($this->getOptionItems());
    }

    /**
     * Update the specified ContactCustomer in storage.
     *
     * @param  int              $id
     * @param UpdateContactCustomerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactCustomerRequest $request)
    {
        $contactCustomer = $this->contactCustomerRepository->find($id);

        if (empty($contactCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactCustomers.singular')]));

            return redirect(route('base.contactCustomers.index'));
        }

        $contactCustomer = $this->contactCustomerRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/contactCustomers.singular')]));

        return redirect(route('base.contactCustomers.index'));
    }

    /**
     * Remove the specified ContactCustomer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactCustomer = $this->contactCustomerRepository->find($id);

        if (empty($contactCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactCustomers.singular')]));

            return redirect(route('base.contactCustomers.index'));
        }

        $this->contactCustomerRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/contactCustomers.singular')]));

        return redirect(route('base.contactCustomers.index'));
    }

    /**
     * Provide options item based on relationship model ContactCustomer from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        //$dmsArCustomer = new DmsArCustomerRepository(app());
        return [
            // 'dmsArCustomerItems' => ['' => __('crud.option.dmsArCustomer_placeholder')] + $dmsArCustomer->pluck()            
        ];
    }
}