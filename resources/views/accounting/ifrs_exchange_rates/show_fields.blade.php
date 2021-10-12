<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsExchangeRates.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsExchangeRates->entity_id }}</p>
    </div>
</div>

<!-- Currency Id Field -->
<div class="form-group row">
    {!! Form::label('currency_id', __('models/ifrsExchangeRates.fields.currency_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsExchangeRates->currency_id }}</p>
    </div>
</div>

<!-- Valid From Field -->
<div class="form-group row">
    {!! Form::label('valid_from', __('models/ifrsExchangeRates.fields.valid_from').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsExchangeRates->valid_from }}</p>
    </div>
</div>

<!-- Valid To Field -->
<div class="form-group row">
    {!! Form::label('valid_to', __('models/ifrsExchangeRates.fields.valid_to').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsExchangeRates->valid_to }}</p>
    </div>
</div>

<!-- Rate Field -->
<div class="form-group row">
    {!! Form::label('rate', __('models/ifrsExchangeRates.fields.rate').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsExchangeRates->rate }}</p>
    </div>
</div>

<!-- Destroyed At Field -->
<div class="form-group row">
    {!! Form::label('destroyed_at', __('models/ifrsExchangeRates.fields.destroyed_at').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsExchangeRates->destroyed_at }}</p>
    </div>
</div>

