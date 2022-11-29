@php
$hppTotal = 0;
$pengurangTotal = 0;
$jualTotal = 0;
@endphp
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Stock Awal</th>
            <th>MI</th>
            <th>DI</th>
            <th>SI</th>
            <th>MO</th>
            <th>DO</th>
            <th>SO</th>
            <th>Morphing</th>
            <th>Transfer</th>
            <th>Stock Akhir</th>
            <th>Harga</th>
            <th>Total <br>(DO - DI)</th>
            <th>Info</th>
            <th style="width:40px">Pengurang</th>
            <th>HPP</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $item)
        @if ($item->isEmptyTransaction())
        @continue
        @endif
        @php
        $saldoAwal = $item->first_stock;
        $saldoAkhir = ($saldoAwal + $item->mutation_in + $item->distribution_in + $item->supplier_in ) - ( $item->mutation_out + $item->distribution_out + $item->supplier_out );
        $currentPrice = $item->price;
        $pengurang = $item->substractor ?? 0;
        // $amountOut = ($item->distribution_out + $item->mutation_out + $item->supplier_out) * $currentPrice;
        $amountOut = ($item->distribution_out - $item->distribution_in) * $currentPrice;
        $hpp = $amountOut - $pengurang;
        $hppTotal += $hpp;
        $jualTotal += $amountOut;
        $item->cogs = $hpp;
        $item->last_stock = $saldoAkhir;
        $item->additional_info = $item->additional_info ?? '<div class="badge bg-info">qty_in_change :
            '.$item->qty_in_change.'</div>
        <div class="badge bg-warning">diff_price :'.localNumberFormat($item->distribution_inff_price,0).'</div>';
        @endphp
        <tr>
            <td>
                <input type="hidden" name="history[{{ $item->product_id }}]" value="{{ $item->toJson() }}">
                {{ $item->szName }} - ( {{ $item->product_id }} )
            </td>
            <td class="text-right">{{ localNumberFormat($saldoAwal , 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->mutation_in, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->distribution_in, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->supplier_in, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->mutation_out, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->distribution_out, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->supplier_out, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->morphing, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($item->transfer, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($saldoAkhir, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($currentPrice, 0) }}</td>
            <td class="text-right">{{ localNumberFormat($amountOut, 0) }}</td>
            <td style="width:40px">{!! $item->additional_info !!}</td>
            <td style="min-width:110px;padding:16px 4px" class="text-right pengurang">
            <input type="text" onchange="updateCogs(this)" name="pengurang[{{ $item->product_id }}]"
                    class="form-control form-control-sm inputmask" data-unmask="1"
                    data-optionmask="{{ json_encode(config('local.number.integer')) }}"
                    value="{{ localNumberFormat($pengurang, 0) }}" style="padding-left:2px" /></td>
            <td class="text-right cogs">{{ localNumberFormat($hpp, 0) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="12"></th>
            <th class="text-right originalcogs">{{ localNumberFormat($jualTotal, 2) }}</th>
            <th></th>
            <th class="text-right pengurang">{{ localNumberFormat($pengurangTotal, 2) }}</th>
            <th class="text-right cogs">{{ localNumberFormat($hppTotal, 2) }}</th>
        </tr>
    </tfoot>
</table>