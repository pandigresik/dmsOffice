{!! Form::hidden($prefixName.'[stateForm]', $stateForm) !!}
<!-- Product Id Field -->
<div class="form-group row">
    {!! Form::label('product_id', __('models/productCategoriesProducts.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select($prefixName.'[product_id]', $productItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Status Field -->
<div class="form-group row">
    {!! Form::label('status', __('models/productCategoriesProducts.fields.status').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden($prefixName.'[status]', 0) !!}
        {!! Form::checkbox($prefixName.'[status]', '1', 'checked') !!}
    </label>
</div>
</div>

