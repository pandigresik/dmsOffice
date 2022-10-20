<div class="table-responsive">
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
                        // if($tmpItem["ket"] == 'BKB') continue;
                        // $item->ket =  $tmpItem["ket"];           
                        $billingDoc = $tmpItem["BILLING DOKUMEN"] ?? 'not defined';                        
                        $docId = $tmpItem['ID. DOKUMEN'];
                        $tglDocId = phpDate(intval($tmpItem['TGL ID DOKUMEN']));
                        $depo = $tmpItem['DEPO INPUT BTB'];
                        $productName = $tmpItem['Produk'];
                        $qty = $tmpItem['QTY'];
                        $price = $tmpItem[' HARGA '];
                        $amountTotal = $tmpItem['TOTAL'];
                        $pelunasan = $invoice->state == 'pay' ? $price * $qty : 0;
                        $tglPelunasan = $invoice->state == 'pay' ? localFormatDate($invoice->updated_at) : '-';
                        $saldo = $invoice->state == 'pay' ? 0 : $price * $qty ;
                    @endphp                
            <tr>
                <td>{{ $billingDoc }}</td>
                <td>{{ $btb[$docId]->supplier->szName ?? '-'  }}</td>
                <td>{{ $btb[$docId]->ref_doc ?? '-'  }}</td>
                <td>{{ $depo }}</td>
                <td>{{ $docId }}</td>
                <td>{{ $tglDocId }}</td>
                <td>{{ $productName }}</td>
                <td class="text-right">{{ localNumberFormat($qty, 0) }}</td>
                <td class="text-right">{{ localNumberFormat($price, 0) }}</td>
                <td class="text-right">{{ localNumberFormat($qty * $price, 0) }}</td>
                <td>-</td>
                <td>{{ $tglPelunasan }}</td>
                <td>{{ localNumberFormat($pelunasan, 0) }}</td>
                <td>{{ localNumberFormat($saldo, 0) }}</td>
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
                <td class="text-right">{{ localNumberFormat($account['amount'], 0) }}</td>
                <td class="text-right">{{ localNumberFormat(0, 0) }}</td>
                <td class="text-right">{{ localNumberFormat($account['klaim_tiv'], 0) }}</td>
                <td class="text-right">{{ localNumberFormat($account['pot_harga'], 0) }}</td>
                <td class="text-right">{{ localNumberFormat($account['amount'] + $account['klaim_tiv'] + $account['pot_harga'], 0) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan=6>Data detail tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
    
    
</div>