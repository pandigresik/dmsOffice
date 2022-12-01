@php
$hppTotal = 0;
$pengurangTotal = 0;
$jualTotal = 0;
@endphp
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th rowspan="2">Jenis Produk</th>
            <th colspan="2">Saldo Awal</th>
            <th colspan="2">Masuk</th>
            <th colspan="2">Keluar</th>
            <th colspan="2">Saldo</th>            
        </tr>
        <tr>
            <th>Qty</th>
            <th>Nilai</th>
            <th>Qty</th>
            <th>Nilai</th>
            <th>Qty</th>
            <th>Nilai</th>
            <th>Qty</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
    @php
        $totalSaldoAwalQty = $totalSaldoAwalVal = $totalMasukQty = $totalMasukVal = $totalKeluarQty = $totalKeluarVal = $totalSaldoAkhirQty = $totalSaldoAkhirVal = 0;
    @endphp
    @foreach ($datas as $item)
        @if ($item->isEmptyTransaction())
            @continue
        @endif
        @php
        $saldoAwalQty = $item->first_stock;
        $saldoAwalVal = $item->first_stock * $item->old_price;         
        $masukQty = ($item->mutation_in + $item->distribution_in + $item->supplier_in );           
        $masukVal = ($masukQty * $item->price)- $item->pengurang;
        $keluarQty = ( $item->mutation_out + $item->distribution_out + $item->supplier_out );
        $keluarVal = $keluarQty * $item->price;
        $saldoAkhirQty = $saldoAwalQty + $masukQty - $keluarQty;
        $saldoAkhirVal = $saldoAwalVal + $masukVal - $keluarVal; 
        $totalSaldoAwalQty += $saldoAwalQty; 
        $totalSaldoAwalVal += $saldoAwalVal;
        $totalMasukQty += $masukQty;
        $totalMasukVal += $masukVal;
        $totalKeluarQty += $keluarQty;
        $totalKeluarVal += $keluarVal;
        $totalSaldoAkhirQty += $saldoAkhirQty;
        $totalSaldoAkhirVal += $saldoAkhirVal;
        @endphp
        <tr>            
            <td>{{ $item->szName }}</td>
            <td class="text-right">{{ localNumberFormat($saldoAwalQty , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($saldoAwalVal , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($masukQty , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($masukVal , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($keluarQty , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($keluarVal , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($saldoAkhirQty , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($saldoAkhirVal , 0) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <td class="text-right">{{ localNumberFormat($totalSaldoAwalQty , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($totalSaldoAwalVal , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($totalMasukQty , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($totalMasukVal , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($totalKeluarQty , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($totalKeluarVal , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($totalSaldoAkhirQty , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($totalSaldoAkhirVal , 0) }}</td>
        </tr>
    </tfoot>
</table>