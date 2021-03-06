<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsArPricesegmentDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateDmsArPricesegmentRequest;
use App\Http\Requests\Base\UpdateDmsArPricesegmentRequest;
use App\Repositories\Base\DmsArPricesegmentRepository;
use Flash;
use Response;

class DmsArPricesegmentController extends AppBaseController
{
    /** @var DmsArPricesegmentRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsArPricesegmentRepository::class;
    }

    /**
     * Display a listing of the DmsArPricesegment.
     *
     * @return Response
     */
    public function index(DmsArPricesegmentDataTable $dmsArPricesegmentDataTable)
    {
        return $dmsArPricesegmentDataTable->render('base.dms_ar_pricesegments.index');
    }

    /**
     * Show the form for creating a new DmsArPricesegment.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ar_pricesegments.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsArPricesegment in storage.
     *
     * @return Response
     */
    public function store(CreateDmsArPricesegmentRequest $request)
    {
        $input = $request->all();

        $dmsArPricesegment = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsArPricesegments.singular')]));

        return redirect(route('base.dmsArPricesegments.index'));
    }

    /**
     * Display the specified DmsArPricesegment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsArPricesegment = $this->getRepositoryObj()->find($id);

        if (empty($dmsArPricesegment)) {
            Flash::error(__('models/dmsArPricesegments.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsArPricesegments.index'));
        }

        return view('base.dms_ar_pricesegments.show')->with('dmsArPricesegment', $dmsArPricesegment);
    }

    /**
     * Show the form for editing the specified DmsArPricesegment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsArPricesegment = $this->getRepositoryObj()->find($id);

        if (empty($dmsArPricesegment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArPricesegments.singular')]));

            return redirect(route('base.dmsArPricesegments.index'));
        }

        return view('base.dms_ar_pricesegments.edit')->with('dmsArPricesegment', $dmsArPricesegment)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsArPricesegment in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsArPricesegmentRequest $request)
    {
        $dmsArPricesegment = $this->getRepositoryObj()->find($id);

        if (empty($dmsArPricesegment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArPricesegments.singular')]));

            return redirect(route('base.dmsArPricesegments.index'));
        }

        $dmsArPricesegment = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsArPricesegments.singular')]));

        return redirect(route('base.dmsArPricesegments.index'));
    }

    /**
     * Remove the specified DmsArPricesegment from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsArPricesegment = $this->getRepositoryObj()->find($id);

        if (empty($dmsArPricesegment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArPricesegments.singular')]));

            return redirect(route('base.dmsArPricesegments.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsArPricesegments.singular')]));

        return redirect(route('base.dmsArPricesegments.index'));
    }

    /**
     * Provide options item based on relationship model DmsArPricesegment from storage.
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
