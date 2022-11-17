@php
    $uniqueBtb = [];
    $exportExcel = $exportExcel ?? false;
@endphp
<div class="">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SUPPLIER</th><th>TRUCKING</th><th>NO INVOICE</th><th>IDCO</th><th>SJ Pabrik</th><th>NAMA DEPO</th><th>NO.BTB DEPO</th><th>TGL. BTB</th><th>PRODUK</th><th>QTY</th><th>TARIF OA</th><th>SALDO AWAL</th><th>INV BARU</th><th>TANGGAL PELUNASAN</th><th>JUMLAH PELUNASAN</th><th>SALDO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($balance['invoices'] as $index => $item)                            
                    @php                                                 
                        if(isset($uniqueBtb[$item->doc_id])){
                            continue;
                        }                        
                        $uniqueBtb[$item->doc_id] = 1;
                        $invoice = $item->invoiceEkspedisi;
                        $supplier = $item->supplier->szName ?? '-';   
                        $ekspedisi = $item->ekspedisi->szName ?? '-';                        
                        $depo = $item->branch->szName ?? '-';                        
                        $saldoAwal = $item->getRawOriginal('shipping_cost') ?? 0;
                        $pelunasan = 0;
                        $tglPelunasan =  '-';
                        $saldo = $saldoAwal ;
                        
                        if($saldoAwal <= 0){
                            continue;
                        } 

                        if($invoice){
                            $pelunasan = $invoice->state == 'pay' ? $saldoAwal : 0;
                            $tglPelunasan = $invoice->state == 'pay' ? localFormatDate($invoice->paymentLine->payment->pay_date) : '-';
                            $saldo = $invoice->state == 'pay' ? 0 : $saldoAwal ;
                        }                        
                    @endphp                
            <tr>
                <td>{{ $supplier }}</td>
                <td>{{ $ekspedisi  }}</td>
                <td>{{ $invoice->reference ?? ''  }}</td>
                <td>{{ $item->co_reference }}</td>
                <td>{{ $item->ref_doc }}</td>
                <td>{{ $depo }}</td>
                <td>{{ $item->doc_id }}</td>
                <td>{{ $item->btb_date }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $exportExcel ? $item->getRawOriginal('qty') : $item->qty }}</td>
                <td>{{ $exportExcel ? $item->getRawOriginal('shipping_cost') :$item->shipping_cost }}</td>
                <td>-</td>
                <td class="text-right">{{ $exportExcel ? $saldoAwal : localNumberFormat($saldoAwal, 0) }}</td>                
                <td>{{ $tglPelunasan }}</td>
                <td class="text-right">{{ $exportExcel ? $pelunasan : localNumberFormat($pelunasan, 0) }}</td>
                <td class="text-right">{{ $exportExcel ? $saldo : localNumberFormat($saldo, 0) }}</td>                
            </tr>
            @empty            
            @endforelse

            @forelse($balance['oamanuals'] as $index => $item)                            
                    @php                                                                                                                      
                        $invoice = $item->invoiceEkspedisi;
                        $supplier = $item->originBranch->szName ?? '-';
                        $ekspedisi = $item->ekspedisi->szName ?? '-';                        
                        $depo = $item->destinationBranch->szName ?? '-';                        
                        $saldoAwal = $item->getRawOriginal('amount') ?? 0;
                        $pelunasan = 0;
                        $tglPelunasan =  '-';
                        $saldo = $saldoAwal ;                        

                        if($invoice){
                            $pelunasan = $invoice->state == 'pay' ? $saldoAwal : 0;
                            $tglPelunasan = $invoice->state == 'pay' ? localFormatDate($invoice->paymentLine->payment->pay_date) : '-';
                            $saldo = $invoice->state == 'pay' ? 0 : $saldoAwal ;
                        }                        
                    @endphp                
            <tr>
                <td>{{ $supplier }}</td>
                <td>{{ $ekspedisi  }}</td>
                <td>{{ $invoice->reference ?? ''  }}</td>
                <td>{{ $item->co_references }}</td>
                <td>{{ $item->do_references }}</td>
                <td>{{ $depo }}</td>
                <td>{{ $item->number }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->product_name ?? '-' }}</td>
                <td>-</td>
                <td>{{ $exportExcel ? $item->getRawOriginal('amount') : localNumberFormat($item->amount, 0) }}</td>
                <td>-</td>
                <td class="text-right">{{ $exportExcel ? $saldoAwal : localNumberFormat($saldoAwal, 0) }}</td>                
                <td>{{ $tglPelunasan }}</td>
                <td class="text-right">{{ $exportExcel ? $pelunasan : localNumberFormat($pelunasan, 0) }}</td>
                <td class="text-right">{{ $exportExcel ? $saldo : localNumberFormat($saldo, 0) }}</td>                
            </tr> 
            @empty           
            @endforelse
        </tbody>
    </table>
    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>REFERENCE</th><th>NO INVOICE</th><th>TANGGAL PELUNASAN</th><th>JUMLAH PEMBAYARAN</th>
            </tr>
        </thead>
        <tbody>
            @forelse($balance['pembayarans'] as $index => $account)                        
            <tr>
                <td>{{ $account['reference'] }}</td>
                <td>{{ $account['number'] }}</td>
                <td>{{ localFormatDate($account['pay_date']) }}</td>
                <td class="text-right">{{ localNumberFormat($account['amount'], 0) }}</td>                
            </tr>
            @empty
            <tr>
                <td colspan=4>Data detail tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
    
    
</div>