<?php

namespace App\Http\Controllers\Finance;

use App\DataTables\Finance\PaymentLineDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Finance\CreatePaymentLineRequest;
use App\Http\Requests\Finance\UpdatePaymentLineRequest;
use App\Repositories\Finance\PaymentLineRepository;
use App\Repositories\Finance\PaymentRepository;
use App\Repositories\Purchase\InvoiceRepository;
use Flash;
use Response;

class PaymentLineController extends AppBaseController
{
    /** @var PaymentLineRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = PaymentLineRepository::class;
    }

    /**
     * Display a listing of the PaymentLine.
     *
     * @return Response
     */
    public function index(PaymentLineDataTable $paymentLineDataTable)
    {
        return $paymentLineDataTable->render('finance.payment_lines.index');
    }

    /**
     * Show the form for creating a new PaymentLine.
     *
     * @return Response
     */
    public function create()
    {
        return view('finance.payment_lines.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created PaymentLine in storage.
     *
     * @return Response
     */
    public function store(CreatePaymentLineRequest $request)
    {
        $input = $request->all();

        $paymentLine = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/paymentLines.singular')]));

        return redirect(route('finance.paymentLines.index'));
    }

    /**
     * Display the specified PaymentLine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paymentLine = $this->getRepositoryObj()->find($id);

        if (empty($paymentLine)) {
            Flash::error(__('models/paymentLines.singular').' '.__('messages.not_found'));

            return redirect(route('finance.paymentLines.index'));
        }

        return view('finance.payment_lines.show')->with('paymentLine', $paymentLine);
    }

    /**
     * Show the form for editing the specified PaymentLine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paymentLine = $this->getRepositoryObj()->find($id);

        if (empty($paymentLine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/paymentLines.singular')]));

            return redirect(route('finance.paymentLines.index'));
        }

        return view('finance.payment_lines.edit')->with('paymentLine', $paymentLine)->with($this->getOptionItems());
    }

    /**
     * Update the specified PaymentLine in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdatePaymentLineRequest $request)
    {
        $paymentLine = $this->getRepositoryObj()->find($id);

        if (empty($paymentLine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/paymentLines.singular')]));

            return redirect(route('finance.paymentLines.index'));
        }

        $paymentLine = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/paymentLines.singular')]));

        return redirect(route('finance.paymentLines.index'));
    }

    /**
     * Remove the specified PaymentLine from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paymentLine = $this->getRepositoryObj()->find($id);

        if (empty($paymentLine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/paymentLines.singular')]));

            return redirect(route('finance.paymentLines.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/paymentLines.singular')]));

        return redirect(route('finance.paymentLines.index'));
    }

    /**
     * Provide options item based on relationship model PaymentLine from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $invoice = new InvoiceRepository(app());
        $payment = new PaymentRepository(app());

        return [
            'invoiceItems' => ['' => __('crud.option.invoice_placeholder')] + $invoice->pluck(),
            'paymentItems' => ['' => __('crud.option.payment_placeholder')] + $payment->pluck(),
        ];
    }
}
