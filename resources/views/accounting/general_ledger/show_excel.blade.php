@php
$saldo = $generalLedger['saldo'];
$data = $generalLedger['data'];
$saldoAwal = $saldo ? ($saldo->getRawOriginal('amount') ?? 0) : 0;
$saldoAkhir = $saldoAwal;
@endphp
<div class="text-center">
<h4>{{ ucwords($name) }} - {{ $accountCode }} Periode Sampai Dengan {{ localFormatDate($endDate) }}</h4>
</div>
<div class="table-responsive">
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th>Tanggal</th>
            <th>No. Voucher</th>
            <th>Account</th>
            <th>Keterangan</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Saldo Akhir</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ localFormatDate($startDate)  }}</td>
            <td></td>
            <td></td>
            <td>Saldo Awal</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">{{ $saldoAwal }}</td>
        </tr>
        @foreach ($data as $no => $account)
        @php
        $debit = $account->debit ?? 0;
        $credit = $account->credit ?? 0;
        $saldoAkhir = $saldoAkhir + $debit - $credit;

        @endphp
        <tr>
            <td>{{ localFormatDate( $account->date )  }}</td>
            <td>{{ $account->reference }}</td>
            <td>{{ $account->account_id }}</td>
            <td>{{ $account->description }}</td>
            <td class="text-right">{{ $debit }}</td>
            <td class="text-right">{{ $credit }}</td>
            <td class="text-right">{{ $saldoAkhir }}</td>
        </tr>
        @endforeach

    </tbody>
</table>

@if (!empty($generalLedger['manual']))

    <caption><h4>Jurnal Manual</h4></caption>
    <table class="table table-bordered">        
        <thead class="">
            <tr>
                <th>Account</th>
                <th>Tanggal</th>
                <th>Reference</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($generalLedger['manual'] as $index => $account)
            @php
            $debit = $account->debit ?? 0;
            $credit = $account->credit ?? 0;
            $amount = $account->balance ?? 0;
            @endphp
            <tr>
                <td>{{ $account->account_id }}</td>
                <td>{{ localFormatDate($account->date)  }}</td>
                <td>{{ $account->reference }}</td>
                <td class="text-right">{{ $debit }}</td>
                <td class="text-right">{{ $credit }}</td>
                <td class="text-right">{{ $amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>Data jurnal manual tidak ditemukan</div>
    @endif
</div>