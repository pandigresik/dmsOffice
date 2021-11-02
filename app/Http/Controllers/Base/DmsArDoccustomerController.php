<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsArDoccustomerDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateDmsArDoccustomerRequest;
use App\Http\Requests\Base\UpdateDmsArDoccustomerRequest;
use App\Repositories\Base\DmsArDoccustomerRepository;
use Flash;
use Response;

class DmsArDoccustomerController extends AppBaseController
{
    /** @var DmsArDoccustomerRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsArDoccustomerRepository::class;
    }

    /**
     * Display a listing of the DmsArDoccustomer.
     *
     * @return Response
     */
    public function index(DmsArDoccustomerDataTable $dmsArDoccustomerDataTable)
    {
        return $dmsArDoccustomerDataTable->render('base.dms_ar_doccustomers.index');
    }

    /**
     * Show the form for creating a new DmsArDoccustomer.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ar_doccustomers.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsArDoccustomer in storage.
     *
     * @return Response
     */
    public function store(CreateDmsArDoccustomerRequest $request)
    {
        $input = $request->all();

        $dmsArDoccustomer = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsArDoccustomers.singular')]));

        return redirect(route('base.dmsArDoccustomers.index'));
    }

    /**
     * Display the specified DmsArDoccustomer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsArDoccustomer = $this->getRepositoryObj()->find($id);

        if (empty($dmsArDoccustomer)) {
            Flash::error(__('models/dmsArDoccustomers.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsArDoccustomers.index'));
        }

        return view('base.dms_ar_doccustomers.show')->with('dmsArDoccustomer', $dmsArDoccustomer);
    }

    /**
     * Show the form for editing the specified DmsArDoccustomer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsArDoccustomer = $this->getRepositoryObj()->find($id);

        if (empty($dmsArDoccustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArDoccustomers.singular')]));

            return redirect(route('base.dmsArDoccustomers.index'));
        }

        return view('base.dms_ar_doccustomers.edit')->with('dmsArDoccustomer', $dmsArDoccustomer)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsArDoccustomer in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsArDoccustomerRequest $request)
    {
        $dmsArDoccustomer = $this->getRepositoryObj()->find($id);

        if (empty($dmsArDoccustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArDoccustomers.singular')]));

            return redirect(route('base.dmsArDoccustomers.index'));
        }

        $dmsArDoccustomer = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsArDoccustomers.singular')]));

        return redirect(route('base.dmsArDoccustomers.index'));
    }

    /**
     * Remove the specified DmsArDoccustomer from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsArDoccustomer = $this->getRepositoryObj()->find($id);

        if (empty($dmsArDoccustomer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArDoccustomers.singular')]));

            return redirect(route('base.dmsArDoccustomers.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsArDoccustomers.singular')]));

        return redirect(route('base.dmsArDoccustomers.index'));
    }

    /**
     * Provide options item based on relationship model DmsArDoccustomer from storage.
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
