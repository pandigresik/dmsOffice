<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/warehouses.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $warehouse->name }}</p>
    </div>
</div>

<!-- Internal Code Field -->
<div class="form-group row">
    {!! Form::label('internal_code', __('models/warehouses.fields.internal_code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $warehouse->internal_code }}</p>
    </div>
</div>

<!-- Company Id Field -->
<div class="form-group row">
    {!! Form::label('company_id', __('models/warehouses.fields.company_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $warehouse->company_id }}</p>
    </div>
</div>

