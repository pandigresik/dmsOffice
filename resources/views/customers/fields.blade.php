<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/customers.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', __('models/customers.fields.email').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- Hp Number Field -->
<div class="form-group row">
    {!! Form::label('hp_number', __('models/customers.fields.hp_number').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('hp_number', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
</div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/customers.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/customers.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('city', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- Country Field -->
<div class="form-group row">
    {!! Form::label('country', __('models/customers.fields.country').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('country', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>
