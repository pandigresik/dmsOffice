<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\AccountJournalDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateAccountJournalRequest;
use App\Http\Requests\Accounting\UpdateAccountJournalRequest;
use App\Repositories\Accounting\AccountAccountRepository;
use App\Repositories\Accounting\AccountJournalRepository;
use App\Repositories\Base\CompanyRepository;
use Flash;
use Response;

class AccountJournalController extends AppBaseController
{
    /** @var AccountJournalRepository */
    private $accountJournalRepository;

    public function __construct(AccountJournalRepository $accountJournalRepo)
    {
        $this->accountJournalRepository = $accountJournalRepo;
    }

    /**
     * Display a listing of the AccountJournal.
     *
     * @return Response
     */
    public function index(AccountJournalDataTable $accountJournalDataTable)
    {
        return $accountJournalDataTable->render('accounting.account_journals.index');
    }

    /**
     * Show the form for creating a new AccountJournal.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.account_journals.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created AccountJournal in storage.
     *
     * @return Response
     */
    public function store(CreateAccountJournalRequest $request)
    {
        $input = $request->all();

        $accountJournal = $this->accountJournalRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accountJournals.singular')]));

        return redirect(route('accounting.accountJournals.index'));
    }

    /**
     * Display the specified AccountJournal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountJournal = $this->accountJournalRepository->find($id);

        if (empty($accountJournal)) {
            Flash::error(__('models/accountJournals.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.accountJournals.index'));
        }

        return view('accounting.account_journals.show')->with('accountJournal', $accountJournal);
    }

    /**
     * Show the form for editing the specified AccountJournal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountJournal = $this->accountJournalRepository->find($id);

        if (empty($accountJournal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountJournals.singular')]));

            return redirect(route('accounting.accountJournals.index'));
        }

        return view('accounting.account_journals.edit')->with('accountJournal', $accountJournal)->with($this->getOptionItems());
    }

    /**
     * Update the specified AccountJournal in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateAccountJournalRequest $request)
    {
        $accountJournal = $this->accountJournalRepository->find($id);

        if (empty($accountJournal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountJournals.singular')]));

            return redirect(route('accounting.accountJournals.index'));
        }

        $accountJournal = $this->accountJournalRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accountJournals.singular')]));

        return redirect(route('accounting.accountJournals.index'));
    }

    /**
     * Remove the specified AccountJournal from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountJournal = $this->accountJournalRepository->find($id);

        if (empty($accountJournal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountJournals.singular')]));

            return redirect(route('accounting.accountJournals.index'));
        }

        $this->accountJournalRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accountJournals.singular')]));

        return redirect(route('accounting.accountJournals.index'));
    }

    /**
     * Provide options item based on relationship model AccountJournal from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $company = new CompanyRepository(app());
        $accountAccount = new AccountAccountRepository(app());        
        $typeItems = array_combine(['sale', 'purchase', 'general', 'bank', 'cash'],['sale', 'purchase', 'general', 'bank', 'cash']);
        return [
            'companyItems' => ['' => __('crud.option.company_placeholder')] + $company->pluck(),            
            'defaultDebitAccountItems' => ['' => __('crud.option.accountAccount_placeholder')] + $accountAccount->pluck(),
            'defaultCreditAccountItems' => ['' => __('crud.option.accountAccount_placeholder')] + $accountAccount->pluck(),    
            'typeItems' => ['' => __('crud.option.accountType_placeholder')] +  $typeItems
        ];
    }
}
