<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accountAccounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountAccount->name }}</p>
    </div>
</div>

<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/accountAccounts.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountAccount->code }}</p>
    </div>
</div>

<!-- Company Id Field -->
<div class="form-group row">
    {!! Form::label('company_id', __('models/accountAccounts.fields.company_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountAccount->company_id }}</p>
    </div>
</div>

<!-- Is Off Balance Field -->
<div class="form-group row">
    {!! Form::label('is_off_balance', __('models/accountAccounts.fields.is_off_balance').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountAccount->is_off_balance }}</p>
    </div>
</div>

<!-- Reconcile Field -->
<div class="form-group row">
    {!! Form::label('reconcile', __('models/accountAccounts.fields.reconcile').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountAccount->reconcile }}</p>
    </div>
</div>

<!-- Internal Type Field -->
<div class="form-group row">
    {!! Form::label('internal_type', __('models/accountAccounts.fields.internal_type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountAccount->internal_type }}</p>
    </div>
</div>

<!-- Internal Group Field -->
<div class="form-group row">
    {!! Form::label('internal_group', __('models/accountAccounts.fields.internal_group').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountAccount->internal_group }}</p>
    </div>
</div>

<!-- Note Field -->
<div class="form-group row">
    {!! Form::label('note', __('models/accountAccounts.fields.note').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountAccount->note }}</p>
    </div>
</div>

