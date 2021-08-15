<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/vendorExpeditions.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/vendorExpeditions.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 80,'maxlength' => 80]) !!}
</div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', __('models/vendorExpeditions.fields.email').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>
</div>
