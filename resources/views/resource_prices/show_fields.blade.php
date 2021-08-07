<!-- Resource Id Field -->
<div class="form-group">
    {!! Form::label('resource_id', __('models/resourcePrices.fields.resource_id').':') !!}
    <p>{{ $resourcePrices->resource_id }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', __('models/resourcePrices.fields.price').':') !!}
    <p>{{ $resourcePrices->price }}</p>
</div>

