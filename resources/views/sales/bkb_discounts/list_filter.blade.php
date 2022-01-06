<div class="table-responsive">
    <input type="hidden" name="start_date" value="{{ $startDate }}">
    <input type="hidden" name="end_date" value="{{ $endDate }}">
    <input type="hidden" name="branch_id" value="{{ $branchId }}">
    <table class="table table-bordered" style="font-size:80%">
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
            @forelse($datas as $index => $item)                
                    @php
                        $additionalInfo = $item->getAdditionalInfo();
                        $totalDiscountPrinciple = 0;
                        $totalDiscountDistributor = 0;
                                                                        
                    @endphp                    
                <tr>
                    <td>{{ ++$number }}</td>
                    <td>{{ $additionalInfo['depo'] }}</td>
                    <td>{{ localFormatDate($additionalInfo['dtmDoc']) }}</td>
                    <td>{{ $additionalInfo['szCustomerId'] }}</td>
                    <td>{{ $additionalInfo['customerName'] }}</td>
                    <td>{{ $additionalInfo['customerAddress'] }}</td>
                    <td>{{ $item->szDocId }}</td>
                    <td>{{ $additionalInfo['szSalesId'] }}</td>
                    <td>{{ $additionalInfo['salesName'] }}</td>
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
                            'szDocId' => $item->szDocId,
                            'szProductId' => $item->szProductId,
                            'szSalesId' => $additionalInfo['szSalesId'],
                            'szBranchId' => $additionalInfo['szBranchId'],
                            'bkbDate' => $additionalInfo['dtmDoc'],
                            'decQty' => $item->decQty,
                            'discPrinciple' => $item->getRawOriginal('decDiscPrinciple'),
                            'discDistributor' => $item->getRawOriginal('decDiscDistributor'),
                            'sistemPrinciple' => $totalDiscountPrinciple,
                            'sistemDistributor' => $totalDiscountDistributor,
                            'detailProgram' => $item->getDiscounts(),
                            'selisihPrinciple' => $selisihPrinciple,
                            'selisihDistributor' => $selisihDistributor
                        ];
                        
                    @endphp
                    <td class="text-right {{ $selisihPrinciple != 0 ? 'text-danger' : ''}}">{{ localNumberAccountingFormat($selisihPrinciple, 0) }}</td>
                    <td class="text-right {{ $selisihDistributor != 0 ? 'text-danger' : ''}}">{{ localNumberAccountingFormat($selisihDistributor, 0) }}</td>
                    <input type="hidden" name="szDocId[]" value="{{ json_encode($saveData) }}"  >                        
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