<!-- Dms Inv Vehicle Id Field -->
<div class="form-group row">
    {!! Form::label('dms_inv_vehicle_id', __('models/vehicleEkspedisis.fields.dms_inv_vehicle_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('dms_inv_vehicle_id', $dmsInvVehicleItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>
