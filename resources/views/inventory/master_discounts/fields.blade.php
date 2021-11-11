<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/masterDiscounts.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10, 'required' => 'required']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/masterDiscounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Amount Value Field -->
<div class="form-group row">
    {!! Form::label('amount_value', __('models/masterDiscounts.fields.amount_value').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('amount_value', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}
</div>
</div>

<!-- Amount Procent Field -->
<div class="form-group row">
    {!! Form::label('amount_procent', __('models/masterDiscounts.fields.amount_procent').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('amount_procent', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
</div>
</div>

<!-- Start Date Field -->
<div class="form-group row">
    {!! Form::label('active_date', __('models/masterDiscounts.fields.active_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('active_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['singleDatePicker' => false, 'locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'active_date']) !!}
</div>
</div>

<!-- Product Field -->
<div class="form-group row">
    {!! Form::label('product', __('models/masterDiscounts.fields.product').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('products[]',$productItems, null, ['class' => 'form-control select2', 'required' => 'required','multiple' => 'multiple', 'data-astable' => 1]) !!}
</div>
</div>
