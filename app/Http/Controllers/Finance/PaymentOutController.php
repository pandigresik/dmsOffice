<?php

namespace App\Http\Controllers\Finance;

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
}
