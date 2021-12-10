<?php

namespace App\Widgets;

use Akaunting\Money\Money;
use Arrilot\Widgets\AbstractWidget;
use App\Repositories\Purchase\InvoiceRepository;
use App\Repositories\Finance\PaymentOutRepository;

class HutangSupplierWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $bill = new InvoiceRepository(app());
        $payment = new PaymentOutRepository(app());
        $billToValidate = $bill->billValidate();
        $billToPay = $payment->paymentToPay();
        $data = [
            ['text' => ( $billToValidate->qty ?? 0 ).' Bill to validate', 'amount' => Money::IDR($billToValidate->amount ?? 0 , true), 'url' => route('finance.paymentOuts.create')],
            ['text' => ( $billToPay->qty ?? 0 ).' Bill to pay', 'amount' => Money::IDR($billToPay->amount ?? 0 , true), 'url' => route('finance.paymentOuts.index')],
        ];
        return view('widgets.hutang_supplier_widget', [
            'config' => $this->config,
            'data' => $data
        ]);
    }
}
