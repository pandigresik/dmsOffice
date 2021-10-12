<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsAccounts.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsAccounts->entity_id }}</p>
    </div>
</div>

<!-- Category Id Field -->
<div class="form-group row">
    {!! Form::label('category_id', __('models/ifrsAccounts.fields.category_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsAccounts->category_id }}</p>
    </div>
</div>

<!-- Currency Id Field -->
<div class="form-group row">
    {!! Form::label('currency_id', __('models/ifrsAccounts.fields.currency_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsAccounts->currency_id }}</p>
    </div>
</div>

<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/ifrsAccounts.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsAccounts->code }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/ifrsAccounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsAccounts->name }}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/ifrsAccounts.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsAccounts->description }}</p>
    </div>
</div>

<!-- Account Type Field -->
<div class="form-group row">
    {!! Form::label('account_type', __('models/ifrsAccounts.fields.account_type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsAccounts->account_type }}</p>
    </div>
</div>

<!-- Destroyed At Field -->
<div class="form-group row">
    {!! Form::label('destroyed_at', __('models/ifrsAccounts.fields.destroyed_at').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsAccounts->destroyed_at }}</p>
    </div>
</div>

