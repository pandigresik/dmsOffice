<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>                
                <th>Tanggal</th>
                <th>No. CO</th>
                <th>No. Dokumen</th>
                <th>Nama Produk</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>                
            </tr>
        </thead>
        <tbody>
            @forelse($invoice->invoiceLines as $data)
            <tr>                
                <td>{{ localFormatDate($data->btb_date) }}</td>
                <td>{{ $data->co_reference }}</td>
                <td>{{ $data->doc_id }}</td>
                <td>{{ $data->product_name }}</td>
                <td>{{ $data->uom_id }}</td>
                <td class="text-right">{{ $data->qty }}</td>
                <td class="text-right">{{ $data->price }}</td>                                          
                <td class="text-right">{{ $data->amount_total }}</td>                                          
            </tr>
            @empty
            <tr>
                <td colspan=10>Data tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>