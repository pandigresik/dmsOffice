<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvProductkitinfoDataTable;
use App\Http\Requests\Inventory;
use App\Http\Requests\Inventory\CreateDmsInvProductkitinfoRequest;
use App\Http\Requests\Inventory\UpdateDmsInvProductkitinfoRequest;
use App\Repositories\Inventory\DmsInvProductkitinfoRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmsInvProductkitinfoController extends AppBaseController
{
    /** @var  DmsInvProductkitinfoRepository */
    private $dmsInvProductkitinfoRepository;

    public function __construct(DmsInvProductkitinfoRepository $dmsInvProductkitinfoRepo)
    {
        $this->dmsInvProductkitinfoRepository = $dmsInvProductkitinfoRepo;
    }

    /**
     * Display a listing of the DmsInvProductkitinfo.
     *
     * @param DmsInvProductkitinfoDataTable $dmsInvProductkitinfoDataTable
     * @return Response
     */
    public function index(DmsInvProductkitinfoDataTable $dmsInvProductkitinfoDataTable)
    {
        return $dmsInvProductkitinfoDataTable->render('inventory.dms_inv_productkitinfos.index');
    }

    /**
     * Show the form for creating a new DmsInvProductkitinfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_productkitinfos.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvProductkitinfo in storage.
     *
     * @param CreateDmsInvProductkitinfoRequest $request
     *
     * @return Response
     */
    public function store(CreateDmsInvProductkitinfoRequest $request)
    {
        $input = $request->all();

        $dmsInvProductkitinfo = $this->dmsInvProductkitinfoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvProductkitinfos.singular')]));

        return redirect(route('inventory.dmsInvProductkitinfos.index'));
    }

    /**
     * Display the specified DmsInvProductkitinfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvProductkitinfo = $this->dmsInvProductkitinfoRepository->find($id);

        if (empty($dmsInvProductkitinfo)) {
            Flash::error(__('models/dmsInvProductkitinfos.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvProductkitinfos.index'));
        }

        return view('inventory.dms_inv_productkitinfos.show')->with('dmsInvProductkitinfo', $dmsInvProductkitinfo);
    }

    /**
     * Show the form for editing the specified DmsInvProductkitinfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvProductkitinfo = $this->dmsInvProductkitinfoRepository->find($id);

        if (empty($dmsInvProductkitinfo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductkitinfos.singular')]));

            return redirect(route('inventory.dmsInvProductkitinfos.index'));
        }

        return view('inventory.dms_inv_productkitinfos.edit')->with('dmsInvProductkitinfo', $dmsInvProductkitinfo)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvProductkitinfo in storage.
     *
     * @param  int              $id
     * @param UpdateDmsInvProductkitinfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvProductkitinfoRequest $request)
    {
        $dmsInvProductkitinfo = $this->dmsInvProductkitinfoRepository->find($id);

        if (empty($dmsInvProductkitinfo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductkitinfos.singular')]));

            return redirect(route('inventory.dmsInvProductkitinfos.index'));
        }

        $dmsInvProductkitinfo = $this->dmsInvProductkitinfoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvProductkitinfos.singular')]));

        return redirect(route('inventory.dmsInvProductkitinfos.index'));
    }

    /**
     * Remove the specified DmsInvProductkitinfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvProductkitinfo = $this->dmsInvProductkitinfoRepository->find($id);

        if (empty($dmsInvProductkitinfo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductkitinfos.singular')]));

            return redirect(route('inventory.dmsInvProductkitinfos.index'));
        }

        $this->dmsInvProductkitinfoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvProductkitinfos.singular')]));

        return redirect(route('inventory.dmsInvProductkitinfos.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvProductkitinfo from storage.         
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
