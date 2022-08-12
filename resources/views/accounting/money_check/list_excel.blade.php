@php
    $totalHeader = [];
    $totalBaris = [];    
@endphp
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th>TGL</th>
            @foreach ($header as $key => $item)
                @php
                    $totalHeader[$key] = 0;
                @endphp
                <th>{{ $key }}</th>
            @endforeach
            @foreach ($listBank as $bank)
                <th>{{ $bank }}</th>
            @endforeach
            <th>TOTAL SET BANK</th>
            <th>SELISIH</th>
            <th>KETERANGAN</th>
        </tr>        
    </thead>
    <tbody>                        
        @foreach($data as $tgl => $groupTgl)
        @php
            $totalDepositBank = 0;            
            $depositTgl = $bankDeposit[$tgl] ?? [];  
            $accountDeposit = [];
            $descriptionTgl = $descriptionMoneyCheck[$tgl]->description ?? '';
            if($depositTgl){
                $accountDeposit = $depositTgl->keyBy('account_id');                        
                $totalDepositBank = $depositTgl->sum('amount');
            }                              
        @endphp
        <tr>
            <td>{{ localFormatDate($tgl) }}</td>
            @foreach ($header as $key => $item)
                @php
                    switch ($key) {
                        case 'BIAYA OPRSL':
                            $totalItem = $groupTgl->whereIn('account_id', $item)->sum('credit') + $groupTgl->whereIn('account_id', $item)->sum('debit');
                            $totalItem -= $totalBaris['EMBALASI'] ?? 0;
                            break;                        
                        default:
                            $totalItem = $groupTgl->whereIn('account_id', $item)->sum('credit') - $groupTgl->whereIn('account_id', $item)->sum('debit');
                    }                    
                    
                    if($key == 'JML YG HARUS DISETOR'){                        
                        $totalItem = $totalBaris['PENJUALAN'] + $totalBaris['PELUNASAN PIUTANG'] + $totalBaris['TITIPAN TUNAI'] + $totalBaris['PENDAPATAN LAIN2'] - ( $totalBaris['BIAYA OPRSL'] + $totalBaris['EMBALASI'] );
                    }
                    $totalHeader[$key] += $totalItem;                    
                    $totalBaris[$key] = $totalItem;

                @endphp                
                <td class="text-right {{ $key == 'JML YG HARUS DISETOR' ? 'total_setoran': ''}}" data-item='{{ $totalItem }}'>{{ $totalItem }}</td>
            @endforeach
            @php
                // $totalBank = $totalBaris['BANK DIREKSI'] + $totalBaris['SETORAN  LIVIA/SEJATI55'];                
                $selisih = $totalBaris['JML YG HARUS DISETOR'] - $totalDepositBank;
            @endphp
            @foreach ($listBank as $codeBank => $bank)
                @php                
                    $amountDeposit = 0;
                    if(isset($accountDeposit[$codeBank])){
                        $amountDeposit = $accountDeposit[$codeBank]->amount;
                    }
                @endphp
                <td class="bank_manual" style="min-width:250px">
                    {{ $amountDeposit }}                    
                </td>
            @endforeach
            <td class="text-right total">{{ $totalDepositBank }}</td>
            <td class="text-right selisih">{{ $selisih }}</td>
            <td>{{ $descriptionTgl }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            @foreach ($header as $key => $item)                
                <th class="text-right">{{ $totalHeader[$key] }}</th>
            @endforeach
            <th colspan="6"></th>
        </tr>
    </tfoot>
</table>