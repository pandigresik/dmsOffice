@php
$saldo = $generalLedger['saldo'];
$data = $generalLedger['data'];
$saldoAwal = $saldo->getRawOriginal('amount') ?? 0;
$saldoAkhir = $saldoAwal;
@endphp
<div class="text-center">
<h4>{{ ucwords($name) }} - {{ $accountCode }} Periode Sampai Dengan {{ localFormatDate($endDate) }}</h4>
</div>
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th>Tanggal</th>
            <th>No. Voucher</th>
            <th>Account</th>
            <th>Keterangan Transaksi</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Saldo Akhir</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ localFormatDate( $startDate ) }}</td>
            <td></td>
            <td></td>
            <td>Saldo Awal</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">{{ localNumberAccountingFormat($saldoAwal) }}</td>
        </tr>
        @foreach ($data as $no => $account)
        @php
        $debit = $account->debit ?? 0;
        $credit = $account->credit ?? 0;
        $saldoAkhir = $saldoAkhir + $debit - $credit;

        @endphp
        <tr>
            <td>{{ localFormatDate( $account->date ) }}</td>
            <td>{{ $account->reference }}</td>
            <td>{{ $account->account_id }}</td>
            <td>{{ $account->name }}</td>
            <td class="text-right">{{ localNumberAccountingFormat($debit) }}</td>
            <td class="text-right">{{ localNumberAccountingFormat($credit) }}</td>
            <td class="text-right">{{ localNumberAccountingFormat($saldoAkhir) }}</td>
        </tr>
        @endforeach

    </tbody>
</table>