<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/vendorLocations.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/vendorLocations.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('city', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/vendorLocations.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('state', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Additional Cost Field -->
<div class="form-group row">
    {!! Form::label('additional_cost', __('models/vendorLocations.fields.additional_cost').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('additional_cost', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Route Trip Id Field -->
<div class="form-group row">
    {!! Form::label('route_trip_id', __('models/vendorLocations.fields.route_trip_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('route_trip_id', $routeTripItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>
