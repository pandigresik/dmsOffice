<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/stockPickingTypes.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockPickingType->name }}</p>
    </div>
</div>

<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/stockPickingTypes.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $stockPickingType->code }}</p>
    </div>
</div>

