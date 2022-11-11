<div>Subsidi OA</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No. BTB</th>            
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subsidiOa as $data)
        <tr>
            <td>{{ $data->subsidi->doc_id }}</td>            
            <td class="text-right">{{ $data->amount }}</td>
        </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <td>Total</td>
            <td class="text-right">{{ localNumberFormat( $subsidiOa->sum(function($oa){ return $oa->getRawOriginal('amount'); }),2 ) }}</td>
        </tr>
    </tfoot>
</table>