<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Uom</th>
            <th>Stock</th>
            <th>Adjust Stock</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stockQuant as $item)
            <tr>
                <td>{!! Form::hidden('stock_inventory_line.product_id['.$item->id.']', $item->product->id) !!}{{ $item->product->name }}</td>
                <td>{!! Form::hidden('stock_inventory_line.uom_id['.$item->id.']', $item->uom->id) !!}{{ $item->uom->name }}</td>
                <td>{!! Form::hidden('stock_inventory_line.current['.$item->id.']', $item->quantity) !!}{{ $item->quantity }}</td>
                <td>{!! Form::text('stock_inventory_line.quantity['.$item->id.']', $item->quantity, ['class' => 'form-control inputmask','data-unmask' => 1 ,'data-optionmask' => json_encode(config('local.number.integer'))]) !!}</td>
            </tr>
        @endforeach
    </tbody>
</table>