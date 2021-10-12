<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsAccounts.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('entity_id', $entityItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Category Id Field -->
<div class="form-group row">
    {!! Form::label('category_id', __('models/ifrsAccounts.fields.category_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('category_id', $categoryItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Currency Id Field -->
<div class="form-group row">
    {!! Form::label('currency_id', __('models/ifrsAccounts.fields.currency_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('currency_id', $currencyItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/ifrsAccounts.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('code', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/ifrsAccounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required']) !!}
</div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/ifrsAccounts.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::textarea('description', null, ['class' => 'form-control','maxlength' => 200, 'rows' => 3]) !!}    
</div>
</div>
