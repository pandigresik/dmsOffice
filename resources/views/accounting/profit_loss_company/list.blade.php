@php
    $headerGroup = [        
        'LRC-02' => 'Pendapatan (Beban) lain-lain'
    ];    
@endphp
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th>COA</th>
            <th>Nama Akun</th>
            <th>Jumlah</th>
            <th>% Thd Penjualan</th>
        </tr>        
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td>Total Pendapatan Usaha</td>
            <td class="text-right">{{ localNumberFormat($pendapatanUsaha) }}</td>
            <td class="text-right"></td>
        </tr>
        @foreach($listAccount as $group)
            
            @if (isset($headerGroup[$group->code]))
                <tr class="font-weight-bold">
                    <td colspan="2">{{ $headerGroup[$group->code] }}</td>
                </tr>    
            @endif            
            
            @foreach ($group->details as $account)                                
                <tr>
                    <td>{{ $account->code }}</td>
                    <td>{{ $account->name }}</td>
                    <td class="text-right">{{ localNumberFormat($data[$account->code]->balance ?? 0) }}</td>
                    <td class="text-right"></td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>