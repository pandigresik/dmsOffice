<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/vendorLocations.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorLocation->address }}</p>
    </div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/vendorLocations.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorLocation->city }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/vendorLocations.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorLocation->state }}</p>
    </div>
</div>

<!-- Additional Cost Field -->
<div class="form-group row">
    {!! Form::label('additional_cost', __('models/vendorLocations.fields.additional_cost').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorLocation->additional_cost }}</p>
    </div>
</div>

<!-- Route Trip Id Field -->
<div class="form-group row">
    {!! Form::label('route_trip_id', __('models/vendorLocations.fields.route_trip_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorLocation->route_trip_id }}</p>
    </div>
</div>

