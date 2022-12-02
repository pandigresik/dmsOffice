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
        @foreach ($detail as $item)
            <tr>
                <td>{{ localFormatDate($item->dtmTransaction) }}</td>
                <td>{{ $item->sZDocId }}</td>
                <td>{{ $item->szTrnId }}</td>
                <td>{{ $item->decQtyOnHand }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->decQtyOnHand * $item->price }}</td>
                <td>{{ $item->decQtyOnHand }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->decQtyOnHand * $item->price }}</td>
                <td>{{ $item->decQtyOnHand }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->decQtyOnHand * $item->price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>