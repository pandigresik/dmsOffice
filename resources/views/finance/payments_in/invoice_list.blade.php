<div>Invoice item</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No. Dokumen</th>
            <th>Nama Produk</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoiceLines as $data)
        <tr>
            <td>{{ $data->doc_id }}</td>
            <td>{{ $data->product_name }}</td>
            <td>{{ $data->uom_id }}</td>
            <td class="text-right">{{ $data->qty }}</td>
            <td class="text-right">{{ $data->price }}</td>
            <td class="text-right">{{ $data->amount_total }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">Total</td>
            <td class="text-right">{{ localNumberFormat( $invoiceLines->sum(function($invoice){ return $invoice->getRawOriginal('qty') * $invoice->getRawOriginal('price'); }),2 ) }}</td>
        </tr>
    </tfoot>
</table>