<!-- Dms Ar Customer Id Field -->
<div class="form-group row">
    {!! Form::label('dms_ar_customer_id', __('models/locationCustomers.fields.dms_ar_customer_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationCustomer->dms_ar_customer_id }}</p>
    </div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/locationCustomers.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationCustomer->address }}</p>
    </div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/locationCustomers.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationCustomer->city }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/locationCustomers.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationCustomer->state }}</p>
    </div>
</div>

<!-- Additional Cost Field -->
<div class="form-group row">
    {!! Form::label('additional_cost', __('models/locationCustomers.fields.additional_cost').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationCustomer->additional_cost }}</p>
    </div>
</div>

