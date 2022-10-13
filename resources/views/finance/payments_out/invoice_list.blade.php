<div>Invoice item</div>
<table class="table table-bordered" width="100%">
    <thead>
        <tr>
            <th>No. Dokumen</th>
            <th>Product</th>            
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php
          $itemBkb = $invoiceBkb->keyBy('references');
          $invoiceLines->map(function($item) use ($itemBkb){
            $billingDoc = 'not defined';
            if(isset($itemBkb[$item->doc_id])){
                $billingDoc = $itemBkb[$item->doc_id]->additional_info["BILLING DOKUMEN"] ?? '-';
            }
            $item->billingDoc = $billingDoc;
          });
        @endphp
        @foreach($invoiceLines->groupBy('billingDoc') as $billing_doc => $products)            
            <tr class="bg-info">
                <td colspan="5">{!! $billing_doc !!}</td>
            </tr>
            @foreach ($products as $data)                
                <tr>
                    <td>{{ $data->doc_id }}</td>
                    <td>{{ $data->product_name }}</td>
                    <td class="text-right">{{ $data->qty }}</td>
                    <td class="text-right">{{ $data->price }}</td>
                    <td class="text-right">{{ $data->amount_total }}</td>
                </tr>      
            @endforeach
            @forelse ($itemBkb as $item)
                @php
                    $tmpItem = $item->additional_info;                    
                @endphp
                @if ($tmpItem['ket'] == 'BKB')
                <tr>
                    <td>{{ $tmpItem['ID. DOKUMEN'] }}</td>
                    <td>{{ $tmpItem['Produk'] }}</td>
                    <td class="text-right">{{ $tmpItem['QTY'] }}</td>
                    <td class="text-right">{{ $tmpItem[' HARGA '] }}</td>
                    <td class="text-right">{{ $tmpItem['TOTAL'] }}</td>
                </tr>    
                @endif
                
            @empty
                
            @endforelse        
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4">Total</td>
            <td class="text-right">{{ localNumberFormat( $invoiceLines->sum(function($invoice){ return $invoice->getRawOriginal('qty') * $invoice->getRawOriginal('price'); }),2 ) }}</td>
        </tr>
    </tfoot>
</table>
