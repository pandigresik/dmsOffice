<?php

namespace App\Http\Controllers\Purchase;

use App\DataTables\Purchase\InvoiceDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Purchase\CreateInvoiceRequest;
use App\Http\Requests\Purchase\UpdateInvoiceRequest;
use App\Models\Purchase\BtbValidate;
use App\Repositories\Base\DmsApSupplierRepository;
use App\Repositories\Purchase\InvoiceRepository;
use Flash;
use Response;

class InvoiceController extends AppBaseController
{
    /** @var InvoiceRepository */
    protected $repository;

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
        return $invoiceDataTable->render('purchase.invoices.index');
    }

    /**
     * Show the form for creating a new Invoice.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchase.invoices.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Invoice in storage.
     *
     * @return Response
     */
    public function store(CreateInvoiceRequest $request)
    {
        $input = $request->all();

        $invoice = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/invoices.singular')]));

        return redirect(route('purchase.invoices.index'));
    }

    /**
     * Display the specified Invoice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoice = $this->getRepositoryObj()->find($id);

        if (empty($invoice)) {
            Flash::error(__('models/invoices.singular').' '.__('messages.not_found'));

            return redirect(route('purchase.invoices.index'));
        }

        return view('purchase.invoices.show')->with('invoice', $invoice);
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
        $invoice = $this->getRepositoryObj()->find($id);

        if (empty($invoice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoices.singular')]));

            return redirect(route('purchase.invoices.index'));
        }

        return view('purchase.invoices.edit')->with('invoice', $invoice)->with($this->getOptionItems());
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

            return redirect(route('purchase.invoices.index'));
        }

        $invoice = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/invoices.singular')]));

        return redirect(route('purchase.invoices.index'));
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

            return redirect(route('purchase.invoices.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/invoices.singular')]));

        return redirect(route('purchase.invoices.index'));
    }

    /**
     * Provide options item based on relationship model Invoice from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $supplier = new DmsApSupplierRepository(app());

        return [
            'partnerItem' => ['' => __('crud.option.supplier_placeholder')] + $supplier->pluck(),            
        ];
    }
}
