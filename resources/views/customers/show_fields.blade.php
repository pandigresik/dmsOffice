<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/customers.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $customers->name }}</p>
    </div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', __('models/customers.fields.email').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $customers->email }}</p>
    </div>
</div>

<!-- Hp Number Field -->
<div class="form-group row">
    {!! Form::label('hp_number', __('models/customers.fields.hp_number').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $customers->hp_number }}</p>
    </div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/customers.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $customers->address }}</p>
    </div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/customers.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $customers->city }}</p>
    </div>
</div>

<!-- Country Field -->
<div class="form-group row">
    {!! Form::label('country', __('models/customers.fields.country').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $customers->country }}</p>
    </div>
</div>

