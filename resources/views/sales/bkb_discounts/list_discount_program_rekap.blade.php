<div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th rowspan="2">No</th>                
                <th rowspan="2">Depo</th>
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
                    <td>{{ $data->depo->szName }}</td>
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
                <td colspan=5>Data tidak ditemukan</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th class="text-right" colspan="3">Total</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonTivSales,0) }}</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonDistributorSales,0) }}</th>                
            </tr>
        </tfoot>
    </table>
</div>