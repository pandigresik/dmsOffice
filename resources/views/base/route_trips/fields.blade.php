<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/routeTrips.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 60,'maxlength' => 60]) !!}
</div>
</div>

<!-- Vehicle Group Id Field -->
<div class="form-group row">
    {!! Form::label('vehicle_group_id', __('models/routeTrips.fields.vehicle_group_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('vehicle_group_id',$vehicleGroupItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Origin Field -->
<div class="form-group row">
    {!! Form::label('origin', __('models/routeTrips.fields.origin').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('origin',$cityOriginItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Destination Field -->
<div class="form-group row">
    {!! Form::label('destination', __('models/routeTrips.fields.destination').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('destination',$cityDestinationItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Price Field -->
<div class="form-group row">
    {!! Form::label('price', __('models/routeTrips.fields.price').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('price', null, ['class' => 'form-control inputmask', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}
</div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/routeTrips.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 60,'maxlength' => 60]) !!}
</div>
</div>
