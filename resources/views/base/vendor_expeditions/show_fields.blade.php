<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/vendorExpeditions.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorExpedition->name }}</p>
    </div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/vendorExpeditions.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorExpedition->address }}</p>
    </div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', __('models/vendorExpeditions.fields.email').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $vendorExpedition->email }}</p>
    </div>
</div>

