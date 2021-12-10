<?php

namespace App\Http\Controllers\Finance;

use App\DataTables\Finance\PaymentDataTable;
use App\DataTables\Finance\PaymentOutDataTable;
use App\Repositories\Finance\PaymentOutRepository;

class PaymentOutController extends PaymentController
{
    /** @var PaymentRepository */
    protected $repository;
    protected $baseViewPath = 'finance.payments_out';
    protected $baseRoute = 'finance.paymentOuts';

    public function __construct()
    {
        $this->repository = PaymentOutRepository::class;
    }

        /**
     * Display a listing of the Payment.
     *
     * @return Response
     */
    public function index(PaymentDataTable $paymentDataTable)
    {
        $paymentDataTable = new PaymentOutDataTable(app());
        return $paymentDataTable->render($this->baseViewPath.'.index', $this->getOptionItems());
    }
    
}
