<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsCurrencies.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('entity_id', $entityItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/ifrsCurrencies.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 300,'maxlength' => 300]) !!}
</div>
</div>

<!-- Currency Code Field -->
<div class="form-group row">
    {!! Form::label('currency_code', __('models/ifrsCurrencies.fields.country_code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('currency_code', $currencyItems, null, ['class' => 'form-control select2', 'required']) !!}    
</div>
</div>