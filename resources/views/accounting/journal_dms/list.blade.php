<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Depo</th>
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">ID Pelanggan</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">Alamat</th>
                <th rowspan="2">No. DO</th>
                <th rowspan="2">Sales</th>
                <th rowspan="2">Item Produk</th>
                <th rowspan="2">Qty</th>                
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
            @endphp
            @forelse($datas as $number => $data)
            @php                
                $rowspan = $data->items->count()  
            @endphp
            <tr>
                <td rowspan="{{ $rowspan }}">{{ $number + 1 }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->depo->szName }}</td>
                <td rowspan="{{ $rowspan }}">{{ localFormatDate($data->dtmDoc) }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->szCustomerId }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->customer->szName }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->customer->description }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->szDocId }}</td>
                <td rowspan="{{ $rowspan }}">{{ $data->sales->szName ?? '-' }}</td>
                @foreach ($data->items as $index => $item)
                    @if($index)
                        <tr>
                    @endif
                    @php
                        $item->setCustomer($data->szCustomerId);
                        $item->setBkbDate($data->getRawOriginal('dtmDoc'));
                        $totalDiscountPrinciple = 0;
                        $totalDiscountDistributor = 0;
                    @endphp

                    <td>{{ $item->product->szName}}</td>
                    <td class="text-right">{{ $item->decQty }}</td>
                    <td class="text-right">{{ $item->decDiscPrinciple }}</td>
                    <td class="text-right">{{ $item->decDiscDistributor }}</td>
                    <td> 
                        @forelse ($item->getDiscountPrinciple() as $itemDiscount)
                            {{ $itemDiscount['name'] }} - {{ $itemDiscount['amount'] }}
                            @php
                                $totalDiscountPrinciple += $itemDiscount['amount'];    
                            @endphp                            
                        @empty
                            -
                        @endforelse                    
                    </td>
                    <td> 
                        @forelse ($item->getDiscountDistributor() as $itemDiscount)
                            {{ $itemDiscount['name'] }} - {{ $itemDiscount['amount'] }}
                            @php
                                $totalDiscountDistributor += $itemDiscount['amount'];    
                            @endphp
                        @empty
                            -
                        @endforelse            
                    </td>
                    <td class="text-right">{{ localNumberAccountingFormat($item->getRawOriginal('decDiscPrinciple') - $totalDiscountPrinciple, 0) }}</td>
                    <td class="text-right">{{ localNumberAccountingFormat($item->getRawOriginal('decDiscDistributor') - $totalDiscountDistributor, 0) }}</td>
                    @php
                        $totalDiskonTivSales += $item->getRawOriginal('decDiscPrinciple');
                        $totalDiskonDistributorSales += $item->getRawOriginal('decDiscDistributor');
                        $totalDiskonTivSistem += $totalDiscountPrinciple;
                        $totalDiskonDistributorSistem += $totalDiscountDistributor;                        
                    @endphp 
                    @if($index)
                        </tr>
                    @endif   
                @endforeach                
            </tr>
            @empty
            <tr>
                <td colspan=16>Data tidak ditemukan</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th class="text-right" colspan="10">Total</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonTivSales,0) }}</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonDistributorSales,0) }}</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonTivSistem,0) }}</th>
                <th class="text-right">{{ localNumberFormat($totalDiskonDistributorSistem,0) }}</th>
                <th class="text-right">{{ localNumberAccountingFormat($totalDiskonTivSales - $totalDiskonTivSistem, 0)}}</th>
                <th class="text-right">{{ localNumberAccountingFormat($totalDiskonDistributorSales - $totalDiskonDistributorSistem, 0 )}}</th>
            </tr>
        </tfoot>
    </table>
</div>