<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/settings.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $setting->code }}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/settings.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $setting->description }}</p>
    </div>
</div>

<!-- Value Field -->
<div class="form-group row">
    {!! Form::label('value', __('models/settings.fields.value').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $setting->value }}</p>
    </div>
</div>

