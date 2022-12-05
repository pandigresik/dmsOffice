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
            $totalMasukQty = $saldoAwalQty;
            $totalMasukVal = $saldoAwalVal;
        @endphp
        <tr>
            <td></td>
            <td></td>
            <td>Saldo Awal</td>
            <td class="text-right">{{ $exportExcel ? $saldoAwalQty : localNumberFormat($saldoAwalQty, 0) }}</td>
            <td class="text-right">{{ $exportExcel ? $saldoAwalPrice : localNumberFormat($saldoAwalPrice, 0)}}</td>
            <td class="text-right">{{ $exportExcel ? $saldoAwalVal : localNumberFormat($saldoAwalVal, 0)}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right">{{ $exportExcel ? $saldoAwalVal : localNumberFormat($saldoAwalVal, 0)}}</td>
        </tr>
        @foreach ($detail as $item)
            @php
                $masukQty = in_array($item->szTrnId, ['DMSDocStockInBranch','DMSDocStockInDistribution','DMSDocStockInSupplier']) ? $item->decQtyOnHand : 0;
                $keluarQty = in_array($item->szTrnId, ['DMSDocStockOutBranch','DMSDocStockOutDistribution','DMSDocStockOutSupplier']) ? $item->decQtyOnHand : 0;
                $masukVal = $masukQty * $item->price;
                $keluarVal = $keluarQty * $item->price;
                $totalMasukQty += $masukQty; 
                $totalMasukVal += $masukQty * $item->price;
                $totalKeluarQty += $keluarQty;
                $totalKeluarVal += $keluarQty * $item->price;
                $saldoAkhirQty += ($masukQty + $keluarQty);
                $saldoAkhirVal += ($masukVal + $keluarVal);
            @endphp            
            <tr>
                <td>{{ localFormatDate($item->dtmTransaction) }}</td>
                <td>{{ $item->sZDocId }}</td>
                <td>{{ $item->szTrnId }}</td>
                <td class="text-right">{{ $exportExcel ? $masukQty : localNumberFormat($masukQty,0) }}</td>
                <td class="text-right">{{ $exportExcel ? $item->price : localNumberFormat($item->price,0) }}</td>
                <td class="text-right">{{ $exportExcel ? ($masukQty * $item->price) : localNumberFormat($masukQty * $item->price,0) }}</td>
                <td class="text-right">{{ $exportExcel ? $keluarQty : localNumberFormat($keluarQty,0) }}</td>
                <td class="text-right">{{ $exportExcel ? $item->price : localNumberFormat($item->price,0) }}</td>
                <td class="text-right">{{ $exportExcel ? ($keluarQty * $item->price) : localNumberFormat($keluarQty * $item->price,0) }}</td>
                <td class="text-right">{{ $exportExcel ? $saldoAkhirQty : localNumberFormat($saldoAkhirQty,0) }}</td>
                <td class="text-right">{{ $exportExcel ? $item->price : localNumberFormat($item->price,0) }}</td>
                <td class="text-right">{{ $exportExcel ? $saldoAkhirVal : localNumberFormat($saldoAkhirVal,0) }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3"></th>
            <th class="text-right">{{ $exportExcel ? $totalMasukQty : localNumberFormat($totalMasukQty,0) }}</th>
            <th></th>
            <th class="text-right">{{ $exportExcel ? $totalMasukVal : localNumberFormat($totalMasukVal,0) }}</th>
            <th class="text-right">{{ $exportExcel ? $totalKeluarQty : localNumberFormat($totalKeluarQty,0) }}</th>
            <th></th>
            <th class="text-right">{{ $exportExcel ? $totalKeluarVal : localNumberFormat($totalKeluarVal,0) }}</th>
            <th class="text-right">{{ $exportExcel ? $saldoAkhirQty : localNumberFormat($saldoAkhirQty,0) }}</th>
            <th></th>
            <th class="text-right">{{ $exportExcel ? $saldoAkhirVal : localNumberFormat($saldoAkhirVal,0) }}</th>
        </tr>
    </tfoot>
</table>