<?php

namespace App\Http\Controllers\Sales;

use App\DataTables\Sales\DmsSdRouteitemDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Sales\CreateDmsSdRouteitemRequest;
use App\Http\Requests\Sales\UpdateDmsSdRouteitemRequest;
use App\Repositories\Sales\DmsSdRouteitemRepository;
use Flash;
use Response;

class DmsSdRouteitemController extends AppBaseController
{
    /** @var DmsSdRouteitemRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsSdRouteitemRepository::class;
    }

    /**
     * Display a listing of the DmsSdRouteitem.
     *
     * @return Response
     */
    public function index(DmsSdRouteitemDataTable $dmsSdRouteitemDataTable)
    {
        return $dmsSdRouteitemDataTable->render('sales.dms_sd_routeitems.index');
    }

    /**
     * Show the form for creating a new DmsSdRouteitem.
     *
     * @return Response
     */
    public function create()
    {
        return view('sales.dms_sd_routeitems.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsSdRouteitem in storage.
     *
     * @return Response
     */
    public function store(CreateDmsSdRouteitemRequest $request)
    {
        $input = $request->all();

        $dmsSdRouteitem = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsSdRouteitems.singular')]));

        return redirect(route('sales.dmsSdRouteitems.index'));
    }

    /**
     * Display the specified DmsSdRouteitem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsSdRouteitem = $this->getRepositoryObj()->find($id);

        if (empty($dmsSdRouteitem)) {
            Flash::error(__('models/dmsSdRouteitems.singular').' '.__('messages.not_found'));

            return redirect(route('sales.dmsSdRouteitems.index'));
        }

        return view('sales.dms_sd_routeitems.show')->with('dmsSdRouteitem', $dmsSdRouteitem);
    }

    /**
     * Show the form for editing the specified DmsSdRouteitem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsSdRouteitem = $this->getRepositoryObj()->find($id);

        if (empty($dmsSdRouteitem)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSdRouteitems.singular')]));

            return redirect(route('sales.dmsSdRouteitems.index'));
        }

        return view('sales.dms_sd_routeitems.edit')->with('dmsSdRouteitem', $dmsSdRouteitem)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsSdRouteitem in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsSdRouteitemRequest $request)
    {
        $dmsSdRouteitem = $this->getRepositoryObj()->find($id);

        if (empty($dmsSdRouteitem)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSdRouteitems.singular')]));

            return redirect(route('sales.dmsSdRouteitems.index'));
        }

        $dmsSdRouteitem = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsSdRouteitems.singular')]));

        return redirect(route('sales.dmsSdRouteitems.index'));
    }

    /**
     * Remove the specified DmsSdRouteitem from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsSdRouteitem = $this->getRepositoryObj()->find($id);

        if (empty($dmsSdRouteitem)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSdRouteitems.singular')]));

            return redirect(route('sales.dmsSdRouteitems.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsSdRouteitems.singular')]));

        return redirect(route('sales.dmsSdRouteitems.index'));
    }

    /**
     * Provide options item based on relationship model DmsSdRouteitem from storage.
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
