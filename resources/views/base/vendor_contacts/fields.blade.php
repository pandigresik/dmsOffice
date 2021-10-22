<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/vendorContacts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Position Field -->
<div class="form-group row">
    {!! Form::label('position', __('models/vendorContacts.fields.position').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('position', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', __('models/vendorContacts.fields.email').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Phone Field -->
<div class="form-group row">
    {!! Form::label('phone', __('models/vendorContacts.fields.phone').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Mobile Field -->
<div class="form-group row">
    {!! Form::label('mobile', __('models/vendorContacts.fields.mobile').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('mobile', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/vendorContacts.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/vendorContacts.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/vendorContacts.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('city',$cityItems, null, ['class' => 'form-control select2']) !!}    
</div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/vendorContacts.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('state', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>
