<table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2">Tanggal</th>
            <th rowspan="2">No. Sumber Data</th>
            <th rowspan="2">Sumber Data</th>
            <th colspan="3">Masuk</th>
            <th colspan="3">Keluar</th>
            <th colspan="3">Saldo</th>
        </tr>
        <tr>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalMasukQty = $totalMasukVal = $totalKeluarQty = $totalKeluarVal = 0;
            $saldoAwalQty = 0;
            $saldoAwalVal = 0;
            $saldoAwalPrice = 0;
            if($saldoAwal){
                $saldoAwalQty = $saldoAwal[0]->qty ?? 0;
                $saldoAwalVal = $saldoAwal[0]->cogs ?? 0;
                $saldoAwalPrice = $saldoAwal[0]->price ?? 0;
            }
            
            $saldoAkhirQty = $saldoAwalQty;
            $saldoAkhirVal = $saldoAwalVal;
        @endphp
        <tr>
            <td></td>
            <td></td>
            <td>Saldo Awal</td>
            <td class="text-right">{{ localNumberFormat($saldoAwalQty, 0)}}</td>
            <td class="text-right">{{ localNumberFormat($saldoAwalPrice, 0)}}</td>
            <td class="text-right">{{ localNumberFormat($saldoAwalVal, 0)}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right">{{ localNumberFormat($saldoAwalVal, 0)}}</td>
        </tr>
        @foreach ($detail as $item)
            @php
                $masukQty = in_array($item->szTrnId, ['DMSDocStockInBranch','DMSDocStockInDistribution','DMSDocStockInSupplier']) ? $item->decQtyOnHand : 0;
                $keluarQty = in_array($item->szTrnId, ['DMSDocStockOutBranch','DMSDocStockOutDistribution','DMSDocStockOutSupplier']) ? $item->decQtyOnHand : 0;
                
                $totalMasukQty += $masukQty; 
                $totalMasukVal += $masukQty * $item->price;
                $totalKeluarQty += $keluarQty;
                $totalKeluarVal += $keluarQty * $item->price;
                $saldoAkhirQty += $totalMasukQty + $totalKeluarQty;
                $saldoAkhirVal += $totalMasukVal + $totalKeluarVal;
            @endphp            
            <tr>
                <td>{{ localFormatDate($item->dtmTransaction) }}</td>
                <td>{{ $item->sZDocId }}</td>
                <td>{{ $item->szTrnId }}</td>
                <td class="text-right">{{ localNumberFormat($masukQty,0) }}</td>
                <td class="text-right">{{ localNumberFormat($item->price,0) }}</td>
                <td class="text-right">{{ localNumberFormat($masukQty * $item->price,0) }}</td>
                <td class="text-right">{{ localNumberFormat($keluarQty,0) }}</td>
                <td class="text-right">{{ localNumberFormat($item->price,0) }}</td>
                <td class="text-right">{{ localNumberFormat($keluarQty * $item->price,0) }}</td>
                <td class="text-right">{{ localNumberFormat($saldoAkhirQty,0) }}</td>
                <td class="text-right">{{ localNumberFormat($item->price,0) }}</td>
                <td class="text-right">{{ localNumberFormat($saldoAkhirVal,0) }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3"></th>
            <th class="text-right">{{ localNumberFormat($totalMasukQty,0) }}</th>
            <th></th>
            <th class="text-right">{{ localNumberFormat($totalMasukVal,0) }}</th>
            <th class="text-right">{{ localNumberFormat($totalKeluarQty,0) }}</th>
            <th></th>
            <th class="text-right">{{ localNumberFormat($totalKeluarVal,0) }}</th>
            <th class="text-right">{{ localNumberFormat($saldoAkhirQty,0) }}</th>
            <th></th>
            <th class="text-right">{{ $saldoAkhirVal }}</th>
        </tr>
    </tfoot>
</table>