<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>                
                <th>Tanggal</th>
                <th>No. CO</th>
                <th>No. Dokumen</th>                                
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>          
            </tr>
        </thead>
        <tbody>            
            @forelse($invoice->invoiceLines->groupBy('product_name') as $product_name => $products)
                <tr>
                    <td colspan="6" class="bg-info">{!! $product_name !!}</td>
                </tr>
                @foreach ($products as $data)
                    <tr>                
                        <td>{{ localFormatDate($data->btb_date) }}</td>
                        <td>{{ $data->btb->co_reference }}</td>
                        <td>{{ $data->doc_id }}</td>                                        
                        <td class="text-right">{{ $data->qty }}</td>
                        <td class="text-right">{{ $data->price }}</td>                                          
                        <td class="text-right">{{ $data->amount_total }}</td>                                          
                    </tr>    
                @endforeach            
            @empty
            <tr>
                <td colspan=10>Data tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>