    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50px">                    
                </th>
                <th>No. BTB</th>
                <th>Tgl. BTB</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $index => $data)
            <tr>
                <td><input type="checkbox" value="{{ $data->getRawOriginal('amount') }}" data-amount="{{ $data->getRawOriginal('amount') }}" onclick="updateSubsidiOA(this)" name="subsidi_oa[{{$data->id}}]"></td>
                <td>{{ $data->doc_id }}</td>
                <td>{{ localFormatDate($data->btb->btb_date) }}</td>
                <td>{{ $data->amount }}</td>
            </tr>

            @empty
            <tr>
                <td colspan=2>Data tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
