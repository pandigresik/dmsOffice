<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsExchangeRates.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('entity_id', $entityItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Currency Id Field -->
<div class="form-group row">
    {!! Form::label('currency_id', __('models/ifrsExchangeRates.fields.currency_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('currency_id', $currencyItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Valid From Field -->
<div class="form-group row">
    {!! Form::label('valid_from', __('models/ifrsExchangeRates.fields.valid_from').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('valid_from', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'valid_from']) !!}
</div>
</div>

<!-- Valid To Field -->
<div class="form-group row">
    {!! Form::label('valid_to', __('models/ifrsExchangeRates.fields.valid_to').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('valid_to', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'valid_to']) !!}
</div>
</div>

<!-- Rate Field -->
<div class="form-group row">
    {!! Form::label('rate', __('models/ifrsExchangeRates.fields.rate').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('rate', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Destroyed At Field -->
<div class="form-group row">
    {!! Form::label('destroyed_at', __('models/ifrsExchangeRates.fields.destroyed_at').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('destroyed_at', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'destroyed_at']) !!}
</div>
</div>
