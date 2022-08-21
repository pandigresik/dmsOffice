<div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th rowspan="2">No</th>                
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">ID Pelanggan</th>
                <th rowspan="2">Segment</th>
                <th rowspan="2">Nama</th>                
                <th rowspan="2">Alamat</th>
                <th rowspan="2">No. DO</th>
                <th rowspan="2">Sales</th>
                <th rowspan="2">Item Produk</th>                
                <th colspan="2">Diskon Sistem</th>                
            </tr>
            <tr>
                <th>TIV</th>
                <th>Distributor</th>                
            </tr>
        </thead>
        <tbody>
            @php
                $totalDiskonTivSales = 0;
                $totalDiskonDistributorSales = 0;                
                $number = 0;
            @endphp
            @forelse($discounts as $data)                          
                <tr>
                    <td>{{ ++$number }}</td>                    
                    <td>{{ localFormatDate($data->bkb->dtmDoc) }}</td>
                    <td>{{ $data->bkb->szCustomerId }}</td>
                    <td>{{ $data->bkb->customer->szHierarchyFull ?? '-' }}</td>
                    <td>{{ $data->bkb->customer->szName ?? '-' }}</td>                    
                    <td>{{ $data->bkb->customer->address->fullAddress ?? '-' }}</td>
                    <td>{{ $data->szDocId }}</td>
                    <td>{{ $data->bkb->sales->szName ?? '-' }}</td>                                                        
                    <td>{{ $data->product->szName ?? '-'}}</td>                    
                    <td class="text-right">{{ localNumberFormat($data->principle_amount, 0) }}</td>
                    <td class="text-right">{{ localNumberFormat($data->distributor_amount, 0) }}</td>                    
                    @php
                        $totalDiskonTivSales += $data->getRawOriginal('principle_amount');
                        $totalDiskonDistributorSales += $data->getRawOriginal('distributor_amount');                                                
                    @endphp                         
                </tr>                
            @empty
            <tr>
                <td colspan=16>Data tidak ditemukan</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th class="text-right" colspan="8">Total</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonTivSales,0) }}</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonDistributorSales,0) }}</th>                
            </tr>
        </tfoot>
    </table>
</div>