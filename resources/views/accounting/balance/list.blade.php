@php
    $headerGroup = [        
        'NRC-02' => 'Pendapatan (Beban) lain-lain'
    ];
    $totalGroup = [];   
    $pendapatanUsaha = 1;
    $hppPabrik = 0;
@endphp
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th>COA</th>
            <th>Nama Akun</th>
            <th>Bulan Ini</th>
            <th>Bulan Lalu</th>
            <th>% Selisih</th>
        </tr>        
    </thead>
    <tbody>                        
        @foreach($listAccount as $group)            
            @php
                $totalGroup[$group->code] =  0;
            @endphp
            @if (isset($headerGroup[$group->code]))
                <tr class="font-weight-bold">
                    <td colspan="2">{{ $headerGroup[$group->code] }}</td>
                </tr>    
            @endif            
            
            @foreach ($group->details as $account)
                @php
                    $totalGroup[$group->code] += $data[$account->code]->balance ?? 0;
                @endphp                                
                <tr>
                    <td>{{ $account->code }}</td>
                    <td>{{ $account->name }}</td>
                    <td class="text-right">{{ localNumberAccountingFormat($data[$account->code]->balance ?? 0) }}</td>
                    <td class="text-right">{{ localNumberFormat(($data[$account->code]->balance ?? 0) / $pendapatanUsaha * 100) }}%</td>
                </tr>
            @endforeach
            @if ($group->code != 'NRC-03')
                <tr class="font-weight-bold">
                    <td></td>
                    <td>Jumlah {{ $group->group }}</td>
                    <td class="text-right">{{ localNumberAccountingFormat($totalGroup[$group->code]) }}</td>
                    <td class="text-right">{{ localNumberFormat(($totalGroup[$group->code]) / $pendapatanUsaha * 100) }}%</td>                    
                </tr>
            @endif
                
            @switch($group->code)
                @case('NRC-01')
                    @php
                        $labaKotor = $pendapatanUsaha - $hppPabrik - $totalGroup['NRC-01'];
                    @endphp
                    <tr>
                        <td colspan="4"></td>
                    </tr>                     
                    <tr class="font-weight-bold">
                        <td></td>
                        <td>Laba Kotor</td>
                        <td class="text-right">{{ localNumberAccountingFormat($labaKotor) }}</td>
                        <td class="text-right">{{ localNumberFormat( $labaKotor / $pendapatanUsaha * 100) }}%</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                    
                    <tr class="font-weight-bold">
                        <td></td>
                        <td>Laba Bersih Sebelum Pendapatan Beban Lain - lain & Pajak</td>
                        <td class="text-right">{{ localNumberAccountingFormat($labaKotor) }}</td>
                        <td class="text-right">{{ localNumberFormat( $labaKotor / $pendapatanUsaha * 100) }}%</td>                    
                    </tr>
                    @break
                @case('NRC-02')
                    @php
                        $labaSebelumPajak = $pendapatanUsaha - $hppPabrik - $totalGroup['NRC-01']  - $totalGroup['NRC-02'];
                    @endphp
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                    
                    <tr class="font-weight-bold">
                        <td></td>
                        <td>Laba Sebelum Pajak</td>
                        <td class="text-right">{{ localNumberAccountingFormat($labaSebelumPajak) }}</td>
                        <td class="text-right">{{ localNumberFormat( $labaSebelumPajak / $pendapatanUsaha * 100) }}%</td>                    
                    </tr>
                    @break
                @case('NRC-03')
                    @php
                        $labaSetelahPajak = $pendapatanUsaha - $hppPabrik - $totalGroup['NRC-01']  - $totalGroup['NRC-02'] - $totalGroup['NRC-03'] ;
                    @endphp
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                    
                    <tr>
                        <td>312003</td>
                        <td>Laba Bersih Setelah Pajak</td>
                        <td class="text-right">{{ localNumberAccountingFormat($labaSetelahPajak) }}</td>
                        <td class="text-right">{{ localNumberFormat( $labaSetelahPajak / $pendapatanUsaha * 100) }}%</td>                    
                    </tr>
                    @break
                @default
                    
            @endswitch    
        @endforeach
    </tbody>
</table>