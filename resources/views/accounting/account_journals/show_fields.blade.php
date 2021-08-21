<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accountJournals.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountJournal->name }}</p>
    </div>
</div>

<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/accountJournals.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountJournal->code }}</p>
    </div>
</div>

<!-- Company Id Field -->
<div class="form-group row">
    {!! Form::label('company_id', __('models/accountJournals.fields.company_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountJournal->company_id }}</p>
    </div>
</div>

<!-- Default Debit Account Id Field -->
<div class="form-group row">
    {!! Form::label('default_debit_account_id', __('models/accountJournals.fields.default_debit_account_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountJournal->default_debit_account_id }}</p>
    </div>
</div>

<!-- Default Credit Account Id Field -->
<div class="form-group row">
    {!! Form::label('default_credit_account_id', __('models/accountJournals.fields.default_credit_account_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountJournal->default_credit_account_id }}</p>
    </div>
</div>

<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/accountJournals.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountJournal->type }}</p>
    </div>
</div>

