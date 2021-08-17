<!-- Product Id Field -->
<div class="form-group row">
    {!! Form::label('product_id', __('models/stockQuants.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Warehouse Id Field -->
<div class="form-group row">
    {!! Form::label('warehouse_id', __('models/stockQuants.fields.warehouse_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('warehouse_id', $warehouseItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Quantity Field -->
<div class="form-group row">
    {!! Form::label('quantity', __('models/stockQuants.fields.quantity').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Uom Id Field -->
<div class="form-group row">
    {!! Form::label('uom_id', __('models/stockQuants.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('uom_id', $uomItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>
