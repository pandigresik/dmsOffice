<!-- Dms Inv Carrier Id Field -->
<div class="form-group row">
    {!! Form::label('dms_inv_carrier_id', __('models/tripEkspedisis.fields.dms_inv_carrier_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $tripEkspedisi->dms_inv_carrier_id }}</p>
    </div>
</div>

<!-- Trip Id Field -->
<div class="form-group row">
    {!! Form::label('trip_id', __('models/tripEkspedisis.fields.trip_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $tripEkspedisi->trip_id }}</p>
    </div>
</div>

