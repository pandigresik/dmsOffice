<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\DmsFinAccountDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateDmsFinAccountRequest;
use App\Http\Requests\Accounting\UpdateDmsFinAccountRequest;
use App\Repositories\Accounting\DmsFinAccountRepository;
use Flash;
use Response;

class DmsFinAccountController extends AppBaseController
{
    /** @var DmsFinAccountRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsFinAccountRepository::class;
    }

    /**
     * Display a listing of the DmsFinAccount.
     *
     * @return Response
     */
    public function index(DmsFinAccountDataTable $dmsFinAccountDataTable)
    {
        return $dmsFinAccountDataTable->render('accounting.dms_fin_accounts.index');
    }

    /**
     * Show the form for creating a new DmsFinAccount.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.dms_fin_accounts.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsFinAccount in storage.
     *
     * @return Response
     */
    public function store(CreateDmsFinAccountRequest $request)
    {
        $input = $request->all();

        $dmsFinAccount = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsFinAccounts.singular')]));

        return redirect(route('accounting.dmsFinAccounts.index'));
    }

    /**
     * Display the specified DmsFinAccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsFinAccount = $this->getRepositoryObj()->find($id);

        if (empty($dmsFinAccount)) {
            Flash::error(__('models/dmsFinAccounts.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.dmsFinAccounts.index'));
        }

        return view('accounting.dms_fin_accounts.show')->with('dmsFinAccount', $dmsFinAccount);
    }

    /**
     * Show the form for editing the specified DmsFinAccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsFinAccount = $this->getRepositoryObj()->find($id);

        if (empty($dmsFinAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsFinAccounts.singular')]));

            return redirect(route('accounting.dmsFinAccounts.index'));
        }

        return view('accounting.dms_fin_accounts.edit')->with('dmsFinAccount', $dmsFinAccount)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsFinAccount in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsFinAccountRequest $request)
    {
        $dmsFinAccount = $this->getRepositoryObj()->find($id);

        if (empty($dmsFinAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsFinAccounts.singular')]));

            return redirect(route('accounting.dmsFinAccounts.index'));
        }

        $dmsFinAccount = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsFinAccounts.singular')]));

        return redirect(route('accounting.dmsFinAccounts.index'));
    }

    /**
     * Remove the specified DmsFinAccount from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsFinAccount = $this->getRepositoryObj()->find($id);

        if (empty($dmsFinAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsFinAccounts.singular')]));

            return redirect(route('accounting.dmsFinAccounts.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsFinAccounts.singular')]));

        return redirect(route('accounting.dmsFinAccounts.index'));
    }

    /**
     * Provide options item based on relationship model DmsFinAccount from storage.
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
