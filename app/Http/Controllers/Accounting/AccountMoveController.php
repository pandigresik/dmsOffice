<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\AccountMoveDataTable;
use App\Http\Requests\Accounting;
use App\Http\Requests\Accounting\CreateAccountMoveRequest;
use App\Http\Requests\Accounting\UpdateAccountMoveRequest;
use App\Repositories\Accounting\AccountMoveRepository;
use App\Repositories\Accounting\AccountJournalRepository;
use App\Repositories\Base\CompanyRepository;
use App\Repositories\Inventory\StockPickingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AccountMoveController extends AppBaseController
{
    /** @var  AccountMoveRepository */
    private $accountMoveRepository;

    public function __construct(AccountMoveRepository $accountMoveRepo)
    {
        $this->accountMoveRepository = $accountMoveRepo;
    }

    /**
     * Display a listing of the AccountMove.
     *
     * @param AccountMoveDataTable $accountMoveDataTable
     * @return Response
     */
    public function index(AccountMoveDataTable $accountMoveDataTable)
    {
        return $accountMoveDataTable->render('accounting.account_moves.index');
    }

    /**
     * Show the form for creating a new AccountMove.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.account_moves.create')->with($this->getOptionItems());
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

        $accountMove = $this->accountMoveRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accountMoves.singular')]));

        return redirect(route('accounting.accountMoves.index'));
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
        $accountMove = $this->accountMoveRepository->find($id);

        if (empty($accountMove)) {
            Flash::error(__('models/accountMoves.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.accountMoves.index'));
        }

        return view('accounting.account_moves.show')->with('accountMove', $accountMove);
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
        $accountMove = $this->accountMoveRepository->find($id);

        if (empty($accountMove)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountMoves.singular')]));

            return redirect(route('accounting.accountMoves.index'));
        }

        return view('accounting.account_moves.edit')->with('accountMove', $accountMove)->with($this->getOptionItems());
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
        $accountMove = $this->accountMoveRepository->find($id);

        if (empty($accountMove)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountMoves.singular')]));

            return redirect(route('accounting.accountMoves.index'));
        }

        $accountMove = $this->accountMoveRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accountMoves.singular')]));

        return redirect(route('accounting.accountMoves.index'));
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
        $accountMove = $this->accountMoveRepository->find($id);

        if (empty($accountMove)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountMoves.singular')]));

            return redirect(route('accounting.accountMoves.index'));
        }

        $this->accountMoveRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accountMoves.singular')]));

        return redirect(route('accounting.accountMoves.index'));
    }

    /**
     * Provide options item based on relationship model AccountMove from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $accountJournal = new AccountJournalRepository(app());
        $company = new CompanyRepository(app());
        $stockPicking = new StockPickingRepository(app());
        return [
            'accountJournalItems' => ['' => __('crud.option.accountJournal_placeholder')] + $accountJournal->pluck(),
            'companyItems' => ['' => __('crud.option.company_placeholder')] + $company->pluck(),
            'stockPickingItems' => ['' => __('crud.option.stockPicking_placeholder')] + $stockPicking->pluck()            
        ];
    }
}
