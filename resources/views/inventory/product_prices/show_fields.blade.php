<!-- Dms Inv Product Id Field -->
<div class="form-group row">
    {!! Form::label('dms_inv_product_id', __('models/productPrices.fields.dms_inv_product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productPrice->dms_inv_product_id }}</p>
    </div>
</div>

<!-- Price Field -->
<div class="form-group row">
    {!! Form::label('price', __('models/productPrices.fields.price').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productPrice->price }}</p>
    </div>
</div>

<!-- Start Date Field -->
<div class="form-group row">
    {!! Form::label('start_date', __('models/productPrices.fields.start_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productPrice->start_date }}</p>
    </div>
</div>

