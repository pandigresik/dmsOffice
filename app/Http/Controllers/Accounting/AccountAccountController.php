<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\AccountAccountDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateAccountAccountRequest;
use App\Http\Requests\Accounting\UpdateAccountAccountRequest;
use App\Repositories\Accounting\AccountAccountRepository;
use App\Repositories\Base\CompanyRepository;
use Flash;
use Response;

class AccountAccountController extends AppBaseController
{
    /** @var AccountAccountRepository */
    private $accountAccountRepository;

    public function __construct(AccountAccountRepository $accountAccountRepo)
    {
        $this->accountAccountRepository = $accountAccountRepo;
    }

    /**
     * Display a listing of the AccountAccount.
     *
     * @return Response
     */
    public function index(AccountAccountDataTable $accountAccountDataTable)
    {
        return $accountAccountDataTable->render('accounting.account_accounts.index');
    }

    /**
     * Show the form for creating a new AccountAccount.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.account_accounts.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created AccountAccount in storage.
     *
     * @return Response
     */
    public function store(CreateAccountAccountRequest $request)
    {
        $input = $request->all();

        $accountAccount = $this->accountAccountRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accountAccounts.singular')]));

        return redirect(route('accounting.accountAccounts.index'));
    }

    /**
     * Display the specified AccountAccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountAccount = $this->accountAccountRepository->find($id);

        if (empty($accountAccount)) {
            Flash::error(__('models/accountAccounts.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.accountAccounts.index'));
        }

        return view('accounting.account_accounts.show')->with('accountAccount', $accountAccount);
    }

    /**
     * Show the form for editing the specified AccountAccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountAccount = $this->accountAccountRepository->find($id);

        if (empty($accountAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountAccounts.singular')]));

            return redirect(route('accounting.accountAccounts.index'));
        }

        return view('accounting.account_accounts.edit')->with('accountAccount', $accountAccount)->with($this->getOptionItems());
    }

    /**
     * Update the specified AccountAccount in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateAccountAccountRequest $request)
    {
        $accountAccount = $this->accountAccountRepository->find($id);

        if (empty($accountAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountAccounts.singular')]));

            return redirect(route('accounting.accountAccounts.index'));
        }

        $accountAccount = $this->accountAccountRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accountAccounts.singular')]));

        return redirect(route('accounting.accountAccounts.index'));
    }

    /**
     * Remove the specified AccountAccount from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountAccount = $this->accountAccountRepository->find($id);

        if (empty($accountAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountAccounts.singular')]));

            return redirect(route('accounting.accountAccounts.index'));
        }

        $this->accountAccountRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accountAccounts.singular')]));

        return redirect(route('accounting.accountAccounts.index'));
    }

    /**
     * Provide options item based on relationship model AccountAccount from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $company = new CompanyRepository(app());

        return [
            'companyItems' => ['' => __('crud.option.company_placeholder')] + $company->pluck(),
            'typeItems' => ['' => 'Pilih type', 'receivable' => 'receivable', 'payable' => 'payable', 'other' => 'other', 'liquidity' => 'liquidity'],
            'groupItems' => ['' => 'Pilih group', 'asset' => 'asset', 'liability' => 'liability', 'equity' => 'equity', 'income' => 'income', 'expense' => 'expense', 'off_balance'],
        ];
    }
}
