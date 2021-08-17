<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/uoms.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $uom->name }}</p>
    </div>
</div>

<!-- Uom Category Id Field -->
<div class="form-group row">
    {!! Form::label('uom_category_id', __('models/uoms.fields.uom_category_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $uom->uom_category_id }}</p>
    </div>
</div>

<!-- Factor Field -->
<div class="form-group row">
    {!! Form::label('factor', __('models/uoms.fields.factor').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $uom->factor }}</p>
    </div>
</div>

<!-- Uom Type Field -->
<div class="form-group row">
    {!! Form::label('uom_type', __('models/uoms.fields.uom_type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $uom->uom_type }}</p>
    </div>
</div>

