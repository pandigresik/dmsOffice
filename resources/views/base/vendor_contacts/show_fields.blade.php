<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/vendorContacts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorContact->name }}</p>
    </div>
</div>

<!-- Position Field -->
<div class="form-group row">
    {!! Form::label('position', __('models/vendorContacts.fields.position').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorContact->position }}</p>
    </div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', __('models/vendorContacts.fields.email').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorContact->email }}</p>
    </div>
</div>

<!-- Phone Field -->
<div class="form-group row">
    {!! Form::label('phone', __('models/vendorContacts.fields.phone').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorContact->phone }}</p>
    </div>
</div>

<!-- Mobile Field -->
<div class="form-group row">
    {!! Form::label('mobile', __('models/vendorContacts.fields.mobile').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorContact->mobile }}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/vendorContacts.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorContact->description }}</p>
    </div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/vendorContacts.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorContact->address }}</p>
    </div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/vendorContacts.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorContact->city }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/vendorContacts.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorContact->state }}</p>
    </div>
</div>

