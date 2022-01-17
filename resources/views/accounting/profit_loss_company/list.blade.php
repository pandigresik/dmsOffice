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
                    <td>{{ localNumberFormat($data[$account->id]->balance ?? 0) }}</td>
                    <th></th>
                </tr>                
            @endforeach
        @endforeach
    </tbody>
</table>