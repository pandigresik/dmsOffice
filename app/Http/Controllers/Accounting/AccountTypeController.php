<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\AccountTypeDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateAccountTypeRequest;
use App\Http\Requests\Accounting\UpdateAccountTypeRequest;
use App\Repositories\Accounting\AccountTypeRepository;
use Flash;
use Response;

class AccountTypeController extends AppBaseController
{
    /** @var AccountTypeRepository */
    private $accountTypeRepository;

    public function __construct(AccountTypeRepository $accountTypeRepo)
    {
        $this->accountTypeRepository = $accountTypeRepo;
    }

    /**
     * Display a listing of the AccountType.
     *
     * @return Response
     */
    public function index(AccountTypeDataTable $accountTypeDataTable)
    {
        return $accountTypeDataTable->render('accounting.account_types.index');
    }

    /**
     * Show the form for creating a new AccountType.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.account_types.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created AccountType in storage.
     *
     * @return Response
     */
    public function store(CreateAccountTypeRequest $request)
    {
        $input = $request->all();

        $accountType = $this->accountTypeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accountTypes.singular')]));

        return redirect(route('accounting.accountTypes.index'));
    }

    /**
     * Display the specified AccountType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountType = $this->accountTypeRepository->find($id);

        if (empty($accountType)) {
            Flash::error(__('models/accountTypes.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.accountTypes.index'));
        }

        return view('accounting.account_types.show')->with('accountType', $accountType);
    }

    /**
     * Show the form for editing the specified AccountType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountType = $this->accountTypeRepository->find($id);

        if (empty($accountType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountTypes.singular')]));

            return redirect(route('accounting.accountTypes.index'));
        }

        return view('accounting.account_types.edit')->with('accountType', $accountType)->with($this->getOptionItems());
    }

    /**
     * Update the specified AccountType in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateAccountTypeRequest $request)
    {
        $accountType = $this->accountTypeRepository->find($id);

        if (empty($accountType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountTypes.singular')]));

            return redirect(route('accounting.accountTypes.index'));
        }

        $accountType = $this->accountTypeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accountTypes.singular')]));

        return redirect(route('accounting.accountTypes.index'));
    }

    /**
     * Remove the specified AccountType from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountType = $this->accountTypeRepository->find($id);

        if (empty($accountType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountTypes.singular')]));

            return redirect(route('accounting.accountTypes.index'));
        }

        $this->accountTypeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accountTypes.singular')]));

        return redirect(route('accounting.accountTypes.index'));
    }

    /**
     * Provide options item based on relationship model AccountType from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        return [
            'typeItems' => ['' => 'Pilih type', 'receivable' => 'receivable', 'payable' => 'payable', 'other' => 'other', 'liquidity' => 'liquidity'],
            'groupItems' => ['' => 'Pilih group', 'asset' => 'asset', 'liability' => 'liability', 'equity' => 'equity', 'income' => 'income', 'expense' => 'expense', 'off_balance'],
        ];
    }
}
