<?php

namespace App\Http\Controllers\Finance;

use App\DataTables\Finance\PaymentDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Finance\CreatePaymentRequest;
use App\Http\Requests\Finance\UpdatePaymentRequest;
use App\Repositories\Finance\PaymentRepository;
use Flash;
use Response;

class PaymentController extends AppBaseController
{
    /** @var PaymentRepository */
    protected $repository;

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
        return $paymentDataTable->render('finance.payments.index');
    }

    /**
     * Show the form for creating a new Payment.
     *
     * @return Response
     */
    public function create()
    {
        return view('finance.payments.create')->with($this->getOptionItems());
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

        return redirect(route('finance.payments.index'));
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

            return redirect(route('finance.payments.index'));
        }

        return view('finance.payments.show')->with('payment', $payment);
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

            return redirect(route('finance.payments.index'));
        }

        return view('finance.payments.edit')->with('payment', $payment)->with($this->getOptionItems());
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

            return redirect(route('finance.payments.index'));
        }

        $payment = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/payments.singular')]));

        return redirect(route('finance.payments.index'));
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

            return redirect(route('finance.payments.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/payments.singular')]));

        return redirect(route('finance.payments.index'));
    }

    /**
     * Provide options item based on relationship model Payment from storage.
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
