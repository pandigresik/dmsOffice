<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\DmsFinSubaccountDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateDmsFinSubaccountRequest;
use App\Http\Requests\Accounting\UpdateDmsFinSubaccountRequest;
use App\Repositories\Accounting\DmsFinSubaccountRepository;
use Flash;
use Response;

class DmsFinSubaccountController extends AppBaseController
{
    /** @var DmsFinSubaccountRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsFinSubaccountRepository::class;
    }

    /**
     * Display a listing of the DmsFinSubaccount.
     *
     * @return Response
     */
    public function index(DmsFinSubaccountDataTable $dmsFinSubaccountDataTable)
    {
        return $dmsFinSubaccountDataTable->render('accounting.dms_fin_subaccounts.index');
    }

    /**
     * Show the form for creating a new DmsFinSubaccount.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.dms_fin_subaccounts.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsFinSubaccount in storage.
     *
     * @return Response
     */
    public function store(CreateDmsFinSubaccountRequest $request)
    {
        $input = $request->all();

        $dmsFinSubaccount = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsFinSubaccounts.singular')]));

        return redirect(route('accounting.dmsFinSubaccounts.index'));
    }

    /**
     * Display the specified DmsFinSubaccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsFinSubaccount = $this->getRepositoryObj()->find($id);

        if (empty($dmsFinSubaccount)) {
            Flash::error(__('models/dmsFinSubaccounts.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.dmsFinSubaccounts.index'));
        }

        return view('accounting.dms_fin_subaccounts.show')->with('dmsFinSubaccount', $dmsFinSubaccount);
    }

    /**
     * Show the form for editing the specified DmsFinSubaccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsFinSubaccount = $this->getRepositoryObj()->find($id);

        if (empty($dmsFinSubaccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsFinSubaccounts.singular')]));

            return redirect(route('accounting.dmsFinSubaccounts.index'));
        }

        return view('accounting.dms_fin_subaccounts.edit')->with('dmsFinSubaccount', $dmsFinSubaccount)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsFinSubaccount in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsFinSubaccountRequest $request)
    {
        $dmsFinSubaccount = $this->getRepositoryObj()->find($id);

        if (empty($dmsFinSubaccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsFinSubaccounts.singular')]));

            return redirect(route('accounting.dmsFinSubaccounts.index'));
        }

        $dmsFinSubaccount = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsFinSubaccounts.singular')]));

        return redirect(route('accounting.dmsFinSubaccounts.index'));
    }

    /**
     * Remove the specified DmsFinSubaccount from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsFinSubaccount = $this->getRepositoryObj()->find($id);

        if (empty($dmsFinSubaccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsFinSubaccounts.singular')]));

            return redirect(route('accounting.dmsFinSubaccounts.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsFinSubaccounts.singular')]));

        return redirect(route('accounting.dmsFinSubaccounts.index'));
    }

    /**
     * Provide options item based on relationship model DmsFinSubaccount from storage.
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
