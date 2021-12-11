<?php

namespace App\Http\Controllers\Finance;

use App\DataTables\Finance\PaymentDataTable;
use App\Repositories\Finance\PaymentInRepository;
use Response;

class PaymentInController extends PaymentController
{
    /** @var PaymentRepository */
    protected $repository;
    protected $baseViewPath = 'finance.payments_in';
    protected $baseRoute = 'finance.paymentIns';

    public function __construct()
    {
        $this->repository = PaymentInRepository::class;
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
}
