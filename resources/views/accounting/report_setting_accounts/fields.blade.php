<!-- Group Field -->
<div class="form-group row">
    {!! Form::label('group', __('models/reportSettingAccounts.fields.group').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('group', null, ['class' => 'form-control','maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Group Type Field -->
<div class="form-group row">
    {!! Form::label('group_type', __('models/reportSettingAccounts.fields.group_type').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('group_type', $groupTypeItems ,null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- List Account Field -->
@include('accounting.report_setting_accounts.account_fields')