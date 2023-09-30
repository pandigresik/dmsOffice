<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/accounts.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10, 'required' => 'required']) !!}
</div>
</div>

<!-- reverse_value Field -->
<div class="form-group row">
    {!! Form::label('reverse_value', __('models/accounts.fields.reverse_value').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('reverse_value', 0) !!}
        {!! Form::checkbox('reverse_value', '1', null) !!}
    </label>
</div>
</div>

<!-- reverse_value Field -->
<div class="form-group row">
    {!! Form::label('has_balance', __('models/accounts.fields.has_balance').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('has_balance', 0) !!}
        {!! Form::checkbox('has_balance', '1', null) !!}
    </label>
</div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/accounts.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'required' => 'required']) !!}
</div>
</div>
