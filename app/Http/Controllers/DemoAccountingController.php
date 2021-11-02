<?php

namespace App\Http\Controllers;

class DemoAccountingController extends Controller
{
    public function index()
    {
        // dikerjakan sekali tiap tahun
        // $period = ReportingPeriod::create([
        //     'period_count' => 1,
        //     'calendar_year' => '2021',
        //     'status' => 'OPEN',
        //     'entity_id' => 1,
        // ]);

        // $bankAccount = \App\Models\Accounting\IfrsAccounts::whereAccountType(Account::BANK)->first();
        // $cashSale = CashSale::create([
        //     'account_id' => $bankAccount->id,
        //     'date' => \Carbon\Carbon::now(),
        //     'entity_id' => 1,
        //     'narration' => "Example Cash Sale",
        // ]);

        // $outputVat = \App\Models\Accounting\IfrsVats::whereCode('O')->first();
        // $revenueAccount = \App\Models\Accounting\IfrsAccounts::whereAccountType(Account::OPERATING_REVENUE)->first();
        // $salesVatAccount= \App\Models\Accounting\IfrsAccounts::whereAccountType(Account::CONTROL)->whereName('Sales VAT Account')->first();
        // $cashSaleLineItem = LineItem::create([
        //     'vat_id' => $outputVat->id,
        //     'account_id' => $revenueAccount->id,
        //     'vat_account_id' => $salesVatAccount->id,
        //     'narration' => "Example Cash Sale Line Item",
        //     'quantity' => 1,
        //     'entity_id' => 1,
        //     'amount' => 100,
        // ]);
    }
}
