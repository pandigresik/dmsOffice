<?php

namespace App\Repositories\Finance;

use App\Models\Accounting\JournalAccount;
use App\Models\Finance\PaymentOut;

/**
 * Class PaymentRepository.
 *
 * @version December 8, 2021, 9:49 pm WIB
 */
class PaymentOutRepository extends PaymentRepository
{
    /**
     * Configure the Model.
     */
    public function model()
    {
        return PaymentOut::class;
    }

    public function update($input, $id)
    {
        $this->model->getConnection()->beginTransaction();
        try {
            $model = parent::update($input, $id);        
            /** create jurnal */
            $paydate = $input['pay_date'];
            $invoice = $model->invoices()->first();
            $paymentType = $invoice->partner_type;
            $reference = $model->number;
            
            switch($paymentType){
                case 'ekspedisi':
                    $this->generateJurnalPaymentEkspedisi($model->getRawOriginal('amount'), $paydate, $reference);
                    break;
                default:                 
                    $payment = $model->with(['invoices' => function($q){
                        return $q->with(['invoiceLines']);
                    }])->find($id);
            
                    $totalInvoiceLine = $payment->invoices->sum(function($item){
                        return $item->invoiceLines->sum(function($r){
                            return $r->getRawOriginal('qty') * $r->getRawOriginal('price');
                        });
                    });
                    
                    $totalSubsidiOa = $payment->invoices->sum(function($item){
                        return $item->subsidiOa->sum(function($r){
                            return $r->getRawOriginal('amount');
                        });
                    });

                    $this->generateJurnalPaymentSupplier($totalInvoiceLine, $model->getRawOriginal('amount'), $paydate, $reference, $totalSubsidiOa);
            }
            $this->model->getConnection()->commit();
            return $model;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();
            return $e->getMessage();
        }        
    }
    /*
    233	Bank sejati 55	110210
    137	Hutang dagang tiv	211001
    192	Hutang ongkos angkut	211104
    825010 Biaya Pengangkutan
    */
    private function generateJurnalPaymentSupplier($totalInvoiceLine, $amount, $paydate, $reference, $totalSubsidiOa){
        JournalAccount::create([
            'account_id' => 211001,
            'branch_id' => 'PT',
            'date' => $paydate,
            'name' => 'Hutang dagang tiv',
            'debit' => 0,
            'credit' => $totalInvoiceLine,
            'balance' => -1 * $totalInvoiceLine,
            'reference' => $reference,
            'type' => 'JPAY',
            'state' => 'posted',
        ]);

        JournalAccount::create([
            'account_id' => 110210,
            'branch_id' => 'PT',
            'date' => $paydate,
            'name' => 'Bank sejati 55',
            'debit' => 0,
            'credit' => $amount,
            'balance' => -1 * $amount,
            'reference' => $reference,
            'type' => 'JPAY',
            'state' => 'posted',
        ]);

        if(!empty($totalSubsidiOa)){
            JournalAccount::create([
                'account_id' => 825010,
                'branch_id' => 'PT',
                'date' => $paydate,
                'name' => 'Biaya Pengangkutan',
                'debit' => 0,
                'credit' => $totalSubsidiOa,
                'balance' => -1 * $totalSubsidiOa,
                'reference' => $reference,
                'type' => 'JPAY',
                'state' => 'posted',
            ]); 
        }
    }

    private function generateJurnalPaymentEkspedisi($amount, $paydate, $reference){
        JournalAccount::create([
            'account_id' => 211104,
            'branch_id' => 'PT',
            'date' => $paydate,
            'name' => 'Hutang ongkos angkut',
            'debit' => 0,
            'credit' => $amount,
            'balance' => -1 * $amount,
            'reference' => $reference,
            'type' => 'JPAY',
            'state' => 'posted',
        ]);

        JournalAccount::create([
            'account_id' => 110210,
            'branch_id' => 'PT',
            'date' => $paydate,
            'name' => 'Bank sejati 55',
            'debit' => 0,
            'credit' => $amount,
            'balance' => -1 * $amount,
            'reference' => $reference,
            'type' => 'JPAY',
            'state' => 'posted',
        ]);
    }
}
