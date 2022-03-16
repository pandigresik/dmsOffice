<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\JournalAccountDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateJournalAccountRequest;
use App\Http\Requests\Accounting\UpdateJournalAccountRequest;
use App\Repositories\Accounting\JournalAccountRepository;
use Flash;
use Response;

class JournalAccountController extends AppBaseController
{
    /** @var JournalAccountRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = JournalAccountRepository::class;
    }

    /**
     * Display a listing of the JournalAccount.
     *
     * @return Response
     */
    public function index(JournalAccountDataTable $journalAccountDataTable)
    {
        return $journalAccountDataTable->render('accounting.journal_accounts.index');
    }

    /**
     * Show the form for creating a new JournalAccount.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.journal_accounts.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created JournalAccount in storage.
     *
     * @return Response
     */
    public function store(CreateJournalAccountRequest $request)
    {
        $input = $request->all();

        $journalAccount = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/journalAccounts.singular')]));

        return redirect(route('accounting.journalAccounts.index'));
    }

    /**
     * Display the specified JournalAccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $journalAccount = $this->getRepositoryObj()->find($id);

        if (empty($journalAccount)) {
            Flash::error(__('models/journalAccounts.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.journalAccounts.index'));
        }

        return view('accounting.journal_accounts.show')->with('journalAccount', $journalAccount);
    }

    /**
     * Show the form for editing the specified JournalAccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $journalAccount = $this->getRepositoryObj()->find($id);

        if (empty($journalAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/journalAccounts.singular')]));

            return redirect(route('accounting.journalAccounts.index'));
        }

        return view('accounting.journal_accounts.edit')->with('journalAccount', $journalAccount)->with($this->getOptionItems());
    }

    /**
     * Update the specified JournalAccount in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateJournalAccountRequest $request)
    {
        $journalAccount = $this->getRepositoryObj()->find($id);

        if (empty($journalAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/journalAccounts.singular')]));

            return redirect(route('accounting.journalAccounts.index'));
        }

        $journalAccount = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/journalAccounts.singular')]));

        return redirect(route('accounting.journalAccounts.index'));
    }

    /**
     * Remove the specified JournalAccount from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $journalAccount = $this->getRepositoryObj()->find($id);

        if (empty($journalAccount)) {
            Flash::error(__('messages.not_found', ['model' => __('models/journalAccounts.singular')]));

            return redirect(route('accounting.journalAccounts.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/journalAccounts.singular')]));

        return redirect(route('accounting.journalAccounts.index'));
    }

    /**
     * Provide options item based on relationship model JournalAccount from storage.
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
