<!-- Product Id Field -->
<div class="form-group row">
    {!! Form::label('product_id', __('models/productCategoriesProducts.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productCategoriesProduct->product_id }}</p>
    </div>
</div>

<!-- Product Categories Id Field -->
<div class="form-group row">
    {!! Form::label('product_categories_id', __('models/productCategoriesProducts.fields.product_categories_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productCategoriesProduct->product_categories_id }}</p>
    </div>
</div>

<!-- Status Field -->
<div class="form-group row">
    {!! Form::label('status', __('models/productCategoriesProducts.fields.status').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productCategoriesProduct->status }}</p>
    </div>
</div>

