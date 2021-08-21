<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accountJournals.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/accountJournals.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 8,'maxlength' => 8]) !!}
</div>
</div>

<!-- Company Id Field -->
<div class="form-group row">
    {!! Form::label('company_id', __('models/accountJournals.fields.company_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('company_id', $companyItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Default Debit Account Id Field -->
<div class="form-group row">
    {!! Form::label('default_debit_account_id', __('models/accountJournals.fields.default_debit_account_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('default_debit_account_id', $defaultDebitAccountItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Default Credit Account Id Field -->
<div class="form-group row">
    {!! Form::label('default_credit_account_id', __('models/accountJournals.fields.default_credit_account_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('default_credit_account_id', $defaultCreditAccountItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/accountJournals.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('type',$typeItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>
