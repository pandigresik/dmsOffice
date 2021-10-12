<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\IfrsReportingPeriodsDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateIfrsReportingPeriodsRequest;
use App\Http\Requests\Accounting\UpdateIfrsReportingPeriodsRequest;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use App\Repositories\Accounting\IfrsReportingPeriodsRepository;
use Flash;
use Response;

class IfrsReportingPeriodsController extends AppBaseController
{
    /** @var IfrsReportingPeriodsRepository */
    private $ifrsReportingPeriodsRepository;

    public function __construct(IfrsReportingPeriodsRepository $ifrsReportingPeriodsRepo)
    {
        $this->ifrsReportingPeriodsRepository = $ifrsReportingPeriodsRepo;
    }

    /**
     * Display a listing of the IfrsReportingPeriods.
     *
     * @return Response
     */
    public function index(IfrsReportingPeriodsDataTable $ifrsReportingPeriodsDataTable)
    {
        return $ifrsReportingPeriodsDataTable->render('accounting.ifrs_reporting_periods.index');
    }

    /**
     * Show the form for creating a new IfrsReportingPeriods.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.ifrs_reporting_periods.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created IfrsReportingPeriods in storage.
     *
     * @return Response
     */
    public function store(CreateIfrsReportingPeriodsRequest $request)
    {
        $input = $request->all();

        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ifrsReportingPeriods.singular')]));

        return redirect(route('accounting.ifrsReportingPeriods.index'));
    }

    /**
     * Display the specified IfrsReportingPeriods.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->find($id);

        if (empty($ifrsReportingPeriods)) {
            Flash::error(__('models/ifrsReportingPeriods.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.ifrsReportingPeriods.index'));
        }

        return view('accounting.ifrs_reporting_periods.show')->with('ifrsReportingPeriods', $ifrsReportingPeriods);
    }

    /**
     * Show the form for editing the specified IfrsReportingPeriods.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->find($id);

        if (empty($ifrsReportingPeriods)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsReportingPeriods.singular')]));

            return redirect(route('accounting.ifrsReportingPeriods.index'));
        }

        return view('accounting.ifrs_reporting_periods.edit')->with('ifrsReportingPeriods', $ifrsReportingPeriods)->with($this->getOptionItems());
    }

    /**
     * Update the specified IfrsReportingPeriods in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateIfrsReportingPeriodsRequest $request)
    {
        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->find($id);

        if (empty($ifrsReportingPeriods)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsReportingPeriods.singular')]));

            return redirect(route('accounting.ifrsReportingPeriods.index'));
        }

        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ifrsReportingPeriods.singular')]));

        return redirect(route('accounting.ifrsReportingPeriods.index'));
    }

    /**
     * Remove the specified IfrsReportingPeriods from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->find($id);

        if (empty($ifrsReportingPeriods)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsReportingPeriods.singular')]));

            return redirect(route('accounting.ifrsReportingPeriods.index'));
        }

        $this->ifrsReportingPeriodsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ifrsReportingPeriods.singular')]));

        return redirect(route('accounting.ifrsReportingPeriods.index'));
    }

    /**
     * Provide options item based on relationship model IfrsReportingPeriods from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $ifrsEntity = new IfrsEntitiesRepository(app());

        return [
            'entityItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $ifrsEntity->pluck(),
        ];
    }
}
