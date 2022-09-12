<!-- Dms Inv Product Id Field -->
<div class="form-group row">
    {!! Form::label('dms_inv_product_id', __('models/productPriceLogs.fields.dms_inv_product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('dms_inv_product_id', $dmsInvProductItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Price Field -->
<div class="form-group row">
    {!! Form::label('price', __('models/productPriceLogs.fields.price').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Start Date Field -->
<div class="form-group row">
    {!! Form::label('start_date', __('models/productPriceLogs.fields.start_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('start_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'start_date']) !!}
</div>
</div>
