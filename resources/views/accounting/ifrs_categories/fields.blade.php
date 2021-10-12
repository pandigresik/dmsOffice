<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsCategories.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('entity_id', $entityItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Category Type Field -->
<div class="form-group row">
    {!! Form::label('category_type', __('models/ifrsCategories.fields.category_type').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('category_type', $categoryItems, null, ['class' => 'form-control select2']) !!}    
</div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/ifrsCategories.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 300,'maxlength' => 300]) !!}
</div>
</div>