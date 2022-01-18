<table>    
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Depo</th>            
            <th rowspan="2">Tanggal</th>
            <th rowspan="2">ID Pelanggan</th>
            <th rowspan="2">Segmen</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">Alamat</th>
            <th rowspan="2">No DO</th>
            <th rowspan="2">Item Produk</th>
            <th rowspan="2">Qty</th>
            <th colspan="2">Diskon</th>
        </tr>
        <tr>
            <th>Beban TIV</th>
            <th>Beban Distributor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->depo->szName ?? '-' }}</td>                
                <td>{{ localFormatDate($item->bkbDate) }}</td>
                <td>{{ $item->bkb->szCustomerId }}</td>
                <td>{{ $item->bkb->customer->szHierarchyId ?? '-'  }}</td>
                <td>{{ $item->bkb->customer->szName ?? '-'  }}</td>
                <td>{{ $item->bkb->customer->address->fullAddress ?? '-'  }}</td>
                <td>{{ $item->szDocId  }}</td>
                <td>{{ $item->product->szName ?? '-'  }}</td>
                <td>{{ $item->decQty }}</td>
                <td>{{ $item->principle_amount}}</td>
                <td>{{ $item->distributor_amount}}</td>
            </tr>
        @endforeach
    </tbody>
</table>