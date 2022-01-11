<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\AccountDataTable;
use App\Http\Requests\Accounting;
use App\Http\Requests\Accounting\CreateAccountRequest;
use App\Http\Requests\Accounting\UpdateAccountRequest;
use App\Repositories\Accounting\AccountRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AccountController extends AppBaseController
{
    /** @var  AccountRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = AccountRepository::class;
    }

    /**
     * Display a listing of the Account.
     *
     * @param AccountDataTable $accountDataTable
     * @return Response
     */
    public function index(AccountDataTable $accountDataTable)
    {
        return $accountDataTable->render('accounting.accounts.index');
    }

    /**
     * Show the form for creating a new Account.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.accounts.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Account in storage.
     *
     * @param CreateAccountRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountRequest $request)
    {
        $input = $request->all();

        $account = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accounts.singular')]));

        return redirect(route('accounting.accounts.index'));
    }

    /**
     * Display the specified Account.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $account = $this->getRepositoryObj()->find($id);

        if (empty($account)) {
            Flash::error(__('models/accounts.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.accounts.index'));
        }

        return view('accounting.accounts.show')->with('account', $account);
    }

    /**
     * Show the form for editing the specified Account.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $account = $this->getRepositoryObj()->find($id);

        if (empty($account)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accounts.singular')]));

            return redirect(route('accounting.accounts.index'));
        }

        return view('accounting.accounts.edit')->with('account', $account)->with($this->getOptionItems());
    }

    /**
     * Update the specified Account in storage.
     *
     * @param  int              $id
     * @param UpdateAccountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountRequest $request)
    {
        $account = $this->getRepositoryObj()->find($id);

        if (empty($account)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accounts.singular')]));

            return redirect(route('accounting.accounts.index'));
        }

        $account = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accounts.singular')]));

        return redirect(route('accounting.accounts.index'));
    }

    /**
     * Remove the specified Account from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $account = $this->getRepositoryObj()->find($id);

        if (empty($account)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accounts.singular')]));

            return redirect(route('accounting.accounts.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accounts.singular')]));

        return redirect(route('accounting.accounts.index'));
    }

    /**
     * Provide options item based on relationship model Account from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        
        return [
                        
        ];
    }
}
