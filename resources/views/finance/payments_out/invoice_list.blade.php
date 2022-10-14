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
          $totalBkb = 0;            
          $itemBkb = $invoiceBkb->keyBy('references');
          $itemBkbBilling = $invoiceBkb->map(function($item){
            $tmpItem = $item->additional_info;            
                $item->ket =  $tmpItem["ket"];           
                $billingDoc = $tmpItem["BILLING DOKUMEN"] ?? 'not defined';
                $item->billingDoc = $billingDoc;
                $item->doc_id = $tmpItem['ID. DOKUMEN'];
                $item->product_name = $tmpItem['Produk'];
                $item->qty = $tmpItem['QTY'];
                $item->price = $tmpItem[' HARGA '];
                $item->amount_total = $tmpItem['TOTAL'];

                return $item;
            
            
          })->reject(function($item){
            return $item->ket == 'BTB';
          });
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
        @endforeach        
        @forelse($itemBkbBilling->groupBy('billingDoc') as $billing_doc => $products)            
            <tr class="bg-info">
                <td colspan="5">{!! $billing_doc !!}</td>
            </tr>
            @foreach ($products as $data)                
                <tr>
                    <td>{{ $data->doc_id }}</td>
                    <td>{{ $data->product_name }}</td>
                    <td class="text-right">{{ localNumberFormat($data->qty,0) }}</td>
                    <td class="text-right">{{ localNumberFormat($data->price,2) }}</td>
                    <td class="text-right">{{ localNumberFormat($data->amount_total,2) }}</td>
                </tr>
                @php
                  $totalBkb += $data->amount_total;  
                @endphp      
            @endforeach                
        @empty
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4">Total</td>
            <td class="text-right">{{ localNumberFormat( $invoiceLines->sum(function($invoice){ return $invoice->getRawOriginal('qty') * $invoice->getRawOriginal('price'); }) + $totalBkb, 2 ) }}</td>
        </tr>
    </tfoot>
</table>
