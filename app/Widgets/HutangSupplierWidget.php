<?php

namespace App\Widgets;

use Akaunting\Money\Money;
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
        $data = [
            ['text' => '1 Bill to validate', 'amount' => Money::IDR(25000000, true), 'url' => ''],
            ['text' => '3 Bill to pay', 'amount' => Money::IDR(8000000, true), 'url' => ''],
        ];
        return view('widgets.hutang_supplier_widget', [
            'config' => $this->config,
            'data' => $data
        ]);
    }
}
