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
                    <td>{{ $data->getRawOriginal('discPrinciple') }}</td>
                    <td class="text-right">{{ $data->getRawOriginal('discDistributor') }}</td>
                    <td class="text-right">{{ $data->getRawOriginal('sistemPrinciple') }}</td>
                    <td class="text-right">{{ $data->getRawOriginal('sistemDistributor') }}</td>
                    <td class="text-right">{{ $data->getRawOriginal('selisihPrinciple') }}</td>
                    <td class="text-right">{{ $data->getRawOriginal('selisihDistributor') }}</td>                    
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
                <th class="text-right">{{ $totalDiskonTivSales }}</th>
                <th class="text-right">{{ $totalDiskonDistributorSales }}</th>
                <th class="text-right">{{ $totalDiskonTivSistem }}</th>
                <th class="text-right">{{ $totalDiskonDistributorSistem }}</th>
                <th class="text-right">{{ $totalDiskonTivSales }}</th>
                <th class="text-right">{{ $totalDiskonDistributorSales }}</th>                
            </tr>
        </tfoot>
    </table>
</div>