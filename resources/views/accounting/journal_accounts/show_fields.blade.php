<!-- Account Id Field -->
<div class="form-group row">
    {!! Form::label('account_id', __('models/journalAccounts.fields.account_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $journalAccount->account_id }}</p>
    </div>
</div>

<!-- Szbranchid Field -->
<div class="form-group row">
    {!! Form::label('szBranchId', __('models/journalAccounts.fields.szBranchId').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $journalAccount->szBranchId }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/journalAccounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $journalAccount->name }}</p>
    </div>
</div>

<!-- Debit Field -->
<div class="form-group row">
    {!! Form::label('debit', __('models/journalAccounts.fields.debit').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $journalAccount->debit }}</p>
    </div>
</div>

<!-- Credit Field -->
<div class="form-group row">
    {!! Form::label('credit', __('models/journalAccounts.fields.credit').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $journalAccount->credit }}</p>
    </div>
</div>

<!-- Balance Field -->
<div class="form-group row">
    {!! Form::label('balance', __('models/journalAccounts.fields.balance').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $journalAccount->balance }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/journalAccounts.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $journalAccount->state }}</p>
    </div>
</div>

