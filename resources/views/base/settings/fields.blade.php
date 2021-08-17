<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/settings.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/settings.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Value Field -->
<div class="form-group row">
    {!! Form::label('value', __('models/settings.fields.value').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('value', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>
</div>
