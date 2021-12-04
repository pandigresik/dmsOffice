<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Tanggal</th>
                <th>No. CO</th>
                <th>No. Dokumen</th>
                <th>Nama Gudang</th>
                <th>Tipe Stok</th>
                <th>No. Surat Jalan</th>
                <th>Tgl. Surat Jalan</th>
                <th>Ekspedisi</th>
                <th>No. Polisi</th>
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
                <td>{{ $data->jenis }}</td>
                <td>{{ localFormatDate($data->tgl_btb) }}</td>
                <td>{{ $data->co_reference }}</td>
                <td>{{ $data->no_btb }}</td>
                <td>{{ $data->id_gudang }} - {{ $data->nama_gudang }}</td>
                <td>{{ $data->tipe_stok }}</td>
                <td>{{ $data->sj_pabrik }}</td>
                <td>{{ localFormatDate($data->tgl_sj) }}</td>
                <td>{{ $data->nama_ekspedisi }}</td>
                <td>{{ $data->nopol }}</td>
                <td>
                    <label class="form-check-label">
                        <input type="checkbox" name="btb[]"
                            value="{{ json_encode(['jenis' => $data->jenis,'no_btb' => $data->no_btb]) }}">
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