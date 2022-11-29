@php
    $exportExcel = $exportExcel ?? false;
@endphp
<div class="">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>BILLING DOC</th><th>FACTORY PLAN</th><th>SJP DMS</th><th>DEPO PENERIMA</th><th>ID BTB/BKB DEPO</th><th>TGL BTB/BKB</th><th>PRODUK</th><th>QTY</th><th>HARGA BELI</th><th>SALDO AWAL</th><th>INV BARU</th><th>TANGGAL PELUNASAN</th><th>JUMLAH PELUNASAN</th><th>SALDO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($balance['invoices'] as $index => $invoice)
                @php
                    $btb = $invoice->btb->keyBy('doc_id');                    
                @endphp
                @foreach ($invoice->invoiceBkb as $item)
                    @php                                                
                        $tmpItem = $item->additional_info;                            
                        $billingDoc = $tmpItem["BILLING DOKUMEN"] ?? 'not defined';                        
                        $docId = $tmpItem['ID. DOKUMEN'];
                        $tglDocId = phpDate(intval($tmpItem['TGL ID DOKUMEN']));
                        $depo = $tmpItem['DEPO INPUT BTB'];
                        $productName = $tmpItem['Produk'];
                        $qty = $tmpItem['QTY'];
                        $price = $tmpItem[' HARGA '];
                        $amountTotal = $tmpItem['TOTAL'];
                        $cost = $price * $qty;
                        $saldoAwal = $tglDocId < $startDate ? $cost : 0;
                        $newInvoice = $tglDocId < $startDate ? 0 : $cost; 
                        $pelunasan = $invoice->state == 'pay' ? $cost : 0;
                        $tglPelunasan = $invoice->state == 'pay' ? localFormatDate($invoice->paymentLine->payment->pay_date) : '-';
                        $saldo = $invoice->state == 'pay' ? 0 : $cost ;
                        
                    @endphp                
            <tr>
                <td>{{ $billingDoc }}</td>
                <td>{{ $btb[$docId]->supplier->szName ?? '-'  }}</td>
                <td>{{ $btb[$docId]->ref_doc ?? '-'  }}</td>
                <td>{{ $depo }}</td>
                <td>{{ $docId }}</td>
                <td>{{ $tglDocId }}</td>
                <td>{{ $productName }}</td>
                <td class="text-right">{{ $exportExcel ? $qty : localNumberFormat($qty, 0) }}</td>
                <td class="text-right">{{ $exportExcel ? $price : localNumberFormat($price, 0) }}</td>
                <td class="text-right">{{ $exportExcel ? ($saldoAwal) : localNumberFormat($saldoAwal, 0) }}</td>
                <td class="text-right">{{ $exportExcel ? ($newInvoice) : localNumberFormat($newInvoice, 0) }}</td>
                <td>{{ $tglPelunasan }}</td>
                <td>{{ $exportExcel ? $pelunasan : localNumberFormat($pelunasan, 0) }}</td>
                <td>{{ $exportExcel ? $saldo : localNumberFormat($saldo, 0) }}</td>
            </tr>
            @endforeach
            @empty
            <tr>
                <td colspan=12>Data detail tidak ditemukan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>TANGGAL</th><th>PEMBAYARAN</th><th>SLIP</th><th>PENCAIRAN KLAIM TIV</th><th>SUBSIDI OA</th><th>TOTAL TAGIHAN</th>
            </tr>
        </thead>
        <tbody>
            @forelse($balance['pembayarans'] as $index => $account)                        
            <tr>
                <td>{{ localFormatDate($account['pay_date']) }}</td>
                <td class="text-right">{{ $exportExcel ? $account['amount'] : localNumberFormat($account['amount'], 0) }}</td>
                <td class="text-right">{{ $exportExcel ? 0 : localNumberFormat(0, 0) }}</td>
                <td class="text-right">{{ $exportExcel ? $account['klaim_tiv'] : localNumberFormat($account['klaim_tiv'], 0) }}</td>
                <td class="text-right">{{ $exportExcel ? $account['pot_harga'] : localNumberFormat($account['pot_harga'], 0) }}</td>
                <td class="text-right">{{ $exportExcel ? ($account['amount'] + $account['klaim_tiv'] + $account['pot_harga']) : localNumberFormat($account['amount'] + $account['klaim_tiv'] + $account['pot_harga'], 0) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan=6>Data detail tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
    
    
</div>