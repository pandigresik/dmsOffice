<!-- Iid Field -->
<div class="form-group row">
    {!! Form::label('iId', __('models/dmsInvCarriervehicles.fields.iId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('iId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szid Field -->
<div class="form-group row">
    {!! Form::label('szId', __('models/dmsInvCarriervehicles.fields.szId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Intitemnumber Field -->
<div class="form-group row">
    {!! Form::label('intItemNumber', __('models/dmsInvCarriervehicles.fields.intItemNumber').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('intItemNumber', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Szvehicleno Field -->
<div class="form-group row">
    {!! Form::label('szVehicleNo', __('models/dmsInvCarriervehicles.fields.szVehicleNo').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szVehicleNo', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szdrivername Field -->
<div class="form-group row">
    {!! Form::label('szDriverName', __('models/dmsInvCarriervehicles.fields.szDriverName').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szDriverName', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>
