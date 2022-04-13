@php
    $hppTotal = 0;
    $pengurangTotal = 0;
    $jualTotal = 0;
@endphp
<table class="table table-bordered">
<thead>
    <tr>
        <th>Product</th>
        <th>Stock Awal</th>
        <th>MI</th>
        <th>DI</th>
        <th>SI</th>
        <th>MO</th>
        <th>DO</th>
        <th>SO</th>
        <th>Morphing</th>
        <th>Jual</th>
        <th>Transfer</th>
        <th>Stock Akhir</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Pengurang</th>
        <th>HPP</th>
    </tr>
</thead>
<tbody>
    @foreach ($collection as $item)
        @if ($item->isEmptyTransaction())
            @continue
        @endif
        @php
            $saldoAwal = $saldoBulanLalu[$item->szProductId] ?? 0;
            $saldoAkhir = $saldoAwal + $item->MI + $item->DI + $item->SI + $item->MO + $item->DO + $item->SO + $item->MORPH + $item->DOCDO + $item->TR;
            $currentPrice = $price[$item->szProductId] ?? 0;
            $pengurang = 0;
            $jual = $item->DOCDO * $currentPrice;
            $hpp = $jual - $pengurang;
            $hppTotal += $hpp;
            $jualTotal += $jual;
        @endphp
        <tr>                        
            <td>{{ $item->szName }} - ( {{ $item->szProductId}} )</td>            
            <td class="text-right">{{ localNumberFormat($saldoAwal , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->MI, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->DI, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->SI, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->MO, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->DO, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->SO, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->MORP, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->DOCDO, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->TR, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($saldoAkhir, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($currentPrice, 2) }}</td>            
            <td class="text-right">{{ localNumberFormat($jual, 2) }}</td>
            <td class="text-right">{{ localNumberFormat($pengurang, 2) }}</td>
            <td class="text-right">{{ localNumberFormat($hpp, 2) }}</td>
        </tr>
    @endforeach
</tbody>
<tfoot>
    <tr>
        <th colspan="13"></th>
        <th class="text-right">{{ localNumberFormat($jualTotal, 2) }}</th>
        <th class="text-right">{{ localNumberFormat($pengurangTotal, 2) }}</th>
        <th class="text-right">{{ localNumberFormat($hppTotal, 2) }}</th>
    </tr>
</tfoot>
</table>