<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsApSupplierDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateDmsApSupplierRequest;
use App\Http\Requests\Base\UpdateDmsApSupplierRequest;
use App\Repositories\Base\DmsApSupplierRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmsApSupplierController extends AppBaseController
{
    /** @var  DmsApSupplierRepository */
    private $dmsApSupplierRepository;

    public function __construct(DmsApSupplierRepository $dmsApSupplierRepo)
    {
        $this->dmsApSupplierRepository = $dmsApSupplierRepo;
    }

    /**
     * Display a listing of the DmsApSupplier.
     *
     * @param DmsApSupplierDataTable $dmsApSupplierDataTable
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
     * @param CreateDmsApSupplierRequest $request
     *
     * @return Response
     */
    public function store(CreateDmsApSupplierRequest $request)
    {
        $input = $request->all();

        $dmsApSupplier = $this->dmsApSupplierRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsApSuppliers.singular')]));

        return redirect(route('base.dmsApSuppliers.index'));
    }

    /**
     * Display the specified DmsApSupplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsApSupplier = $this->dmsApSupplierRepository->find($id);

        if (empty($dmsApSupplier)) {
            Flash::error(__('models/dmsApSuppliers.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsApSuppliers.index'));
        }

        return view('base.dms_ap_suppliers.show')->with('dmsApSupplier', $dmsApSupplier);
    }

    /**
     * Show the form for editing the specified DmsApSupplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsApSupplier = $this->dmsApSupplierRepository->find($id);

        if (empty($dmsApSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsApSuppliers.singular')]));

            return redirect(route('base.dmsApSuppliers.index'));
        }

        return view('base.dms_ap_suppliers.edit')->with('dmsApSupplier', $dmsApSupplier)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsApSupplier in storage.
     *
     * @param  int              $id
     * @param UpdateDmsApSupplierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmsApSupplierRequest $request)
    {
        $dmsApSupplier = $this->dmsApSupplierRepository->find($id);

        if (empty($dmsApSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsApSuppliers.singular')]));

            return redirect(route('base.dmsApSuppliers.index'));
        }

        $dmsApSupplier = $this->dmsApSupplierRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsApSuppliers.singular')]));

        return redirect(route('base.dmsApSuppliers.index'));
    }

    /**
     * Remove the specified DmsApSupplier from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsApSupplier = $this->dmsApSupplierRepository->find($id);

        if (empty($dmsApSupplier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsApSuppliers.singular')]));

            return redirect(route('base.dmsApSuppliers.index'));
        }

        $this->dmsApSupplierRepository->delete($id);

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
    private function getOptionItems(){        
        
        return [
                        
        ];
    }
}
