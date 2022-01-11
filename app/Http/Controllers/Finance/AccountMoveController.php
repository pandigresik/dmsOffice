<?php

namespace App\Http\Controllers\Finance;

use App\DataTables\Finance\AccountMoveDataTable;
use App\Http\Requests\Finance;
use App\Http\Requests\Finance\CreateAccountMoveRequest;
use App\Http\Requests\Finance\UpdateAccountMoveRequest;
use App\Repositories\Finance\AccountMoveRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Accounting\AccountRepository;
use Response;

class AccountMoveController extends AppBaseController
{
    /** @var  AccountMoveRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = AccountMoveRepository::class;
    }

    /**
     * Display a listing of the AccountMove.
     *
     * @param AccountMoveDataTable $accountMoveDataTable
     * @return Response
     */
    public function index(AccountMoveDataTable $accountMoveDataTable)
    {
        return $accountMoveDataTable->render('finance.account_moves.index');
    }

    /**
     * Show the form for creating a new AccountMove.
     *
     * @return Response
     */
    public function create()
    {
        return view('finance.account_moves.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created AccountMove in storage.
     *
     * @param CreateAccountMoveRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountMoveRequest $request)
    {
        $input = $request->all();

        $accountMove = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accountMoves.singular')]));

        return redirect(route('finance.accountMoves.index'));
    }

    /**
     * Display the specified AccountMove.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountMove = $this->getRepositoryObj()->find($id);

        if (empty($accountMove)) {
            Flash::error(__('models/accountMoves.singular').' '.__('messages.not_found'));

            return redirect(route('finance.accountMoves.index'));
        }

        return view('finance.account_moves.show')->with('accountMove', $accountMove);
    }

    /**
     * Show the form for editing the specified AccountMove.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountMove = $this->getRepositoryObj()->find($id);

        if (empty($accountMove)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountMoves.singular')]));

            return redirect(route('finance.accountMoves.index'));
        }

        return view('finance.account_moves.edit')
                ->with('accountMove', $accountMove)
                ->with('lines', $accountMove->lines)
                ->with($this->getOptionItems());
    }

    /**
     * Update the specified AccountMove in storage.
     *
     * @param  int              $id
     * @param UpdateAccountMoveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountMoveRequest $request)
    {
        $accountMove = $this->getRepositoryObj()->find($id);

        if (empty($accountMove)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountMoves.singular')]));

            return redirect(route('finance.accountMoves.index'));
        }

        $accountMove = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accountMoves.singular')]));

        return redirect(route('finance.accountMoves.index'));
    }

    /**
     * Remove the specified AccountMove from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountMove = $this->getRepositoryObj()->find($id);

        if (empty($accountMove)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountMoves.singular')]));

            return redirect(route('finance.accountMoves.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accountMoves.singular')]));

        return redirect(route('finance.accountMoves.index'));
    }

    /**
     * Provide options item based on relationship model AccountMove from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $account = new AccountRepository(app());
        $accountData = $account->all([], null, null ,['code', 'name']);
        $accountOptionItems = $accountData->keyBy('code')->toArray();
        return [
            'accountItems' => ['' => __('crud.option.ekspedisi_placeholder')] + $accountData->pluck('code', 'code')->toArray(),
            'accountOptionItems' => $accountOptionItems
        ];
    }
}
