<?php

namespace App\Http\Controllers\Purchase;

use App\DataTables\Purchase\InvoiceDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Purchase\CreateInvoiceRequest;
use App\Http\Requests\Purchase\UpdateInvoiceRequest;
use App\Models\Purchase\InvoiceBkb;
use App\Repositories\Base\DmsApSupplierRepository;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Inventory\DmsInvCarrierRepository;
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
        $optionItems = $this->getOptionItems();
        $dataTabs = [
            'supplier' => ['text' => 'Supplier', 'json' => [], 'url' => '', 'defaultContent' => view('purchase.invoices.supplier_create')->with($optionItems), 'class' => 'active'],
            'ekspedisi' => ['text' => 'Ekspedisi', 'json' => [], 'url' => '', 'defaultContent' => view('purchase.invoices.ekspedisi_create')->with($optionItems), 'class' => ''],
        ];

        return view('purchase.invoices.create')->with('dataTabs', $dataTabs);
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
    protected function getOptionItems()
    {
        $supplier = new DmsApSupplierRepository(app());
        $ekspedisi = new DmsInvCarrierRepository(app());
        $branch = new DmsSmBranchRepository(app());

        // untuk supplier hanya menampilkan TIV saja
        return [
            //    'branchItems' => $branch->pluck([], null, null, 'szId', 'szName'),
            'partnerItem' => ['' => __('crud.option.supplier_placeholder')] + $supplier->all(['szId' => 'TIV'])->pluck('szName', 'szId')->toArray(),
            'ekspedisiItem' => ['' => __('crud.option.ekspedisi_placeholder')] + $ekspedisi->all()->pluck('szName', 'szId')->toArray(),
            'branchItem' => $branch->all()->pluck('szName', 'szId')->toArray(),
        ];
    }

    public function downloadBkb(int $invoiceId)
    {                        
        $modelEksport = '\\App\Exports\\Template\\Purchase\\InvoiceBkbExport';
        $fileName = 'invoice_bkb_'.$invoiceId;

        return (new $modelEksport($invoiceId))->download($fileName.'.xls');
    }
}
