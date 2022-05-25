<div class="table-responsive">
    <table class="table table-bordered">        
        <tbody>            
            @forelse($datas as $index => $data)
                @if (!$index)
                    <tr>
                    @foreach (array_keys($data['additional_info']) as $key)
                        <th>{{ $key }}</th>
                    @endforeach
                    </tr>
                @endif
                    <tr>                
                        @foreach ($data['additional_info'] as $item)
                            <td>{{ $item }}</td>
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