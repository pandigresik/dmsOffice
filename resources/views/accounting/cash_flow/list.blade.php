@php
    $headerGroup = [
        'LR-01' => 'Penjualan',
        'LR-06' => 'Beban Usaha',
        'LR-07' => 'Pendapatan (Beban) lain-lain',
    ];    
    $totalGroup = [];
    $totalBarisAccount = [];
@endphp
<table class="table table-bordered">
    <thead class="text-center">        
        <tr>
            <th></th>
            <th>Deskripsi</th>
            @foreach ($period as $p)
                <th>{{ $p->format('M-Y')}}</th>
            @endforeach
            <th>Total</th>
        </tr>
    </thead>
    <tbody>                
        @forelse ($listAccount as $group)
            @php
                $totalGroup[$group->code] = [];
            @endphp
            @if (isset($headerGroup[$group->code]))
                <tr class="font-weight-bold">
                    <td colspan="2">{{ $headerGroup[$group->code] }}</td>
                </tr>    
            @endif
                        
            @foreach ($group->details as $account)                
                @php
                    $totalBarisAccount[$account->code] = 0;
                @endphp
                <tr>
                    <td>{{ $account->code }}</td>
                    <td>{{ ucwords($account->name) }}</td>
                    @foreach ($period as $p)
                        @php                            
                            $indexBulan = $p->format('m-Y');
                            $amount = 0;
                            if(isset($data[$account->code])){
                                $amount = $data[$account->code][$indexBulan]->balance ?? 0;
                            }
                             
                            if(!isset($totalGroup[$group->code][$indexBulan])) $totalGroup[$group->code][$indexBulan] = 0;                            

                            $totalGroup[$group->code][$indexBulan] += $amount;
                            $totalBarisAccount[$account->code] += $amount;
                        @endphp
                        <td class="text-right">{{ localNumberFormat( $amount , 0) }}</td>
                    @endforeach
                        <td class="text-right">{{ localNumberFormat( $totalBarisAccount[$account->code] , 0) }}</td>
                </tr>                            
            @endforeach

            <tr class="font-weight-bold">
                <td></td>
                <td>Total {{ $group->group }}</td>
                @foreach ($period as $p)
                    <td class="text-right">{{ localNumberFormat( $totalGroup[$group->code][$p->format('m-Y')], 0) }}</td>
                @endforeach
                <td></td>
            </tr>

                                    

        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan</td>
            </tr>
        @endforelse
    </tbody>
</table>