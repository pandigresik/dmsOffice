<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\AccountBalanceDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateAccountBalanceRequest;
use App\Http\Requests\Accounting\UpdateAccountBalanceRequest;
use App\Repositories\Accounting\AccountBalanceRepository;
use Flash;
use Response;

class AccountBalanceController extends AppBaseController
{
    /** @var AccountBalanceRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = AccountBalanceRepository::class;
    }

    /**
     * Display a listing of the AccountBalance.
     *
     * @return Response
     */
    public function index(AccountBalanceDataTable $accountBalanceDataTable)
    {
        return $accountBalanceDataTable->render('accounting.account_balances.index');
    }

    /**
     * Show the form for creating a new AccountBalance.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.account_balances.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created AccountBalance in storage.
     *
     * @return Response
     */
    public function store(CreateAccountBalanceRequest $request)
    {
        $input = $request->all();

        $accountBalance = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accountBalances.singular')]));

        return redirect(route('accounting.accountBalances.index'));
    }

    /**
     * Display the specified AccountBalance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountBalance = $this->getRepositoryObj()->find($id);

        if (empty($accountBalance)) {
            Flash::error(__('models/accountBalances.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.accountBalances.index'));
        }

        return view('accounting.account_balances.show')->with('accountBalance', $accountBalance);
    }

    /**
     * Show the form for editing the specified AccountBalance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountBalance = $this->getRepositoryObj()->find($id);

        if (empty($accountBalance)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountBalances.singular')]));

            return redirect(route('accounting.accountBalances.index'));
        }

        return view('accounting.account_balances.edit')->with('accountBalance', $accountBalance)->with($this->getOptionItems());
    }

    /**
     * Update the specified AccountBalance in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateAccountBalanceRequest $request)
    {
        $accountBalance = $this->getRepositoryObj()->find($id);

        if (empty($accountBalance)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountBalances.singular')]));

            return redirect(route('accounting.accountBalances.index'));
        }

        $accountBalance = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accountBalances.singular')]));

        return redirect(route('accounting.accountBalances.index'));
    }

    /**
     * Remove the specified AccountBalance from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountBalance = $this->getRepositoryObj()->find($id);

        if (empty($accountBalance)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountBalances.singular')]));

            return redirect(route('accounting.accountBalances.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accountBalances.singular')]));

        return redirect(route('accounting.accountBalances.index'));
    }

    /**
     * Provide options item based on relationship model AccountBalance from storage.
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
