<!-- Product Id Field -->
<div class="form-group row">
    {!! Form::label('product_id', __('models/stockQuants.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockQuant->product_id }}</p>
    </div>
</div>

<!-- Warehouse Id Field -->
<div class="form-group row">
    {!! Form::label('warehouse_id', __('models/stockQuants.fields.warehouse_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockQuant->warehouse_id }}</p>
    </div>
</div>

<!-- Quantity Field -->
<div class="form-group row">
    {!! Form::label('quantity', __('models/stockQuants.fields.quantity').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockQuant->quantity }}</p>
    </div>
</div>

<!-- Uom Id Field -->
<div class="form-group row">
    {!! Form::label('uom_id', __('models/stockQuants.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockQuant->uom_id }}</p>
    </div>
</div>

