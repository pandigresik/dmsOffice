<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsArCustomerDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateDmsArCustomerRequest;
use App\Http\Requests\Base\UpdateDmsArCustomerRequest;
use App\Repositories\Base\DmsArCustomerRepository;
use Flash;
use Response;

class DmsArCustomerController extends AppBaseController
{
    /** @var DmsArCustomerRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsArCustomerRepository::class;
    }

    /**
     * Display a listing of the DmsArCustomer.
     *
     * @return Response
     */
    public function index(DmsArCustomerDataTable $dmsArCustomerDataTable)
    {
        return $dmsArCustomerDataTable->render('base.dms_ar_customers.index');
    }

    /**
     * Show the form for creating a new DmsArCustomer.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ar_customers.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsArCustomer in storage.
     *
     * @return Response
     */
    public function store(CreateDmsArCustomerRequest $request)
    {
        $input = $request->all();

        $dmsArCustomer = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsArCustomers.singular')]));

        return redirect(route('base.dmsArCustomers.index'));
    }

    /**
     * Display the specified DmsArCustomer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsArCustomer = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomer)) {
            Flash::error(__('models/dmsArCustomers.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsArCustomers.index'));
        }

        return view('base.dms_ar_customers.show')->with('dmsArCustomer', $dmsArCustomer);
    }

    /**
     * Show the form for editing the specified DmsArCustomer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsArCustomer = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomers.singular')]));

            return redirect(route('base.dmsArCustomers.index'));
        }
        $jsonDefaultSearching = ['dms_ar_customer_id' => $id];
        $dataTabs = [
            'contact' => ['text' => 'Contact Person', 'json' => $jsonDefaultSearching, 'url' => route('base.contactCustomers.index', ['dms_ar_customer_id' => $id]), 'defaultContent' => '', 'class' => ''],
            'destination' => ['text' => 'Tujuan Pengiriman', 'json' => $jsonDefaultSearching, 'url' => route('base.locationCustomers.index', ['dms_ar_customer_id' => $id]), 'defaultContent' => '', 'class' => ''],
            'description' => ['text' => 'Keterangan', 'json' => $jsonDefaultSearching, 'url' => 'tes.php', 'class' => '', 'defaultContent' => 'Isi dengan keterangan'],
        ];

        return view('base.dms_ar_customers.edit')->with('dataTabs', $dataTabs)->with('dmsArCustomer', $dmsArCustomer)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsArCustomer in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsArCustomerRequest $request)
    {
        $dmsArCustomer = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomers.singular')]));

            return redirect(route('base.dmsArCustomers.index'));
        }

        $dmsArCustomer = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsArCustomers.singular')]));

        return redirect(route('base.dmsArCustomers.index'));
    }

    /**
     * Remove the specified DmsArCustomer from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsArCustomer = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomers.singular')]));

            return redirect(route('base.dmsArCustomers.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsArCustomers.singular')]));

        return redirect(route('base.dmsArCustomers.index'));
    }

    /**
     * Provide options item based on relationship model DmsArCustomer from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        return [
        ];
    }
}
