@php
    $headerGroup = [
        'LRC-01' => 'Penjualan',
        'LRC-06' => 'Beban Usaha',
        'LRC-07' => 'Pendapatan (Beban) lain-lain',
    ];
    $plusAccount = ['919900','910800'];
    $minusAccount = ['929900'];
@endphp
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th rowspan="2" colspan="2">Uraian</th>            
            <th colspan="2">Saldo</th>
        </tr>
        <tr>            
            <th>Rp</th>
            <th>%</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalPenjualan = 0;
            $dataAccount = $data->keyBy('account_id');      
            $summaryAccount = [];                  
        @endphp
        @foreach($listAccount as $group)        
            @php                
                $summaryAccount[$group->code] = 0;
                foreach ($group->details as $account) {
                        if(in_array($account->code,$plusAccount)){
                            if(isset($dataAccount[$account->code])){
                                $dataAccount[$account->code]->balance = abs($dataAccount[$account->code]->balance ?? 0);
                            }
                            
                        }
                        if(in_array($account->code,$minusAccount)){
                            if(isset($dataAccount[$account->code])){
                                $dataAccount[$account->code]->balance = -1 * ($dataAccount[$account->code]->balance ?? 0);
                            }                            
                        }                    
                        $summaryAccount[$group->code] += $dataAccount[$account->code]->balance ?? 0;
                        $totalPenjualan += $dataAccount[$account->code]->balance ?? 0;
                    }            
            @endphp
        @endforeach
                
        
        @forelse ($listAccount as $group)
            @if (isset($headerGroup[$group->code]))
                <tr class="font-weight-bold">
                    <td colspan="2">{{ $headerGroup[$group->code] }}</td>
                </tr>    
            @endif
                        
            @foreach ($group->details as $account)
                @php
                    $totalBaris = 0;
                    if(in_array($account->code, $excludeAccount)) continue;                    
                @endphp
                <tr>
                    <td>{{ $account->code }}</td>                    
                    <td>
                        <a href="#" data-json='{{ json_encode(["name" => $account->name, "branch_id" => null,"startDate" => $startDate, "endDate" => $endDate]) }}' data-url="{{route('accounting.balance.show', $account->code) }}" onclick="main.popupModal(this,'get');return false">{{ ucwords($account->name) }}</a>
                        <button class="btn"><a href="#" data-json='{{ json_encode(["name" => $account->name,"branch_id" => null,"startDate" => $startDate, "endDate" => $endDate, "download_xls" => 1]) }}' data-url="{{route('accounting.balance.show', $account->code) }}?v={{Str::random(10)}}" data-tipe="get" onclick="main.redirectUrl(this);return false"><i class="fa fa-download"></i></a></button>
                    </td>                    
                        @php                                                        
                            $totalBaris = ($dataAccount[$account->code]->balance ?? 0);
                        @endphp
                    <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                    <td class="text-right">{{ $totalPenjualan > 0 ? localNumberFormat($totalBaris / $totalPenjualan * 100) : 0 }}%</td>
                </tr>
                
            @endforeach

            @if (! in_array($group->code, ['LRC-04','LRC-05']))
                @php
                    $totalBaris = 0;
                @endphp
                <tr class="font-weight-bold">
                    <td></td>
                    <td>Total {{ $group->group }}</td>                    
                    @php
                        $totalBaris = $summaryAccount[$group->code];
                    @endphp
                    <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                    <td class="text-right">{{ $totalPenjualan > 0 ? localNumberFormat($totalBaris / $totalPenjualan * 100) : 0 }}%</td>
                </tr>    
            @endif
            

            @switch($group->code)
                @case('LRC-02')
                    @php
                        $totalBaris = 0;                        
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Jumlah Penjualan Bersih</td>                        
                        @php                                
                                $penjualanBersih = $summaryAccount['LRC-01'] + $summaryAccount['LRC-02'];
                                $totalBaris = $penjualanBersih;
                            @endphp
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualan > 0 ? localNumberFormat($totalBaris / $totalPenjualan * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 4  }}"></td>
                    </tr>
                    @break
                @case('LRC-04')
                    @php                                                    
                        $totalBaris = 0;
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Laba Penjualan</td>                        
                        @php                                
                                $labaPenjualan = $summaryAccount['LRC-01'] + $summaryAccount['LRC-02'] - $summaryAccount['LRC-03'] - $summaryAccount['LRC-04'];
                                $totalBaris = $labaPenjualan;
                            @endphp
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualan > 0 ? localNumberFormat($totalBaris / $totalPenjualan * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 2  }}"></td>
                    </tr>
                    @break
                @case('LRC-05')
                    @php                                                    
                        $totalBaris = 0;
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Laba Kotor</td>                        
                        @php                                
                                $labaKotor = $summaryAccount['LRC-01'] + $summaryAccount['LRC-02'] - $summaryAccount['LRC-03'] - $summaryAccount['LRC-04'] + $summaryAccount['LRC-05'];
                                $totalBaris = $labaKotor;
                            @endphp
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualan > 0 ? localNumberFormat($totalBaris / $totalPenjualan * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 2  }}"></td>
                    </tr>
                    @break
                @case('LRC-06')
                    @php                                                    
                        $totalBaris = 0;
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Laba Usaha</td>                        
                        @php                                
                                $labaUsaha = $summaryAccount['LRC-01'] + $summaryAccount['LRC-02'] - $summaryAccount['LRC-03'] - $summaryAccount['LRC-04'] + $summaryAccount['LRC-05'] - $summaryAccount['LRC-06'];
                                $totalBaris = $labaUsaha;
                            @endphp
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualan > 0 ? localNumberFormat($totalBaris / $totalPenjualan * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 2  }}"></td>
                    </tr>
                    @break
                @case('LRC-07')
                    @php                                                    
                        $totalBaris = 0;
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Laba (Rugi) Bersih Sebelum Pajak</td>                        
                        @php                                
                                $labaRugiSebelumPajak = $summaryAccount['LRC-01'] + $summaryAccount['LRC-02'] - $summaryAccount['LRC-03'] - $summaryAccount['LRC-04'] + $summaryAccount['LRC-05'] - $summaryAccount['LRC-06'] + $summaryAccount['LRC-07'];
                                $totalBaris = $labaRugiSebelumPajak;
                            @endphp
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualan > 0 ? localNumberFormat($totalBaris / $totalPenjualan * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 2  }}"></td>
                    </tr>
                    @break
                @case('LRC-08')
                    @php                                                    
                        $totalBaris = 0;
                    @endphp
                    <tr class="font-weight-bold">
                        <td colspan="2">Laba (Rugi) Bersih</td>                        
                        @php                                
                                $labaRugi = $summaryAccount['LRC-01'] + $summaryAccount['LRC-02'] - $summaryAccount['LRC-03'] - $summaryAccount['LRC-04'] + $summaryAccount['LRC-05'] - $summaryAccount['LRC-06'] + $summaryAccount['LRC-07'] - $summaryAccount['LRC-08'];
                                $totalBaris = $labaRugi;
                            @endphp
                        <td class="text-right">{{ localNumberAccountingFormat($totalBaris) }}</td>
                        <td class="text-right">{{ $totalPenjualan > 0 ? localNumberFormat($totalBaris / $totalPenjualan * 100) : 0 }}%</td>
                    </tr>
                    <tr>
                        <td colspan="{{ 2  }}"></td>
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