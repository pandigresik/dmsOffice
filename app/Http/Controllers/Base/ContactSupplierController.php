<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\ContactSupplierDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateContactSupplierRequest;
use App\Http\Requests\Base\UpdateContactSupplierRequest;
use App\Repositories\Base\ContactSupplierRepository;
use App\Repositories\Base\DmsApSupplierRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class ContactSupplierController extends AppBaseController
{
    /** @var  ContactSupplierRepository */
    private $contactSupplierRepository;

    public function __construct(ContactSupplierRepository $contactSupplierRepo)
    {
        $this->contactSupplierRepository = $contactSupplierRepo;
    }

    /**
     * Display a listing of the ContactSupplier.
     *
     * @param ContactSupplierDataTable $contactSupplierDataTable
     * @return Response
     */    
    public function index(Request $request)
    {
        $contacts = $this->contactSupplierRepository->all(['dms_ar_supplier_id' => $request->get('dms_ar_supplier_id')]);
        $buttonView = view('base.dms_ar_suppliers.partials.contact_button', ['json' => [], 'url' => route('base.contactSuppliers.create')])->render();

        return view('base.contact_suppliers.index')->with(['contacts' => $contacts, 'buttonView' => $buttonView]);        
    }

    /**
     * Show the form for creating a new ContactSupplier.
     *
     * @return Response
     */
    public function create()
    {
        $idForm = \Carbon\Carbon::now()->timestamp;

        return view('base.contact_suppliers.create')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => 'contactSupplier['.$idForm.']'])
        ;        
    }

    /**
     * Store a newly created ContactSupplier in storage.
     *
     * @param CreateContactSupplierRequest $request
     *
     * @return Response
     */
    public function store(CreateContactSupplierRequest $request)
    {
        $input = $request->all();

        $contactSupplier = $this->contactSupplierRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/contactSuppliers.singular')]));

        return redirect(route('base.contactSuppliers.index'));
    }

    /**
     * Display the specified ContactSupplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactSupplier = $this->contactSupplierRepository->find($id);

        if (empty($contactSupplier)) {
            Flash::error(__('models/contactSuppliers.singular').' '.__('messages.not_found'));

            return redirect(route('base.contactSuppliers.index'));
        }

        return view('base.contact_suppliers.show')->with('contactSupplier', $contactSupplier);
    }

    /**
     * Show the form for editing the specified ContactSupplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactSupplier = $this->contactSupplierRepository->find($id);

        if (empty($contactSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactSuppliers.singular')]));

            return redirect(route('base.contactSuppliers.index'));
        }

        return view('base.contact_suppliers.edit')->with('contactSupplier', $contactSupplier)->with($this->getOptionItems());
    }

    /**
     * Update the specified ContactSupplier in storage.
     *
     * @param  int              $id
     * @param UpdateContactSupplierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactSupplierRequest $request)
    {
        $contactSupplier = $this->contactSupplierRepository->find($id);

        if (empty($contactSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactSuppliers.singular')]));

            return redirect(route('base.contactSuppliers.index'));
        }

        $contactSupplier = $this->contactSupplierRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/contactSuppliers.singular')]));

        return redirect(route('base.contactSuppliers.index'));
    }

    /**
     * Remove the specified ContactSupplier from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactSupplier = $this->contactSupplierRepository->find($id);

        if (empty($contactSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactSuppliers.singular')]));

            return redirect(route('base.contactSuppliers.index'));
        }

        $this->contactSupplierRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/contactSuppliers.singular')]));

        return redirect(route('base.contactSuppliers.index'));
    }

    /**
     * Provide options item based on relationship model ContactSupplier from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        //$dmsApSupplier = new DmsApSupplierRepository(app());
        return [
           // 'dmsApSupplierItems' => ['' => __('crud.option.dmsApSupplier_placeholder')] + $dmsApSupplier->pluck()            
        ];
    }
}
