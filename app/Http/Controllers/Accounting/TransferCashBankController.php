<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\TransferCashBankDataTable;
use App\Http\Requests\Accounting;
use App\Http\Requests\Accounting\CreateTransferCashBankRequest;
use App\Http\Requests\Accounting\UpdateTransferCashBankRequest;
use App\Repositories\Accounting\TransferCashBankRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Accounting\AccountRepository;
use Response;

class TransferCashBankController extends AppBaseController
{
    /** @var  TransferCashBankRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = TransferCashBankRepository::class;
    }

    /**
     * Display a listing of the TransferCashBank.
     *
     * @param TransferCashBankDataTable $transferCashBankDataTable
     * @return Response
     */
    public function index(TransferCashBankDataTable $transferCashBankDataTable)
    {
        return $transferCashBankDataTable->render('accounting.transfer_cash_banks.index');
    }

    /**
     * Show the form for creating a new Invoice.
     *
     * @return Response
     */
    public function create()
    {
        $optionItems = $this->getOptionItems();
        $dataTabs = [
            'masuk' => ['text' => 'Bukti Kas Masuk', 'json' => [], 'url' => '', 'defaultContent' => view('accounting.transfer_cash_banks.masuk_create')->with($optionItems), 'class' => 'active'],
            'keluar' => ['text' => 'Bukti Kas Keluar', 'json' => [], 'url' => '', 'defaultContent' => view('accounting.transfer_cash_banks.keluar_create')->with($optionItems), 'class' => ''],
        ];

        return view('accounting.transfer_cash_banks.create')->with('dataTabs', $dataTabs);
    }

    /**
     * Store a newly created TransferCashBank in storage.
     *
     * @param CreateTransferCashBankRequest $request
     *
     * @return Response
     */
    public function store(CreateTransferCashBankRequest $request)
    {
        $input = $request->all();

        $transferCashBank = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/transferCashBanks.singular')]));

        return redirect(route('accounting.transferCashBanks.index'));
    }

    /**
     * Display the specified TransferCashBank.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transferCashBank = $this->getRepositoryObj()->find($id);

        if (empty($transferCashBank)) {
            Flash::error(__('models/transferCashBanks.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.transferCashBanks.index'));
        }

        return view('accounting.transfer_cash_banks.show')->with('transferCashBank', $transferCashBank);
    }

    /**
     * Show the form for editing the specified TransferCashBank.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transferCashBank = $this->getRepositoryObj()->find($id);

        if (empty($transferCashBank)) {
            Flash::error(__('messages.not_found', ['model' => __('models/transferCashBanks.singular')]));

            return redirect(route('accounting.transferCashBanks.index'));
        }

        return view('accounting.transfer_cash_banks.edit')->with('transferCashBank', $transferCashBank)->with($this->getOptionItems());
    }

    /**
     * Update the specified TransferCashBank in storage.
     *
     * @param  int              $id
     * @param UpdateTransferCashBankRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransferCashBankRequest $request)
    {
        $transferCashBank = $this->getRepositoryObj()->find($id);

        if (empty($transferCashBank)) {
            Flash::error(__('messages.not_found', ['model' => __('models/transferCashBanks.singular')]));

            return redirect(route('accounting.transferCashBanks.index'));
        }

        $transferCashBank = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/transferCashBanks.singular')]));

        return redirect(route('accounting.transferCashBanks.index'));
    }

    /**
     * Remove the specified TransferCashBank from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transferCashBank = $this->getRepositoryObj()->find($id);

        if (empty($transferCashBank)) {
            Flash::error(__('messages.not_found', ['model' => __('models/transferCashBanks.singular')]));

            return redirect(route('accounting.transferCashBanks.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/transferCashBanks.singular')]));

        return redirect(route('accounting.transferCashBanks.index'));
    }

    /**
     * Provide options item based on relationship model TransferCashBank from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $account = new AccountRepository(app());
        $accountData = $account->all([], null, null ,['code', 'name']);
        return [
            'typeAccountItems' => ['kas_besar' => 'Kas Besar', 'kas_kecil' => 'Kas Kecil', 'giro' => 'Giro'],
            'accountItems' => ['' => __('crud.option.ekspedisi_placeholder')] + $accountData->pluck('code', 'code')->toArray(),
        ];
    }
}
