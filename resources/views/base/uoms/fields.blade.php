<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/uoms.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Uom Category Id Field -->
<div class="form-group row">
    {!! Form::label('uom_category_id', __('models/uoms.fields.uom_category_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('uom_category_id', $uomCategoryItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Factor Field -->
<div class="form-group row">
    {!! Form::label('factor', __('models/uoms.fields.factor').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('factor', null, ['class' => 'form-control inputmask', 'data-unmask' => true, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
</div>
</div>

<!-- Uom Type Field -->
<div class="form-group row">
    {!! Form::label('uom_type', __('models/uoms.fields.uom_type').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('uom_type', $uomTypeItems, null, ['class' => 'form-control select2','maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>
