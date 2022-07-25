@php
    
@endphp
<div class="table-responsive">
    <div class="text-center">
        <h3>Laporan Hutang</h3>
        <h4>Periode {{ localFormatDate($startDate) }} sd {{ localFormatDate($endDate) }}</h4>
    </div>    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="2">Tgl BTB</th>
                <th rowspan="2">No BTB</th>                
                <th rowspan="2">Billing</th>
                <th rowspan="2">Nama Supplier</th>
                <th rowspan="2">No CO</th>
                <th rowspan="2">No DN</th>
                <th rowspan="2">Depo</th>
                <th rowspan="2">Nama Produk</th>
                <th rowspan="2">Qty</th>
                <th rowspan="2">Tarif OA</th>
                <th rowspan="2">Saldo Awal</th>
                <th rowspan="2">Invoice Baru</th>
                <th colspan="2">Pembayaran</th>
                <th rowspan="2">Saldo Akhir</th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>            
            @forelse ($data as $item)
            <tr>
                <td>{{ localFormatDate($item->btb_date) }}</td>
                <td>{{ $item->doc_id }}</td>
                <td>{{ $item->reference }}</td>
                <td>{{ $item->supplier->szName ?? '' }}</td>                                
                <td style="max-width:100px">{{ $item->co_reference }}</td>
                <td></td>
                <td>{{ $item->depo }}</td>
                <td>{{ $item->product_name }}</td>
                <td class="text-right">{{ $item->qty }}</td>
                <td class="text-right">{{ $item->price }}</td>
                <td class="text-right">{{ localNumberFormat($item->total_price,0) }}</td>
                <td></td>
                <td>{{ $item->pay_date }}</td>
                <td class="text-right">{{ $item->pay_date ? localNumberFormat($item->total_price,0) : '' }}</td>
                <td class="text-right">{{ $item->pay_date ? 0 : localNumberFormat($item->total_price,0) }}</td>
            </tr>
            @empty
                <td>Data tidak ditemukan</td>
            @endforelse
        </tbody>
    </table>
</div>