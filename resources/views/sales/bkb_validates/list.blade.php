<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Depo</th>
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">ID Pelanggan</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">Alamat</th>
                <th rowspan="2">No. DO</th>
                <th rowspan="2">Sales</th>
                <th rowspan="2">Item Produk</th>
                <th rowspan="2">Qty</th>                
                <th colspan="2">Diskon Sales</th>
                <th colspan="2">Diskon Sistem</th>
                <th rowspan="2">Selisih</th>
                <th rowspan="2">
                    <label class="form-check-label">
                        <input type="checkbox" onclick="main.checkAll(this,'table')">
                    </label>
                </th>
            </tr>
            <tr>
                <th>TIV</th>
                <th>Distributor</th>
                <th>TIV</th>
                <th>Distributor</th>                
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $number => $data)
            @php
                $rowspan = $data->items->count()   
            @endphp
            <tr>
                <td rowspan="{{ $rowspan }}">{{ $number + 1 }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->depo->szName }}</td>
                <td rowspan="{{ $rowspan }}">{{ localFormatDate($data->dtmDoc) }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->szCustomerId }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->customer->szName }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->customer->description }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->szDocId }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->sales->szName ?? '-' }}</td>
                @foreach ($data->items as $index => $item)
                    @if($index)
                        <tr>
                    @endif                
                    <td>{{ $item->product->szName}}</td>
                    <td class="text-right">{{ $item->decQty }}</td>
                    <td class="text-right">{{ $item->itemPrice->decDiscPrinciple }}</td>
                    <td class="text-right">{{ $item->itemPrice->decDiscDistributor }}</td>
                    <td>not yet</td>
                    <td>not yet</td>
                    <td>
                        <label class="form-check-label">
                            <input type="checkbox" name="btb[]"
                                value="{{ json_encode(['jenis' => $data->jenis,'no_btb' => $data->no_btb]) }}">
                        </label>
                    </td> 
                    @if($index)
                        </tr>
                    @endif   
                @endforeach
                
            </tr>
            @empty
            <tr>
                <td colspan=10>Data tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>