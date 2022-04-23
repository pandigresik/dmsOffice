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
            <th>TOTAL SET BANK</th>
            <th>SELISIH</th>
            <th>KETERANGAN</th>
        </tr>        
    </thead>
    <tbody>                        
        @foreach($data as $tgl => $groupTgl)
        <tr>
            <td>{{ localFormatDate($tgl) }}</td>
            @foreach ($header as $key => $item)
                @php
                    
                    if($key == 'BIAYA OPRSL'){
                        $totalItem = $groupTgl->whereIn('account_id', $item)->sum('credit') + $groupTgl->whereIn('account_id', $item)->sum('debit');
                    }else{
                        $totalItem = $groupTgl->whereIn('account_id', $item)->sum('credit') - $groupTgl->whereIn('account_id', $item)->sum('debit');
                    }
                    
                    $totalHeader[$key] += $totalItem;
                    
                    if($key == 'JML YG HARUS DISETOR'){                        
                        $totalItem = $totalBaris['PENJUALAN'] + $totalBaris['PELUNASAN PIUTANG'] + $totalBaris['EMBALASI'] + $totalBaris['TITIPAN TUNAI'] + $totalBaris['PENDAPATAN LAIN2'] - $totalBaris['BIAYA OPRSL'];                        
                    }
                    
                    $totalBaris[$key] = $totalItem;

                @endphp                
                <td class="text-right">{{ localNumberFormat($totalItem, 0) }}</td>
            @endforeach
            @php
                $totalBank = $totalBaris['BANK DIREKSI'] + $totalBaris['SETORAN  LIVIA/SEJATI55'];
                $selisih = $totalBaris['JML YG HARUS DISETOR'] - $totalBank;
            @endphp
            <td class="text-right">{{ localNumberFormat($totalBank, 0) }}</td>
            <td class="text-right">{{ localNumberAccountingFormat($selisih, 0) }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            @foreach ($header as $key => $item)                
                <th class="text-right">{{ localNumberFormat($totalHeader[$key], 0) }}</th>
            @endforeach
        </tr>
    </tfoot>
</table>