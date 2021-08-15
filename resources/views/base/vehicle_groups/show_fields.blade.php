<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/vehicleGroups.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vehicleGroup->name }}</p>
    </div>
</div>

<!-- Capacity Field -->
<div class="form-group row">
    {!! Form::label('capacity', __('models/vehicleGroups.fields.capacity').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vehicleGroup->capacity }}</p>
    </div>
</div>

<!-- Uom Field -->
<div class="form-group row">
    {!! Form::label('uom', __('models/vehicleGroups.fields.uom').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vehicleGroup->uom }}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/vehicleGroups.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vehicleGroup->description }}</p>
    </div>
</div>

