<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accountTypes.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Include Initial Balance Field -->
<div class="form-group row">
    {!! Form::label('include_initial_balance', __('models/accountTypes.fields.include_initial_balance').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('include_initial_balance', 0) !!}
        {!! Form::checkbox('include_initial_balance', '1', null) !!}
    </label>
</div>
</div>


<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/accountTypes.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('type',$typeItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Internal Group Field -->
<div class="form-group row">
    {!! Form::label('internal_group', __('models/accountTypes.fields.internal_group').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('internal_group',$groupItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Note Field -->
<div class="form-group row">
    {!! Form::label('note', __('models/accountTypes.fields.note').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('note', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>
