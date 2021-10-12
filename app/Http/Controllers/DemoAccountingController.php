<?php

namespace App\Http\Controllers;

use IFRS\Models\Entity;
use IFRS\Models\Account;
use IFRS\models\LineItem;
use Illuminate\Http\Request;
use IFRS\Transactions\CashSale;
use IFRS\Models\ReportingPeriod;
use IFRS\Reports\IncomeStatement;
use IFRS\Reports\CashFlowStatement;

class DemoAccountingController extends Controller
{
    public function index(){
        /** dikerjakan sekali tiap tahun */
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

        // $cashSale->addLineItem($cashSaleLineItem);
        // $cashSale->post(); // This posts the Transaction to the Ledger
        // return $cashSale;
        $entity = Entity::find(1);
        $incomeStatement = new IncomeStatement(
            "2021-01-01",   // Report start date
            "2021-12-31", // Report end date
            $entity
        );
        $cashFlow = new CashFlowStatement(
            "2021-01-01",   // Report start date
            "2021-12-31", // Report end date
            $entity
        );
        $incomeStatement->getSections();// Fetch balances from the ledger and store them internally
        $cashFlow->getSections();
        /**
        * this function is only for demonstration and
        * debugging use and should never be called in production
        */
        //dd($incomeStatement->toString());
        //dd($incomeStatement);
        echo '<pre>';
        $incomeStatement->toString();
        echo '=================================================';
        $cashFlow->toString();
    }
}
