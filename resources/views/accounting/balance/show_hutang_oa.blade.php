<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SUPPLIER</th><th>TRUCKING</th><th>NO INVOICE</th><th>IDCO</th><th>SJ Pabrik</th><th>NAMA DEPO</th><th>NO.BTB DEPO</th><th>TGL. BTB</th><th>PRODUK</th><th>QTY</th><th>TARIF OA</th><th>SALDO AWAL</th><th>INV BARU</th><th>TANGGAL PELUNASAN</th><th>JUMLAH PELUNASAN</th><th>SALDO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($balance['invoices'] as $index => $invoice)                
                @foreach ($invoice->btb as $item)
                    @php                                                                        
                        $supplier = $item->supplier->szName ?? '-';   
                        $ekspedisi = $item->ekspedisi->szName ?? '-';                        
                        $depo = $item->branch->szName ?? '-';                        
                        $saldoAwal = $item->shipping_cost ?? 0;
                        $pelunasan = $invoice->state == 'pay' ? $saldoAwal : 0;
                        $tglPelunasan = $invoice->state == 'pay' ? localFormatDate($invoice->updated_at) : '-';
                        $saldo = $invoice->state == 'pay' ? 0 : $saldoAwal ;
                    @endphp                
            <tr>
                <td>{{ $supplier }}</td>
                <td>{{ $ekspedisi  }}</td>
                <td>{{ $invoice->number  }}</td>
                <td>{{ $item->co_reference }}</td>
                <td>{{ $item->ref_doc }}</td>
                <td>{{ $depo }}</td>
                <td>{{ $item->doc_id }}</td>
                <td>{{ $item->btb_date }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->shipping_cost }}</td>
                <td class="text-right">{{ $saldoAwal }}</td>
                <td>{{ $item->btb_date }}</td>                
                <td>-</td>
                <td>{{ $tglPelunasan }}</td>
                <td class="text-right">{{ $pelunasan }}</td>
                <td class="text-right">{{ $saldo }}</td>
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