<!-- Dms Inv Product Id Field -->
<div class="form-group row">
    {!! Form::label('dms_inv_product_id', __('models/productPrices.fields.dms_inv_product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::select('dms_inv_product_id', $dmsInvProductItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Price Field -->
<div class="form-group row">
    {!! Form::label('price', __('models/productPrices.fields.price').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('price', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
</div>
</div>

<!-- DPP Price Field -->
<div class="form-group row">
    {!! Form::label('dpp_price', __('models/productPrices.fields.dpp_price').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('dpp_price', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
</div>
</div>

<!-- Start Date Field -->
<div class="form-group row">
    {!! Form::label('start_date', __('models/productPrices.fields.start_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('start_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'start_date']) !!}
</div>
</div>
