<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accountTypes.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountType->name }}</p>
    </div>
</div>

<!-- Include Initial Balance Field -->
<div class="form-group row">
    {!! Form::label('include_initial_balance', __('models/accountTypes.fields.include_initial_balance').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountType->include_initial_balance }}</p>
    </div>
</div>

<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/accountTypes.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountType->type }}</p>
    </div>
</div>

<!-- Internal Group Field -->
<div class="form-group row">
    {!! Form::label('internal_group', __('models/accountTypes.fields.internal_group').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountType->internal_group }}</p>
    </div>
</div>

<!-- Note Field -->
<div class="form-group row">
    {!! Form::label('note', __('models/accountTypes.fields.note').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountType->note }}</p>
    </div>
</div>

