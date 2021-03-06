<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsApSupplierDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateDmsApSupplierRequest;
use App\Http\Requests\Base\UpdateDmsApSupplierRequest;
use App\Repositories\Base\DmsApSupplierRepository;
use Flash;
use Response;

class DmsApSupplierController extends AppBaseController
{
    /** @var DmsApSupplierRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsApSupplierRepository::class;
    }

    /**
     * Display a listing of the DmsApSupplier.
     *
     * @return Response
     */
    public function index(DmsApSupplierDataTable $dmsApSupplierDataTable)
    {
        return $dmsApSupplierDataTable->render('base.dms_ap_suppliers.index');
    }

    /**
     * Show the form for creating a new DmsApSupplier.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ap_suppliers.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsApSupplier in storage.
     *
     * @return Response
     */
    public function store(CreateDmsApSupplierRequest $request)
    {
        $input = $request->all();

        $dmsApSupplier = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsApSuppliers.singular')]));

        return redirect(route('base.dmsApSuppliers.index'));
    }

    /**
     * Display the specified DmsApSupplier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsApSupplier = $this->getRepositoryObj()->find($id);

        if (empty($dmsApSupplier)) {
            Flash::error(__('models/dmsApSuppliers.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsApSuppliers.index'));
        }

        return view('base.dms_ap_suppliers.show')->with('dmsApSupplier', $dmsApSupplier);
    }

    /**
     * Show the form for editing the specified DmsApSupplier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsApSupplier = $this->getRepositoryObj()->find($id);

        if (empty($dmsApSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsApSuppliers.singular')]));

            return redirect(route('base.dmsApSuppliers.index'));
        }
        $jsonDefaultSearching = ['dms_ap_supplier_id' => $id];
        $dataTabs = [
            'contact' => ['text' => 'Contact Person', 'json' => $jsonDefaultSearching, 'url' => route('base.contactSuppliers.index', ['dms_ap_supplier_id' => $id]), 'defaultContent' => '', 'class' => ''],
        ];

        return view('base.dms_ap_suppliers.edit')->with('dataTabs', $dataTabs)->with('dmsApSupplier', $dmsApSupplier)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsApSupplier in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsApSupplierRequest $request)
    {
        $dmsApSupplier = $this->getRepositoryObj()->find($id);

        if (empty($dmsApSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsApSuppliers.singular')]));

            return redirect(route('base.dmsApSuppliers.index'));
        }

        $dmsApSupplier = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsApSuppliers.singular')]));

        return redirect(route('base.dmsApSuppliers.index'));
    }

    /**
     * Remove the specified DmsApSupplier from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsApSupplier = $this->getRepositoryObj()->find($id);

        if (empty($dmsApSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsApSuppliers.singular')]));

            return redirect(route('base.dmsApSuppliers.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsApSuppliers.singular')]));

        return redirect(route('base.dmsApSuppliers.index'));
    }

    /**
     * Provide options item based on relationship model DmsApSupplier from storage.
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
