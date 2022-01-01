<div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th rowspan="2">No</th>                
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">ID Pelanggan</th>
                <th rowspan="2">Nama</th>                
                <th rowspan="2">No. DO</th>                
                <th rowspan="2">Item Produk</th>                
                <th colspan="2">Diskon Sales</th>
                <th colspan="2">Diskon Sistem</th>
                <th colspan="2">Selisih</th>
            </tr>
            <tr>
                <th>TIV</th>
                <th>Distributor</th>                
                <th>TIV</th>
                <th>Distributor</th>                
                <th>TIV</th>
                <th>Distributor</th>                
            </tr>
        </thead>
        <tbody>
            @php
                $totalDiskonTivSales = 0;
                $totalDiskonDistributorSales = 0;
                $totalDiskonTivSistem = 0;
                $totalDiskonDistributorSistem = 0;
                $totalSelisihTiv = 0;
                $totalSelisihDistributor = 0;                
                $number = 0;
            @endphp
            @forelse($discounts as $data)                          
                    @php                        
                        $totalDiskonTivSales += $data->getRawOriginal('discPrinciple');
                        $totalDiskonDistributorSales += $data->getRawOriginal('discDistributor');
                        $totalDiskonTivSistem += $data->getRawOriginal('sistemPrinciple');
                        $totalDiskonDistributorSistem += $data->getRawOriginal('sistemDistributor');
                        $totalSelisihTiv += $data->getRawOriginal('selisihPrinciple');
                        $totalSelisihDistributor += $data->getRawOriginal('selisihDistributor');
                    @endphp                         
                <tr>
                    <td>{{ ++$number }}</td>                    
                    <td>{{ localFormatDate($data->bkbDate) }}</td>
                    <td>{{ $data->bkb->szCustomerId }}</td>
                    <td>{{ $data->bkb->customer->szName ?? '-' }}</td>                    
                    <td>{{ $data->szDocId }}</td>                                                                         
                    <td>{{ $data->product->szName ?? '-'}}</td>
                    <td class="text-right">{{ localNumberFormat($data->discPrinciple, 0) }}</td>
                    <td class="text-right">{{ localNumberFormat($data->discDistributor, 0) }}</td>
                    <td class="text-right">{{ localNumberFormat($data->sistemPrinciple, 0) }}</td>
                    <td class="text-right">{{ localNumberFormat($data->sistemDistributor, 0) }}</td>
                    <td class="text-right">{{ localNumberFormat($data->selisihPrinciple, 0) }}</td>
                    <td class="text-right">{{ localNumberFormat($data->selisihDistributor, 0) }}</td>                    
                </tr>                
            @empty
            <tr>
                <td colspan=10>Data tidak ditemukan</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th class="text-right" colspan="6">Total</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonTivSales,0) }}</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonDistributorSales,0) }}</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonTivSistem,0) }}</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonDistributorSistem,0) }}</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonTivSales,0) }}</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonDistributorSales,0) }}</th>                
            </tr>
        </tfoot>
    </table>
</div>