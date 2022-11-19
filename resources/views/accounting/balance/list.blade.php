@php
    $headerGroup = [        
        'NRC-02' => 'Pendapatan (Beban) lain-lain'
    ];
    $totalGroup = [];
    $saldoGroup = [];    
@endphp
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th>COA</th>
            <th>Nama Akun</th>
            <th>{{ $currentMonth }}</th>
            <th>{{ $previousMonth }}</th>
            <th>Selisih (%)</th>
        </tr>        
    </thead>
    <tbody>                        
        @foreach($listAccount as $group)            
            @php
                $totalGroup[$group->code] =  0;
                $saldoGroup[$group->code] =  0;
            @endphp
            @if (isset($headerGroup[$group->code]))
                <tr class="font-weight-bold">
                    <td colspan="2">{{ $headerGroup[$group->code] }}</td>
                </tr>    
            @endif            
            
            @foreach ($group->details as $account)
                @php
                    $saldoAwal = isset($saldo[$account->code]) ? $saldo[$account->code]->getRawOriginal('amount') : 0;
                    $amount = $saldoAwal + (isset($data[$account->code]) ? $data[$account->code]->balance : 0);
                    $totalGroup[$group->code] += $amount;                    
                    $saldoGroup[$group->code] += $saldoAwal;
                    $selisih = $amount - $saldoAwal;
                    $prosenSelisih = $amount > 0 ? ($selisih / $amount * 100) : 0;
                @endphp                                
                <tr>
                    <td>{{ $account->code }}</td>
                    <td>
                        <a href="#" data-json='{{ json_encode(["name" => $account->name, "startDate" => $startDate, "endDate" => $endDate]) }}' data-url="{{route('accounting.balance.show', $account->code) }}" onclick="main.popupModal(this,'get');return false">{{ ucwords($account->name) }}</a>
                        <button class="btn"><a href="#" data-json='{{ json_encode(["name" => $account->name,"startDate" => $startDate, "endDate" => $endDate, "download_xls" => 1, "version" => rand() ]) }}' data-url="{{route('accounting.balance.show', $account->code) }}" data-tipe="get" onclick="main.redirectUrl(this);return false"><i class="fa fa-download"></i></a></button>
                    </td>
                    <td class="text-right">{{ localNumberAccountingFormat($amount) }}</td>
                    <td class="text-right">{{ localNumberAccountingFormat($saldoAwal) }}</td>
                    <td class="text-right">{{ localNumberFormat($prosenSelisih) }}%</td>
                </tr>
            @endforeach
            @if ($group->code != 'NRC-03')
                <tr class="font-weight-bold">
                    <td></td>
                    <td>Jumlah {{ $group->group }}</td>
                    <td class="text-right">{{ localNumberAccountingFormat($totalGroup[$group->code]) }}</td>
                    <td class="text-right">{{ localNumberAccountingFormat($saldoGroup[$group->code]) }}</td>
                    <td class="text-right">{{ $totalGroup[$group->code] > 0 ? localNumberFormat( ($totalGroup[$group->code] - $saldoGroup[$group->code]) / $totalGroup[$group->code] * 100) : localNumberFormat(0) }}%</td>
                </tr>
            @endif
                
            @switch($group->code)                
                @case('NRC-06')
                    @php
                        $jumlahAsset = $totalGroup['NRC-01'] + $totalGroup['NRC-02'] + $totalGroup['NRC-03'] + $totalGroup['NRC-04'] + $totalGroup['NRC-05'] + $totalGroup['NRC-06'] ;
                        $saldoAsset = $saldoGroup['NRC-01'] + $saldoGroup['NRC-02'] + $saldoGroup['NRC-03'] + $saldoGroup['NRC-04'] + $saldoGroup['NRC-05'] + $saldoGroup['NRC-06'] ;
                        $selisihAsset = $jumlahAsset - $saldoAsset;
                        $prosenSelisih = $jumlahAsset > 0 ? $selisihAsset / $jumlahAsset *  100 : 0;
                    @endphp
                    <tr>
                        <td colspan="5"></td>
                    </tr>
                    
                    <tr class="font-weight-bold">
                        <td></td>
                        <td>Jumlah Asset</td>
                        <td class="text-right">{{ localNumberAccountingFormat($jumlahAsset) }}</td>
                        <td class="text-right">{{ localNumberAccountingFormat($saldoAsset) }}</td>
                        <td class="text-right">{{ localNumberFormat( $prosenSelisih ) }}%</td>                    
                    </tr>
                    @break
                @case('NRC-14')
                    @php
                        $jumlahKewajiban = $totalGroup['NRC-07'] + $totalGroup['NRC-08'] + $totalGroup['NRC-09'] + $totalGroup['NRC-10'] + $totalGroup['NRC-11'] + $totalGroup['NRC-12'] + $totalGroup['NRC-13'] + $totalGroup['NRC-14'];
                        $saldoKewajiban = $saldoGroup['NRC-07'] + $saldoGroup['NRC-08'] + $saldoGroup['NRC-09'] + $saldoGroup['NRC-10'] + $saldoGroup['NRC-11'] + $saldoGroup['NRC-12'] + $saldoGroup['NRC-13'] + $saldoGroup['NRC-14'];
                        $selisihKewajiban = $jumlahKewajiban - $saldoKewajiban;
                        $prosenSelisih = $jumlahKewajiban > 0 ? $selisihKewajiban / $jumlahKewajiban *  100 : 0;
                    @endphp
                    <tr>
                        <td colspan="5"></td>
                    </tr>
                    
                    <tr class="font-weight-bold">
                        <td></td>
                        <td>Jumlah Kewajiban</td>
                        <td class="text-right">{{ localNumberAccountingFormat($jumlahKewajiban) }}</td>
                        <td class="text-right">{{ localNumberAccountingFormat($saldoKewajiban) }}</td>
                        <td class="text-right">{{ localNumberFormat( $prosenSelisih ) }}%</td>                    
                    </tr>
                    @break
                @case('NRC-15')
                    @php
                        $jumlahKewajibanModal = $totalGroup['NRC-07'] + $totalGroup['NRC-08'] + $totalGroup['NRC-09'] + $totalGroup['NRC-10'] + $totalGroup['NRC-11'] + $totalGroup['NRC-12'] + $totalGroup['NRC-13'] + $totalGroup['NRC-14'] + $totalGroup['NRC-15'];
                        $saldoKewajibanModal = $saldoGroup['NRC-07'] + $saldoGroup['NRC-08'] + $saldoGroup['NRC-09'] + $saldoGroup['NRC-10'] + $saldoGroup['NRC-11'] + $saldoGroup['NRC-12'] + $saldoGroup['NRC-13'] + $saldoGroup['NRC-14'] + $saldoGroup['NRC-15'];
                        $selisihKewajibanModal = $jumlahKewajibanModal - $saldoKewajibanModal;
                        $prosenSelisih = $jumlahKewajibanModal > 0 ? $selisihKewajibanModal / $jumlahKewajibanModal *  100 : 0;
                    @endphp
                    <tr>
                        <td colspan="5"></td>
                    </tr>
                    
                    <tr class="font-weight-bold">
                        <td></td>
                        <td>Jumlah Kewajiban dan Modal</td>
                        <td class="text-right">{{ localNumberAccountingFormat($jumlahKewajibanModal) }}</td>
                        <td class="text-right">{{ localNumberAccountingFormat($saldoKewajibanModal) }}</td>
                        <td class="text-right">{{ localNumberFormat( $prosenSelisih ) }}%</td>                    
                    </tr>
                    @break
                @default
                    
            @endswitch    
        @endforeach
    </tbody>
</table>