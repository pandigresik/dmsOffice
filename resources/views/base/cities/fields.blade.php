<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/cities.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Province Field -->
<div class="form-group row">
    {!! Form::label('province', __('models/cities.fields.province').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('province', null, ['class' => 'form-control','maxlength' => 60,'maxlength' => 60]) !!}
</div>
</div>
