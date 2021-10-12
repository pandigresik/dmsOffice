<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsCurrencies.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsCurrencies->entity_id }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/ifrsCurrencies.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsCurrencies->name }}</p>
    </div>
</div>

<!-- Currency Code Field -->
<div class="form-group row">
    {!! Form::label('currency_code', __('models/ifrsCurrencies.fields.currency_code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsCurrencies->currency_code }}</p>
    </div>
</div>

<!-- Destroyed At Field -->
<div class="form-group row">
    {!! Form::label('destroyed_at', __('models/ifrsCurrencies.fields.destroyed_at').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsCurrencies->destroyed_at }}</p>
    </div>
</div>

