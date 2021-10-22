<!-- Number Registration Field -->
<div class="form-group row">
    {!! Form::label('number_registration', __('models/vehicles.fields.number_registration').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('number_registration', null, ['class' => 'form-control inputmask', 'data-optionmask' => json_encode(config('local.textmask.nopol')), 'maxlength' => 15,'maxlength' => 15]) !!}
</div>
</div>

<!-- Number Identity Field -->
<div class="form-group row">
    {!! Form::label('number_identity', __('models/vehicles.fields.number_identity').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('number_identity', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>
</div>

<!-- Vehicle Group Id Field -->
<div class="form-group row">
    {!! Form::label('vehicle_group_id', __('models/vehicles.fields.vehicle_group_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('vehicle_group_id', $vehicleGroupItems?? [] ,null, ['class' => 'form-control select2']) !!}
</div>
</div>
