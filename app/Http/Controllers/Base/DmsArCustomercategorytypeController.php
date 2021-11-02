<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsArCustomercategorytypeDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateDmsArCustomercategorytypeRequest;
use App\Http\Requests\Base\UpdateDmsArCustomercategorytypeRequest;
use App\Repositories\Base\DmsArCustomercategorytypeRepository;
use Flash;
use Response;

class DmsArCustomercategorytypeController extends AppBaseController
{
    /** @var DmsArCustomercategorytypeRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsArCustomercategorytypeRepository::class;
    }

    /**
     * Display a listing of the DmsArCustomercategorytype.
     *
     * @return Response
     */
    public function index(DmsArCustomercategorytypeDataTable $dmsArCustomercategorytypeDataTable)
    {
        return $dmsArCustomercategorytypeDataTable->render('base.dms_ar_customercategorytypes.index');
    }

    /**
     * Show the form for creating a new DmsArCustomercategorytype.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ar_customercategorytypes.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsArCustomercategorytype in storage.
     *
     * @return Response
     */
    public function store(CreateDmsArCustomercategorytypeRequest $request)
    {
        $input = $request->all();

        $dmsArCustomercategorytype = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsArCustomercategorytypes.singular')]));

        return redirect(route('base.dmsArCustomercategorytypes.index'));
    }

    /**
     * Display the specified DmsArCustomercategorytype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsArCustomercategorytype = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomercategorytype)) {
            Flash::error(__('models/dmsArCustomercategorytypes.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsArCustomercategorytypes.index'));
        }

        return view('base.dms_ar_customercategorytypes.show')->with('dmsArCustomercategorytype', $dmsArCustomercategorytype);
    }

    /**
     * Show the form for editing the specified DmsArCustomercategorytype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsArCustomercategorytype = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomercategorytype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomercategorytypes.singular')]));

            return redirect(route('base.dmsArCustomercategorytypes.index'));
        }

        return view('base.dms_ar_customercategorytypes.edit')->with('dmsArCustomercategorytype', $dmsArCustomercategorytype)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsArCustomercategorytype in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsArCustomercategorytypeRequest $request)
    {
        $dmsArCustomercategorytype = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomercategorytype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomercategorytypes.singular')]));

            return redirect(route('base.dmsArCustomercategorytypes.index'));
        }

        $dmsArCustomercategorytype = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsArCustomercategorytypes.singular')]));

        return redirect(route('base.dmsArCustomercategorytypes.index'));
    }

    /**
     * Remove the specified DmsArCustomercategorytype from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsArCustomercategorytype = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomercategorytype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomercategorytypes.singular')]));

            return redirect(route('base.dmsArCustomercategorytypes.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsArCustomercategorytypes.singular')]));

        return redirect(route('base.dmsArCustomercategorytypes.index'));
    }

    /**
     * Provide options item based on relationship model DmsArCustomercategorytype from storage.
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
