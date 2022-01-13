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
        @forelse ($listAccount as $group)
            @php                
                foreach ($branchMaster as $item) {
                $summaryBranch[$item->szId][$group->code] = 0;
                    foreach ($group->details as $account) {                    
                        $summaryBranch[$item->szId][$group->code] += $dataBranch[$item->szId][$account->code]->balance ?? 0;
                    }    
                }
                   
            @endphp
            <tr class="text-bold">
                <td colspan="2">{{ $group->code }} {{ $group->group }}</td>
            </tr>
            
            @foreach ($group->details as $account)                
                <tr>
                    <td>{{ $account->code }}</td>
                    <td>{{ $account->name }}</td>
                    @foreach ($branchMaster as $item)
                        <td class="text-right">{{ localNumberAccountingFormat( $dataBranch[$item->szId][$account->code]->balance ?? 0 )  }}</td>
                        <td class="text-right">{{ isset($dataBranch[$item->szId][$account->code]->balance) ? localNumberFormat ($dataBranch[$item->szId][$account->code]->balance / $summaryBranch[$item->szId][$group->code] * 100) : 0 }} %</td>
                    @endforeach
                </tr>                
            @endforeach

            <tr class="text-bold">
                <td colspan="2">Total {{ $group->code }} {{ $group->group }}</td>
                @foreach ($branchMaster as $item)
                    <td class="text-right">{{ localNumberAccountingFormat( $summaryBranch[$item->szId][$group->code] )  }}</td>
                    <td class="text-right">100 %</td>
                @endforeach
            </tr>
        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan</td>
            </tr>
        @endforelse
    </tbody>
</table>