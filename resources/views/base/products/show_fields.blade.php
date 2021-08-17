<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/products.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $product->name }}</p>
    </div>
</div>

<!-- Internal Code Field -->
<div class="form-group row">
    {!! Form::label('internal_code', __('models/products.fields.internal_code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $product->internal_code }}</p>
    </div>
</div>

