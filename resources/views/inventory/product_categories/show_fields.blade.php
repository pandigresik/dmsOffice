<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/productCategories.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productCategories->name }}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/productCategories.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productCategories->description }}</p>
    </div>
</div>

