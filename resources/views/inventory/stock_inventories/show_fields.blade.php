<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/stockInventories.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockInventory->name }}</p>
    </div>
</div>

<!-- Warehouse Id Field -->
<div class="form-group row">
    {!! Form::label('warehouse_id', __('models/stockInventories.fields.warehouse_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockInventory->warehouse_id }}</p>
    </div>
</div>

