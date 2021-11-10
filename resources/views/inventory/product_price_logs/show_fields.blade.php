<!-- Dms Inv Product Id Field -->
<div class="form-group row">
    {!! Form::label('dms_inv_product_id', __('models/productPriceLogs.fields.dms_inv_product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productPriceLog->dms_inv_product_id }}</p>
    </div>
</div>

<!-- Price Field -->
<div class="form-group row">
    {!! Form::label('price', __('models/productPriceLogs.fields.price').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productPriceLog->price }}</p>
    </div>
</div>

<!-- Start Date Field -->
<div class="form-group row">
    {!! Form::label('start_date', __('models/productPriceLogs.fields.start_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productPriceLog->start_date }}</p>
    </div>
</div>

