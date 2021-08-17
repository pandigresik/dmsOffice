<!-- Warehouse Id Field -->
<div class="form-group row">
    {!! Form::label('warehouse_id', __('models/stockPickings.fields.warehouse_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockPicking->warehouse_id }}</p>
    </div>
</div>

<!-- Stock Picking Type Id Field -->
<div class="form-group row">
    {!! Form::label('stock_picking_type_id', __('models/stockPickings.fields.stock_picking_type_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockPicking->stock_picking_type_id }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/stockPickings.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockPicking->name }}</p>
    </div>
</div>

<!-- Quantity Field -->
<div class="form-group row">
    {!! Form::label('quantity', __('models/stockPickings.fields.quantity').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockPicking->quantity }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/stockPickings.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockPicking->state }}</p>
    </div>
</div>

<!-- External References Field -->
<div class="form-group row">
    {!! Form::label('external_references', __('models/stockPickings.fields.external_references').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockPicking->external_references }}</p>
    </div>
</div>

<!-- Vendor Id Field -->
<div class="form-group row">
    {!! Form::label('vendor_id', __('models/stockPickings.fields.vendor_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockPicking->vendor_id }}</p>
    </div>
</div>

<!-- Note Field -->
<div class="form-group row">
    {!! Form::label('note', __('models/stockPickings.fields.note').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockPicking->note }}</p>
    </div>
</div>

