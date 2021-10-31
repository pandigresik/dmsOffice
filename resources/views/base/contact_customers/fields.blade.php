{!! Form::hidden($prefixName.'[stateForm]', $stateForm) !!}
<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/contactCustomers.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text($prefixName.'[name]', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required' ]) !!}
    </div>
</div>

<!-- Position Field -->
<div class="form-group row">
    {!! Form::label('position', __('models/contactCustomers.fields.position').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text($prefixName.'[position]', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required' ]) !!}
    </div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', __('models/contactCustomers.fields.email').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::email($prefixName.'[email]', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required' ]) !!}
    </div>
</div>

<!-- Phone Field -->
<div class="form-group row">
    {!! Form::label('phone', __('models/contactCustomers.fields.phone').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text($prefixName.'[phone]', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required' ]) !!}
    </div>
</div>

<!-- Mobile Field -->
<div class="form-group row">
    {!! Form::label('mobile', __('models/contactCustomers.fields.mobile').':', ['class' => 'col-md-3 col-form-label'])
    !!}
    <div class="col-md-9">
        {!! Form::text($prefixName.'[mobile]', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/contactCustomers.fields.description').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text($prefixName.'[description]', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/contactCustomers.fields.address').':', ['class' => 'col-md-3 col-form-label'])
    !!}
    <div class="col-md-9">
        {!! Form::text($prefixName.'[address]', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required' ]) !!}
    </div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/contactCustomers.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text($prefixName.'[city]', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required' ]) !!}
    </div>
</div>