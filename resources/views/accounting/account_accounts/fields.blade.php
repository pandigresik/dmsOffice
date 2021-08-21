<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accountAccounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required']) !!}
</div>
</div>

<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/accountAccounts.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20, 'required']) !!}
</div>
</div>

<!-- Company Id Field -->
<div class="form-group row">
    {!! Form::label('company_id', __('models/accountAccounts.fields.company_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('company_id', $companyItems, null, ['class' => 'form-control select2', 'required']) !!}
</div>
</div>

<!-- Is Off Balance Field -->
<div class="form-group row">
    {!! Form::label('is_off_balance', __('models/accountAccounts.fields.is_off_balance').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('is_off_balance', 0) !!}
        {!! Form::checkbox('is_off_balance', '1', null) !!}
    </label>
</div>
</div>


<!-- Reconcile Field -->
<div class="form-group row">
    {!! Form::label('reconcile', __('models/accountAccounts.fields.reconcile').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('reconcile', 0) !!}
        {!! Form::checkbox('reconcile', '1', null) !!}
    </label>
</div>
</div>


<!-- Internal Type Field -->
<div class="form-group row">
    {!! Form::label('internal_type', __('models/accountAccounts.fields.internal_type').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('internal_type',$typeItems, null, ['class' => 'form-control select2', 'required']) !!}
</div>
</div>

<!-- Internal Group Field -->
<div class="form-group row">
    {!! Form::label('internal_group', __('models/accountAccounts.fields.internal_group').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('internal_group',$groupItems, null, ['class' => 'form-control select2', 'required']) !!}
</div>
</div>

<!-- Note Field -->
<div class="form-group row">
    {!! Form::label('note', __('models/accountAccounts.fields.note').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::textarea('note', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'rows' => 3]) !!}
</div>
</div>
