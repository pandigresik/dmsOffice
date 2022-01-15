@php
    $headerGroup = [
        'LR-01' => 'Penjualan',
        'LR-05' => 'Beban Usaha',
    ];
    $summaryGroup = [
        'LR-01' => ['id' => 'Penjualan','member' => ['LR-01','LR-02']],
        'LR-02' => ['id' => 'Penjualan','member' => ['LR-01','LR-02']],
    ];
    $totalSummaryGroup = ['Penjualan' => 0];
    // $summaryGroup = [
    //     'Penjualan' => ['member' => ['LR-01' => false, 'LR-02' => false], 'text' => 'Jumlah Penjualan Bersih']
    // ];
@endphp
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th rowspan="2" colspan="2">Uraian</th>
            @foreach ($branchMaster as $item)
                <th colspan="2">{{ $item->szName }}</th>
            @endforeach
            
        </tr>
        <tr>
            @foreach ($branchMaster as $item)
                <th>Rp</th>
                <th>%</th>
            @endforeach
            
        </tr>
    </thead>
    <tbody>
        @php
            $dataBranch = [];
            $summaryBranch = [];
            foreach ($branchMaster as $item) {
                $dataBranch[$item->szId] = isset($data[$item->szId]) ? $data[$item->szId]->keyBy('account_id') : []; 
                $summaryBranch[$item->szId] = [];
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
        @forelse ($listAccount as $group)
            @if (isset($headerGroup[$group->code]))
                <tr class="font-weight-bold">
                    <td colspan="2">{{ $headerGroup[$group->code] }}</td>
                </tr>    
            @endif
            
            
            @foreach ($group->details as $account)                
                <tr>
                    <td>{{ $account->code }}</td>
                    <td>{{ $account->name }}</td>
                    @foreach ($branchMaster as $item)
                        @php
                            $pembagi = $summaryBranch[$item->szId][$group->code];
                            if(isset($summaryGroup[$group->code])){
                                if(empty($totalSummaryGroup[$summaryGroup[$group->code]['id']])){
                                    $totalSummaryGroup[$summaryGroup[$group->code]['id']] = 0;
                                    foreach ($summaryGroup[$group->code]['member'] as $member) {
                                        $totalSummaryGroup[$summaryGroup[$group->code]['id']] += $summaryBranch[$item->szId][$member];
                                    }
                                }
                                
                                $pembagi = $totalSummaryGroup[$summaryGroup[$group->code]['id']];
                            }
                            
                        @endphp
                        <td class="text-right">{{ localNumberAccountingFormat( $dataBranch[$item->szId][$account->code]->balance ?? 0 )  }}</td>
                        <td class="text-right">{{ isset($dataBranch[$item->szId][$account->code]->balance) && $pembagi > 0 ? localNumberFormat ($dataBranch[$item->szId][$account->code]->balance / $pembagi * 100) : 0 }} %</td>
                    @endforeach
                </tr>                
            @endforeach

            <tr class="font-weight-bold">
                <td></td>
                <td>Total {{ $group->group }}</td>
                @foreach ($branchMaster as $item)
                    <td class="text-right">{{ localNumberAccountingFormat( $summaryBranch[$item->szId][$group->code] )  }}</td>
                    <td class="text-right">{{ isset($summaryBranch[$item->szId][$group->code]) && $pembagi > 0 ? localNumberFormat ($summaryBranch[$item->szId][$group->code] / $pembagi * 100) : 0 }} %</td>
                @endforeach
            </tr>

            @switch($group->code)
                @case('LR-02')
                    <tr class="font-weight-bold">
                        <td colspan="2">Total Penjualan Bersih</td>                        
                        @foreach ($branchMaster as $item)
                            <td class="text-right">{{ localNumberAccountingFormat( $summaryBranch[$item->szId]['LR-01'] + $summaryBranch[$item->szId]['LR-02'] )  }}</td>
                            <td class="text-right">100 %</td>
                        @endforeach
                    </tr>   
                    @break
                @case(2)
                    
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