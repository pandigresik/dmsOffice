<!-- Warehouse Id Field -->
<div class="form-group row">
    {!! Form::label('warehouse_id', __('models/stockPickings.fields.warehouse_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('warehouse_id', $warehouseItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Stock Picking Type Id Field -->
<div class="form-group row">
    {!! Form::label('stock_picking_type_id', __('models/stockPickings.fields.stock_picking_type_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('stock_picking_type_id', $stockPickingTypeItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/stockPickings.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 70,'maxlength' => 70]) !!}
</div>
</div>

<!-- Quantity Field -->
<div class="form-group row">
    {!! Form::label('quantity', __('models/stockPickings.fields.quantity').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/stockPickings.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('state', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
</div>
</div>

<!-- External References Field -->
<div class="form-group row">
    {!! Form::label('external_references', __('models/stockPickings.fields.external_references').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('external_references', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Vendor Id Field -->
<div class="form-group row">
    {!! Form::label('vendor_id', __('models/stockPickings.fields.vendor_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('vendor_id', $vendorItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Note Field -->
<div class="form-group row">
    {!! Form::label('note', __('models/stockPickings.fields.note').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('note', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>
</div>
