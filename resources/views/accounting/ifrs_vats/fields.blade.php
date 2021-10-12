<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsVats.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('entity_id', $entityItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Account Id Field -->
<div class="form-group row">
    {!! Form::label('account_id', __('models/ifrsVats.fields.account_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('account_id', $accountItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>


<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/ifrsVats.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 1,'maxlength' => 1]) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/ifrsVats.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 300,'maxlength' => 300]) !!}
</div>
</div>

<!-- Rate Field -->
<div class="form-group row">
    {!! Form::label('rate', __('models/ifrsVats.fields.rate').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('rate', null, ['class' => 'form-control']) !!}
</div>
</div>
