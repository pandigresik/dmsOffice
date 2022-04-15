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
        <th>Transfer</th>
        <th>Stock Akhir</th>
        <th>Harga</th>
        <th>Total <br>(MO + DO + SO)</th>
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
            $saldoAwal = $item->firstStock;            
            $saldoAkhir = $saldoAwal + $item->MI + $item->DI + $item->SI + $item->MO + $item->DO + $item->SO + $item->MORPH + $item->TR;
            $currentPrice = $item->price;
            $pengurang = $item->pengurang;
            $amountOut = ($item->DO + $item->MO + $item->SO) * $currentPrice;
            $hpp = $amountOut - $pengurang;
            $hppTotal += $hpp;
            $jualTotal += $amountOut;
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
            <td class="text-right">{{ localNumberFormat($item->TR, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($saldoAkhir, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($currentPrice, 0) }}</td>            
            <td class="text-right">{{ localNumberFormat($amountOut, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($pengurang, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($hpp, 0) }}</td>
        </tr>
    @endforeach
</tbody>
<tfoot>
    <tr>
        <th colspan="12"></th>
        <th class="text-right">{{ localNumberFormat($jualTotal, 2) }}</th>
        <th class="text-right">{{ localNumberFormat($pengurangTotal, 2) }}</th>
        <th class="text-right">{{ localNumberFormat($hppTotal, 2) }}</th>
    </tr>
</tfoot>
</table>