<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\ContactSupplierDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateContactSupplierRequest;
use App\Http\Requests\Base\UpdateContactSupplierRequest;
use App\Repositories\Base\CityRepository;
use App\Repositories\Base\ContactSupplierRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class ContactSupplierController extends AppBaseController
{
    /** @var ContactSupplierRepository */
    protected $repository;
    private $prefixName = 'contactSuppliers';

    public function __construct()
    {
        $this->repository = ContactSupplierRepository::class;
    }

    /**
     * Display a listing of the ContactSupplier.
     *
     * @param ContactSupplierDataTable $contactSupplierDataTable
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contacts = $this->getRepositoryObj()->all(['dms_ap_supplier_id' => $request->get('dms_ap_supplier_id')]);
        $buttonView = view('base.dms_ap_suppliers.partials.contact_button', ['json' => [], 'url' => route('base.contactSuppliers.create')])->render();

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
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => $this->prefixName.'['.$idForm.']'])
        ;
    }

    /**
     * Store a newly created ContactSupplier in storage.
     *
     * @return Response
     */
    public function store(CreateContactSupplierRequest $request)
    {
        $input = $request->all();

        $contactSupplier = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/contactSuppliers.singular')]));

        return redirect(route('base.contactSuppliers.index'));
    }

    /**
     * Display the specified ContactSupplier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactSupplier = $this->getRepositoryObj()->find($id);

        if (empty($contactSupplier)) {
            Flash::error(__('models/contactSuppliers.singular').' '.__('messages.not_found'));

            return redirect(route('base.contactSuppliers.index'));
        }

        return view('base.contact_suppliers.show')->with('contactSupplier', $contactSupplier);
    }

    /**
     * Show the form for editing the specified ContactSupplier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactSupplier = $this->getRepositoryObj()->find($id);

        if (empty($contactSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactSuppliers.singular')]));

            return redirect(route('base.contactSuppliers.index'));
        }

        $idForm = $id;
        $contactSupplier->stateForm = 'update';
        $obj = new \stdClass();
        $obj->{$this->prefixName} = [$id => $contactSupplier];

        return view('base.contact_suppliers.edit')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'update', 'id' => $id], 'contactSupplier' => $obj, 'id' => $id, 'stateForm' => 'update', 'idForm' => $idForm, 'prefixName' => $this->prefixName.'['.$idForm.']'])
        ;
    }

    /**
     * Update the specified ContactSupplier in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateContactSupplierRequest $request)
    {
        $contactSupplier = $this->getRepositoryObj()->find($id);

        if (empty($contactSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactSuppliers.singular')]));

            return redirect(route('base.contactSuppliers.index'));
        }

        $contactSupplier = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/contactSuppliers.singular')]));

        return redirect(route('base.contactSuppliers.index'));
    }

    /**
     * Remove the specified ContactSupplier from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactSupplier = $this->getRepositoryObj()->find($id);

        if (empty($contactSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactSuppliers.singular')]));

            return redirect(route('base.contactSuppliers.index'));
        }

        $this->getRepositoryObj()->delete($id);

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
    private function getOptionItems()
    {
        $city = new CityRepository(app());

        return [
            'cityItems' => ['' => __('crud.option.city_placeholder')] + $city->pluck([], null, null, 'name', 'name'),
        ];
    }
}
