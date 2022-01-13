<!-- Account Id Field -->
<div class="form-group row">
    {!! Form::label('account_id', __('models/journalAccounts.fields.account_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('account_id', $accountItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Szbranchid Field -->
<div class="form-group row">
    {!! Form::label('szBranchId', __('models/journalAccounts.fields.szBranchId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szBranchId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/journalAccounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'required' => 'required']) !!}
</div>
</div>

<!-- Debit Field -->
<div class="form-group row">
    {!! Form::label('debit', __('models/journalAccounts.fields.debit').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('debit', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Credit Field -->
<div class="form-group row">
    {!! Form::label('credit', __('models/journalAccounts.fields.credit').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('credit', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Balance Field -->
<div class="form-group row">
    {!! Form::label('balance', __('models/journalAccounts.fields.balance').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('balance', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/journalAccounts.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('state', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15, 'required' => 'required']) !!}
</div>
</div>
