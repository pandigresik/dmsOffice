<div>Invoice item</div>
<table class="table table-bordered" width="100%">
    <thead>
        <tr>
            <th>No. Dokumen</th>            
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoiceLines->groupBy('product_name') as $product_name => $products)            
            <tr class="bg-info">
                <td colspan="4">{{ $product_name }}</td>
            </tr>
            @foreach ($products as $data)
                <tr>
                    <td>{{ $data->doc_id }}</td>                        
                    <td class="text-right">{{ $data->qty }}</td>
                    <td class="text-right">{{ $data->price }}</td>
                    <td class="text-right">{{ $data->amount_total }}</td>
                </tr>        
            @endforeach
        
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total</td>
            <td class="text-right">{{ localNumberFormat( $invoiceLines->sum(function($invoice){ return $invoice->getRawOriginal('qty') * $invoice->getRawOriginal('price'); }),2 ) }}</td>
        </tr>
    </tfoot>
</table>