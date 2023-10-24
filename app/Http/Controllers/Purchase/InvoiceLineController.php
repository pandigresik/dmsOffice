<?php

namespace App\Http\Controllers\Purchase;

use App\DataTables\Purchase\InvoiceLineDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Purchase\CreateInvoiceLineRequest;
use App\Http\Requests\Purchase\UpdateInvoiceLineRequest;
use App\Models\Accounting\ShippingCostManual;
use App\Models\Purchase\BtbValidate;
use App\Models\Purchase\Invoice;
use App\Repositories\Purchase\InvoiceLineRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class InvoiceLineController extends AppBaseController
{
    /** @var InvoiceLineRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = InvoiceLineRepository::class;
    }

    /**
     * Display a listing of the InvoiceLine.
     *
     * @return Response
     */
    public function index(InvoiceLineDataTable $invoiceLineDataTable)
    {
        return $invoiceLineDataTable->render('purchase.invoice_lines.index');
    }

    public function createList(Request $request){
        return $this->create($request);
    }
    /**
     * Show list btb validate to be invoiced.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $type = $request->get('type');
        $partnerId = $request->get('partner_id');
        $branchId = $request->get('branchId');
        $startDate = $request->get('startDate');
        $endDate = $request->get('endDate');
        $endDate = $request->get('endDate');
        $listdoc = $request->get('listdoc') ?? [];
        $listbtb = $request->get('listbtb') ?? [];
        
        $btbObj = BtbValidate::whereBetween('btb_date', [$startDate, $endDate]);
        if (!empty($branchId)) {
            \Log::error($branchId);
            $btbObj->whereIn('branch_id', $branchId);
        }
        if (!empty($listbtb)) {
            $btbObj->whereIn('doc_id', $listbtb);
        }
        $shippingCostManual = null;
        if (Invoice::SUPPLIER == $type) {
            $btbValidated = $btbObj->canInvoicedSupplier($listdoc)->disableModelCaching()->get()->groupBy('product_name');
        } else {
            $queryShippingCostManual = ShippingCostManual::whereBetween('date', [$startDate, $endDate])->with(['details' => function ($q) {
                $q->with(['product']);
            }])->canInvoicedEkspedisi($partnerId, $listdoc);
            if (!empty($branchId)) {
                $queryShippingCostManual->whereIn('destination_branch_id', $branchId);
            }
            $shippingCostManual = $queryShippingCostManual->get();
            $btbValidated = $btbObj->canInvoicedEkspedisi($partnerId, $listdoc)->where('shipping_cost', '>', 0)->get()->groupBy('doc_id');
        }

        return view('purchase.invoice_lines.create')->with(['datas' => $btbValidated, 'shippingCostManual' => $shippingCostManual, 'type' => $type]);
    }

    /**
     * Store a newly created InvoiceLine in storage.
     *
     * @return Response
     */
    public function store(CreateInvoiceLineRequest $request)
    {
        $input = $request->all();

        $invoiceLine = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/invoiceLines.singular')]));

        return redirect(route('purchase.invoiceLines.index'));
    }

    /**
     * Display the specified InvoiceLine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoiceLine = $this->getRepositoryObj()->find($id);

        if (empty($invoiceLine)) {
            Flash::error(__('models/invoiceLines.singular').' '.__('messages.not_found'));

            return redirect(route('purchase.invoiceLines.index'));
        }

        return view('purchase.invoice_lines.show')->with('invoiceLine', $invoiceLine);
    }

    /**
     * Show the form for editing the specified InvoiceLine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoiceLine = $this->getRepositoryObj()->find($id);

        if (empty($invoiceLine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoiceLines.singular')]));

            return redirect(route('purchase.invoiceLines.index'));
        }

        return view('purchase.invoice_lines.edit')->with('invoiceLine', $invoiceLine)->with($this->getOptionItems());
    }

    /**
     * Update the specified InvoiceLine in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateInvoiceLineRequest $request)
    {
        $invoiceLine = $this->getRepositoryObj()->find($id);

        if (empty($invoiceLine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoiceLines.singular')]));

            return redirect(route('purchase.invoiceLines.index'));
        }

        $invoiceLine = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/invoiceLines.singular')]));

        return redirect(route('purchase.invoiceLines.index'));
    }

    /**
     * Remove the specified InvoiceLine from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoiceLine = $this->getRepositoryObj()->find($id);

        if (empty($invoiceLine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoiceLines.singular')]));

            return redirect(route('purchase.invoiceLines.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/invoiceLines.singular')]));

        return redirect(route('purchase.invoiceLines.index'));
    }

    /**
     * Provide options item based on relationship model InvoiceLine from storage.
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
