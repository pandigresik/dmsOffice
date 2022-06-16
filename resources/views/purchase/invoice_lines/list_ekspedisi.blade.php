<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>                
                <th>Tanggal</th>
                <th>No. CO</th>
                <th>No. Dokumen</th>
                <th>Nama Produk</th>
                <th>Satuan</th>                
                <th>Harga</th>
                <th>
                    <label class="form-check-label">
                        <input type="checkbox" onclick="main.checkAll(this,'table')">
                    </label>
                </th>
            </tr>
        </thead>
        <tbody>            
            @forelse($datas as $docid => $dataGroup)                
            @php
                $data = $dataGroup->first();
                $product = $dataGroup->map(function ($item){
                    return $item->product_name.' ('.$item->qty.')';
                });                
                $data->price = $data->getRawOriginal('shipping_cost');
                $data->qty = 1;
                $data->product_name = '<div>'.$product->join('</div><div>').'</div>';
                // $data->uom_id = '-';
                $data->syncOriginal();                                
            @endphp
            <tr>                
                <td>{{ localFormatDate($data->btb_date) }}</td>
                <td>{{ $data->co_reference }}</td>
                <td>{{ $data->doc_id }}</td>
                <td>{!! $data->product_name !!}</td>
                <td>{{ $data->uom_id }}</td>                
                <td>{{ $data->price }}</td>                                
                <td>
                    <label class="form-check-label">
                        <input type="checkbox" data-qty="1" data-price="{{ $data->price }}" name="btb[]"
                            value="{{ json_encode($data->getRawOriginal()) }}">
                    </label>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan=10>Data tidak ditemukan</td>
            </tr>
            @endforelse


            @forelse($shippingCostManual as $data)                
            @php                
                $product = $data->details->map(function ($item){
                    return $item->product->szName.' ('.$item->quantity.')';
                });
                $uomProduct = $data->details->map(function ($item){
                    return $item->product->szUomId;
                });                
                $data->price = $data->getRawOriginal('amount');
                $data->qty = 1;
                $data->product_id = $data->details->first()->product->szId;
                $data->reference_id = $data->number;
                $data->uom_id  = '<div>'.$uomProduct->join('</div><div>').'</div>';
                $data->co_reference = $data->co_references;
                $data->product_name = '<div>'.$product->join('</div><div>').'</div>';
                $data->doc_id = $data->do_references; // pakai number agar unique
                $data->syncOriginal();                                
            @endphp
            <tr>                
                <td>{{ localFormatDate($data->date) }}</td>
                <td>{{ $data->co_reference }}</td>
                <td>{{ $data->doc_id }}</td>
                <td>{!! $data->product_name !!}</td>
                <td>{!! $data->uom_id !!}</td>                
                <td>{{ $data->price }}</td>                                
                <td>
                    <label class="form-check-label">
                        <input type="checkbox" data-qty="1" data-price="{{ $data->price }}" name="btb[]"
                            value="{{ json_encode($data->getRawOriginal()) }}">
                    </label>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan=10>Data ongkos angkut manual tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>