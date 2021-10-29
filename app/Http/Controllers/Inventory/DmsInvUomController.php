<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvUomDataTable;
use App\Http\Requests\Inventory;
use App\Http\Requests\Inventory\CreateDmsInvUomRequest;
use App\Http\Requests\Inventory\UpdateDmsInvUomRequest;
use App\Repositories\Inventory\DmsInvUomRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmsInvUomController extends AppBaseController
{
    /** @var  DmsInvUomRepository */
    private $dmsInvUomRepository;

    public function __construct(DmsInvUomRepository $dmsInvUomRepo)
    {
        $this->dmsInvUomRepository = $dmsInvUomRepo;
    }

    /**
     * Display a listing of the DmsInvUom.
     *
     * @param DmsInvUomDataTable $dmsInvUomDataTable
     * @return Response
     */
    public function index(DmsInvUomDataTable $dmsInvUomDataTable)
    {
        return $dmsInvUomDataTable->render('inventory.dms_inv_uoms.index');
    }

    /**
     * Show the form for creating a new DmsInvUom.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_uoms.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvUom in storage.
     *
     * @param CreateDmsInvUomRequest $request
     *
     * @return Response
     */
    public function store(CreateDmsInvUomRequest $request)
    {
        $input = $request->all();

        $dmsInvUom = $this->dmsInvUomRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvUoms.singular')]));

        return redirect(route('inventory.dmsInvUoms.index'));
    }

    /**
     * Display the specified DmsInvUom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvUom = $this->dmsInvUomRepository->find($id);

        if (empty($dmsInvUom)) {
            Flash::error(__('models/dmsInvUoms.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvUoms.index'));
        }

        return view('inventory.dms_inv_uoms.show')->with('dmsInvUom', $dmsInvUom);
    }

    /**
     * Show the form for editing the specified DmsInvUom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvUom = $this->dmsInvUomRepository->find($id);

        if (empty($dmsInvUom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvUoms.singular')]));

            return redirect(route('inventory.dmsInvUoms.index'));
        }

        return view('inventory.dms_inv_uoms.edit')->with('dmsInvUom', $dmsInvUom)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvUom in storage.
     *
     * @param  int              $id
     * @param UpdateDmsInvUomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvUomRequest $request)
    {
        $dmsInvUom = $this->dmsInvUomRepository->find($id);

        if (empty($dmsInvUom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvUoms.singular')]));

            return redirect(route('inventory.dmsInvUoms.index'));
        }

        $dmsInvUom = $this->dmsInvUomRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvUoms.singular')]));

        return redirect(route('inventory.dmsInvUoms.index'));
    }

    /**
     * Remove the specified DmsInvUom from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvUom = $this->dmsInvUomRepository->find($id);

        if (empty($dmsInvUom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvUoms.singular')]));

            return redirect(route('inventory.dmsInvUoms.index'));
        }

        $this->dmsInvUomRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvUoms.singular')]));

        return redirect(route('inventory.dmsInvUoms.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvUom from storage.         
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
