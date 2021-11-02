<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\ContactEkspedisiDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateContactEkspedisiRequest;
use App\Http\Requests\Inventory\UpdateContactEkspedisiRequest;
use App\Repositories\Base\CityRepository;
use App\Repositories\Inventory\ContactEkspedisiRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class ContactEkspedisiController extends AppBaseController
{
    /** @var ContactEkspedisiRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ContactEkspedisiRepository::class;
    }

    /**
     * Display a listing of the ContactEkspedisi.
     *
     * @param ContactEkspedisiDataTable $contactEkspedisiDataTable
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contacts = $this->getRepositoryObj()->all(['dms_inv_carrier_id' => $request->get('dms_inv_carrier_id')]);
        $buttonView = view('inventory.dms_inv_carriers.partials.contact_button', ['json' => [], 'url' => route('inventory.contactEkspedisis.create')])->render();

        return view('inventory.contact_ekspedisis.index')->with(['contacts' => $contacts, 'buttonView' => $buttonView]);
    }

    /**
     * Show the form for creating a new ContactEkspedisi.
     *
     * @return Response
     */
    public function create()
    {
        $idForm = \Carbon\Carbon::now()->timestamp;

        return view('inventory.contact_ekspedisis.create')->with($this->getOptionItems())
            ->with(['dataCard' => ['stateForm' => 'insert'], 'stateForm' => 'insert', 'idForm' => $idForm, 'prefixName' => 'contactEkspedisis['.$idForm.']'])
        ;
    }

    /**
     * Store a newly created ContactEkspedisi in storage.
     *
     * @return Response
     */
    public function store(CreateContactEkspedisiRequest $request)
    {
        $input = $request->all();

        $contactEkspedisi = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/contactEkspedisis.singular')]));

        return redirect(route('inventory.contactEkspedisis.index'));
    }

    /**
     * Display the specified ContactEkspedisi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($contactEkspedisi)) {
            Flash::error(__('models/contactEkspedisis.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.contactEkspedisis.index'));
        }

        return view('inventory.contact_ekspedisis.show')->with('contactEkspedisi', $contactEkspedisi);
    }

    /**
     * Show the form for editing the specified ContactEkspedisi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($contactEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactEkspedisis.singular')]));

            return redirect(route('inventory.contactEkspedisis.index'));
        }

        return view('inventory.contact_ekspedisis.edit')->with('contactEkspedisi', $contactEkspedisi)->with($this->getOptionItems());
    }

    /**
     * Update the specified ContactEkspedisi in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateContactEkspedisiRequest $request)
    {
        $contactEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($contactEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactEkspedisis.singular')]));

            return redirect(route('inventory.contactEkspedisis.index'));
        }

        $contactEkspedisi = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/contactEkspedisis.singular')]));

        return redirect(route('inventory.contactEkspedisis.index'));
    }

    /**
     * Remove the specified ContactEkspedisi from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactEkspedisi = $this->getRepositoryObj()->find($id);

        if (empty($contactEkspedisi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactEkspedisis.singular')]));

            return redirect(route('inventory.contactEkspedisis.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/contactEkspedisis.singular')]));

        return redirect(route('inventory.contactEkspedisis.index'));
    }

    /**
     * Provide options item based on relationship model ContactEkspedisi from storage.
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
