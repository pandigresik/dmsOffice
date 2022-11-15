<?php

namespace App\Http\Controllers\Purchase;

use App\DataTables\Purchase\InvoiceDataTable;
use App\DataTables\Purchase\InvoiceSubmitDataTable;
use App\Http\Requests\Purchase\UpdateInvoiceRequest;
use App\Models\Purchase\Invoice;
use App\Repositories\Purchase\InvoiceRepository;
use Flash;
use Response;

class InvoiceValidateController extends InvoiceController
{
    /** @var InvoiceRepository */
    protected $repository;
    private $justView = false;
    public function __construct()
    {
        $this->repository = InvoiceRepository::class;
    }

    /**
     * Display a listing of the Invoice.
     *
     * @return Response
     */
    public function index(InvoiceDataTable $invoiceDataTable)
    {
        $invoiceDataTable = new InvoiceSubmitDataTable();

        return $invoiceDataTable->render('purchase.invoices.index');
    }

    /**
     * Show the form for editing the specified Invoice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoice = Invoice::with(['invoiceLines' => function($q){
            return $q->with(['btb']);
        }])->find($id);

        if (empty($invoice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoices.singular')]));

            return redirect(route('purchase.invoiceValidates.index'));
        }

        return view('purchase.invoice_validates.edit')->with(['invoice' => $invoice, 'justView' => $this->justView])->with($this->getOptionItems());
    }

    public function show($id)
    {
        $this->justView = true;
        return $this->edit($id);
    }

    /**
     * Update the specified Invoice in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateInvoiceRequest $request)
    {
        $invoice = $this->getRepositoryObj()->find($id);

        if (empty($invoice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoices.singular')]));

            return redirect(route('purchase.invoiceValidates.index'));
        }

        $invoice = $this->getRepositoryObj()->validate($id);
        Flash::success(__('messages.updated', ['model' => __('models/invoices.singular')]));

        return redirect(route('purchase.invoiceValidates.index'));
    }

    /**
     * Remove the specified Invoice from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoice = $this->getRepositoryObj()->find($id);

        if (empty($invoice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoices.singular')]));

            return redirect(route('purchase.invoiceValidates.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/invoices.singular')]));

        return redirect(route('purchase.invoiceValidates.index'));
    }
}
