<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\VendorContactDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateVendorContactRequest;
use App\Http\Requests\Base\UpdateVendorContactRequest;
use App\Repositories\Base\VendorContactRepository;
use App\Repositories\Base\CityRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;


class VendorContactController extends AppBaseController
{
    /** @var  VendorContactRepository */
    private $vendorContactRepository;        

    public function __construct(VendorContactRepository $vendorContactRepo)
    {
        $this->vendorContactRepository = $vendorContactRepo;
    }

    /**
     * Display a listing of the VendorContact.
     *
     * @param VendorContactDataTable $vendorContactDataTable
     * @return Response
     */
    public function index(VendorContactDataTable $vendorContactDataTable)
    {
        //return $vendorContactDataTable->render('base.vendor_contacts.index');
        echo request('vendor_id');
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
                ->with(['stateForm' => 'insert', 'idForm' => $idForm ,'prefixName' => 'vendorContact['.$idForm.']']);
    }

    /**
     * Store a newly created VendorContact in storage.
     *
     * @param CreateVendorContactRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorContactRequest $request)
    {
        $input = $request->all();

        $vendorContact = $this->vendorContactRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/vendorContacts.singular')]));

        return redirect(route('base.vendorsContacts.index'));
    }

    /**
     * Display the specified VendorContact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendorContact = $this->vendorContactRepository->find($id);

        if (empty($vendorContact)) {
            Flash::error(__('models/vendorContacts.singular').' '.__('messages.not_found'));

            return redirect(route('base.vendorsContacts.index'));
        }

        return view('base.vendor_contacts.show')->with('vendorContact', $vendorContact);
    }

    /**
     * Show the form for editing the specified VendorContact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendorContact = $this->vendorContactRepository->find($id);

        if (empty($vendorContact)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorContacts.singular')]));

            return redirect(route('base.vendorsContacts.index'));
        }

        return view('base.vendor_contacts.edit')->with('vendorContact', $vendorContact)->with($this->getOptionItems())->with(['stateForm' => 'update', 'id' => $id]);
    }

    /**
     * Update the specified VendorContact in storage.
     *
     * @param  int              $id
     * @param UpdateVendorContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorContactRequest $request)
    {
        $vendorContact = $this->vendorContactRepository->find($id);

        if (empty($vendorContact)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorContacts.singular')]));

            return redirect(route('base.vendorsContacts.index'));
        }

        $vendorContact = $this->vendorContactRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/vendorContacts.singular')]));

        return redirect(route('base.vendorsContacts.index'));
    }

    /**
     * Remove the specified VendorContact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendorContact = $this->vendorContactRepository->find($id);

        if (empty($vendorContact)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendorContacts.singular')]));

            return redirect(route('base.vendorsContacts.index'));
        }

        $this->vendorContactRepository->delete($id);

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
    private function getOptionItems(){        
        
        $city = new CityRepository(app());        

        return [
            'cityItems' => ['' => __('crud.option.city_placeholder_origin')] + $city->pluck(),            
        ];
    }    
}
