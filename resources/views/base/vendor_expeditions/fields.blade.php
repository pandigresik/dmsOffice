<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/vendorExpeditions.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
    </div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/vendorExpeditions.fields.address').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 80,'maxlength' => 80]) !!}
    </div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', __('models/vendorExpeditions.fields.email').':', ['class' => 'col-md-3 col-form-label'])
    !!}
    <div class="col-md-9">
        {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
    </div>
</div>

<!-- Is Supplier Field -->
<div class="form-group row">
    {!! Form::label('is_supplier', __('models/vendorExpeditions.fields.is_supplier').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <div class="form-check checkbox">
        {!! Form::checkbox('is_supplier',true,null,['class' => 'form-check-input']) !!}
        </div>
    </div>
</div>

<!-- Is Customer Field -->
<div class="form-group row">
    {!! Form::label('is_customer', __('models/vendorExpeditions.fields.is_customer').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <div class="form-check checkbox">
        {!! Form::checkbox('is_customer',true,null,['class' => 'form-check-input']) !!}
        </div>
    </div>
</div>

<!-- Is Supplier Field -->
<div class="form-group row">
    {!! Form::label('is_expedition', __('models/vendorExpeditions.fields.is_expedition').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <div class="form-check checkbox">
        {!! Form::checkbox('is_expedition',true,null,['class' => 'form-check-input']) !!}
        </div>
    </div>
</div>
