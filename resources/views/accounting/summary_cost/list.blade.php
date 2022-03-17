<div class="table-responsive">
    <div class="text-center">
    <caption><h3>Rekapitulasi Biaya {{ localFormatDate($startDate) }} sd {{ localFormatDate($endDate) }}</h3></caption>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Pic / User</th>
                <th>Account</th>
                <th>Nominal</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $mutasi)
                @php
                    $total = 0;
                    $lastItem = $mutasi->transferCashBankDetails->last()
                @endphp
                @foreach ($mutasi->transferCashBankDetails as $item)
                    @php
                        $total += $item->amount;                        
                    @endphp
                    <tr>
                    <td>{{ $mutasi->transaction_date }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->pic }}</td>
                    <td>{{ $item->account }}</td>
                    <td class="text-right">&nbsp;{{ localNumberFormat($item->amount, 0) }}</td>
                    <td class="text-right"> 
                        @if ($item == $lastItem)
                            &nbsp;{{ localNumberFormat($total,0) }}
                        @endif 
                    </td>
                </tr>
                @endforeach
                
            @empty
                <td>Data tidak ditemukan</td>
            @endforelse
        </tbody>
    </table>
</div>