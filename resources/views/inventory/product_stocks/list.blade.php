<table class="table table-bordered">
<thead>
    <tr>
        <th>Product</th>
        <th>Depo</th>
        <th>Stock Awal</th>
        <th>MI</th>
        <th>DI</th>
        <th>SI</th>
        <th>MO</th>
        <th>DO</th>
        <th>SO</th>
        <th>Stock Akhir</th>
    </tr>
</thead>
<tbody>
    @foreach ($collection as $item)
        @if ($item->isEmptyTransaction())
            @continue
        @endif
        @php
            $saldoAwal = 0;
            $saldoAkhir = $saldoAwal + ($item->MI + $item->DI + $item->SI) - ($item->MO + $item->DO + $item->SO);
        @endphp
        <tr>            
            <td>{{ $item->szId}}</td>
            <td>{{ $item->szBranchId}}</td>
            <td class="text-right">{{ localNumberFormat($saldoAwal , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->MI, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->DI, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->SI, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->MO, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->DO, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->SO, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($saldoAkhir, 0) }}</td>
        </tr>
    @endforeach
</tbody>
</table>