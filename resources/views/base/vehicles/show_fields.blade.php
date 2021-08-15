<!-- Number Registration Field -->
<div class="form-group row">
    {!! Form::label('number_registration', __('models/vehicles.fields.number_registration').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vehicle->number_registration }}</p>
    </div>
</div>

<!-- Number Identity Field -->
<div class="form-group row">
    {!! Form::label('number_identity', __('models/vehicles.fields.number_identity').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vehicle->number_identity }}</p>
    </div>
</div>

<!-- Vehicle Group Id Field -->
<div class="form-group row">
    {!! Form::label('vehicle_group_id', __('models/vehicles.fields.vehicle_group_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vehicle->vehicle_group_id }}</p>
    </div>
</div>

<!-- Vendor Expedition Id Field -->
<div class="form-group row">
    {!! Form::label('vendor_expedition_id', __('models/vehicles.fields.vendor_expedition_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vehicle->vendor_expedition_id }}</p>
    </div>
</div>

