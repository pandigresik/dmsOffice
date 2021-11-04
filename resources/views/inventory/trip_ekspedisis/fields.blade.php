{!! Form::hidden($prefixName.'[stateForm]', $stateForm) !!}
{!! Form::label('trip', __('models/tripEkspedisis.fields.trip').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select($prefixName.'[trip[]]',$tripItems, null,['class' => 'form-control select2', 'required' => 'required', 'multiple' => 'multiple'], 'data-optionselect' => json_encode(config('local.select2.tag'))]) !!}    
</div>
</div>
