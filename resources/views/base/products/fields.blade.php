<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/products.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
    </div>
</div>

<!-- Internal Code Field -->
<div class="form-group row">
    {!! Form::label('internal_code', __('models/products.fields.internal_code').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('internal_code', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
    </div>
</div>

<!-- Uom Id Field -->
<div class="form-group row">
    {!! Form::label('uom_id', __('models/products.fields.uom_id').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('uom_id', $uomItems, null, ['class' => 'form-control select2']) !!}
    </div>
</div>


<!-- Saleable Field -->
<div class="form-group row">
    {!! Form::label('saleable', __('models/products.fields.saleable').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <div class="form-check checkbox">
            {!! Form::checkbox('saleable',true,null,['class' => 'form-check-input']) !!}
        </div>
    </div>
</div>

<!-- Saleable Field -->
<div class="form-group row">
    {!! Form::label('consumeable', __('models/products.fields.consumeable').':', ['class' => 'col-md-3 col-form-label'])
    !!}
    <div class="col-md-9">
        <div class="form-check checkbox">
            {!! Form::checkbox('consumeable',true,null,['class' => 'form-check-input']) !!}
        </div>
    </div>
</div>

<!-- Saleable Field -->
<div class="form-group row">
    {!! Form::label('storeable', __('models/products.fields.storeable').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <div class="form-check checkbox">
            {!! Form::checkbox('storeable',true,null,['class' => 'form-check-input']) !!}
        </div>
    </div>
</div>
