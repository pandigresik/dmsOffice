@php
    $header = [];    
    $numberFormat = ['THP','JAMSOSTEK','KSP	KLAIM','Toko 55','Gaji','Man fee','Gaji SPV','PPN','PPH 23','UPLOAD'];
@endphp
<div class="table-responsive">
    <table class="table table-bordered">        
        <tbody>            
            @forelse($profitloss['data'] as $index => $account)
                @if (!$index)
                    @php
                        $header = array_diff(array_keys($account['additional_info']), ['No']);
                    @endphp
                    <tr>
                    @foreach ($header as $key)
                        <th>{{ $key }}</th>
                    @endforeach
                    </tr>
                @endif
                    <tr>                
                        @foreach ($header as $key)
                            @if (in_array($key,$numberFormat))
                                <td>{{ localNumberFormat(floatVal($account['additional_info'][$key] ?? 0)) }}</td>
                            @else
                                <td>{{ $account['additional_info'][$key] ?? '-' }}</td>    
                            @endif                            
                        @endforeach
                    </tr>    
                
            @empty
            <tr>
                <td colspan=10>Data tidak ditemukan</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>