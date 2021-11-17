<?php

namespace App\Widgets;

use Akaunting\Money\Money;
use Arrilot\Widgets\AbstractWidget;

class HutangEkspedisiWidget extends AbstractWidget
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
            ['text' => '2 Bill to validate', 'amount' => Money::IDR(5000000, true), 'url' => ''],
            ['text' => '6 Bill to pay', 'amount' => Money::IDR(75000000, true), 'url' => ''],
        ];
        return view('widgets.hutang_ekspedisi_widget', [
            'config' => $this->config,
            'data' => $data
        ]);
    }
}
