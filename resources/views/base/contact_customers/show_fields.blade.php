<!-- Dms Ar Customer Id Field -->
<div class="form-group row">
    {!! Form::label('dms_ar_customer_id', __('models/contactCustomers.fields.dms_ar_customer_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $contactCustomer->dms_ar_customer_id }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/contactCustomers.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $contactCustomer->name }}</p>
    </div>
</div>

<!-- Position Field -->
<div class="form-group row">
    {!! Form::label('position', __('models/contactCustomers.fields.position').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $contactCustomer->position }}</p>
    </div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', __('models/contactCustomers.fields.email').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $contactCustomer->email }}</p>
    </div>
</div>

<!-- Phone Field -->
<div class="form-group row">
    {!! Form::label('phone', __('models/contactCustomers.fields.phone').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $contactCustomer->phone }}</p>
    </div>
</div>

<!-- Mobile Field -->
<div class="form-group row">
    {!! Form::label('mobile', __('models/contactCustomers.fields.mobile').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $contactCustomer->mobile }}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/contactCustomers.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $contactCustomer->description }}</p>
    </div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/contactCustomers.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $contactCustomer->address }}</p>
    </div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/contactCustomers.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $contactCustomer->city }}</p>
    </div>
</div>

