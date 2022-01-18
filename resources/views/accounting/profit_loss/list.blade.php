@php
    $headerGroup = [
        'LR-01' => 'Penjualan',
        'LR-06' => 'Beban Usaha',
        'LR-07' => 'Pendapatan (Beban) lain-lain',
    ];
    
@endphp
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th rowspan="2" colspan="2">Uraian</th>
            @foreach ($branchMaster as $item)
                <th colspan="2">{{ $item->szName }}</th>
            @endforeach
            <th colspan="2">Summary</th>
        </tr>
        <tr>
            @foreach ($branchMaster as $item)
                <th>Rp</th>
                <th>%</th>
            @endforeach
            <th>Rp</th>
            <th>%</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalPenjualan = [];
            $dataBranch = [];
            $summaryBranch = [];  
            $totalPenjualanDepo = 0;          
            foreach ($branchMaster as $item) {
                $dataBranch[$item->szId] = isset($data[$item->szId]) ? $data[$item->szId]->keyBy('account_id') : []; 
                $summaryBranch[$item->szId] = [];
                $totalPenjualan[$item->szId] = 0;
            }
        @endphp
        @foreach($listAccount as $group)
            @php                
                foreach ($branchMaster as $item) {
                $summaryBranch[$item->szId][$group->code] = 0;
                    foreach ($group->details as $account) {                    
                        $summaryBranch[$item->szId][$group->code] += $dataBranch[$item->szId][$account->code]->balance ?? 0;
                    }                    
                }               
            @endphp
        @endforeach
        
        @php
        /* hitung total penjualan */
        foreach ($branchMaster as $item) {
            $totalPenjualan[$item->szId] += $summaryBranch[$item->szId]['LR-01'] + $summaryBranch[$item->szId]['LR-02'];
        }
        $totalPenjualanDepo = array_sum($totalPenjualan);
        @endphp
        
        @forelse ($listAccount as $group)
            @if (isset($headerGroup[$group->code]))
                <tr class="font-weight-bold">
                    <td colspan="2">{{ $headerGroup[$group->code] }}</td>
                </tr>    
            @endif
                        
            @foreach ($group->details as $account)
                @php
                    $totalBaris = 0;
                @endphp
                <tr>
                    <td>{{ $account->code }}</td>
                    <td>{{ $account->name }}</td>
                    @foreach ($branchMaster as $item)
                        @php                            
                            $pembagi = $totalPenjualan[$item->szId];
                            $totalBaris += ($dataBranch[$item->szId][$account->code]->balance ?? 0);
                        @endphp
                        <td class="text-right">{{ localNumberAccountingFormat( $dataBranch[$item->szId][$account->code]->balance ?? 0 )  }}</td>
                        <td class="text-right">{{ isset($dataBranch[$item->szId][$account->code]->balance) && $pembagi > 0 ? localNumberFormat ($dataBranch[$item->szId][$account->code]->balance / $pembagi * 100) : 0 }} %</td>
                    @endforeach
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualanDepo > 0 ? localNumberFormat($totalBaris / $totalPenjualanDepo * 100) : 0 }}%</td>
                </tr>
                
            @endforeach

            @if (! in_array($group->code, ['LR-04','LR-05']))
                @php
                    $totalBaris = 0;
                @endphp
                <tr class="font-weight-bold">
                    <td></td>
                    <td>Total {{ $group->group }}</td>
                    @foreach ($branchMaster as $item)
                        @php
                            $totalBaris += $summaryBranch[$item->szId][$group->code];
                        @endphp
                        <td class="text-right">{{ localNumberAccountingFormat( $summaryBranch[$item->szId][$group->code] )  }}</td>
                        <td class="text-right">{{ isset($summaryBranch[$item->szId][$group->code]) && $totalPenjualan[$item->szId] > 0 ? localNumberFormat ($summaryBranch[$item->szId][$group->code] / $totalPenjualan[$item->szId] * 100) : 0 }} %</td>
                    @endforeach
                    <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                    <td class="text-right">{{ $totalPenjualanDepo > 0 ? localNumberFormat($totalBaris / $totalPenjualanDepo * 100) : 0 }}%</td>
                </tr>    
            @endif
            

            @switch($group->code)
                @case('LR-02')
                    @php
                        $totalBaris = 0;                        
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Jumlah Penjualan Bersih</td>                        
                        @foreach ($branchMaster as $item)
                            @php                                
                                $penjualanBersih = $summaryBranch[$item->szId]['LR-01'] + $summaryBranch[$item->szId]['LR-02'];
                                $totalBaris += $penjualanBersih;
                            @endphp
                            <td class="text-right">{{ localNumberAccountingFormat( $penjualanBersih )  }}</td>
                            <td class="text-right">{{ $totalPenjualan[$item->szId] > 0 ? localNumberFormat ($penjualanBersih / $totalPenjualan[$item->szId] * 100 )  : 0 }}%</td>
                        @endforeach
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualanDepo > 0 ? localNumberFormat($totalBaris / $totalPenjualanDepo * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 4 + (2 * $branchMaster->count()) }}"></td>
                    </tr>
                    @break
                @case('LR-04')
                    @php                                                    
                        $totalBaris = 0;
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Laba Penjualan</td>                        
                        @foreach ($branchMaster as $item)
                            @php                                
                                $labaPenjualan = $summaryBranch[$item->szId]['LR-01'] + $summaryBranch[$item->szId]['LR-02'] - $summaryBranch[$item->szId]['LR-03'] - $summaryBranch[$item->szId]['LR-04'];
                                $totalBaris += $labaPenjualan;
                            @endphp
                            <td class="text-right">{{ localNumberAccountingFormat( $labaPenjualan  )  }}</td>
                            <td class="text-right">{{ $totalPenjualan[$item->szId] > 0 ? localNumberFormat ( $labaPenjualan / $totalPenjualan[$item->szId] * 100 ) : 0 }}%</td>
                        @endforeach
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualanDepo > 0 ? localNumberFormat($totalBaris / $totalPenjualanDepo * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 2 + (2 * $branchMaster->count()) }}"></td>
                    </tr>
                    @break
                @case('LR-05')
                    @php                                                    
                        $totalBaris = 0;
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Laba Kotor</td>                        
                        @foreach ($branchMaster as $item)
                            @php                                
                                $labaKotor = $summaryBranch[$item->szId]['LR-01'] + $summaryBranch[$item->szId]['LR-02'] - $summaryBranch[$item->szId]['LR-03'] - $summaryBranch[$item->szId]['LR-04'] + $summaryBranch[$item->szId]['LR-05'];
                                $totalBaris += $labaKotor;
                            @endphp
                            <td class="text-right">{{ localNumberAccountingFormat( $labaKotor)  }}</td>
                            <td class="text-right">{{ $totalPenjualan[$item->szId] > 0 ? localNumberFormat ($labaKotor / $totalPenjualan[$item->szId]  * 100) : 0 }}%</td>
                        @endforeach
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualanDepo > 0 ? localNumberFormat($totalBaris / $totalPenjualanDepo * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 2 + (2 * $branchMaster->count()) }}"></td>
                    </tr>
                    @break
                @case('LR-06')
                    @php                                                    
                        $totalBaris = 0;
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Laba Usaha</td>                        
                        @foreach ($branchMaster as $item)
                            @php                                
                                $labaUsaha = $summaryBranch[$item->szId]['LR-01'] + $summaryBranch[$item->szId]['LR-02'] - $summaryBranch[$item->szId]['LR-03'] - $summaryBranch[$item->szId]['LR-04'] + $summaryBranch[$item->szId]['LR-05'] - $summaryBranch[$item->szId]['LR-06'];
                                $totalBaris += $labaUsaha;
                            @endphp
                            <td class="text-right">{{ localNumberAccountingFormat( $labaUsaha )  }}</td>
                            <td class="text-right">{{ $totalPenjualan[$item->szId] > 0 ? localNumberFormat ( $labaUsaha / $totalPenjualan[$item->szId]  * 100) : 0 }}%</td>
                        @endforeach
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualanDepo > 0 ? localNumberFormat($totalBaris / $totalPenjualanDepo * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 2 + (2 * $branchMaster->count()) }}"></td>
                    </tr>
                    @break
                @case('LR-07')
                    @php                                                    
                        $totalBaris = 0;
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Laba (Rugi) Bersih Sebelum Pajak</td>                        
                        @foreach ($branchMaster as $item)
                            @php                                
                                $labaRugiSebelumPajak = $summaryBranch[$item->szId]['LR-01'] + $summaryBranch[$item->szId]['LR-02'] - $summaryBranch[$item->szId]['LR-03'] - $summaryBranch[$item->szId]['LR-04'] + $summaryBranch[$item->szId]['LR-05'] - $summaryBranch[$item->szId]['LR-06'] - $summaryBranch[$item->szId]['LR-07'];
                                $totalBaris += $labaRugiSebelumPajak;
                            @endphp
                            <td class="text-right">{{ localNumberAccountingFormat( $labaRugiSebelumPajak )  }}</td>
                            <td class="text-right">{{ $totalPenjualan[$item->szId] > 0 ? localNumberFormat ($labaRugiSebelumPajak / $totalPenjualan[$item->szId]  * 100) : 0 }}%</td>
                        @endforeach
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualanDepo > 0 ? localNumberFormat($totalBaris / $totalPenjualanDepo * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 2 + (2 * $branchMaster->count()) }}"></td>
                    </tr>
                    @break
                @case('LR-08')
                    @php                                                    
                        $totalBaris = 0;
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Laba (Rugi) Bersih</td>                        
                        @foreach ($branchMaster as $item)
                            @php                                
                                $labaRugi = $summaryBranch[$item->szId]['LR-01'] + $summaryBranch[$item->szId]['LR-02'] - $summaryBranch[$item->szId]['LR-03'] - $summaryBranch[$item->szId]['LR-04'] + $summaryBranch[$item->szId]['LR-05'] - $summaryBranch[$item->szId]['LR-06'] - $summaryBranch[$item->szId]['LR-07'] - $summaryBranch[$item->szId]['LR-08'];
                                $totalBaris += $labaRugi;
                            @endphp
                            <td class="text-right">{{ localNumberAccountingFormat( $labaRugi )  }}</td>
                            <td class="text-right">{{ $totalPenjualan[$item->szId] > 0 ? localNumberFormat ($labaRugi / $totalPenjualan[$item->szId]  * 100) : 0 }}%</td>
                        @endforeach
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualanDepo > 0 ? localNumberFormat($totalBaris / $totalPenjualanDepo * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 2 + (2 * $branchMaster->count()) }}"></td>
                    </tr>
                    @break
                @default
                    
            @endswitch

        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan</td>
            </tr>
        @endforelse
    </tbody>
</table>