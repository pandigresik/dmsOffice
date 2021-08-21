<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\AccountInvoiceDataTable;
use App\Http\Requests\Accounting;
use App\Http\Requests\Accounting\CreateAccountInvoiceRequest;
use App\Http\Requests\Accounting\UpdateAccountInvoiceRequest;
use App\Repositories\Accounting\AccountInvoiceRepository;
use App\Repositories\Accounting\AccountJournalRepository;
use App\Repositories\Base\CompanyRepository;
use App\Repositories\Base\VendorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AccountInvoiceController extends AppBaseController
{
    /** @var  AccountInvoiceRepository */
    private $accountInvoiceRepository;

    public function __construct(AccountInvoiceRepository $accountInvoiceRepo)
    {
        $this->accountInvoiceRepository = $accountInvoiceRepo;
    }

    /**
     * Display a listing of the AccountInvoice.
     *
     * @param AccountInvoiceDataTable $accountInvoiceDataTable
     * @return Response
     */
    public function index(AccountInvoiceDataTable $accountInvoiceDataTable)
    {
        return $accountInvoiceDataTable->render('accounting.account_invoices.index');
    }

    /**
     * Show the form for creating a new AccountInvoice.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.account_invoices.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created AccountInvoice in storage.
     *
     * @param CreateAccountInvoiceRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountInvoiceRequest $request)
    {
        $input = $request->all();

        $accountInvoice = $this->accountInvoiceRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accountInvoices.singular')]));

        return redirect(route('accounting.accountInvoices.index'));
    }

    /**
     * Display the specified AccountInvoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountInvoice = $this->accountInvoiceRepository->find($id);

        if (empty($accountInvoice)) {
            Flash::error(__('models/accountInvoices.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.accountInvoices.index'));
        }

        return view('accounting.account_invoices.show')->with('accountInvoice', $accountInvoice);
    }

    /**
     * Show the form for editing the specified AccountInvoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountInvoice = $this->accountInvoiceRepository->find($id);

        if (empty($accountInvoice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountInvoices.singular')]));

            return redirect(route('accounting.accountInvoices.index'));
        }

        return view('accounting.account_invoices.edit')->with('accountInvoice', $accountInvoice)->with($this->getOptionItems());
    }

    /**
     * Update the specified AccountInvoice in storage.
     *
     * @param  int              $id
     * @param UpdateAccountInvoiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountInvoiceRequest $request)
    {
        $accountInvoice = $this->accountInvoiceRepository->find($id);

        if (empty($accountInvoice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountInvoices.singular')]));

            return redirect(route('accounting.accountInvoices.index'));
        }

        $accountInvoice = $this->accountInvoiceRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accountInvoices.singular')]));

        return redirect(route('accounting.accountInvoices.index'));
    }

    /**
     * Remove the specified AccountInvoice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountInvoice = $this->accountInvoiceRepository->find($id);

        if (empty($accountInvoice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountInvoices.singular')]));

            return redirect(route('accounting.accountInvoices.index'));
        }

        $this->accountInvoiceRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accountInvoices.singular')]));

        return redirect(route('accounting.accountInvoices.index'));
    }

    /**
     * Provide options item based on relationship model AccountInvoice from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $accountJournal = new AccountJournalRepository(app());
        $company = new CompanyRepository(app());
        $vendor = new VendorRepository(app());
        return [
            'accountJournalItems' => ['' => __('crud.option.accountJournal_placeholder')] + $accountJournal->pluck(),
            'companyItems' => ['' => __('crud.option.company_placeholder')] + $company->pluck(),
            'vendorItems' => ['' => __('crud.option.vendor_placeholder')] + $vendor->pluck()            
        ];
    }
}
