@php    
    $totalGroup = [
        'saldoAwal' => 0,
        'debit' => 0,
        'credit' => 0,
        'saldoAkhir' => 0,
    ];
@endphp
<h5>Rekap GL Per {{ localFormatDate($endDate) }}</h5>

<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>No. Perkiraan</th>
            <th>No. Sub Perkiraan</th>
            <th>Nama Perkiraan</th>
            <th>Saldo Awal</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Saldo Akhir</th>
        </tr>        
    </thead>
    <tbody>                        
        @foreach($listAccount as $group)            
            @foreach ($group->details as $no => $account)
                @php
                    $saldoAwal = isset($saldo[$account->code]) ? $saldo[$account->code]->getRawOriginal('amount') : 0;
                    $debit = (isset($data[$account->code]) ? $data[$account->code]->debit : 0);
                    $credit = (isset($data[$account->code]) ? $data[$account->code]->credit : 0);
                    $saldoAkhir = $saldoAwal + $debit - $credit;

                    $totalGroup['saldoAwal'] += $saldoAwal;
                    $totalGroup['debit'] += $debit;
                    $totalGroup['credit'] += $credit;
                    $totalGroup['saldoAkhir'] += $saldoAkhir;
                @endphp                                
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $account->code }}</td>
                    <td>99999999</td>
                    <td>
                        <a href="#" data-json='{{ json_encode(["name" => $account->name,"branch_id" => $branch,"startDate" => $startDate, "endDate" => $endDate]) }}' data-url="{{route('accounting.generalLedger.show', $account->code) }}" onclick="main.popupModal(this,'get');return false">{{ ucwords($account->name) }}</a>
                        <button class="btn"><a href="#" data-json='{{ json_encode(["name" => $account->name,"branch_id" => $branch,"startDate" => $startDate, "endDate" => $endDate, "download_xls" => 1]) }}' data-url="{{route('accounting.generalLedger.show', $account->code) }}" data-tipe="get" onclick="main.redirectUrl(this);return false"><i class="fa fa-download"></i></a></button>
                    </td>
                    <td class="text-right">{{ localNumberAccountingFormat($saldoAwal) }}</td>
                    <td class="text-right">{{ localNumberAccountingFormat($debit) }}</td>
                    <td class="text-right">{{ localNumberAccountingFormat($credit) }}</td>
                    <td class="text-right">{{ localNumberAccountingFormat($saldoAkhir) }}</td>
                </tr>
            @endforeach                
        @endforeach        
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Total</th>
            <th class="text-right">{{ localNumberAccountingFormat($totalGroup['saldoAwal']) }}</th>
            <th class="text-right">{{ localNumberAccountingFormat($totalGroup['debit']) }}</th>
            <th class="text-right">{{ localNumberAccountingFormat($totalGroup['credit']) }}</th>
            <th class="text-right">{{ localNumberAccountingFormat($totalGroup['saldoAkhir']) }}</th>
        </tr>
    </tfoot>
</table>