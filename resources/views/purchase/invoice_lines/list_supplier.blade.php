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
                <th>
                    <label class="form-check-label">
                        <input type="checkbox" onclick="main.checkAll(this,'table')">
                    </label>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $data)
            <tr>                
                <td>{{ localFormatDate($data->btb_date) }}</td>
                <td>{{ $data->co_reference }}</td>
                <td>{{ $data->doc_id }}</td>
                <td>{{ $data->product_name }}</td>
                <td>{{ $data->uom_id }}</td>
                <td>{{ $data->qty }}</td>
                <td>{{ $data->price }}</td>                                
                <td>
                    <label class="form-check-label">
                        <input type="checkbox" data-qty="{{ $data->qty }}" data-price="{{ $data->price }}" name="btb[]"
                            value="{{ json_encode($data->getRawOriginal()) }}">
                    </label>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan=10>Data tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>