@php
$header = [];
$numberFormat = ['Gaji','Man fee','Gaji SPV','PPN','PPH 23','UPLOAD'];
@endphp
<div class="table-responsive">
    <table class="table table-bordered">
        <tbody>
            @forelse($balance['data'] as $index => $account)
            @if (!$index)
            @php
            $header = array_diff(array_keys($account['additional_info']), ['No']);
            @endphp
            <tr>
                @foreach ($header as $key)
                <th>{{ $key }}</th>
                @endforeach
            </tr>
            @endif
            <tr>
                @foreach ($header as $key)
                @if (in_array($key,$numberFormat))
                <td>{{ floatVal($account['additional_info'][$key] ?? 0) }}</td>
                @else
                <td>{{ $account['additional_info'][$key] ?? '-' }}</td>
                @endif
                @endforeach
            </tr>

            @empty
            <tr>
                <td colspan=10>Data detail tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
    
    @if (!empty($balance['manual']))

    <caption><h4>Jurnal</h4></caption>
    <table class="table table-bordered">        
        <thead class="">
            <tr>
                <th>Account</th>
                <th>Tanggal</th>
                <th>Reference</th>
                <th>Keterangan</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>Saldo Awal</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right">{{ $balance['saldo']->amount ?? 0 }}</td>
            </tr>
            @foreach($balance['manual'] as $index => $account)
            @php
            $debit = $account->debit ?? 0;
            $credit = $account->credit ?? 0;            
            // $amount = $account->balance ?? 0;
            $amount = $debit - $credit;
            @endphp
            <tr>
                <td>{{ $account->account_id }}</td>
                <td>{{ localFormatDate( $account->date ) }}</td>
                <td>{{ $account->reference }}</td>
                <td>{{ $account->description }}</td>   
                <td class="text-right">{{ $debit }}</td>
                <td class="text-right">{{ $credit }}</td>
                <td class="text-right">{{ $amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>Data Jurnal tidak ditemukan</div>
    @endif
</div>