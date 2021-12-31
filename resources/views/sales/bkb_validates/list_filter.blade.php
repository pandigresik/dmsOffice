<div class="table-responsive">
    <input type="hidden" name="start_date" value="{{ $startDate }}">
    <input type="hidden" name="end_date" value="{{ $endDate }}">
    <input type="hidden" name="branch_id" value="{{ $branchId }}">
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
                $number = 0;
            @endphp
            @forelse($datas as $data)          
                @foreach ($data->items as $index => $item)  
                    @php
                        $item->setOtherItem($data->items);
                        $item->setCustomer($data->customer);
                        $item->setBkbDate($data->getRawOriginal('dtmDoc'));
                        $totalDiscountPrinciple = 0;
                        $totalDiscountDistributor = 0;
                        $discounts = $item->getDiscounts();                                                
                    @endphp
                    {{-- @if(empty($discounts['distributor']) && empty($discounts['principle']) && empty($item->decDiscPrinciple) && empty($item->decDiscDistributor))
                        @continue;
                    @endif --}}
                <tr>
                    <td>{{ ++$number }}</td>
                    <td>{{ $data->depo->szName }}</td>
                    <td>{{ localFormatDate($data->dtmDoc) }}</td>
                    <td>{{ $data->szCustomerId }}</td>
                    <td>{{ $data->customer->szName ?? '-' }}</td>
                    <td>{{ $data->customer->description ?? '-' }}</td>
                    <td>{{ $data->szDocId }}</td>
                    <td>{{ $data->sales->szName ?? '-' }}</td>                                                        
                    <td>{{ $item->product->szName ?? '-'}}</td>
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
                    @php
                        $totalDiskonTivSales += $item->getRawOriginal('decDiscPrinciple');
                        $totalDiskonDistributorSales += $item->getRawOriginal('decDiscDistributor');
                        $totalDiskonTivSistem += $totalDiscountPrinciple;
                        $totalDiskonDistributorSistem += $totalDiscountDistributor;
                        $selisihPrinciple = $item->getRawOriginal('decDiscPrinciple') - $totalDiscountPrinciple;
                        $selisihDistributor = $item->getRawOriginal('decDiscDistributor') - $totalDiscountDistributor;                        
                        $saveData = [
                            'szDocId' => $data->szDocId,
                            'szProductId' => $item->szProductId,
                            'szSalesId' => $data->szSalesId,
                            'szBranchId' => $data->szBranchId,
                            'bkbDate' => $data->getRawOriginal('dtmDoc'),
                            'decQty' => $item->decQty,
                            'discPrinciple' => $item->getRawOriginal('decDiscPrinciple'),
                            'discDistributor' => $item->getRawOriginal('decDiscDistributor'),
                            'sistemPrinciple' => $totalDiscountPrinciple,
                            'sistemDistributor' => $totalDiscountDistributor,
                            'detailProgram' => $discounts,
                            'selisihPrinciple' => $selisihPrinciple,
                            'selisihDistributor' => $selisihDistributor
                        ];
                        
                    @endphp
                    <td class="text-right">{{ localNumberAccountingFormat($selisihPrinciple, 0) }}</td>
                    <td class="text-right">{{ localNumberAccountingFormat($selisihDistributor, 0) }}</td>
                    <input type="hidden" name="szDocId[]" value="{{ json_encode($saveData) }}"  >                        
                </tr>
                @endforeach
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