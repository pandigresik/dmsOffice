<?php

namespace App\Widgets;

use Akaunting\Money\Money;
use App\Repositories\Purchase\InvoiceRepository;
use Arrilot\Widgets\AbstractWidget;

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
        $billToValidate = $bill->billSubmit();
        $billToPay = $bill->billValidate();
        $data = [
            ['text' => ( $billToValidate->qty ?? 0 ).' Bill to validate', 'amount' => Money::IDR($billToValidate->amount ?? 0 , true), 'url' => route('purchase.invoiceValidates.index')],
            ['text' => ( $billToPay->qty ?? 0 ).' Bill to pay', 'amount' => Money::IDR($billToPay->amount ?? 0 , true), 'url' => ''],
        ];
        return view('widgets.hutang_supplier_widget', [
            'config' => $this->config,
            'data' => $data
        ]);
    }
}
