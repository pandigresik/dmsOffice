<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product Id</th>
            <th>Nama</th>
            <th>Qty</th>
            <th>Jumlah</th>
            <th>Potongan TIV</th>
            <th>Potongan Distributor</th>
            <th>Potongan Internal</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($datas as $item)
            <tr>
                <td>{{ $item->szProductId }}</td>
                <td>{{ $item->szProductName }}</td>
                <td class="text-right">{{ localNumberFormat($item->decQty) }}</td>
                <td class="text-right">{{ localNumberFormat($item->amount) }}</td>
                <td class="text-right">{{ localNumberFormat($item->decDiscPrinciple) }}</td>
                <td class="text-right">{{ localNumberFormat($item->decDiscDistributor) }}</td>
                <td class="text-right">{{ localNumberFormat($item->decDiscInternal) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Data tidak ditemukan</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr class="text-right">
            <th colspan="2">Total</th>
            <th>{{ localNumberFormat($datas->sum('decQty')) }}</th>
            <th>{{ localNumberFormat($datas->sum('amount')) }}</th>
            <th>{{ localNumberFormat($datas->sum('decDiscPrinciple')) }}</th>
            <th>{{ localNumberFormat($datas->sum('decDiscDistributor')) }}</th>
            <th>{{ localNumberFormat($datas->sum('decDiscInternal')) }}</th>
        </tr>
    </tfoot>
</table>