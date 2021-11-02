<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsArPaymenttypeDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateDmsArPaymenttypeRequest;
use App\Http\Requests\Base\UpdateDmsArPaymenttypeRequest;
use App\Repositories\Base\DmsArPaymenttypeRepository;
use Flash;
use Response;

class DmsArPaymenttypeController extends AppBaseController
{
    /** @var DmsArPaymenttypeRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsArPaymenttypeRepository::class;
    }

    /**
     * Display a listing of the DmsArPaymenttype.
     *
     * @return Response
     */
    public function index(DmsArPaymenttypeDataTable $dmsArPaymenttypeDataTable)
    {
        return $dmsArPaymenttypeDataTable->render('base.dms_ar_paymenttypes.index');
    }

    /**
     * Show the form for creating a new DmsArPaymenttype.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ar_paymenttypes.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsArPaymenttype in storage.
     *
     * @return Response
     */
    public function store(CreateDmsArPaymenttypeRequest $request)
    {
        $input = $request->all();

        $dmsArPaymenttype = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsArPaymenttypes.singular')]));

        return redirect(route('base.dmsArPaymenttypes.index'));
    }

    /**
     * Display the specified DmsArPaymenttype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsArPaymenttype = $this->getRepositoryObj()->find($id);

        if (empty($dmsArPaymenttype)) {
            Flash::error(__('models/dmsArPaymenttypes.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsArPaymenttypes.index'));
        }

        return view('base.dms_ar_paymenttypes.show')->with('dmsArPaymenttype', $dmsArPaymenttype);
    }

    /**
     * Show the form for editing the specified DmsArPaymenttype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsArPaymenttype = $this->getRepositoryObj()->find($id);

        if (empty($dmsArPaymenttype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArPaymenttypes.singular')]));

            return redirect(route('base.dmsArPaymenttypes.index'));
        }

        return view('base.dms_ar_paymenttypes.edit')->with('dmsArPaymenttype', $dmsArPaymenttype)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsArPaymenttype in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsArPaymenttypeRequest $request)
    {
        $dmsArPaymenttype = $this->getRepositoryObj()->find($id);

        if (empty($dmsArPaymenttype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArPaymenttypes.singular')]));

            return redirect(route('base.dmsArPaymenttypes.index'));
        }

        $dmsArPaymenttype = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsArPaymenttypes.singular')]));

        return redirect(route('base.dmsArPaymenttypes.index'));
    }

    /**
     * Remove the specified DmsArPaymenttype from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsArPaymenttype = $this->getRepositoryObj()->find($id);

        if (empty($dmsArPaymenttype)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArPaymenttypes.singular')]));

            return redirect(route('base.dmsArPaymenttypes.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsArPaymenttypes.singular')]));

        return redirect(route('base.dmsArPaymenttypes.index'));
    }

    /**
     * Provide options item based on relationship model DmsArPaymenttype from storage.
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
