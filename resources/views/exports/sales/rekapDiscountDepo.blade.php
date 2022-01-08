<table>    
    <thead>
        <tr>
            <th>No</th>
            <th>Depo</th>             
            <th>Qty</th>  
            <th>Klaim TIV</th>            
            <th>Keterangan</th>            
        </tr>
        
    </thead>
    <tbody>
        @php
            $index = 1;    
        @endphp
        @foreach ($data as $depo => $item)
            <tr>
                <td>{{ $index }}</td>
                <td>{{ $depoMaster[$depo]->szName ?? '-' }}</td>                                
                <td>{{ $item->sum('decQty') }}</td>
                <td>{{ $item->sum('principle_amount') }}</td>
                <td>Claim Biaya</td>
            </tr>
            @php
                $index++;    
            @endphp
        @endforeach
    </tbody>
</table>