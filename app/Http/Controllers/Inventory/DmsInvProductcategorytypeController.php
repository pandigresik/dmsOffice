<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvProductcategorytypeDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateDmsInvProductcategorytypeRequest;
use App\Http\Requests\Inventory\UpdateDmsInvProductcategorytypeRequest;
use App\Repositories\Inventory\DmsInvProductcategorytypeRepository;
use Flash;
use Response;

class DmsInvProductcategorytypeController extends AppBaseController
{
    /** @var DmsInvProductcategorytypeRepository */
    private $dmsInvProductcategorytypeRepository;

    public function __construct(DmsInvProductcategorytypeRepository $dmsInvProductcategorytypeRepo)
    {
        $this->dmsInvProductcategorytypeRepository = $dmsInvProductcategorytypeRepo;
    }

    /**
     * Display a listing of the DmsInvProductcategorytype.
     *
     * @return Response
     */
    public function index(DmsInvProductcategorytypeDataTable $dmsInvProductcategorytypeDataTable)
    {
        return $dmsInvProductcategorytypeDataTable->render('inventory.dms_inv_productcategorytypes.index');
    }

    /**
     * Show the form for creating a new DmsInvProductcategorytype.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_productcategorytypes.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvProductcategorytype in storage.
     *
     * @return Response
     */
    public function store(CreateDmsInvProductcategorytypeRequest $request)
    {
        $input = $request->all();

        $dmsInvProductcategorytype = $this->dmsInvProductcategorytypeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvProductcategorytypes.singular')]));

        return redirect(route('inventory.dmsInvProductcategorytypes.index'));
    }

    /**
     * Display the specified DmsInvProductcategorytype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvProductcategorytype = $this->dmsInvProductcategorytypeRepository->find($id);

        if (empty($dmsInvProductcategorytype)) {
            Flash::error(__('models/dmsInvProductcategorytypes.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvProductcategorytypes.index'));
        }

        return view('inventory.dms_inv_productcategorytypes.show')->with('dmsInvProductcategorytype', $dmsInvProductcategorytype);
    }

    /**
     * Show the form for editing the specified DmsInvProductcategorytype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvProductcategorytype = $this->dmsInvProductcategorytypeRepository->find($id);

        if (empty($dmsInvProductcategorytype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductcategorytypes.singular')]));

            return redirect(route('inventory.dmsInvProductcategorytypes.index'));
        }

        return view('inventory.dms_inv_productcategorytypes.edit')->with('dmsInvProductcategorytype', $dmsInvProductcategorytype)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvProductcategorytype in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvProductcategorytypeRequest $request)
    {
        $dmsInvProductcategorytype = $this->dmsInvProductcategorytypeRepository->find($id);

        if (empty($dmsInvProductcategorytype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductcategorytypes.singular')]));

            return redirect(route('inventory.dmsInvProductcategorytypes.index'));
        }

        $dmsInvProductcategorytype = $this->dmsInvProductcategorytypeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvProductcategorytypes.singular')]));

        return redirect(route('inventory.dmsInvProductcategorytypes.index'));
    }

    /**
     * Remove the specified DmsInvProductcategorytype from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvProductcategorytype = $this->dmsInvProductcategorytypeRepository->find($id);

        if (empty($dmsInvProductcategorytype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductcategorytypes.singular')]));

            return redirect(route('inventory.dmsInvProductcategorytypes.index'));
        }

        $this->dmsInvProductcategorytypeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvProductcategorytypes.singular')]));

        return redirect(route('inventory.dmsInvProductcategorytypes.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvProductcategorytype from storage.
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
