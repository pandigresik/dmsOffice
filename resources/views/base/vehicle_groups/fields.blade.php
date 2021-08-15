<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/vehicleGroups.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Capacity Field -->
<div class="form-group row">
    {!! Form::label('capacity', __('models/vehicleGroups.fields.capacity').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('capacity', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Uom Field -->
<div class="form-group row">
    {!! Form::label('uom', __('models/vehicleGroups.fields.uom').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('uom', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/vehicleGroups.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>
</div>
