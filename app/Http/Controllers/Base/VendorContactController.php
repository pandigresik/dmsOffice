<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateVendorContactRequest;
use App\Http\Requests\Base\UpdateVendorContactRequest;
use App\Repositories\Base\CityRepository;
use App\Repositories\Base\VendorContactRepository;
use Flash;
use Illuminate\Http\Request;
use Response;
use stdClass;

class VendorContactController extends AppBaseController
{
    /** @var VendorContactRepository */
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
        $contacts = $this->getRepositoryObj()->all(['vendor_id' => $request->get('vendor_id')]);
        $buttonView = view('base.vendors.partials.contact_button', ['json' => [], 'url' => route('base.vendorsContacts.create')])->render();

        return view('base.vendor_contacts.index')->with(['contacts' => $contacts, 'buttonView' => $buttonView]);
    }

    /**
     * Show the form for creating a new VendorContact.
     *
     * @return Response
     */
    public function create()
    {
        $idForm = \Carbon\Carbon::now()->timestamp;

        return view('base.vendor_contacts.create')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => 'vendorContact['.$idForm.']'])
        ;
    }

    /**
     * Store a newly created VendorContact in storage.
     *
     * @return Response
     */
    public function store(CreateVendorContactRequest $request)
    {
        $input = $request->all();

        $vendorContact = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/vendorContacts.singular')]));

        return redirect(route('base.vendorsContacts.index'));
    }

    /**
     * Display the specified VendorContact.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendorContact = $this->getRepositoryObj()->find($id);

        if (empty($vendorContact)) {
            Flash::error(__('models/vendorContacts.singular').' '.__('messages.not_found'));

            return redirect(route('base.vendorsContacts.index'));
        }

        return view('base.vendor_contacts.show')->with('vendorContact', $vendorContact);
    }

    /**
     * Show the form for editing the specified VendorContact.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendorContact = $this->getRepositoryObj()->find($id);

        if (empty($vendorContact)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorContacts.singular')]));

            return redirect(route('base.vendorsContacts.index'));
        }
        $idForm = $id;
        $vendorContact->stateForm = 'update';
        $obj = new stdClass();
        $obj->vendorContact = [$id => $vendorContact];

        return view('base.vendor_contacts.edit')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'update', 'id' => $id], 'vendorContact' => $obj, 'id' => $id, 'stateForm' => 'update', 'idForm' => $idForm, 'prefixName' => 'vendorContact['.$idForm.']'])
        ;
    }

    /**
     * Update the specified VendorContact in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateVendorContactRequest $request)
    {
        $vendorContact = $this->getRepositoryObj()->find($id);

        if (empty($vendorContact)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorContacts.singular')]));

            return redirect(route('base.vendorsContacts.index'));
        }

        $vendorContact = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/vendorContacts.singular')]));

        return redirect(route('base.vendorsContacts.index'));
    }

    /**
     * Remove the specified VendorContact from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendorContact = $this->getRepositoryObj()->find($id);

        if (empty($vendorContact)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorContacts.singular')]));

            return redirect(route('base.vendorsContacts.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/vendorContacts.singular')]));

        return redirect(route('base.vendorsContacts.index'));
    }

    /**
     * Provide options item based on relationship model VendorContact from storage.
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
}
