<?php

namespace App\Http\Controllers\Finance;

use App\DataTables\Finance\PaymentDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Finance\CreatePaymentRequest;
use App\Http\Requests\Finance\UpdatePaymentRequest;
use App\Repositories\Finance\PaymentRepository;
use App\Repositories\Purchase\InvoiceRepository;
use Flash;
use Response;

class PaymentController extends AppBaseController
{
    /** @var PaymentRepository */
    protected $repository;
    protected $baseViewPath = 'finance.payments';
    protected $baseRoute = 'finance.payments';

    public function __construct()
    {
        $this->repository = PaymentRepository::class;
    }

    /**
     * Display a listing of the Payment.
     *
     * @return Response
     */
    public function index(PaymentDataTable $paymentDataTable)
    {
        return $paymentDataTable->render($this->baseViewPath.'.index', $this->getOptionItems());
    }

    /**
     * Show the form for creating a new Payment.
     *
     * @return Response
     */
    public function create()
    {
        $validatedInvoice = [];
        $partnerType = request()->get('partner_type');
        $invoice = new InvoiceRepository(app());
        $readyPayment = $invoice->readyPayment($partnerType);
        if ($readyPayment) {
            $validatedInvoice = $readyPayment->groupBy('partner_id');
        }

        return view($this->baseViewPath.'.create')->with('invoices', $validatedInvoice)->with($this->getOptionItems());
    }

    /**
     * Store a newly created Payment in storage.
     *
     * @return Response
     */
    public function store(CreatePaymentRequest $request)
    {
        $input = $request->all();

        $payment = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/payments.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Display the specified Payment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $payment = $this->getRepositoryObj()->find($id);

        if (empty($payment)) {
            Flash::error(__('models/payments.singular').' '.__('messages.not_found'));

            return redirect(route($this->baseRoute.'.index'));
        }

        return view($this->baseViewPath.'.show')->with('payment', $payment);
    }

    /**
     * Show the form for editing the specified Payment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $payment = $this->getRepositoryObj()->find($id);

        if (empty($payment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/payments.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        return view($this->baseViewPath.'.edit')->with('payment', $payment)->with($this->getOptionItems());
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdatePaymentRequest $request)
    {
        $payment = $this->getRepositoryObj()->find($id);

        if (empty($payment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/payments.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $payment = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/payments.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Remove the specified Payment from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $payment = $this->getRepositoryObj()->find($id);

        if (empty($payment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/payments.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/payments.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Provide options item based on relationship model Payment from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    protected function getOptionItems()
    {
        return [
            'baseRoute' => $this->baseRoute,
            'baseViewPath' => $this->baseViewPath,
        ];
    }
}
