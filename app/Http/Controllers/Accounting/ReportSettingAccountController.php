<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\ReportSettingAccountDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateReportSettingAccountRequest;
use App\Http\Requests\Accounting\UpdateReportSettingAccountRequest;
use App\Models\Accounting\ReportSettingAccount;
use App\Repositories\Accounting\AccountRepository;
use App\Repositories\Accounting\ReportSettingAccountRepository;
use Flash;
use Response;

class ReportSettingAccountController extends AppBaseController
{
    /** @var ReportSettingAccountRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ReportSettingAccountRepository::class;
    }

    /**
     * Display a listing of the ReportSettingAccount.
     *
     * @return Response
     */
    public function index(ReportSettingAccountDataTable $reportSettingAccountDataTable)
    {
        return $reportSettingAccountDataTable->render('accounting.report_setting_accounts.index');
    }

    /**
     * Show the form for creating a new ReportSettingAccount.
     *
     * @return Response
     */
    public function create()
    {
        $accounts = $this->listAccount();

        return view('accounting.report_setting_accounts.create')
            ->with('accounts', $accounts->keyBy('id'))
            ->with('accountItems', $accounts->pluck('full_identity', 'id'))
            ->with($this->getOptionItems())
        ;
    }

    /**
     * Store a newly created ReportSettingAccount in storage.
     *
     * @return Response
     */
    public function store(CreateReportSettingAccountRequest $request)
    {
        $input = $request->all();

        $reportSettingAccount = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/reportSettingAccounts.singular')]));

        return redirect(route('accounting.reportSettingAccounts.index'));
    }

    /**
     * Show the form for editing the specified ReportSettingAccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reportSettingAccount = $this->getRepositoryObj()->find($id);

        if (empty($reportSettingAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reportSettingAccounts.singular')]));

            return redirect(route('accounting.reportSettingAccounts.index'));
        }
        $accounts = $this->listAccount();

        return view('accounting.report_setting_accounts.edit')
            ->with('reportSettingAccount', $reportSettingAccount)
            ->with('accounts', $accounts->keyBy('id'))
            ->with('accountItems', $accounts->pluck('full_identity', 'id'))
            ->with($this->getOptionItems())
        ;
    }

    /**
     * Update the specified ReportSettingAccount in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateReportSettingAccountRequest $request)
    {
        $reportSettingAccount = $this->getRepositoryObj()->find($id);

        if (empty($reportSettingAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reportSettingAccounts.singular')]));

            return redirect(route('accounting.reportSettingAccounts.index'));
        }

        $reportSettingAccount = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/reportSettingAccounts.singular')]));

        return redirect(route('accounting.reportSettingAccounts.index'));
    }

    /**
     * Remove the specified ReportSettingAccount from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reportSettingAccount = $this->getRepositoryObj()->find($id);

        if (empty($reportSettingAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reportSettingAccounts.singular')]));

            return redirect(route('accounting.reportSettingAccounts.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/reportSettingAccounts.singular')]));

        return redirect(route('accounting.reportSettingAccounts.index'));
    }

    /**
     * Provide options item based on relationship model ReportSettingAccount from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        return [
            'groupTypeItems' => ReportSettingAccount::GROUP_TYPE,
            '',
        ];
    }

    private function listAccount()
    {
        $account = new AccountRepository(app());

        // return $account->allQuery()->orderBy('code')->get()->mapToGroups(function ($message) {
        //     $index = substr($message->code,0,4);

        //     return [$index => $message];
        // });
        return $account->all([], null, null, ['id', 'code', 'name']);
    }
}
