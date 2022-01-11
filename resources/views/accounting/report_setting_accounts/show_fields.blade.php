<!-- Group Field -->
<div class="form-group row">
    {!! Form::label('group', __('models/reportSettingAccounts.fields.group').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $reportSettingAccount->group }}</p>
    </div>
</div>

<!-- Group Type Field -->
<div class="form-group row">
    {!! Form::label('group_type', __('models/reportSettingAccounts.fields.group_type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $reportSettingAccount->group_type }}</p>
    </div>
</div>

