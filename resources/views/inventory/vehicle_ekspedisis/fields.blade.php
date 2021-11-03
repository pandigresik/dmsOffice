{!! Form::hidden($prefixName.'[stateForm]', $stateForm) !!}
{!! Form::label('vehicle', __('models/vehicleEkspedisis.fields.vehicle').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select($prefixName.'[vehicle[]]',$dmsInvVehicleItems, null,['class' => 'form-control select2', 'required' => 'required', 'multiple' => 'multiple']) !!}    
</div>
</div>
