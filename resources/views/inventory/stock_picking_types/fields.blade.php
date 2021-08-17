<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/stockPickingTypes.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/stockPickingTypes.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>
