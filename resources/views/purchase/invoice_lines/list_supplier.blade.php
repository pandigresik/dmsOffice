<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>                
                <th>No. Dokumen</th>
                <th>Tanggal</th>
                <th>No. CO</th>                                
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
            @forelse($datas as $product_name => $products)
            <tbody>
                <tr class="header_group">
                    <td colspan="6"><i style="cursor:pointer" class="fa fa-plus" onclick="expandRow(this)"></i> {{ $product_name }}</td>
                    <td>
                        <label class="form-check-label">
                            <input type="checkbox" onclick="main.checkAll(this,'tbody')">
                        </label>
                    </td>
                </tr>
                @foreach($products as $data)
                <tr class="detail_group" style="display: none;">
                    <td>{{ $data->doc_id }}</td>
                    <td>{{ localFormatDate($data->btb_date) }}</td>
                    <td>{{ $data->co_reference }}</td>                                        
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
                @endforeach
            </tbody>
            @empty
            <tbody>
            <tr>
                <td colspan=10>Data tidak ditemukan</td>
            </tr>
            </tbody>
            @endforelse        
    </table>
</div>