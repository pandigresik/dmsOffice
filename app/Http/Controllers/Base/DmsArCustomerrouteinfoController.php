<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsArCustomerrouteinfoDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateDmsArCustomerrouteinfoRequest;
use App\Http\Requests\Base\UpdateDmsArCustomerrouteinfoRequest;
use App\Repositories\Base\DmsArCustomerrouteinfoRepository;
use Flash;
use Response;

class DmsArCustomerrouteinfoController extends AppBaseController
{
    /** @var DmsArCustomerrouteinfoRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsArCustomerrouteinfoRepository::class;
    }

    /**
     * Display a listing of the DmsArCustomerrouteinfo.
     *
     * @return Response
     */
    public function index(DmsArCustomerrouteinfoDataTable $dmsArCustomerrouteinfoDataTable)
    {
        return $dmsArCustomerrouteinfoDataTable->render('base.dms_ar_customerrouteinfos.index');
    }

    /**
     * Show the form for creating a new DmsArCustomerrouteinfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ar_customerrouteinfos.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsArCustomerrouteinfo in storage.
     *
     * @return Response
     */
    public function store(CreateDmsArCustomerrouteinfoRequest $request)
    {
        $input = $request->all();

        $dmsArCustomerrouteinfo = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsArCustomerrouteinfos.singular')]));

        return redirect(route('base.dmsArCustomerrouteinfos.index'));
    }

    /**
     * Display the specified DmsArCustomerrouteinfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsArCustomerrouteinfo = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomerrouteinfo)) {
            Flash::error(__('models/dmsArCustomerrouteinfos.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsArCustomerrouteinfos.index'));
        }

        return view('base.dms_ar_customerrouteinfos.show')->with('dmsArCustomerrouteinfo', $dmsArCustomerrouteinfo);
    }

    /**
     * Show the form for editing the specified DmsArCustomerrouteinfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsArCustomerrouteinfo = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomerrouteinfo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomerrouteinfos.singular')]));

            return redirect(route('base.dmsArCustomerrouteinfos.index'));
        }

        return view('base.dms_ar_customerrouteinfos.edit')->with('dmsArCustomerrouteinfo', $dmsArCustomerrouteinfo)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsArCustomerrouteinfo in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsArCustomerrouteinfoRequest $request)
    {
        $dmsArCustomerrouteinfo = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomerrouteinfo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomerrouteinfos.singular')]));

            return redirect(route('base.dmsArCustomerrouteinfos.index'));
        }

        $dmsArCustomerrouteinfo = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsArCustomerrouteinfos.singular')]));

        return redirect(route('base.dmsArCustomerrouteinfos.index'));
    }

    /**
     * Remove the specified DmsArCustomerrouteinfo from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsArCustomerrouteinfo = $this->getRepositoryObj()->find($id);

        if (empty($dmsArCustomerrouteinfo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomerrouteinfos.singular')]));

            return redirect(route('base.dmsArCustomerrouteinfos.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsArCustomerrouteinfos.singular')]));

        return redirect(route('base.dmsArCustomerrouteinfos.index'));
    }

    /**
     * Provide options item based on relationship model DmsArCustomerrouteinfo from storage.
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
