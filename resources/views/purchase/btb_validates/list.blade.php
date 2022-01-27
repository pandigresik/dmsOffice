<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Tanggal</th>
                <th>No. CO</th>
                <th>No. Dokumen</th>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Asal</th>
                <th>Gudang</th>                
                <th>No. SJ</th>                
                <th>Ekspedisi</th>
                <th>Ongkos Angkut</th>
                <th>No. Polisi</th>
                <th>
                    <label class="form-check-label">
                        <input type="checkbox" onclick="main.checkAll(this,'table')">
                    </label>
                </th>
            </tr>
        </thead>
        <tbody>
            @php
                $btbNumberPrev = '';
            @endphp            
            @forelse($datas as $data)
            @php
                $skip = 0;
                if($btbNumberPrev == $data->no_btb){
                    $skip = 1;
                }
                $btbNumberPrev = $data->no_btb;
            @endphp
            @if ($data->price <= 0)
                @continue;
            @endif

            <tr>
                <td>{{ $data->jenis }}</td>
                <td>{{ localFormatDate($data->tgl_btb) }}</td>
                <td style="word-wrap:break-word;max-width:100px">{{ $data->co_reference }}</td>
                <td>{{ $data->no_btb }}</td>
                <td>{{ $data->product_name }}</td>
                <td class="text-right">{{ $data->qty }}</td>
                <td class="text-right">{{ $data->price }}</td>
                <td>{{ $data->asal }}</td>
                <td>{{ $data->id_gudang }} - {{ $data->nama_gudang }}</td>                
                <td>{{ $data->sj_pabrik }}</td>                
                <td>{{ $data->nama_ekspedisi }}</td>
                <td class="text-right">{{ $skip ? '' : $data->shipping_cost }}</td>
                <td>{{ $data->nopol }}</td>
                <td>
                    @if (!$skip)                                            
                    <label class="form-check-label">
                        <input type="checkbox" name="btb[]"
                            value="{{ json_encode(['jenis' => $data->jenis,'no_btb' => $data->no_btb]) }}">
                    </label>
                    @endif
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