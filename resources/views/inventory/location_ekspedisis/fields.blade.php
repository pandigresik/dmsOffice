{!! Form::hidden($prefixName.'[stateForm]', $stateForm) !!}
<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/locationEkspedisis.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text($prefixName.'[address]', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/locationEkspedisis.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select($prefixName.'[city]',$cityItems, null,['class' => 'form-control select2', 'required' => 'required']) !!}    
</div>
</div>

<!-- Additional Cost Field -->
<div class="form-group row">
    {!! Form::label('additional_cost', __('models/locationEkspedisis.fields.additional_cost').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number($prefixName.'[additional_cost]', null, ['class' => 'form-control']) !!}
</div>
</div>
