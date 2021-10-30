<!-- Dms Inv Carrier Id Field -->
<div class="form-group row">
    {!! Form::label('dms_inv_carrier_id', __('models/contactEkspedisis.fields.dms_inv_carrier_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('dms_inv_carrier_id', $dmsInvCarrierItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/contactEkspedisis.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Position Field -->
<div class="form-group row">
    {!! Form::label('position', __('models/contactEkspedisis.fields.position').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('position', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', __('models/contactEkspedisis.fields.email').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Phone Field -->
<div class="form-group row">
    {!! Form::label('phone', __('models/contactEkspedisis.fields.phone').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Mobile Field -->
<div class="form-group row">
    {!! Form::label('mobile', __('models/contactEkspedisis.fields.mobile').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('mobile', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/contactEkspedisis.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/contactEkspedisis.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/contactEkspedisis.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('city', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>
