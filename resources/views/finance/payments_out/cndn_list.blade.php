<div>CN / DN</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No. Dokumen</th>
            <th>Deskripsi</th>
            <th>Reference</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($debitCreditNote as $data)
        <tr>
            <td>{{ $data->number }}</td>
            <td>{{ $data->description }}</td>
            <td>{{ $data->references }}</td>
            <td class="text-right">{{ localNumberAccountingFormat($data->rawAmount) }}</td>
        </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total</td>
            <td class="text-right">{{ localNumberAccountingFormat( $debitCreditNote->sum(function($invoice){ return $invoice->rawAmount; }),2 ) }}</td>
        </tr>
    </tfoot>
</table>