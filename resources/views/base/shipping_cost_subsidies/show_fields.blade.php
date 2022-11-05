<!-- Product Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('product_id', __('models/shippingCostSubsidies.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostSubsidy->product_id }}</p>
    </div>
</div>

<!-- Origin Plant Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('origin_plant_id', __('models/shippingCostSubsidies.fields.origin_plant_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostSubsidy->origin_plant_id }}</p>
    </div>
</div>

<!-- Amount Field -->
<div class="form-group row mb-3">
    {!! Form::label('amount', __('models/shippingCostSubsidies.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostSubsidy->amount }}</p>
    </div>
</div>

