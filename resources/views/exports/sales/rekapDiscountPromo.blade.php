<table>    
    <thead>
        <tr>
            <th>No</th>
            <th>Depo</th>
            <th>Nama Program</th>
            <th>Tanggal</th>
            <th>ID Pelanggan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No DO</th>
            <th>Item Produk</th>
            <th>Qty</th>
            <th>Diskon</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->depo->szName ?? '-' }}</td>
                <td>{{ $item->promo->name ?? '-' }}</td>
                <td>{{ localFormatDate($item->bkbDate) }}</td>
                <td>{{ $item->bkb->szCustomerId }}</td>
                <td>{{ $item->bkb->customer->szName ?? '-'  }}</td>
                <td>{{ $item->bkb->customer->description ?? '-'  }}</td>
                <td>{{ $item->szDocId  }}</td>
                <td>{{ $item->product->szName ?? '-'  }}</td>
                <td>{{ $item->decQty }}</td>
                <td>{{ $item->principle_amount}}</td>
            </tr>
        @endforeach
    </tbody>
</table>